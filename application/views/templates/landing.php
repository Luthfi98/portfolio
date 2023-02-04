<!DOCTYPE html>
    <html lang="en">
<head>
        <meta charset="utf-8" />
        <title><?= web()->name.' | '. $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= web()->seo_description ?>" />
        <meta name="keywords" content="<?= web()->seo_tag ?>" />
        <meta content="LUTHFI IHDALHUSNAYAIN" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="<?= base_url(web()->icon) ?>">
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
                        <li class="nav-item">
                            <a href="<?= $this->uri->segment(1) ? base_url('#home') : "#home" ?>" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item"> 
                            <a href="<?= $this->uri->segment(1) ? base_url('#skill') : "#skill" ?>" class="nav-link">Skill</a>
                        </li>
                        <li class="nav-item"> 
                            <a href="<?= $this->uri->segment(1) ? base_url('#experience') : "#experience" ?>" class="nav-link">Pengalaman</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= $this->uri->segment(1) ? base_url('#project') : "#project" ?>" class="nav-link">Project</a>
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
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <div class="copy-rights text-sm-center">
                            <p class="mb-0">© <?= date('Y').' '. web()->name ?></p>
                        </div>
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