<?php


$session = new \libs\ControlSession();

if(!($session->isLogged()))
{
    header("Location: /");
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/bootstrap-grid.min.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <title>Document</title>
</head>


<body>

<header>
    <!--    Top-Bar   -->

    <div class="d-flex">
        <a href="/" class="blog-logo">Blog Logo</a>
        <h3 href="/" class="ml-2">
            Bogdan's Blog
        </h3>
    </div>

    <!--    Navbar   -->
    <div class="nav d-flex align-items-center justify-content-between">
        <ul class="nav-list d-flex list-style-none">
            <li class="nav-element">
                <a href="/" class="nav-link">Home</a>
            </li>

            <?php if($session->isLogged()):  ?>
                <li class="nav-element">
                    <a href="/addPost" class="nav-link"> Neue Eintrag</a>
                </li>
            <?php endif; ?>

            <li class="nav-element">
                <a href="/impressum" class="nav-link">Impressum</a>
            </li>
        </ul>

        <div>
            <?php if($session->isLogged()):  ?>
                <a class="btn btn-logout" href="/logout"  >Logout</a>
            <?php endif; ?>

            <?php if(!($session->isLogged())):  ?>
                <a class="btn btn-logout" href="/login"  >Login</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<div class="container">
    <form action="/addpost" method="POST">
        <div class="d-flex   mb-2">
            <h3 class="input-label col-2" for="username">* Titel:</h3>
            <input class="title input col-8" type="text" name="title" required>
        </div>

        <div class="d-flex mb-2">
            <h3 class="input-label col-2" for="password">* Beschreibung:</h3>
            <input class="description input col-8" type="text" name="description" required>
        </div>

        <div class="d-flex  mb-2">
            <h3 class="input-label col-2" for="link">Image link</h3>
            <input class="img input col-8" type="text" name="imageLink" required>
        </div>

        <div class="d-flex">
            <h3 class=" col-2" ></h3>
            <button type="submit" class="btn submit-btn"> Submit </button>
        </div>

    </form>
</div>
</body>
</html>
