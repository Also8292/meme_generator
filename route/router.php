<?php

require_once 'controller/controller.php';
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
    session_start();
    if(isset($_SESSION['user']) && isset($_SESSION['email'])) {
        echo $twig->render('accueil.twig', ['user' => $_SESSION['user'], 'email' => $_SESSION['email']]);
    }
    else {
        echo $twig->render('accueil.twig', ['title' => $link]);
    }
}

if($link == 'deconnexion') {
    session_destroy();
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
else if($link == 'a-propos') {
    echo $twig->render('about.twig', ['title' => $link]);
}
// else if(preg_match('#accueil/#i', $link)) {
//     echo $twig->render('connect.twig');
// }
// else if($link == 'bad') {
//     echo $twig->render('bad.twig');
// }
// else if($link == 'download-meme') {

// }
else {
    echo $twig->render('error.twig', ['title' => $link]);
}
