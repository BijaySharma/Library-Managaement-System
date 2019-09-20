<?php
class Author extends DatabaseObject{
    protected static $table_name = "authors";
    protected static $db_columns = ["id", "name"];

    public $id;
    public $name;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
    }

    public function validate(){
        if (is_blank($this->name)) {
            $this->errors[] = "Author Name cannot be blank";
        }elseif (!has_length($this->name, ["min"=>3, "max" => 255])){
            $this->errors[] = "Author's name must contain atleast 3 letters";
        }
    }

}

?>