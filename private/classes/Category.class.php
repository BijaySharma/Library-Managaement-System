<?php
class Category extends DatabaseObject {
    protected static $table_name = "categories";
    protected static $db_columns = ["id", "name", "status"];

    public $id;
    public $name;
    public $status;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->status = $args['status'] ?? '';
    }

    public function validate(){
        if(is_blank($this->name)){
            $this->errors[] = "Category Name cannot be blank";
        }

        if(!has_inclusion_of($this->status, ["Active", "Inactive"])){
            $this->errors[] = "Please Select a Valid Status";
        }
    }
}

?>
