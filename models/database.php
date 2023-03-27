<?php
/**
 * Connexion pdo to db
 */
function pdo()
{
// 1 - Création des variables de connexion
    $server = 'localhost';
    $dbname = 'toto_garage';
    $login = 'root';
    $password = 'root';

// 2 - Connexion à la base
    try {
        $pdo = new PDO("mysql:host=$server;dbname=$dbname", $login, $password, [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            // recupere datas sous forme de tableau associatif
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // voir les erreurs
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        ]);
        return $pdo;
        // echo 'Toto a reussi à se connecter';
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

}