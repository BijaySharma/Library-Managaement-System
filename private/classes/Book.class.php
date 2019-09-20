<?php
class Book extends DatabaseObject {
    protected static $table_name = "books";
    protected static $db_columns = ["id", "name", "author_id", "category_id", "price", "copies"];

    public $id;
    public $name;
    public $author_id;
    public $category_id;
    public $copies;
    public $price;
    public $isbn_check = true;




    public function __construct($args=[]){
        $this->id = $args['id'] ?? '';
        $this->name = $args['name']?? '';
        $this->author_id = $args['author_id'] ?? '';
        $this->category_id = $args['category_id'] ?? '';
        $this->price = $args['price'] ?? '';
        $this->copies = $args['copies'] ?? '';
        $this->isbn_check = true;
    }

    public function attributes(){
        $attributes = [];
        foreach (static::$db_columns as $column){
            //if($column == 'id'){continue;}
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    protected function validate(){

        //ISBN
        //perform this check only when not in edit mode
        if($this->isbn_check) {
            if (is_blank($this->id)) {
                $this->errors[] = "ISBN cannot be blank";
            } elseif (!has_unique_isbn($this->id)) {
                $this->errors[] = "A book with same ISBN - " . $this->id . " already exists";
            }
        }

        //BOOK NAME
        if(is_blank($this->name)){
            $this->errors[] = "Book Name cannot be blank";
        }elseif (!has_length($this->name, ["min" => 3, "max"=>255])){
            $this->errors[] = "Book name must be at least 3 letters and not more than 255 letters long";
        }

        //PRICE
        if(is_blank($this->price)){
            $this->errors[] = "Price cannot be blank";
        }elseif (!is_numeric($this->price)){
            $this->errors[]="Please enter a valid price";
        }

        //copies
        if(is_blank($this->copies)){
            $this->errors[] = "Copies cannot be blank";
        }elseif (!is_numeric($this->copies)){
            $this->errors[]="Please enter a valid number of copies";
        }


    }

}
?>
