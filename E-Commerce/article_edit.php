<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Change Profile</title>
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
    // Récupérer l'ID de l'article depuis l'URL
    $article_id = $_GET['id'];

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['submit'])) {
        // Récupérer les valeurs du formulaire
        $codearticle = $_POST['codearticle'];
        $nom_article = $_POST['nom_article'];

        // Préparation de la requête SQL de mise à jour avec des paramètres
        $edit_query = $pdo->prepare("UPDATE article SET codearticle=?, nom_article=? WHERE id=?");

        // Exécution de la requête de mise à jour avec les valeurs des champs du formulaire et l'ID de l'article
        if ($edit_query->execute([$codearticle, $nom_article, $article_id])) {
            echo "<div class='message'>
                    <p>Article Updated!</p>
                </div> <br>";
            echo "<div id='btngo'><a href='article.php'><button class='btn'>Go Home</button></a></div>";
        } else {
            echo "Error occurred while updating article.";
        }
    } else {
        // Préparation de la requête SQL de sélection de l'article à modifier
        $query = $pdo->prepare("SELECT * FROM article WHERE id=?");

        // Exécution de la requête avec l'ID de l'article comme paramètre
        $query->execute([$article_id]);

        // Récupération des données de l'article à modifier
        $result = $query->fetch(PDO::FETCH_ASSOC);

        // Vérification si l'article a été trouvé
        if ($result) {
            $res_codearticle = $result['codearticle'];
            $res_nom_article = $result['nom_article'];

            // Affichage du formulaire de modification avec les valeurs préréglées
            echo '
    <div class="container">
        <div class="box form-box">
                <header>Change article</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="codearticle">code article</label>
                        <input type="text" name="codearticle" id="codearticle" value="' . $res_codearticle . '" autocomplete="off" required>
                    </div>
    
                    <div class="field input">
                        <label for="nom_article">nom article</label>
                        <input type="text" name="nom_article" id="nom_article" value="' . $res_nom_article . '" autocomplete="off" required>
                    </div>
    
                   
                    
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Update" required>
                        <button type="button" onclick="cancelUpdate()" class="btn btn-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
            ';
            echo '<script>
    function cancelUpdate() {
        window.location.href = "article.php";
    }
</script>';
        } else {
            // Affichage d'un message si l'article n'a pas été trouvé
            echo "Article not found.";
        }
    }
} else {
    // Redirection vers la page d'accueil si l'ID de l'article n'est pas présent dans l'URL
    header("Location: article.php");
    exit();
}
?>

</body>
</html>
