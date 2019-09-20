<?php require_once("../../../private/initialize.php") ?>
<?php require_admin_login(); ?>
<?php
if(is_post_request()){
    $args = $_POST['user'];
    $user = new User($args);
    $result = $user->save();

    if($result == true){
        $new_id = $user->id;
        redirect_to(url_for("admin/users/view_user.php?id=" . $new_id));
    }else{
        //show errors
    }

}else{
    //display the form
    $user = new User();

}

?>
<?php require_once(SHARED_PATH . "/admin_header.php");?>

    <div class="container mb-4">
        <h1 class="display-3 mb-4 text-center text-primary">Register User</h1>
        <?php echo display_errors($user->errors); ?>
        <form method="post" action="add_user.php">
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="form-label" for="firstName">First Name</label>
                    <input type="text" name="user[first_name]" placeholder="First Name" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                    <label class="form-label" for="firstName">Last Name</label>
                    <input type="text" name="user[last_name]" placeholder="Last Name" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="form-label" for="firstName">Gender</label>
                    <select name="user[gender]" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                        <option value="" selected disabled>Select</option>
                        <option data-tokens="male" value="Male">Male</option>
                        <option data-tokens="female" value="Female">Female</option>
                        <option data-tokens="other" value="Otherk">Other</option>
                    </select>
                </div>





            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="form-label" for="Account type">Account Type</label>
                    <select name="user[level]" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="1">Admin</option>
                        <option value="2">Teacher</option>
                        <option value="3">Student</option>
                    </select>
                </div>
            </div>

            <div class="row">

                <div class="form-group col-sm-6">
                    <label class="form-label" for="firstName">Course</label>
                    <select name="user[course]" class="form-control">
                        <option value="select" disabled selected>Select</option>
                        <option value="B.Tech Civil Engineering">B.Tech Civil Engineering</option>
                        <option value="B.Tech Computer Science & Engineering">B.Tech Computer Science & Engineering</option>
                    </select>
                </div>

                <div class="form-group col-sm-6">
                    <label class="form-label" for="firstName">Year</label>
                    <select name="user[year]" class="form-control">
                        <option value="" selected disabled>Select</option>
                        <option value="First Year">First Year</option>
                        <option value="Second Year">Second Year</option>
                        <option value="Third Year">Third Year</option>
                        <option value="Fourth Year ">Fourth Year</option>
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="user[email]" placeholder="Email" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                    <label class="form-label" for="phone">Phone Number</label>
                    <input type="text" name="user[phone]" placeholder="Phone Number" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="user[username]" placeholder="Username" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-6">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="user[password]" placeholder="Password" class="form-control">
                </div>

                <div class="form-group col-sm-6">
                    <label class="form-label" for="confirmpassword">Confirm Password</label>
                    <input type="password" name="user[confirm_password]" placeholder="Password" class="form-control">
                </div>
            </div>


            <input type="submit" class="btn btn-primary btn-lg" style="margin: 0 44%" value="Submit" name="submit">

        </form>
    </div>
<script>
    $(function() {
        $('.selectpicker').selectpicker();
    });
</script>

<?php require_once(SHARED_PATH . "/public_footer.php");?>