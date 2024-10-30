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
        margin-top:150px;
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
           left:-55px;
           top:10px;
        
       }

       /* plus sign */
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
       .edit-button {
           width: 40px;
           height: 40px;
           border-radius: 50%;
           background-color: rgb(20, 20, 20);
           border: none;
           font-weight: 600;
           display: flex;
           align-items: center;
           justify-content: center;
           box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
           cursor: pointer;
           transition-duration: 0.3s;
           overflow: hidden;
           position: relative;
           text-decoration: none !important;
           right:-60px;
       }

       .edit-svgIcon {
           width: 17px;
           transition-duration: 0.3s;
       }

           .edit-svgIcon path {
               fill: white;
           }

       .edit-button:hover {
           width: 120px;
           border-radius: 50px;
           transition-duration: 0.3s;
           background-color: rgb(255, 69, 69);
           align-items: center;
       }

           .edit-button:hover .edit-svgIcon {
               width: 20px;
               transition-duration: 0.3s;
               transform: translateY(60%);
               -webkit-transform: rotate(360deg);
               -moz-transform: rotate(360deg);
               -o-transform: rotate(360deg);
               -ms-transform: rotate(360deg);
               transform: rotate(360deg);
           }

       .edit-button::before {
           display: none;
           content: "Edit";
           color: white;
           transition-duration: 0.3s;
           font-size: 2px;
       }

       .edit-button:hover::before {
           display: block;
           padding-right: 10px;
           font-size: 13px;
           opacity: 1;
           transform: translateY(0px);
           transition-duration: 0.3s;
       }
       .delete-button {
           width: 40px;
           height: 40px;
           border-radius: 50%;
           background-color: rgb(20, 20, 20);
           border: none;
           font-weight: 600;
           display: flex;
           align-items: center;
           justify-content: center;
           box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.164);
           cursor: pointer;
           transition-duration: 0.3s;
           overflow: hidden;
           position: relative;
           right: -60px;
       }

       .delete-svgIcon {
           width: 15px;
           transition-duration: 0.3s;
       }

           .delete-svgIcon path {
               fill: white;
           }

       .delete-button:hover {
           width: 90px;
           border-radius: 50px;
           transition-duration: 0.3s;
           background-color: rgb(255, 69, 69);
           align-items: center;
       }

           .delete-button:hover .delete-svgIcon {
               width: 20px;
               transition-duration: 0.3s;
               transform: translateY(60%);
               -webkit-transform: rotate(360deg);
               -moz-transform: rotate(360deg);
               -o-transform: rotate(360deg);
               -ms-transform: rotate(360deg);
               transform: rotate(360deg);
           }

       .delete-button::before {
           display: none;
           content: "Delete";
           color: white;
           transition-duration: 0.3s;
           font-size: 2px;
       }

       .delete-button:hover::before {
           display: block;
           padding-right: 10px;
           font-size: 13px;
           opacity: 1;
           transform: translateY(0px);
           transition-duration: 0.3s;
       }
       .action-buttons {
           display: flex;
       }

       .edit-button,
       .delete-button {
           margin-right: 10px; /* Espacement entre les boutons */
       }
       .button {
           position: relative;
           width: 150px;
           height: 40px;
           cursor: pointer;
           display: flex;
           align-items: center;
           border: 1px solid #34974d;
           background-color: #3aa856;
           right:1500px;
           top:110px;
       }

       .button, .button__icon, .button__text {
           transition: all 0.3s;
       }

           .button .button__text {
               transform: translateX(-5px);
               color: #fff;
               font-weight: 600;
           }

           .button .button__icon {
               position: absolute;
               transform: translateX(109px);
               height: 100%;
               width: 39px;
               background-color: #34974d;
               display: flex;
               align-items: center;
               justify-content: center;
           }

           .button .svg {
               width: 30px;
               stroke: #fff;
           }

           .button:hover {
               background: #34974d;
           }

               .button:hover .button__text {
                   color: transparent;
               }

               .button:hover .button__icon {
                   width: 148px;
                   transform: translateX(0);
               }

           .button:active .button__icon {
               background-color: #2e8644;
           }

           .button:active {
               border: 1px solid #2e8644;
           }
</style>

</head>

 

<body>

    
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
            <div class="col">Code Article</div>
            <div class="col">Nom d'article</div>
            <div class="col">Actions</div>
        </li>
        <?php
        $stmt = $pdo->query("SELECT * FROM article");
        while ($row = $stmt->fetch()) {
            ?>
        <li class="table-row">
            <div class="col" data-label="Job Id"><?php echo $row['id'] ?></div>
            <div class="col" data-label="Customer Name"><?php echo $row['codearticle'] ?></div>
            <div class="col" data-label="Amount"><?php echo $row['nom_article'] ?></div>
             <div class="col" data-label="Payment Status">
                 <div class="action-buttons">
                 <button class="edit-button" onclick="handleEditButtonClick(<?php echo $row['id']; ?>)">
                  <svg class="edit-svgIcon" viewBox="0 0 512 512">
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
                  </svg>
              </button>
                 <button class="delete-button" onclick="deleteArticle(<?php echo $row['id']; ?>)">
                 <svg class="delete-svgIcon" viewBox="0 0 448 512">
                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
                  </svg>
                 </button>
                 </div>
              
            </div>
        </li>
        <?php
         }
         ?>
       
    </ul>
</div>
        <script>
    // Fonction pour gérer le clic sur un bouton d'édition
    function handleEditButtonClick(id) {
        // Redirection vers la page d'édition avec l'ID de l'article
        window.location.href = 'article_edit.php?id=' + id;
            }
             function ajouter_article() {
        // Redirection vers la page d'édition avec l'ID de l'article
        window.location.href = 'ajouter_article.php';
            }
             function deleteArticle(id) {
        if (confirm('Are you sure you want to delete this article?')) {
            window.location.href = 'delete_article.php?id=' + id; // Redirect to delete script with article ID
                 }
                
            }
              function logout() {
        window.location.href = 'php/logout.php';
            }

</script>


   <div>
   <button class="Btn" onclick="logout()">
  
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text">Logout</div>
</button>
    </div>

<div>
    
<button type="button" class="button" onclick="ajouter_article()">
  <span class="button__text">Ajouter article</span>
  <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button>
</div>


</div>
 </div>

</body>
</html>
