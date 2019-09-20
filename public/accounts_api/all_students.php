<?php
require_once("../../private/initialize.php");
$students = User::find_all_students();
?>
<?php echo json_encode($students); ?>

