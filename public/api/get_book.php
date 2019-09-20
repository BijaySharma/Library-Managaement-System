<?php
require_once("../../private/initialize.php");
if(!isset($_GET['id'])){
    echo "not found";
}
$id = $_GET['id'];
$book = Book::find_by_id($id);
if($book == false){
    echo "not found";
}else{
    echo $book->name;
}
?>