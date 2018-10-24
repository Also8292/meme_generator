<?php
require_once 'vendor/autoload.php';
require_once 'model/model.php';

$pseudo = htmlspecialchars($_POST['inputPseudo']);
$user_email = htmlspecialchars($_POST['inputEmail']);
$password = htmlspecialchars($_POST['inputPassword']);
$confirm = htmlspecialchars($_POST['confirmPassword']);

if($password != $confirm) {
    header('Location: ../signup');
}
else {
    $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    add_user_account($pseudo, $user_email, $hash_pass);
    header('Location: ../login');
}