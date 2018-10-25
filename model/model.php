<?php
//require_once 'vendor/autoload.php';
//require_once 'database.php';



/**
 * database connexion
 * @return PDO connexion
 */
function database_connexion() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=meme_generator;charset=utf8','root','');
        return $connexion;
    }
    catch(Exception $ex) {
        die('Error : database connexion failed => ' . $ex->getMessage());
    }
}


/**
 * create user account
 * @param string user pseudo, user email, user password
 */
function add_user_account($user_pseudo, $user_email, $user_password) {
    $connexion = database_connexion();
    $query = 'INSERT INTO users(pseudo, user_email, user_password) VALUES (?, ?, ?)';
    $request = $connexion->prepare($query);
    $request->execute(array($user_pseudo, $user_email, $user_password));
}



/**
 * 
 */
function user_login($user) {
    $connexion = database_connexion();

    $attribute = "";
    if($user) {
        $attribute = 'pseudo';
    }
    else {
        $attribute = "user_email";
    }

    $query = 'SELECT pseudo, user_email, user_password FROM users WHERE ';
}



/**
 * add new image with url
 * @param string image url
 */
function add_image($image_url) {
    $connexion = database_connexion();
    $query = 'INSERT INTO images(image_url) VALUES (?)';
    $request = $connexion->prepare($query);
    $request->execute(array($image_url));
}



/**
 * add new meme
 * @param string meme_name, meme_link
 * @param integer user_id, image_id
 */
function add_meme($meme_name, $user_id, $image_id) {
    $connexion = database_connexion();
    $query = 'INSERT INTO memes(meme_name, id_user, id_image) VALUES (?, ?, ?)';
    $request = $connexion->prepare($query);
    $request->execute(array($meme_name, $user_id, $image_id));
}


/**
 * add meme tag
 * @param string tag_name
 */
function add_tag($tag_name) {
    $connexion = database_connexion();
    $query = 'INSERT INTO tags(tag_name) VALUES (?)';
    $request = $connexion->prepare($query);
    $request->execute(array($tag_name));
}



/**
 * create link between meme and tags
 * @param integer id_meme, id_tag
 */
function add_meme_tag($id_meme, $id_tag) {
    $connexion = database_connexion();
    $query = 'INSERT INTO tag(id_meme, id_tag) VALUES (?, ?)';
    $request = $connexion->prepare($query);
    $request->execute(array($id_meme, $id_tag));
}