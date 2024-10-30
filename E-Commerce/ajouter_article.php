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

    </style>
</head>
<body>
<?php
session_start();
include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $codearticle = $_POST['codearticle'];
    $nom_article = $_POST['nom_article'];

    // Préparation de la requête SQL avec des paramètres pour éviter les injections SQL
    $query = $pdo->prepare("INSERT INTO article (codearticle, nom_article) VALUES (?, ?)");

    // Exécution de la requête avec les valeurs des champs du formulaire
    if ($query->execute([$codearticle, $nom_article])) {
        echo "<div class='message'>
                    <p>Article ajouté!</p>
                </div> <br>";
        echo "<div id='btngo'><a href='article.php'><button class='btn'>Go Home</button></a></div>";
    } else {
        echo "Error occurred while inserting article.";
    }
}
?>
    <div class="container">
        <div class="box form-box">
                <header>ajouter article</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="codearticle">code article</label>
                        <input type="text" name="codearticle" id="codearticle" autocomplete="off" required>
                    </div>
    
                    <div class="field input">
                        <label for="nom_article">nom article</label>
                        <input type="text" name="nom_article" id="nom_article"  autocomplete="off" required>
                    </div>
    
                    
                    
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="ajouter" required>
                        <button type="button" onclick="cancelAjouter()" class="btn btn-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
<?php
echo '<script>
function cancelAjouter() {
    window.location.href = "article.php";
}
</script>';
?>
</body>
</html>
