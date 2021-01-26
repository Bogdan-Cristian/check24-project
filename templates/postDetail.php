<?php


$session = new \libs\ControlSession();


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
    <div class="post-container col-12 px-2 py-1 mb-4" style="border:1px solid black; background-color:#9797ff;">
        <div class="top-bar d-flex">
            <span class="time mr-2">
             <?php
             $date =  getdate($post['added_at']);
             echo $date['mday'] . "." . $date['mon'] . "." . $date['year'];
             ?>
            </span>

            <span class="post-title"><?php echo $post['title'] ?></span>
        </div>

        <div class="main-container row" style="height: 250px">
            <div class="content col-9 d-flex flex-column justify-content-between">
                <div class="description">
                    <p><?php echo $post["description"] ?></p>
                </div>

                <div class="post-info bottom-bar d-flex justify-content-between">
                    <div class="post-author">
                        Author: <?php echo $post['first_name'] . " " . $post['last_name']?>
                    </div>
                    <div class="post-comments">
                        Kommentare: 2
                    </div>
                </div>
            </div>

            <div class="post-img-wrapper col-3">
                <img class="post-img" src="<?php echo $post['image_link'] ?>" alt="">
                <!--                <img class="post-img" src="https://images.pexels.com/photos/956981/milky-way-starry-sky-night-sky-star-956981.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">-->
            </div>
        </div>
    </div>
</div>

</body>
</html>
