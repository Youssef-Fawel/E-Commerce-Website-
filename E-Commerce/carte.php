<?php
session_start();
include("php/config.php");
if (!isset($_SESSION["valid"])) {
    header("location:index_shop.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Grassa Collection Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body class="goto-here">
			
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="index_shop.php" class="nav-link">Home</a></li>

                <li class="nav-item"><a href="index_shop.php#company-services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="index_shop.php#mobile-products" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="index_shop.php#smart-watches" class="nav-link">Watches</a></li>

                 <?php
                if (isset($_SESSION["valid"])) {
                    echo '<li  class="nav-item"">
                            <a href="php/logout.php">
                                <img src="images/logout.png" alt="Logout" id="logout-icon" style="width: 17px; height: 15px;position: relative; bottom: -7px; right:-50px; ">
                            </a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Wishlist</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
    <thead class="thead-primary">
        <tr class="text-center">
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
     <tbody>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM panier WHERE email = ?");
        $stmt->execute([$_SESSION['valid']]);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
        <tr class="text-center">
            <td class="product-name">
                <h3><?php echo $row['nom_produit']; ?></h3>
            </td>
            <td class="price">$<?php echo $row['prix']; ?></td>
            <td class="quantity">
                <?php echo $row['quantite']; ?>
            </td>
            <td class="total">$<?php echo $row['total']; ?></td>
        </tr><!-- END TR-->
        <?php
        }
        ?>
    </tbody>
</table>

					  </div>
    			</div>
    		</div>
    	<div class="row justify-content-start">
    <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
            <?php
            $stmt = $pdo->prepare("SELECT SUM(total) AS total_items FROM panier WHERE email = ?");
            $stmt->execute([$_SESSION['valid']]);
            $total_items_row = $stmt->fetch(PDO::FETCH_ASSOC);
            $total_items = $total_items_row['total_items'];
            ?>
            <h3>Cart Totals</h3>
            <p class="d-flex">
                <span>Subtotal</span>
                <span><?php echo $total_items; ?></span>
            </p>
            <p class="d-flex">
                <span>Delivery</span>
                <span>$0.00</span>
            </p>
            <p class="d-flex">
                <span>Discount</span>
                <span>
                    <?php
                    if ($total_items > 2000) {
                        echo "$100";
                    } else {
                        echo "$0.00";
                    }
                    ?>
                </span>
            </p>
            <hr>
            <p class="d-flex total-price">
                <span>Total</span>
                <span>
                    <?php
                    if ($total_items > 2000) {
                        echo $total_items - 100;
                    } else {
                        echo $total_items;
                    }
                    ?>
                </span>
            </p>
        </div>
        <p class="text-center">
    <button class="btn btn-primary py-3 px-4" onclick="afficher()">Paid</button>
        </p>
    </div>
</div>
                
			</div>
		</section>
		<script>
            function afficher() {
                alert("Your payment has been successfully processed. Thank you for shopping with us!")
               
               window.location.href = "php/logout.php";
            }
        </script>

    <footer class="ftco-footer ftco-section">
      <div class="container">
     
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy; All rights reserved | This template is made with love by Sofien Grassa
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

 
  </body>
</html>