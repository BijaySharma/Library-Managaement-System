<?php require_once("../../private/initialize.php") ?>
<?php require_teacher_login(); ?>
<?php require_once(SHARED_PATH . "/teacher_header.php");?>
<style>

</style>
<div class="jumbotron">
    <h1 class="display-4">Teacher's Dashboard is under construction</h1>
    <hr>
    <div class="container">
        <p>You can now perform the following opreations : </p>
        <ul>
            <li><a href="students/add_student.php">Add Students</a></li>
            <li><a href="students/view_student.php">Search registered Students</a></li>
            <li><a href="profile">View your Profile</a></li>
        </ul>
        <p>You can also add teachers, the "<a href="students/add_student.php">Add Students</a>" page is capeable to register teachers account now.</p>
        <p>We have also made changes to the manage students page <a href="students">take a look</a>.</p>
    </div>

</div>



<?php require_once(SHARED_PATH . "/public_footer.php");?>

