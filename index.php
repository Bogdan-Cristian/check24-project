<?php


require "libs/ControlSession.php";
session_start();
$session = new \libs\ControlSession();
//var_dump($session->info());


// Router
require_once __DIR__ . '/vendor/autoload.php';

use Steampixel\Route;

// Index Page
Route::add('/', function() {
    include("configs/db.php");

    $sql = sprintf("SELECT * FROM posts");
    $res = $conn->query($sql);

    $posts  = [];

    while($row = $res->fetch_assoc())
    {

        $sql = sprintf("SELECT first_name, last_name FROM user WHERE id = %d", $row['user_id']);
        $creator = $conn->query($sql)->fetch_assoc();
        $customRow = (array) $row;
        $customRow['first_name'] = $creator['first_name'];
        $customRow['last_name'] = $creator['last_name'];

        array_push($posts, $customRow);
    }

    include("templates/index.php");
});


// Impressum page
Route::add('/impressum', function() {
    include("templates/impressum.php");
});

// User Pages

//Login Form
Route::add('/login', function() {
    include("templates/login.php");
}, 'get');

//Login Feature
Route::add('/login', function() {
    include('libs/login.php');
    include('configs/db.php');

    $login = new \libs\login($conn);
    $login->login($_POST);

}, 'post');

//Logout
Route::add('/logout', function() {
    session_destroy();

    header("Location: /");
} );

// Posts

//Add Post Form
Route::add('/addpost', function() {
    include("templates/addPost.php");
}, 'get');

// Add post API
Route::add('/addpost', function() {
    include("libs/addPost.php");
    include('configs/db.php');

    $addPost = new \libs\addPost($conn);
    $addPost->addPost($_POST);
}, 'post');

// Post details
Route::add('/postdetail', function() {
    include('configs/db.php');

    $sql = sprintf("SELECT * FROM posts WHERE id = '%d'", $_GET['post_id']);
    $res = $conn->query($sql);
    if($res)
    {
        $post = $res->fetch_assoc();
    }

    // Getting the Author Name
    $sql = sprintf("SELECT first_name, last_name FROM user WHERE id = %d", $post['user_id']);
    $creator = $conn->query($sql)->fetch_assoc();
    $post['first_name'] = $creator['first_name'];
    $post['last_name'] = $creator['last_name'];

    include("templates/postDetail.php");
}, 'get');

// Run the router
Route::run('/');