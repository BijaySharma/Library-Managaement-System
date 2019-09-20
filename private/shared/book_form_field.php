<?php
//if(!isset($book)){
//    exit("<span style='color:red;'>Authorization Error</span>");
//}
?>


ISBN 13 : <input type="number" name="book[id]" value="<?php echo h($book->id);?>">
Book Name : <input type="text" name="book[name]" value="<?php echo h($book->name);?>"><br>
Authors : <input type="text" name="book[authors]" value="<?php echo h($book->authors);?>"<br>
Publisher : <input type="text" name="book[publisher]" value="<?php echo h($book->publisher);?>"><br>
copies : <input type="number" name="book[copies]" value="<?php echo h($book->copies);?>"><br>