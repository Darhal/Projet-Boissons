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
    <link rel="stylesheet" href="hierachy.css">

    <?php
        session_start();
        include('Backend/Donnees.inc.php');
        include("../database/database.php");

        $unwanted_array = array(
            'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
            'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
            'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
            'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y'
        );
    ?>
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
                    <!-- Most searched drink -->
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

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Home</a></li>
                                             <?php if(!isset($_SESSION["username"])) echo "   <li><a href=\"../User/Register/index.html\">Sign up</a></li> <li><a  href=\"../User/Login/index.html\">Login</a></li>";
else
 echo "<li><a href=\"logout.php\">Log out</a></li>"; ?>
                                        
                                      
                                            <li><a href="receipe-post.php">Receipes</a></li>
                                            <?php 
                                                if(isset($_SESSION["username"])){
                                                    echo " <li><a href='profile.php'>My Profile</a></li>";
                                                    echo "<li><a href='logout.php'>Log out</a></li>";
                                                }
                                            ?>
                                        </ul>
                                    </li>
                                 
                                   <?php if(!isset($_SESSION["username"])) echo "   <li><a href=\"../User/Register/index.html\">Sign up</a></li> <li><a  href=\"../User/Login/index.html\">Login</a></li>";
else
 echo "<li><a href=\"logout.php\">Log out</a></li>"; ?>
                                    <li><a href="receipe-post.php">Receipies</a></li>
                                    <li><a href="fav-receipes.php">My Favourite Receipes 
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

    <!-- ##### Breadcumb Area Start ##### -->
    <div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg8.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2>My Favourite Receipies</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Best Receipe Area Start ##### -->
    <!-- ##### Best Receipe Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Best Receipe Area -->
                <?php
                $rec_ids = array();
                
                if (isset($_SESSION["username"])) {
                    $res = $db->query("SELECT COUNT(recette_id) as count FROM FavouriteRecipes WHERE username = '".$_SESSION["username"]."';");
                    $row = $res->fetchArray();
                    $count = $row['count'];
                    if ($count != 0){
                        $res = $db->query("SELECT * FROM FavouriteRecipes WHERE username = '".$_SESSION["username"]."';");
                        while ($row = $res->fetchArray()){
                            array_push($rec_ids, $row["recette_id"]);
                        }
                    }else{
                        echo 
                        "<div class='col-12'>".
                            "<div class='section-heading'>".
                                "<h3>No Recepies Found.</h3>".
                            "</div>".
                        "</div>";
                    }
                } else if (isset($_COOKIE['fav_recp_len']) && $_COOKIE['fav_recp_len'] != 0) {
                    foreach($_COOKIE['fav_recp'] as $id){
                        array_push($rec_ids, $id);
                    }
                } else {
                    echo 
                    "<div class='col-12'>".
                        "<div class='section-heading'>".
                            "<h3>No Recepies Found.</h3>".
                        "</div>".
                    "</div>";
                }
                foreach ($rec_ids as $id) {
                    // Alcohol drinks
                    $rec = $Recettes[$id];
                    $img_name = str_replace(' ', '_', $rec["titre"]) . ".jpg";
                    $img_name = strtr($img_name, $unwanted_array);
                    $img_name = ucfirst(strtolower($img_name));
                    $img_path = "../Photos/$img_name";
                    if (file_exists($img_path)) {
                        echo
                            "<div class='col-12 col-sm-6 col-lg-4'>" .
                                "<div class='single-best-receipe-area mb-30'>" .
                                "<img src='$img_path' onerror='javascript:this.src='/img/bg-img/default.png''>" .
                                "<div class='receipe-content'>" .
                                "<a href='receipie.php?receipie=$id'>" .
                                "<h5>" . $rec['titre'] . "</h5>" .
                                "</a>" .
                                "<div class='ratings'>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "</div>" .
                                "</div>" .
                                "</div>" .
                                "</div>";
                    }
                
                    //None alcohol drinks
                    $rec2 = $Recettes[$id];
                    $img_name2= str_replace(' (','(', $rec2["titre"]);	
                    $img_name2= str_replace('(', '_', $img_name2);
                    $img_name2= str_replace(' ', '_', $img_name2);
                    $img_name2= str_replace('-','_',  $img_name2);	
                    $img_name2= str_replace(')', '', $img_name2).".jpg";
		            $img_name2 = strtr($img_name2, $unwanted_array);
                    $img_name2 = ucfirst(strtolower($img_name2));
		            $img_path2 = "img/bg-img/sansalcool/$img_name2";
		            if(file_exists($img_path2)) {       
                        echo
                            "<div class='col-12 col-sm-6 col-lg-4'>" .
                                "<div class='single-best-receipe-area mb-30'>" .
                                "<img src='$img_path2' onerror='javascript:this.src='img/bg-img/default.png''>" .
                                "<div class='receipe-content'>" .
                                "<a href='receipie.php?receipie=$id'>" .
                                "<h5>" . $rec2['titre'] . "</h5>" .
                                "</a>" .
                                "<div class='ratings'>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "</div>" .
                                "</div>" .
                                "</div>" .
                                "</div>";
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- ##### Best Receipe Area End ##### -->

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
</body>

</html>
