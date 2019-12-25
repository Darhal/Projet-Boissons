<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Cocktail Lovers | Home</title>

    <!-- Favicon -->
    <!--link rel="icon" href="img/core-img/favicon.ico"-->
    <link rel="icon" type="image/png" href="../icons/cocktail2.png" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <?php 
        session_start();
        include("../database/database.php");
        include('Backend/Donnees.inc.php');
	//Caractére special
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



       <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-between">
                    <!-- Most searched drinks -->
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

                            <!-- Barre de lien  -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="receipe-post.php">Recipes</a></li>
                                            <?php 
                                                if(isset($_SESSION["username"])){
                                                    echo " <li><a href='profile.php'>My Profile</a></li>";
                                                }
                                                if(!isset($_SESSION["username"])) 
                                                    echo "<li><a href=\"../User/Register/index.html\">Sign up</a></li> <li><a  href=\"../User/Login/index.html\">Login</a></li>";
                                                else
                                                    echo "<li><a href=\"logout.php\">Log Out</a></li>"; 
                                            ?>
                                        </ul>
                                    </li>
                                   <?php if(!isset($_SESSION["username"])) echo "   <li><a href=\"../User/Register/index.html\">Sign up</a></li> <li><a  href=\"../User/Login/index.html\">Login</a></li>";
else
 echo "<li><a href=\"logout.php\">Log out</a></li>"; ?>
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

    <!-- ##### Cocktail Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Blood mary Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Delicios Bloody Mary</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">A Bloody Mary is a cocktail containing vodka, tomato juice, and other spices and flavorings including Worcestershire sauce, hot sauces, garlic, herbs, horseradish, celery, olives, salt, black pepper, lemon juice, lime juice and/or celery salt. In the United States, it is usually consumed in the morning or early afternoon, and is popular as a hangover cure.</p>
                                <a href="receipe-post.php" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Recipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Caipirinha coktail Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg6.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">A Tasty Caipirinha</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">Caipirinha is Brazil's national cocktail, made with cachaça, sugar, and lime. Cachaça, also known as caninha, or any of a multitude of traditional names, is Brazil's most common distilled alcoholic beverage.</p>
                                <a href="receipe-post.php" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Receipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tequila sunrise coktail  Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg7.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Tequila Sunrise From USA</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">The Tequila Sunrise is a cocktail made of tequila, orange juice, and grenadine syrup, and served unmixed in a tall glass. The modern drink originates from Sausalito, California in the early 1970s after an earlier one created in the 1930s in Phoenix, Arizona.</p>
                                <a href="receipe-post.php" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Receipe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Cocktail Area End ##### -->

    <!-- ##### Some cocktail Area Start ##### -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Top Catagory Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg-img/bg2.jpg" alt="">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3>Coconut Kiss Mocktail</h3>
                            <h6>Simple &amp; Delicios</h6>
                            <a href="receipie.php?receipie=73" class="btn delicious-btn">See Full Recipe</a>
                        </div>
                    </div>
                </div>
                <!-- Juice Catagory Area -->
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="img/bg-img/bg3.jpg" alt="">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3>Fruit Juice</h3>
                            <h6>Simple &amp; Delecious</h6>
                            <a href="receipe-post.php" class="btn delicious-btn">Search recipe</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Juice Catagory Area End ##### -->

    <!-- ##### Cocktail Recipe Area Start ##### -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The Best Recipes</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Cocktail Best Recipe Area -->
                <?php
                foreach ($Recettes as $i => $rec) {
                    $img_name = str_replace(' ', '_', $rec["titre"]) . ".jpg";
                    $img_name = strtr($img_name, $unwanted_array);
                    $img_name = ucfirst(strtolower($img_name));
                    $img_path = "../Photos/$img_name";
                    if (file_exists($img_path)) {
                        echo
                            "<div class='col-12 col-sm-6 col-lg-4'>" .
                                "<div class='single-best-receipe-area mb-30'>" .
                                "<img src='$img_path' alt=''>" .
                                "<div class='receipe-content'>" .
                                "<a href='receipie.php?receipie=$i'>" .
                                "<h5>" . $rec['titre'] . "</h5>" .
                                "</a>" .
                                "<div class='ratings'>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star-o' aria-hidden='true'></i>" .
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
    <!-- ##### Cocktail Recipe Area End ##### -->

    <!-- ##### non alcohol Area Start ##### -->
    <section class="cta-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg4f.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <!-- Cta Content -->
                    <div class="cta-content text-center">
                        <h2>Alcohol Free Drinks</h2>
                        <p>We also have delecious juice, cocktails and drinks without Alcohol. Using healthy and frehs fruits and vegtables to make the best drinks</p>
                        <a href="receipe-post.php" class="btn delicious-btn">Discover all the recipes</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### none alcohol Area End ##### -->
<!-- ##### Juice Recipe Area Start ##### -->
    <section class="small-receipe-area section-padding-80-0">
        <div class="container">
            <div class="row">

                   </div>
                </div>
            </div>
            <div class="row">
                <!-- Cocktails recipes Area -->
                <?php
                foreach ($Recettes as $i => $rec) {  
//Nom de cocktaill  	
$img_name2= str_replace(' (','(', $rec["titre"]);	
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
                                "<img src='$img_path2' alt=''>" .
                                "<div class='receipe-content'>" .
                                "<a href='receipie.php?receipie=$i'>" .
                                "<h5>" . $rec['titre'] . "</h5>" .
                                "</a>" .
                                "<div class='ratings'>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star' aria-hidden='true'></i>" .
                                "<i class='fa fa-star-o' aria-hidden='true'></i>" .
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
    <!--Coktails recepis area end  -->


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
</body>

</html>
