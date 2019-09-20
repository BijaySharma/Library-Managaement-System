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

<nav class="navbar bg-dark navbar-dark navbar-expand-sm sticky-top">
    <div class="container-fluid">
        <div class="navbar-brand font-weight-light" style="font-family: Arial; letter-spacing: 3px;">SIST LIBRARY - ADMIN</div>

        <ul class="navbar-nav">
            <li class="nav-item"><a href="<?php echo url_for("admin/index.php"); ?>" class="nav-link">Home</a> </li>
            <!--<li class="nav-item"><a href="" class="nav-link">Dashboard</a> </li>-->
            <li class="nav-item"><a href="<?php echo url_for("/admin/books/all_books.php"); ?>" class="nav-link">Books</a> </li>
            <li class="nav-item"><a href="<?php echo url_for("/admin/books/issue_book.php"); ?>" class="nav-link">Issue Book</a> </li>
            <li class="nav-item"><a href="#" class="nav-link">Withdraw Book</a> </li>
            <li class="nav-item"><a href="<?php echo url_for("/admin/books/all_authors.php"); ?>" class="nav-link">Authors</a> </li>
            <li class="nav-item"><a href="<?php echo url_for("/admin/books/all_categories.php"); ?>" class="nav-link">Categories</a> </li>
            <li class="nav-item"><a href="<?php echo url_for("/admin/users/index.php"); ?>" class="nav-link">Manage Users</a> </li>

        </ul>
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color: #fff" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if($session->is_logged_in()){echo $session->get_name();} ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo url_for("admin/profile/") ?>">Profile</a>
                    <a class="dropdown-item" href="#">Notifications</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo url_for("/logout.php") ?>">Log out</a>
                </div>
            </li>
        </ul>


    </div>
</nav>
<img src"../../public/assets/profile.svg">