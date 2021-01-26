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

    $login = new \libs\login("", $conn);
    $login->login($_POST);

}, 'post');

//Logout
Route::add('/logout', function() {
    $_SESSION["logged"] = false;
    header("Location: /");
} );

// Add Post
Route::add('/addpost', function() {
    include("templates/addPost.php");
});

// Run the router
Route::run('/');