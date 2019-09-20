<?php require_once("../private/initialize.php")?>
<?php
$errors = [];
$username = "";
$password ="";
if(is_post_request()){

    $username = $_POST['username']??'';
    $password = $_POST['password']??'';

    //run validation
    if(is_blank($username)){
        $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)){
        $errors[] = "Password cannot be blank.";
    }

    if(empty($errors)){
        //validate credentials
        $user = User::find_by_username($username);
        if($user != false && $user->verify_password($password)){
            //user found, verify password
            $session->login($user);
            switch ($user->level){
                case 1:
                    redirect_to("/admin/index.php");
                    break;
                case 2:
                    redirect_to("/teachers/index.php");
                    break;
                case 3:
                    redirect_to("students/index.php");
            }

        }else{
            $errors[] = "Incorrect Username or Password";
        }

    }
}

if($session->is_logged_in()){
    switch ($session->get_level()){
        case 1:
            redirect_to(url_for("/admin/index.php"));
            break;
        case 2 :
            redirect_to(url_for("/teachers/index.php"));
            break;
        case 3:
            redirect_to(url_for("/student/index.php"));
    }
}


?>
<?php require_once(SHARED_PATH . "/public_header.php");?>
<style>

    @media only screen and (max-width: 600px) {
        .usr{
            margin-bottom: 0.5em;
        }
    }
    @media (min-width: 768px) {

    }
</style>


    <!-- BANNER -->
    <div class="container-fluid hero">
        <div class="row justify-content-center">

            <div class="col-md-6 mb-3 mb-sm-0 order-sm-2">
                <img width="100%" src="assets/hero.svg">
            </div><!-- column 1 -->

            <section class="col-md-5 align-self-center order-sm-1">
                <div class="container text-center text-sm-left">
                    <h2 class="display-4 text-primary">Welcome to SIST Library</h2>
                    <h3 class="font-weight-light">Please Log in to continue</h3>
                    <p><form action="index.php" method="post">
                        <?php echo display_errors($errors); ?>
                        <div class="form-row">
                            <div class="col-sm usr">
                                <input type="text" class="form-control" placeholder="Username" name="username">
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-dark mt-3" value="Log in" name="submit">
                        <a href="#prj" class="btn btn-outline-dark mt-3">Learn More</a>
                    </form></p>


                </div><!-- container -->
            </section><!-- column 2 -->

        </div><!-- row -->
    </div><!-- container -->
    <!-- END OF BANNER-->
    <!--CARDS -->

    <div class="container my-3" id="prj">
        <h2 class="font-weight-normal text-center my-4 d-sm-none">The Project</h2>
        <h2 class="display-4 text-center my-4 d-none d-sm-block">The Project</h2>

        <div class="row">

            <div class="col-sm-6 col-md-4 my-2 ">
                <div class="card">
                    <div class="card-header"><h3 class="card-title font-weight-normal mb-0 text-primary">Books</h3></div><!-- Card Header -->
                    <div class="card-body">
                        <img src="assets/book.svg" class="card-img mb-2">
                        <p class="card-text">Now know about books without walking in the Library.</p>
                        <p class="card-text">The Site brings you the complete list of books.</p>
                    </div><!-- Card Body -->
                </div><!-- Card -->
            </div><!-- col -->

            <div class="col-sm-6 col-md-4 my-2 ">
                <div class="card">
                    <div class="card-header"><h3 class="card-title font-weight-normal mb-0 text-primary">Reminder</h3></div><!-- Card Header -->
                    <div class="card-body">
                        <img src="assets/reminder.svg" class="card-img mb-2">
                        <p class="card-text">Get all your book due dates at one place</p>
                        <p class="card-text">We provide you with notifications 3 days before your book expires.<br>You never pay fine again.</p>
                    </div><!-- Card Body -->
                </div><!-- Card -->
            </div><!-- col -->

            <div class="col-sm-6 col-md-4 my-2 ">
                <div class="card">
                    <div class="card-header"><h3 class="card-title font-weight-normal mb-0 text-primary">Let's do it together</h3></div><!-- Card Header -->
                    <div class="card-body">
                        <img src="assets/together.svg" class="card-img mb-2">
                        <p class="card-text">Let's build it together, join the development team</p>
                        <p class="card-text">With your help we can accelerate the development make it more robust and efficient.</p>
                    </div><!-- Card Body -->
                </div><!-- Card -->
            </div><!-- col -->

        </div><!-- row -->

    </div><!-- Container --></div>






<?php require_once(SHARED_PATH . "/public_footer.php");?>