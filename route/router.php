<?php

//require 'vendor/autoload.php';
require_once 'controller/user_controller.php';

//twig config
$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader, [
    'cache' => false,
]);

$link = basename($_SERVER['REQUEST_URI']);

if($link == 'meme_creator') {
    $link = '/';
}

if($link == '/' || $link == 'accueil') {
    echo $twig->render('accueil.twig', ['title' => $link]);
}

else if($link == 'login') {
    echo $twig->render('login.twig', ['title' => $link]);
}

else if($link == 'signup') {
    echo $twig->render('signup.twig', ['title' => $link]);
}

else if($link == 'admin') {
    echo $twig->render('admin/admin.twig', ['title' => $link]);
}
else {
    echo $twig->render('error.twig', ['title' => $link]);
}
