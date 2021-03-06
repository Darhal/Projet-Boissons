<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Cocktail Lovers | Receipes</title>

    <!-- Favicon -->
    <!--link rel="icon" href="img/core-img/favicon.ico"-->
    <link rel="icon" type="image/png" href="../icons/cocktail2.png" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="hierachy.css">

    <?php
    session_start();
    include("Backend/install.php");
    include("../database/database.php");
    ?>
    <script>
        Recettes = <?php echo json_encode($Recettes); ?>;
        AlimentToRecette = <?php echo json_encode($AlimentToRecette); ?>;
        HirTree = <?php echo json_encode($HirTree); ?>;

        NomRecettes = [];
        Recettes.forEach(function(element){
            NomRecettes.push(element["titre"]);
        });
    </script>
<style>
h2{ 
  padding-left: 3.20em;
}
#hierarchy{
padding-left: 3.20em;
}
</style>
</head>

<body>
   <!-- Preloader -->
    <div id="preloader">
        <i class="circle-preloader"></i>
        <img src="../icons/cocktail2.png" alt="">
    </div>


     <!-- Search Wrapper -->
    <div class="search-wrapper">
        <!-- Close Btn -->
        <div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" method="post">
                        <input type="search" name="search" placeholder="Type any keywords...">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <!-- Most searched drinks  -->
                    <div class="col-12 col-sm-6">
                        <div class="breaking-news">
                            <div id="breakingNewsTicker" class="ticker">
                                <ul>
                                    <li><a href="#">Cocktail</a></li>
                                    <li><a href="#">Wine.</a></li>
                                    <li><a href="#">Juice!</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <!-- Top Social Info -->
                    <div class="user-profile"></div>
                    <?php
                    if (isset($_SESSION["username"])) {
                        echo 
                        "<a href='profile.php'>".
                            "<img src='img/core-img/user.png' alt='My Profile'>".
                            "\tHello, " . $_SESSION['username'] . 
                        "</a>";
                    } else {
                        echo "<a>Welcome to the website</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        </div>


        <!-- Navbar Area -->
        <div class="delicious-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="deliciousNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php"><img src="img/core-img/main-logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Barre de lien -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                             <li><a href="index.php">Home</a></li>
                                            <li><a href="receipe-post.php">Recipes</a></li>
                                            <li><a href="profile.php">My Profile</a></li>
                                            <?php 
                                                if(!isset($_SESSION["username"])) 
                                                    echo "<li><a href=\"../User/Register/index.html\">Sign up</a></li> <li><a  href=\"../User/Login/index.html\">Login</a></li>";
                                                else
                                                    echo "<li><a href=\"logout.php\">Log out</a></li>"; 
                                            ?>
                                        </ul>
                                    </li>
                                   <?php 
                                    if(!isset($_SESSION["username"])) 
                                        echo "   <li><a href=\"../User/Register/index.html\">Sign up</a></li> <li><a  href=\"../User/Login/index.html\">Login</a></li>";
                                    else
                                        echo "<li><a href=\"logout.php\">Log out</a></li>"; 
                                    ?>
                                    <li><a href="receipe-post.php">Recipes</a></li>
                                    <li><a href="fav-receipes.php">My Favourite Recipes 
                                        <?php 
                                            $count = 0;
                                            if (isset($_SESSION["username"])) {
                                                $res = $db->query("SELECT COUNT(recette_id) as count FROM FavouriteRecipes WHERE username = '".$_SESSION["username"]."';");
                                                $row = $res->fetchArray();
                                                $count = $row['count'];
                                            }else if (isset($_COOKIE['fav_recp_len'])){
                                                $count = $_COOKIE['fav_recp_len'];
                                            }

                                            echo "(".$count.")";
                                        ?>
                                    </a></li>
                                </ul>

                              

                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Recipe Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>Recipe</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Recipe Area End ##### -->
    <div class="receipe-post-area section-padding-80">
        <!-- Receipe Post Search -->
        <div class="receipe-post-search mb-80">
            <div class="container" s>
                <form id="catselect" action="Backend/Recepies.php">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class = "autocomplete">
                                <input type="search" id="search" placeholder="Search Recipes"  />
                            </div>
                        </div>
                        <div class="col-12 col-lg-3 text-right">
                            <button type="submit" class="btn delicious-btn">Search</button>
                        </div>
                    </div>
            </div>
            </form>
</br>
<?php 
//If we want to search by aliments
?>
   <h2> Search by aliments: (Click on the folder below to expand the hierarchy)</h2>
    <div id="hierarchy">
        <?php
        function PrintCat($cat, $HirTree)
        {
            if (array_key_exists($cat, $HirTree["Category"])) {

                foreach ($HirTree["Category"][$cat] as $e1) {
                    echo "<div class='foldercontainer'>";
                    echo "<span class='folder fa-folder-o' data-data='$e1' data-isexpanded='true'>$e1</span>";

                    if (array_key_exists($e1, $HirTree["SousCat"])) {
                        foreach ($HirTree["SousCat"][$e1] as $e3) {
                            echo "<span class='file fa-file-excel-o' data-data='$e3'>$e3</span>";
                        }
                    }

                    PrintCat($e1, $HirTree);
                    echo "</div>";
                }
            }
        }

        foreach ($HirTree["SuperCat"] as $e) {
            echo "<div class='foldercontainer'>";
            echo "<span class='folder fa-folder-o' data-isexpanded='true' data-data='$e'>$e</span>";
            PrintCat($e, $HirTree);
            echo "</div>";
        }
        ?>
    </div>

 </div>
 </div>
    

    <!-- ##### Search Recipe Area Start ##### -->
    <section class="best-receipe-area" id="best-receipe-area" style="display: none;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The Selected Recepies :</h3>
                    </div>
                </div>
            </div>
            <div class="row" id="recepies-post">
            </div>
        </div>
    </section>
    <!-- ##### Search Recipe Area End ##### -->


    <!-- ##### Follow Us Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5>The Gallary</h5>
                </div>
            </div>
        </div>
        <!-- Instagram Feeds -->
        <div class="insta-feeds d-flex flex-wrap">
            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/bg2.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/sansalcool/Pink_3x6_boisson_sans_alcool.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/sansalcool/Boisson_aux_agrumes_sans_alcool.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/sansalcool/Boisson_sans_alcool_kidicana.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/sansalcool/Boisson_citron_menthe_sans_alcool.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/bg7.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/insta5.jpg" alt="">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Follow Us Instagram Area End ##### -->


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100 d-flex flex-wrap align-items-center justify-content-between">
                    <!-- Footer Social Info -->
                    <div class="footer-social-info text-right">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div>
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="index.html"><img src="img/core-img/main-logo.png" alt=""></a>
                    </div>
                    <!-- Copywrite -->
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved </a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/recepies/Recepies.js"></script>
    <script src="js/search/search.js"></script>
</body>

</html>
