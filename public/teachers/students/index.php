<?php require_once("../../../private/initialize.php") ?>
<?php require_teacher_login(); ?>
<?php
?>
<?php require_once(SHARED_PATH . "/teacher_header.php");?>
<style>
   #bd{
       min-height:63vh
   }
</style>
<div class="container" id="bd">
<div class="row justify-content-center align-items-center text-center">

    <div class="col-sm-3">'
    <div class="card" style="width: 12rem; height: 14rem;">
        <div class="card-body text-center">

            <img src="<?php echo url_for("assets/team.svg");   ?>"style="width: 8rem; height: 8rem;>
            <a href="#">
                <h5 class="btn btn-primary mt-4">All students</h5>
            </a>
        </div>
    </div>
    </div>

    <div class="col-sm-3">
        <div class="card mt-4" style="width: 12rem; height: 14rem;">
            <div class="card-body text-center">

                <img src="<?php echo url_for("assets/search.svg"); ?>" style="width: 8rem; height: 8rem;">
                <a href="#">
                    <a href="view_student.php" class="btn btn-primary mt-4">Search Student</a>
                </a>
            </div>
        </div>
    </div>

    <div class="col-sm-3">
    <div class="card mt-4" style="width: 12rem; height: 14rem;">
        <div class="card-body text-center">

            <img src="<?php echo url_for("assets/add.svg"); ?>" style="width: 8rem; height: 8rem;">
            <a href="#">
                <a href="add_student.php" class="btn btn-primary mt-4">Add Student</a>
            </a>
        </div>
    </div>
    </div>

</div><!-- row -->
</div><!-- Container -->

<?php require_once(SHARED_PATH . "/public_footer.php");?>

