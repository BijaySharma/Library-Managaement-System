<?php
require_once("../../private/initialize.php");
if(!isset($_GET['id'])){
    exit("Library ID not found");
}
$id = $_GET['id'];
$user = User::find_by_id($id);
if(!$user){
    echo "<div class=\"alert alert-danger\" role=\"alert\">
  Bummer! <a href=\"#\" class=\"alert-link\">Invalid Library ID, Please try again.
</div>";
    exit();
}
if($user->level != 3){
    echo "<div class=\"alert alert-danger\" role=\"alert\">
  Bummer! <a href=\"#\" class=\"alert-link\">Invalid Library ID, Please try again.
</div>";

    exit();
}

?>

<div class="container bg-light d-flex flex-column align-items-center mt-sm-4"">
<div class="display-3 mb-4 text-center">Account Details</div>



<table class="table d-flex justify-content-center">
    <tr>
        <td>Type</td>
        <td>    <span class="badge badge-pill badge-primary">
        <?php

        switch ($user->level){
            case 1:
                echo "Admin Account";
                break;
            case 2 :
                echo "Teacher Account";
                break;
            case 3:
                echo "Student Account";
        }

        ?>
    </span></td>
    </tr>
    <tr>
        <td>Library ID:</td>
        <td style="color: red;"><?php echo $user->id; ?></td>
    </tr>
    </tr>
    <tr>
        <td>Name :</td>
        <td><?php echo $user->full_name(); ?></td>
    </tr>
    <tr>
        <td>Gender :</td>
        <td><?php echo $user->gender; ?></td>
    </tr>
    <tr>
        <td>Course</td>
        <td><?php echo $user->course; ?></td>
    </tr>

    <tr>
        <td>Phone</td>
        <td><?php echo $user->phone; ?></td>
    </tr>
    <tr>
        <td>Email :</td>
        <td><?php echo $user->email; ?></td>
    </tr>
    <tr>
        <td>Username :</td>
        <td><?php echo $user->username; ?></td>
    </tr>

</table>
<div class="container d-flex justify-content-center mb-4">
    <button class="btn btn-primary mr-2">Edit Details</button>
    <button class="btn btn-warning mr-2">Change Password</button>
    <button class="btn btn-danger">Delete Account</button>
</div>
</div>

