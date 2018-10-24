<?php

/**
 * database connexion
 * @return PDO connexion
 */
function database_connexion() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=meme_creator;charset=utf8','root','');
        return $connexion;
    }
    catch(Exception $ex) {
        die('Error : database connexion failed => ' . $ex->getMessage());
    }
}