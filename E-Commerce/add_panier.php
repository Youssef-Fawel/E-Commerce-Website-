<?php
session_start();
include("php/config.php");

// Traitement des données du formulaire
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$email = $_SESSION['valid'];
$total = $price * $quantity;

// Vérifier si la quantité est supérieure à zéro avant d'effectuer l'insertion
if ($quantity > 0) {
        // Code d'insertion SQL
        $query = $pdo->prepare("INSERT INTO panier (nom_produit, prix, quantite, email, total) VALUES (?, ?, ?, ?, ?)");
        if ($query->execute([$product_name, $price, $quantity, $email, $total])) {
            // Message de succès
            echo 'produit ajouter vous pouvez consulter votre panier';
        } 
   
} else {
    // Afficher un message d'erreur si la quantité est invalide
    echo 'La quantité doit être supérieure à zéro.';
}
?>
