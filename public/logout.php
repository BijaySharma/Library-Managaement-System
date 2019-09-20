<?php require_once("../private/initialize.php")?>
<?php
$session->logout();
redirect_to("index.php");
?>
<?php require_once(SHARED_PATH . "/public_footer.php");?>
