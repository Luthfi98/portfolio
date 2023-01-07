
<!DOCTYPE html>
    <html lang="en">
<head>
        <meta charset="utf-8" />
        <title><?= web()->name.' | '. $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta content="Shreethemes" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- BOOTSTRAT -->
        <link href="<?= base_url('assets/landing/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />     
        <!--OWL SLIDER-->
        <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.theme.css"/> 
        <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/owl.transitions.css"/>
        <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/slick.css"/> 
        <link rel="stylesheet" href="<?= base_url('assets/landing/') ?>css/slick-theme.css"/> 
        <!-- ICONS -->
        <link href="<?= base_url('assets/landing/') ?>css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/landing/') ?>css/fontawesome.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/landing/') ?>css/pe-icon-7-stroke.css" rel="stylesheet" type="text/css" />
        <!-- MAGNIFIC POPUP -->
        <link href="<?= base_url('assets/landing/') ?>css/magnific-popup.css" rel="stylesheet" type="text/css" />    
        <!-- CSS -->
        <link href="<?= base_url('assets/landing/') ?>css/style.css" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="cube1"></div>
                    <div class="cube2"></div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Bar-->
        <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" style="background-color: #030d0f !important;">
            <div class="container">
                <!-- LOGO -->
                <a class="navbar-brand logo" href="<?= base_url() ?>">
                    PORTOFOLIO
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto navbar-center" id="mySidenav">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item"> 
                            <a href="#experience" class="nav-link">Experience</a>
                        </li>
                        <li class="nav-item">
                            <a href="#service" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#work" class="nav-link">Project</a>
                        </li>
                        <li class="nav-item">
                            <a href="#testimonial" class="nav-link">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a href="#blog" class="nav-link last-elements">blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link last-elements">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navigation Bar-->

       <?= $contents ?>

        <!-- FOOTER START -->
        <footer class="bg-dark footer-three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="copy-rights text-sm-left">
                            <p class="mb-0">© 2019 Quickgen. Design by Shreethemes.</p>
                        </div>
                    </div><!--end col-->

                    <div class="col-sm-6">
                        <ul class="list-unstyled text-sm-right footer-social-icon mt-30">
                            <li class="list-inline-item"><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="vimeo"><i class="fab fa-vimeo-v"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="dribbble"><i class="fab fa-dribbble"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer>
        <!-- FOOTER END -->

        <!-- Back to top -->    
        <a href="#" class="back-to-top" id="back-to-top"> 
            <i class="mdi mdi-chevron-up"> </i> 
        </a>
        <!-- Back to top -->         
        
        <!-- javascript -->
        <script src="<?= base_url('assets/landing/') ?>js/jquery.min.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/menu.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/scrollspy.min.js"></script>
        <!-- easing -->
        <script src="<?= base_url('assets/landing/') ?>js/jquery.easing.min.js"></script>
        <!-- Portfolio -->
        <script src="<?= base_url('assets/landing/') ?>js/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/isotope.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/portfolio-filter.js"></script>
        <!-- Carousel -->
        <script src="<?= base_url('assets/landing/') ?>js/owl.carousel.min.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/owlcarousel.init.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/slick.min.js"></script> 
        <script src="<?= base_url('assets/landing/') ?>js/slick.init.js"></script>
        <!-- TYPED -->
        <script src="<?= base_url('assets/landing/') ?>js/typed.js"></script>
        <script src="<?= base_url('assets/landing/') ?>js/typed.init.js"></script>
        <!-- Counter -->
        <script src="<?= base_url('assets/landing/') ?>js/counter.init.js"></script>
        <!-- CONTACT -->
        <script src="<?= base_url('assets/landing/') ?>js/contact.js"></script>
        <!-- Main Js -->
        <script src="<?= base_url('assets/landing/') ?>js/app.js"></script>
        
    </body>

</html>