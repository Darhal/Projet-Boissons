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
        <img src="../icons/cocktail2.pngg" alt="">
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

                            <!-- Barre de lien -->
                            <div class="classynav">
                                <ul>
                                    <li class="active"><a href="index.php">Home</a></li>
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
</br>
    </header>
    <!-- ##### Header Area End ##### -->
</br>
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>My Profile Settings</h3>
                    </div>
                </div>
            </div>
            <div class="receipe-post-area section-padding-80">
            <!-- Profil area -->
            <div class="receipe-post-search mb-80">
                <div class="container" >
                    <form action="Backend/InfoChange.php" id="catselect" name="catselect" method="POST" style="transform: translate(40%, -20%);">
                        <?php
				//If user wanna edit his profil
                            $res = $db->query("SELECT * FROM users WHERE username = '".$_SESSION['username']."';");
                            $row = $res->fetchArray();
                        ?>
                        <div class="col-12 col-lg-3">
                            <a> Username: (Cannot be changed) </a><input type="input" id="username" value=<?php echo $row["username"]; ?> readonly>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a>Password: </a><input type="password" id="password" placeholder="Password">
                        </div>
                        <div class="col-12 col-lg-3">
                            <a> E-Mail: </a><input type="input" id="email" value=<?php echo $row["email"]; ?>>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a>Name: </a><input type="input" id="name" value=<?php echo $row["name"]; ?>>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a>Last Name: </a><input type="input" id="last_name" value=<?php echo $row["last_name"]; ?>>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a>Adress: </a><input type="input" id="adress" value=<?php echo $row["adress"]; ?>>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a>Phone: </a><input class="form-control" type="text" pattern="[0-9]{2}[0-9]{8}" id="phone" value=<?php echo $row["phone_number"]; ?>>
                        </div>
                        <div class="col-12 col-lg-3">
                            <a>Birthdate: </a><input type="date" id="birthdate" value=<?php echo $row["birthdate"]; ?>>
                        </div>
                        <div class="col-12 col-lg-3 text-right" style="transform: translate(0%, 30%);">
                            <a id="feedback" style="color: green;"></a>
                        </div>
                        <div class="col-12 col-lg-3 text-right" style="transform: translate(0%, 30%);">
                            <button onclick="OnSaveInfo();" type="button" class="btn delicious-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area" style="transform: translate(0%, -200%);">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="js/profile/profile.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'></script>
</body>

</html>
