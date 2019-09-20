<?php
require_once("../../private/initialize.php");
if(!$session->is_logged_in()){
    echo "not found";
}
if(!isset($_GET['id'])){
    echo "not found";
}
$id = $_GET['id'];
$user = User::find_by_id($id);
if($user == false){
    echo "not found";
}else{
    echo $user->full_name();
}
?>