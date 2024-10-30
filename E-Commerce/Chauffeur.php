<?php
session_start();
include("php/config.php");
if (!isset($_SESSION["valid"])) {
    header("location:index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Tables</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
<style>
    body {
        font-family: 'lato', sans-serif;
        background-image: repeating-linear-gradient(45deg, rgba(0,0,0,0.04),rgba(0,0,0,0.03),rgba(0,0,0,0.09),rgba(0,0,0,0.09),rgba(0,0,0,0.06),rgba(0,0,0,0.04),transparent,rgba(0,0,0,0.05),rgba(0,0,0,0.06),rgba(0,0,0,0.02),rgba(0,0,0,0.09),rgba(0,0,0,0.03),rgba(0,0,0,0.07) 4px),linear-gradient(0deg, rgb(84, 200, 236),rgb(60, 26, 102));
    }

    .container {
        max-width: 1000px;
        margin-top: 150px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 50px;
        padding-right: 10px;
    }

    h2 {
        font-size: 26px;
        margin: 20px 0;
        text-align: center;
    }

    small {
        font-size: 0.5em;
    }

    .responsive-table {
        list-style-type: none;
        padding: 0;
    }

    .table-header {
        background-color: #95A5A6;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.03em;
        display: flex;
        justify-content: space-between;
        padding: 15px 12px;
    }

    .table-row {
        background-color: #ffffff;
        box-shadow: 0px 0px 9px 0px rgba(0,0,0,0.1);
        display: flex;
        justify-content: space-between;
        margin-bottom: 25px;
    }

    .col {
        padding: 10px 0;
        text-align: center;
    }
    .Btn {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        width: 45px;
        height: 45px;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        position: relative;
        overflow: hidden;
        transition-duration: .3s;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
        background-color: rgb(163, 142, 255);
        left: -55px;
        top: 10px;
    }
    .sign {
        width: 100%;
        transition-duration: .3s;
        display: flex;
        align-items: center;
        justify-content: center;
    }

        .sign svg {
            width: 17px;
        }

            .sign svg path {
                fill: white;
            }
    /* text */
    .text {
        position: absolute;
        right: 0%;
        width: 0%;
        opacity: 0;
        color: white;
        font-size: 1.2em;
        font-weight: 600;
        transition-duration: .3s;
    }
    /* hover effect on button width */
    .Btn:hover {
        width: 125px;
        border-radius: 40px;
        transition-duration: .3s;
    }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }
        /* hover effect button's text */
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }
    /* button click effect*/
    .Btn:active {
        transform: translate(2px,2px);
    }


    /* Afficher l'en-tête du tableau sur les écrans de 767 pixels ou moins */
    @media all and (max-width: 767px) {
        .table-header {
            display: flex;
        }
    }
    .box select {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 100%; /* Utilisation de la largeur totale */
        cursor: pointer; /* Curseur indiquant qu'il s'agit d'un élément cliquable */
    }

        .box select:focus {
            outline: none; /* Suppression de l'outline lorsqu'il est en focus */
            border-color: #0563af; /* Changement de la couleur de la bordure lorsqu'il est en focus */
        }



        
</style>
     </head>
<body>
    <?php
    function getColor($etat)
    {
        switch ($etat) {
            case '0':
                return 'green';
            case '1':
                return 'red';
           
        }
    }
    ?>
    <?php

    // Vérifie si les données sont envoyées avec la clé 'nouvelEtat' et 'id'
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nouvelEtat']) && isset($_POST['id'])) {
        $nouvelEtat = $_POST['nouvelEtat'];
        $id = $_POST['id'];

        // Préparation de la requête de mise à jour de l'état du chauffeur
        $sql = "UPDATE chauffeur SET etat = :nouvelEtat WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Liaison des valeurs aux paramètres de la requête préparée
        $stmt->bindParam(':nouvelEtat', $nouvelEtat, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête de mise à jour
        $stmt->execute();
            
    }
    ?>

    
     <div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
               <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="article.php" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Gestion des articles</span>
                        </a>
                    </li>
              
                     <li>
                        <a href="véhicule.php" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Gestions des véhicules</span></a>
                    </li>
                    <li>
                        <a href="Chauffeur.php" class="nav-link px-0 align-middle d-inline-flex">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline" style="white-space: nowrap;">Gestions des Chauffeurs</span>
                        </a>
                    </li>
                     <li>
                        <a href="liste_des _commandes.php" class="nav-link px-0 align-middle d-inline-flex">
                            <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline" style="white-space: nowrap;">Liste des Commandes</span>
                        </a>
                    </li>

                 
                </ul>
            </div>
       </div>
       
    <div class="container">
                <ul class="responsive-table">
                    <li class="table-header">
                        <div class="col">Id</div>
                        <div class="col">Code_Chauffeur</div>
                        <div class="col">Nom</div>
                        <div class="col">Prénom</div>
                        <div class="col">État de Chauffeur</div>
                    </li>
                   <?php
                   $stmt = $pdo->query("SELECT * FROM chauffeur");
                   while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       ?>
                    <li class="table-row">
                        <div class="col" data-label="Id"><?php echo $row['id'] ?></div>
                        <div class="col" data-label="Code_Chauffeur"><?php echo $row['Code_Chauffeur'] ?></div>
                        <div class="col" data-label="Nom"><?php echo $row['Nom'] ?></div>
                        <div class="col" data-label="Prénom"><?php echo $row['Prenom'] ?></div>

                        <div class="col" data-label="État de Chauffeur">
                           <div class="box">
                         <form method="post" action="">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <select name="nouvelEtat"  style="color: <?php echo getColor($row['etat']); ?>; font-size: 16px; font-weight: bold;" onchange="this.form.submit()">
                            <option style="color: green;" value="0" <?php if ($row['etat'] == '0')
                                echo 'selected'; ?>>Disponible</option>
                            <option style="color: red;" value="1" <?php if ($row['etat'] == '1')
                                echo 'selected'; ?>>indisponible</option>
                           
                        </select>
                            </form>
                        </div>


                        </div>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
 <div>
   <button class="Btn" onclick="logout()">
  
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text">Logout</div>
</button>
    </div>
</div>
 </div>

     <script>

              function logout() {
        window.location.href = 'php/logout.php';
            }

</script>
</body>
</html>