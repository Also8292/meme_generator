<?php

require_once 'model/model.php';


/**
 * add user
 */

if(isset($_POST['addUserBtn'])) {

    $pseudo = htmlspecialchars($_POST['inputPseudo']);
    $user_email = htmlspecialchars($_POST['inputEmail']);
    $password = htmlspecialchars($_POST['inputPassword']);
    $confirm = htmlspecialchars($_POST['confirmPassword']);


    if($password != $confirm) {
        header('Location: signup');
    }
    else {
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        add_user_account($pseudo, $user_email, $hash_pass);
        
        header('Location: login');
    }
}


/**
 * login
 */
if(isset($_POST['loginBtn'])) {
    $input_log = htmlspecialchars($_POST['inputLogin']);
    $input_pass = htmlspecialchars($_POST['inputPassword']);

    $user_exist = verify_user_exist($input_log);

    if($user_exist['exist']) {
        $verify_pass = false;
        while($result = $user_exist['request']->fetch()) {
            $verify_pass = password_verify($input_pass, $result['user_password']);
        }
        if($verify_pass) {
            header('Location: connect');
        }
        else {
            header('Location: bad');
        }
    }
    else {
        echo 'Vous n\'étes pas inscrit';
    }
}

