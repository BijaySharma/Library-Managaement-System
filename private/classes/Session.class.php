<?php
class Session{
    private $user_id;
    private $level;
    private $first_name;
    private $last_login;
    public const MAX_LOGIN_AGE = 60*60**24; //1 Day

    public function __construct(){
        session_start();
        $this->check_stored_login();
    }

    public function login($user){
        if($user){
            session_regenerate_id();
            $_SESSION['user_id'] = $user->id;
            $this->user_id = $user->id;

            $_SESSION['level'] = $user->level;
            $this->level = $user->level;

            $_SESSION['first_name'] = $user->first_name;
            $this->first_name = $user->first_name;

            $this->last_login = $_SESSION['last_login'] = time();
        }
        return true;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);

        unset($_SESSION['level']);
        unset($this->level);

        unset($_SESSION['first_name']);
        unset($this->first_name);

        unset($this->last_login);
        unset($_SESSION['last_login']);

        return true;
    }

    public function is_logged_in(){
        return isset($this->user_id) && $this->last_login_is_recent();
    }

    private function check_stored_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->first_name = $_SESSION['first_name'];
            $this->level = $_SESSION['level'];
            $this->last_login = $_SESSION['last_login'];
        }
    }

    private function last_login_is_recent(){
        if(!isset($this->last_login)){
            return false;
        }elseif(($this->last_login + self::MAX_LOGIN_AGE) < time()){
            return false;
        }else{
            return true;
        }
    }

    public function get_name(){
        return $this->first_name;
    }

    public function get_level(){
        return $this->level;
    }

    public function get_user_id(){
        return $this->user_id;
}

}

?>