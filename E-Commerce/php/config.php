<?php

// Param�tres de connexion � la base de donn�es
$db_host = "localhost";
$db_name = "tutorial";
$db_user = "root";
$db_password = "root";

try {
    // Connexion � la base de donn�es avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

    // D�finir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    die("Erreur de connexion � la base de donn�es: " . $e->getMessage());
}

?>
