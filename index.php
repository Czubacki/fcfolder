<?php

use Steampixel\Route;

require('config.php');
require_once('class/User.class.php');

Route::add('/' ,function() {
    echo "strona główna";
});

Route::add('/' ,function() {
   // echo "strona logowania";
   global $twig;
   $twig->display('login.html.twig');
});

Route::add('/' ,function() {
    //echo "strona rejestracji";
   global $twig;
   $twig->display('register.html.twig');
});

Route::run('/fcfolder');
?>