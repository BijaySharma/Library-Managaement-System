<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SIST LIBRARY</title>
</head>
<body>

<nav class="navbar bg-light navbar-light navbar-expand-sm">
    <div class="container-fluid">
        <div class="navbar-brand font-weight-light" style="font-family: Arial; letter-spacing: 3px;">SIST LIBRARY </div>

        <ul class="navbar-nav">
            <li class="nav-item"><a href="<?php echo url_for("teachers/index.php"); ?>" class="nav-link">Home</a> </li>
            <!--<li class="nav-item"><a href="" class="nav-link">Dashboard</a> </li>-->
            <li class="nav-item"><a href="" class="nav-link">My Books</a> </li>
            <li class="nav-item"><a href="<?php echo url_for("teachers/students/"); ?>" class="nav-link">Manage Students</a> </li>
            <li class="nav-item"><a href="#" class="nav-link">Rules</a> </li>

        </ul>
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($session->is_logged_in()){echo $session->get_name();} ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo url_for("teachers/profile/") ?>">Profile</a>
                    <a class="dropdown-item" href="#">Notifications</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo url_for("/logout.php") ?>">Log out</a>
                </div>
            </li>
        </ul>


    </div>
</nav>
<img src"../../public/assets/profile.svg">