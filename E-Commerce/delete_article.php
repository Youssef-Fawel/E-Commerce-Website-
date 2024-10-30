<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Ajouter article</title>
    <style>
        #btngo {
            display: flex;
            justify-content: center;
        }
        body {
            background-image: linear-gradient(67.5deg, rgb(6, 6, 6) 0%, rgb(6, 6, 6) 6%,rgb(29, 29, 29) 6%, rgb(29, 29, 29) 57%,rgb(52, 52, 52) 57%, rgb(52, 52, 52) 58%,rgb(75, 75, 75) 58%, rgb(75, 75, 75) 79%,rgb(97, 97, 97) 79%, rgb(97, 97, 97) 93%,rgb(120, 120, 120) 93%, rgb(120, 120, 120) 95%,rgb(143, 143, 143) 95%, rgb(143, 143, 143) 100%),linear-gradient(90deg, rgb(6, 6, 6) 0%, rgb(6, 6, 6) 6%,rgb(29, 29, 29) 6%, rgb(29, 29, 29) 57%,rgb(52, 52, 52) 57%, rgb(52, 52, 52) 58%,rgb(75, 75, 75) 58%, rgb(75, 75, 75) 79%,rgb(97, 97, 97) 79%, rgb(97, 97, 97) 93%,rgb(120, 120, 120) 93%, rgb(120, 120, 120) 95%,rgb(143, 143, 143) 95%, rgb(143, 143, 143) 100%),linear-gradient(135deg, rgb(6, 6, 6) 0%, rgb(6, 6, 6) 6%,rgb(29, 29, 29) 6%, rgb(29, 29, 29) 57%,rgb(52, 52, 52) 57%, rgb(52, 52, 52) 58%,rgb(75, 75, 75) 58%, rgb(75, 75, 75) 79%,rgb(97, 97, 97) 79%, rgb(97, 97, 97) 93%,rgb(120, 120, 120) 93%, rgb(120, 120, 120) 95%,rgb(143, 143, 143) 95%, rgb(143, 143, 143) 100%),linear-gradient(0deg, rgb(6, 6, 6) 0%, rgb(6, 6, 6) 6%,rgb(29, 29, 29) 6%, rgb(29, 29, 29) 57%,rgb(52, 52, 52) 57%, rgb(52, 52, 52) 58%,rgb(75, 75, 75) 58%, rgb(75, 75, 75) 79%,rgb(97, 97, 97) 79%, rgb(97, 97, 97) 93%,rgb(120, 120, 120) 93%, rgb(120, 120, 120) 95%,rgb(143, 143, 143) 95%, rgb(143, 143, 143) 100%),linear-gradient(90deg, rgb(8, 8, 8),rgb(221, 221, 221));
            background-blend-mode: overlay,overlay,overlay,overlay,normal;
        }
    </style>
</head>
<body>
 <?php
 session_start();
 include("php/config.php");
 if (!isset($_SESSION["valid"])) {
     header("location:index.php");
 }

 if (isset($_GET['id'])) {
     $id = $_GET['id'];

     // Préparation de la requête SQL de suppression avec un paramètre
     $delete_query = $pdo->prepare("DELETE FROM article WHERE id=?");

     // Exécution de la requête de suppression avec l'ID de l'article comme paramètre
     if ($delete_query->execute([$id])) {
         echo "<div class='message'>
                    <p>Article supprimer!</p>
                </div> <br>";
         echo "<div id='btngo'><a href='article.php'><button class='btn'>Go Home</button></a></div>";
     } else {
         echo "Error occurred while inserting article.";
     }
 }
 ?> 
 </body>
</html>
