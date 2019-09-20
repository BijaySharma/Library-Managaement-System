<?php
require_once("../../private/initialize.php");

if(!isset($_GET['id'])){
    echo "{\"error\":\"Invalid URL\"}";
}else{
    $id = $_GET['id'];
    $book = Book::find_by_id($id);
    if($book){
        echo json_encode($book);
    }else{
        echo "{\"error\":\"Book Not Found\"}";
    }

}

?>


