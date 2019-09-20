<?php
class User extends DatabaseObject{
    protected static $table_name = "users";
    protected static $db_columns = ['id','first_name', 'last_name', 'gender', 'course', 'year', 'phone', 'email', 'username', 'hashed_password','level'];

    public $id;
    public $first_name;
    public $last_name;
    public $gender;
    public $course;
    public $year;
    public $phone;
    public $email;
    public $username;
    public $level;
    protected $hashed_password;

    public $password;
    public $confirm_password;

    public function __construct($args=[]){
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->gender = $args['gender'] ?? '';
        $this->course = $args['course'] ?? '';
        $this->year = $args['year'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->level = $args['level'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
        $this->level = $args['level'] ?? '';
    }

    public function full_name(){
        return $this->first_name . " " . $this->last_name;
    }

    protected function set_hashed_password(){
        $this->hashed_password = password_hash($this->password,PASSWORD_BCRYPT);

    }

    public function verify_password($password){
        return password_verify($password,$this->hashed_password);
    }

    protected function validate(){
         //First Name
        if(is_blank($this->first_name)){
            $this->errors[] = "First Name Can't Be Blank";
        }elseif (!has_length($this->first_name, ["min"=>2, "max" => 255])){
            $this->errors[] = "First name must be between 2 and 255 characters long.";
        }

        //Last Name
        if(is_blank($this->last_name)){
            $this->errors[] = "Last Name Can't Be Blank";
        }elseif (!has_length($this->last_name, ["min"=>"2", "max" => "255"])){
            $this->errors[] = "Last name must be between 2 and 255 characters long.";
        }

        //gender
        if(!has_inclusion_of($this->gender, ["Male","Female", "Other"])){
            $this->errors[] = "Please Select a Gender";
        }

        //level or account type
        if(!has_inclusion_of($this->level, ["1", "2", "3"])){
            $this->errors[] = "Please Select an account type";
        }

        //Phone
        if(is_blank($this->phone)){
            $this->errors[]="Phone Number Can't be blank";
        }elseif (!is_numeric($this->phone)){
            $this->errors[] = "Please Enter a Valid Phone number";
        } elseif (!has_length_exactly($this->phone,"10")){
            $this->errors[] = "Phone Number can't be more or less than 10 digits.";
        }

        //email
        if(is_blank($this->email)){
            $this->errors[] = "Email Can't be Blank.";
        }elseif (!has_length($this->email,["max"=>255])){
            $this->errors[] = "Email too long";
        }elseif (!has_valid_email_format($this->email)){
            $this->errors[] = "Please Enter a Valid Email Address";
        }

        //username
        if(is_blank($this->username)){
            $this->errors[]="Username can't be blank";
        }elseif(!has_length($this->username,["min" =>4, "max" => 255])){
            $this->errors[]="Username must me atleast 4 characters long";
        }elseif(!has_unique_username($this->username, $this->id ?? 0)){
            $this->errors[] = "Username is already taken, please try another one.";
        }

        //password
        if(is_blank($this->password)) {
            $this->errors[] = "Password cannot be blank.";
        } elseif (!has_length($this->password, array('min' => 6))) {
            $this->errors[] = "Password must contain 6 or more characters";
        } elseif (!preg_match('/[A-Z]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 uppercase letter";
        } elseif (!preg_match('/[a-z]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 lowercase letter";
        } elseif (!preg_match('/[0-9]/', $this->password)) {
            $this->errors[] = "Password must contain at least 1 number";
        }

        //confirm password
        if(is_blank($this->confirm_password)){
            $this->errors[] = "Confirm Password cannot be blank.";
        }elseif ($this->confirm_password !== $this->password){
            $this->errors[] = "Password and Confirm Password Must Match.";
        }


        if($this->level > 2){
            //check for students only

            if(!has_inclusion_of($this->course, ["B.Tech Civil Engineering","B.Tech Computer Science & Engineering"])){
                $this->errors[] = "Please select a valid Course";
            }

            if(!has_inclusion_of($this->year, ["First Year","Second Year", "Third Year", "Fourth Year"])){
                $this->errors[] = "Please select a year";
            }

        }


    }

    public function create(){
        $this->set_hashed_password();
        return parent::create();
    }

    public function update(){
        $this->set_hashed_password();
        return parent::update();
    }

    public static function find_by_username($username){
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE username='" . self::$database->escape_string($username) . "'";
        $object_array = static::find_by_sql($sql);
        if(!empty($object_array)){
            return array_shift($object_array);
        }else{
            return false;
        }
    }

    public static function find_all_students(){
        $sql = "SELECT * FROM " . self::$table_name . " WHERE level='3'";
        return self::find_by_sql($sql);

    }
}


?>