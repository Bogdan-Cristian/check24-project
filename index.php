<?php

require "libs/session_control.php";
session_start();
$session = new \libs\session_control();


require_once __DIR__ . '/vendor/autoload.php';

// Use this namespace
use Steampixel\Route;

// Add your first route
Route::add('/html', function() {
    include("login.php");
});

// Run the router
Route::run('/');