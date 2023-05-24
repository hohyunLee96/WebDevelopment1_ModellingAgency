<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark mb-4 navbar">
    <div class="container">
        <a class="navbar-brand" href="/home">H Agency</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="/home/index">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Model
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/home/model/male">Male</a>
                        <a class="dropdown-item" href="/home/model/female">Female</a>
                        <a class="dropdown-item" href="/home/model/curvy">Curvy</a>
                        <a class="dropdown-item" href="/home/model/vegetarian">Vegetarian</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if ($_SESSION['types'] == 'client' || ($_SESSION['id'] == null)) { ?> hidden
                    <?php } ?> href="/home/createmodel">Create Model</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if ($_SESSION['types'] == 'client' || ($_SESSION['id'] == null)) { ?> hidden
                    <?php } ?> href="/home/user/managing">Manage User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" <?php if ($_SESSION['types'] == 'client' || ($_SESSION['id'] == null)) { ?> hidden
                    <?php } ?> href="/home/booking/managing">Manage Booking</a>
                </li>
                <li class="nav-item dropdown">
                    <?php
                    if ($_SESSION['id'] != null) {
                        // user is logged in, show logout link
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Logout</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        echo '<a class="dropdown-item" href="/home/login">Logout</a>';
                        echo '</div>';
                    } else {
                        // user is not logged in, show login link
                        echo '<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In</a>';
                        echo '<div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                        echo '<a class="dropdown-item" href="/home/login">Sign In</a>';
                        echo '</div>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">