<?php require_once("../../private/initialize.php")?>
<?php require_student_login(); ?>
<?php require_once(SHARED_PATH . "/public_header.php");?>

<div class="jumbotron">
    <h1 class="display-4">Student's Dashboard is under construction</h1>
    <hr>
    <div class="container">
       <a class="btn btn-danger btn-lg" href="<?php echo url_for("logout.php") ?>">Log Out</a>
    </div>

</div>

<?php require_once(SHARED_PATH . "/public_footer.php");?>
