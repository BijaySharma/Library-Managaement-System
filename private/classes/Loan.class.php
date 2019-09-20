<?php
class Loan extends DatabaseObject{
    protected static $table_name = "loans";
    protected static $db_columns = ["id", "user_id", "isbn", "issue_date", "return_date"];

    public $id;
    public $user_id;
    public $isbn;
    public $issue_date;
    public $return_date;


    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->user_id = $args['user_id'] ?? '';
        $this->isbn = $args['isbn'] ?? '';
        $this->issue_date = $args['issue_date'] ?? '';
        $this->return_date = $args['return_date'] ?? '';
    }

    public function is_expired(){
        $today = time();
        $return_date = strtotime($this->return_date);

        return ($today > $return_date);

    }



}

?>