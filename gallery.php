<?php
include('php/koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>World - Blog &amp; Magazine Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="gallery/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="gallery/jquery.fancybox.min.css">
    <style>
        .thumbnailz{
            width:300px;
            height:350px;
            cursor: pointer;
            float:left;
            padding:4px;
            margin-left:20px;
            margin-bottom:20px;
            box-shadow: 0 2px 2px rgba(0,0,0,0.5);
           
        }
        .asli{
            width:97%;
            /* height: auto; */
            height:300px;
            filter : grayscale(100);
            transition:0.3s;
        }
        .asli:hover{
            filter : grayscale(0)
        }
    </style>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preload-content">
            <div id="world-load"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <!-- Logo -->
                        <a class="navbar-brand" href="index.html"><img src="img/core-img/logoHK.png" alt="Logo"></a>
                        <!-- Navbar Toggler -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Navbar -->
                        <div class="collapse navbar-collapse" id="worldNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item ">
                                    <a class="nav-link" href="index.php#homePage">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#categoryPage">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#articlePage">Article</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php#disclaimerPage">Disclaimer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="regular-page.html">Expertise and service</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                                <li class="nav-item  active">
                                    <a class="nav-link" href="gallery.php">Gallery</a>
                                </li>
                            </ul>
                            <!-- Search Form  -->
                            <div id="search-wrapper">
                                <form action="#">
                                    <input type="text" id="search" placeholder="Search something...">
                                    <div id="close-icon"></div>
                                    <input class="d-none" type="submit" value="">
                                </form>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ********** Hero Area Start ********** -->
    <div class="hero-area height-400 bg-img background-overlay" style="background-image: url(img/blog-img/bg2.jpg);">
        <div class="col-12 col-md-10 col-lg-8">
            <p style="position: absolute; top: 300px;left: 40px;background-color: black;color: #fff;opacity: 0.7;padding: 10px;">hallo</p>
        </div>
   
    </div>
    <!-- ********** Hero Area End ********** -->

    <div class="regular-page-wrap section-padding-100">
        <div class="container">
            <h1>Gallery</h1>
            <p>click for details</p>
        </div>
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8" >
                    <?php
                        // $dir = glob('gallery/{*.jpg, *.png}', GLOB_BRACE);
                        $tes = mysqli_query($conn, "SELECT * FROM gallery");
                        
                        
                        while ( $row = mysqli_fetch_assoc($tes)): ?>

                        <div class="thumbnailz">
                            <a href="<?= $row["nama"]; ?>" data-fancybox data-caption="<?= $row["caption"]; ?>">
                                <div style="width:300px;height:300px;overvlow:hidden;">
                                    <img src="<?= $row["nama"]; ?>" alt="<?= $row["nama"]; ?>" class="asli">
                                    <p><?= substr($row["caption"],0, 80)?> ...</p>
                                </div>
                            </a>
                        </div>

                        <?php endwhile;?>
                        
                    

                </div>
            </div>
        
    </div>

    <!-- ***** Footer Area Start ***** -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                        <div class="copywrite-text mt-30">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <ul class="footer-menu d-flex justify-content-between">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Video</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="footer-single-widget">
                        <h5>Subscribe</h5>
                        <form action="#" method="post">
                            <input type="email" name="email" id="email" placeholder="Enter your mail">
                            <button type="button"><i class="fa fa-arrow-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer Area End ***** -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>