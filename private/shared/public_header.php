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

<nav class="navbar bg-dark navbar-dark navbar-expand-sm">
    <div class="container-fluid">
    <div class="navbar-brand font-weight-light" style="font-family: Arial; letter-spacing: 3px;">SIST LIBRARY</div>

    <ul class="navbar-nav">
        <li class="nav-item"><a href="#" class="nav-link">Home</a> </li>
        <li class="nav-item"><a href="#" class="nav-link">Books</a> </li>
        <li class="nav-item"><a href="#" class="nav-link">Rules</a> </li>
        <li class="nav-item"><a href="#" class="nav-link">Help</a> </li>
        <li class="nav-item"><a href="#" class="nav-link">About</a> </li>
        <li class="nav-item"><a href="<?php echo url_for("/logout.php") ?>" class="nav-link"><?php if($session->is_logged_in()){echo $session->get_name();} ?></a> </li>
    </ul>

    </div>
</nav>
