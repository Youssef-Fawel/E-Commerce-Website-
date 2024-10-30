<?php

// Paramètres de connexion à la base de données
$db_host = "localhost";
$db_name = "tutorial";
$db_user = "root";
$db_password = "root";

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

    // Définir le mode d'erreur de PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

?>
