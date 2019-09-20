<?php

class DatabaseObject{
    protected static $database;
    protected static $table_name = "books";
    protected static $db_columns = [];
    public $errors = [];

    public static function set_database($database){
        self::$database=$database;
    }

    protected function validate(){
        $this->errors = [];

        // Class should Provide their own validations

        return $this->errors;
    }

    public static function find_by_sql($sql){
        $result = self::$database->query($sql);
        if(!$result){
            exit("Database query failed.");
        }

        // results into onjects
        $object_array = [];

        while($record = $result->fetch_assoc()){
            $object_array[] = static::instantiate($record);
        }
        $result->free();

        return $object_array;
    }

    public static function find_all(){
        $sql = "SELECT * FROM " . static::$table_name;
        return static::find_by_sql($sql);
    }

    static protected function instantiate($record){
        $object = new static;

        foreach ($record as $property => $value){
            if(property_exists($object,$property)){
                $object->$property = $value;
            }
        }

        return $object;
    }

    public static function find_by_id($id){
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        $object_array = static::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }

    public function create(){
        $this->validate();
        if(!empty($this->errors)){return false;}

        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO ". static::$table_name ." (";
        $sql .= join(", ",array_keys($attributes));
        $sql .= ") VALUES('";
        $sql .= join("', '", array_values($attributes));
        $sql .="')";
        //var_dump($sql);
        $result = self::$database->query($sql);
        if($result){
            $this->id = self::$database->insert_id;
        }
        return $result;
    }

    public function update(){
        $this->validate();
        if(!empty($this->errors)){return false;}

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value){
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE ". static::$table_name ." SET ";
        $sql .= join(", ",$attribute_pairs);
        $sql .= " WHERE id='" . $this->id . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public function save(){
        if(isset($this->id)){
            $result = $this->update();
        }else{
            $result = $this->create();
        }

        return $result;
    }

    public function merge_attributes($args){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public function attributes(){
        $attributes = [];
        foreach (static::$db_columns as $column){
            if($column == 'id'){continue;}
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    protected function sanitized_attributes(){
        $sanitized = [];
        foreach ($this->attributes() as $key => $value){
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

}

?>