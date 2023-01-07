<!-- HOME START-->
<section class="bg-home" style="background-image:url(<?= base_url('assets/landing/images/home/bg-personal.jpg')?>)" id="home">
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row pt-70">
                    <div class="col-lg-8">
                        <div class="title-heading">
                            <h1 class="text-white"><?= web()->name ?></h1>
                            <h2 class="text-white mb-4">Halo, Saya adalah seorang<span class="element text-custom" data-elements=" <?= web()->seo_tag ?>"></span></h2>                                    
                            <p class="text-light mx-auto"><?= web()->seo_description ?></p>
                            <div class="mt-3">
                                <a href="#" class="btn btn-custom-white mr-3">View Portfolio</a>
                                <a href="#" class="btn btn-custom">Hire me</a>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </div>
    </div>
</section>
<!-- HOME END-->  

<!-- ABOUT START -->
<section class="section">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="section-title mb-30">
                    <h6>Tentang Saya</h6>
                    <h3 class="f-22">Siapakah Saya ?</h3>
                    <div class="spacer-15"></div>
                    <p class="text-muted text-justify">
                        Saya adalah seorang Sarjana Teknik dari Universitas Ibn Khaldun Bogor, Saya telah terjun ke real project sejak semester 4, dan saya memfokuskan diri sebagai backend dan Web Developer.
                    </p>
                    <div class="about-personal">
                        <ul class="list-unstyled">
                            <li><span class="font-weight-bold title-head">Nama : </span> <span> <?= web()->name ?> </span></li>
                            <li><span class="font-weight-bold title-head">Email : </span> <span> <?= web()->email ?> </span></li>
                            <li><span class="font-weight-bold title-head">Alamat : </span> <span> <?= web()->address ?> </span></li>
                            <li><span class="font-weight-bold title-head">Website : </span> <span> www.jordenjalala.com </span></li>
                            <li><span class="font-weight-bold title-head">Telpon : </span> <span> <?= web()->phone ?> </span></li>
                        </ul>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="btn btn-custom">Download resume</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="section-title">
                    <h6>Keahlian</h6>
                    <h3 class="f-22">Kemampuan Saya</h3>
                    <div class="spacer-15"></div>
                    <p class="text-muted">Obviously I'M Web Designer. Web Developer with over 8 years of experience, making this the first true generator on the Internet.</p>
                    <div class="spacer-15"></div>                            
                </div>
                <div class="skills-progress">
                    <?php foreach ($skill as $value): ?>
                        <div class="progressbox">
                            <h6 class="font-weight-normal"><?= $value->name ?></h6>
                            <div class="progresses bg-dark">
                                <div class="progresses-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <span class="text-muted"><?= $value->level ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ABOUT END -->

<!-- RESUME START -->
<section class="section bg-light" id="experience">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Pengalaman</h6>
                    <h3 class="f-24">Pengalaman Saya</h3>
                    <div class="line-bot"></div>
                    <div class="spacer-15"></div>
                    <p class="text-muted">Beberapa Pengalaman Kerja Saya.</p>
                    <div class="spacer-45"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <!-- Section: Timeline -->
        <section class="">
          <ul class="timeline">
            <?php foreach ($experience as $value): ?>
                <li class="timeline-item mb-5">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="fw-bold"><?= $value->office ?></h5><small class="text-muted"><?= $value->role ?></small>
                          <p class="text-muted mb-2 fw-bold"><?= date("M Y", strtotime($value->start_at)) ?> - <?= $value->end_at ?  date("M Y", strtotime($value->end_at)) : "Sekarang" ?></p>
                          <p class="text-muted">
                           <?= $value->description ?>
                          </p>
                            
                        </div>
                    </div>
                </li>
            <?php endforeach ?>

          </ul>
        </section>
        <!-- Section: Timeline -->

    </div><!--end container-->
</section>

<!-- RESUME START -->

<!-- PORTFOLIO START -->
<section class="section" id="work">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Portfolio</h6>
                    <h3 class="f-24">My Projects</h3>
                    <div class="line-bot"></div>
                    <div class="spacer-15"></div>
                    <p class="text-muted">All the lorem Ipsum generators on the Internet tend to repeat predefined chunks asvlkdfmnvdflkmvk rue generator on the Internet.</p>
                    <div class="spacer-45"></div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <ul class="col container-filter portfolioFilter list-unstyled mb-0 text-center" id="filter">
                    <li><a class="categories active" data-filter="*">All</a></li>
                    <?php foreach ($type as $value): ?>
                        <li><a class="categories" data-filter=".<?= url_title($value->type, 'dash', true) ?>"><?= $value->type ?></a></li>
                    <?php endforeach ?>
                </ul>
            </div><!--end col-->                    
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-30">
        <div class="port portfolio-masonry">
            <div class="portfolioContainer row">
                <?php foreach ($project as $value): ?>
                    <div class="col-lg-3 col-md-6 <?= url_title($value->type, 'dash', true) ?> p-2" >
                        <div class="portfolio-box mt-0 mb-0">
                            <a class="mfp-image" href="<?= base_url($value->image) ?>" title="<?= $value->title ?>">
                                <img src="<?= base_url($value->image) ?>" class="img-fluid" alt="image">
                                                                
                                <div class="portfolio-overlay">
                                    <div class="portfolio-box-detail">
                                        <p><?= $value->title ?></p>
                                        <h4><?= $value->type ?></h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div><!--end col-->
                <?php endforeach ?>

            </div><!--end row-->
            <!-- end portfoliocontainer-->
        </div>
    </div>
</section>
<!-- PORTFOLIO END -->

<!-- TESTIMONIAL START -->
<section class="section bg-white" id="testimonial">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Testimonial</h6>
                    <h3 class="f-24">Happy Clients</h3>
                    <div class="line-bot"></div>
                    <div class="spacer-15"></div>
                    <p class="text-muted">All the lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <div class="spacer-45"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-md-12">
                <div id="testi-two" class="owl-carousel">
                    <div class="testi-box">
                        <div class="client-drow">
                            <div class="testi-content">
                                <img src="<?= base_url('assets/landing/') ?>images/client/img-1.jpg" class="img-fluid float-right rounded-circle" style="height: 90px;" alt="">
                                <div class="client-name">
                                    <h4 class="f-18 mb-0">Harvey Rose</h4>
                                    <p>Client</p>
                                </div>
                                <p class="user-review text-muted font-italic mb-0">Sedm, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                    </div><!--end testi box-->

                    <div class="testi-box">
                        <div class="client-drow">
                            <div class="testi-content">
                                <img src="<?= base_url('assets/landing/') ?>images/client/img-2.jpg" class="img-fluid float-right rounded-circle" style="height: 80px;" alt="">
                                <div class="client-name">
                                    <h4 class="f-18 mb-0">Norman Watson</h4>
                                    <p>Client</p>
                                </div>
                                <p class="user-review text-muted font-italic mb-0">At deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt</p>
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                    </div><!--end testi box-->

                    <div class="testi-box">
                        <div class="client-drow">
                            <div class="testi-content">
                                <img src="<?= base_url('assets/landing/') ?>images/client/img-3.jpg" class="img-fluid float-right rounded-circle" style="height: 80px;" alt="">
                                <div class="client-name">
                                    <h4 class="f-18 mb-0">Nancy Nunez</h4>
                                    <p>Client</p>
                                </div>
                                <p class="user-review text-muted font-italic mb-0">Qui ac placerat dui. Fusce venenatis porta ipsum, et aliquet lacus posuere sed. Etiam efficitur a ligula at condimentum.</p>
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                    </div><!--end testi box-->
                    <div class="testi-box">
                        <div class="client-drow">
                            <div class="testi-content">
                                <img src="<?= base_url('assets/landing/') ?>images/client/img-4.jpg" class="img-fluid float-right rounded-circle" style="height: 80px;" alt="">
                                <div class="client-name">
                                    <h4 class="f-18 mb-0">Harvey Rose</h4>
                                    <p>Client</p>
                                </div>
                                <p class="user-review text-muted font-italic mb-0">Sedm, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                    </div><!--end testi box-->

                    <div class="testi-box">
                        <div class="client-drow">
                            <div class="testi-content">
                                <img src="<?= base_url('assets/landing/') ?>images/client/img-5.jpg" class="img-fluid float-right rounded-circle" style="height: 80px;" alt="">
                                <div class="client-name">
                                    <h4 class="f-18 mb-0">Norman Watson</h4>
                                    <p>Client</p>
                                </div>
                                <p class="user-review text-muted font-italic mb-0">At deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt</p>
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                    </div><!--end testi box-->

                    <div class="testi-box">
                        <div class="client-drow">
                            <div class="testi-content">
                                <img src="<?= base_url('assets/landing/') ?>images/client/img-6.jpg" class="img-fluid float-right rounded-circle" style="height: 80px;" alt="">
                                <div class="client-name">
                                    <h4 class="f-18 mb-0">Nancy Nunez</h4>
                                    <p>Client</p>
                                </div>
                                <p class="user-review text-muted font-italic mb-0">Qui ac placerat dui. Fusce venenatis porta ipsum, venenatis porta ipsum et aliquet lacus posuere sed. Etiam efficitur a ligula at condimentum.</p>
                                <i class="fas fa-quote-left"></i>
                            </div>
                        </div>
                    </div><!--end testi box-->
                </div><!--end owl-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- TESTIMONIAL END -->

<!-- PARTNERS START -->
<section class="section-2 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="slider autoplay">
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-01.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-02.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-03.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-04.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-05.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-06.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-07.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-08.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-09.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                    <div><img src="<?= base_url('assets/landing/') ?>images/client/client-10.png" alt="partners" class="img-fluid mx-auto d-block"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container -->
</section>
<!-- PARTNER END --> 

<!-- BLOG START -->
<section class="section" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Blog</h6>
                    <h3 class="f-24">Latest News</h3>
                    <div class="line-bot"></div>
                    <div class="spacer-15"></div>
                    <p class="text-muted">All the lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <div class="spacer-45"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <!-- Post-->
                <article class="post bg-white mb-30">
                    <div class="post-preview">
                        <a href="blog_single.html"><img src="<?= base_url('assets/landing/') ?>images/blog/img-9.jpg" alt="img-missing" class="img-fluid"></a>
                    </div>

                    <div class="post-head-content">
                        <div class="post-header">
                            <h2 class="post-title"><a href="blog_single.html">Perfect Theme for Showing Your Products</a></h2>
                            <ul class="post-meta list-unstyled">
                                <li class="list-inline-item"><i class="fas fa-tag"></i> <a href="#"><small>Fashion</small></a></li>
                                <li class="list-inline-item"><i class="far fa-calendar-check"></i> <small>April 01, 2019</small></li>
                                        <li class="list-inline-item"><i class="fas fa-user"></i> <a href="#"><small>Quickgen</small></a></li>
                            </ul>
                        </div>

                        <div class="post-content">
                            <p class="text-muted mb-0">Occaecat deserunt mollit anim id est laborum they live in Bookmarksgrove right at the coast of the Semantics.</p>
                        </div>
                        <span class="bar"></span>
                        <div class="post-footer">
                            <div class="likes">
                                <ul class="post-meta list-unstyled blog-social">
                                    <li class="list-inline-item"><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-more"><a href="#">Read More <i class="mdi mdi-arrow-right"></i></a></div>
                        </div>
                    </div>
                </article>
                <!-- Post end--> 
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6">
                <!-- Post-->
                <article class="post bg-white mb-30">
                    <div class="post-preview">
                        <a href="blog_single.html"><img src="<?= base_url('assets/landing/') ?>images/blog/img-12.jpg" alt="img-missing" class="img-fluid"></a>
                    </div>

                    <div class="post-head-content">
                        <div class="post-header">
                            <h2 class="post-title"><a href="blog_single.html">Inteligent Transitions In UX Design</a></h2>
                            <ul class="post-meta list-unstyled">
                                <li class="list-inline-item"><i class="fas fa-tag"></i> <a href="#"><small>Fashion</small></a></li>
                                <li class="list-inline-item"><i class="far fa-calendar-check"></i> <small>April 01, 2019</small></li>
                                        <li class="list-inline-item"><i class="fas fa-user"></i> <a href="#"><small>Quickgen</small></a></li>
                            </ul>
                        </div>

                        <div class="post-content">
                            <p class="text-muted mb-0">Proident sunt in culpa qui officia deserunt mollit anim id est laborum Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
                        </div>
                        <span class="bar"></span>
                        <div class="post-footer">
                            <div class="likes">
                                <ul class="post-meta list-unstyled blog-social">
                                    <li class="list-inline-item"><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-more"><a href="#">Read More <i class="mdi mdi-arrow-right"></i></a></div>
                        </div>
                    </div>
                </article>
                <!-- Post end--> 
            </div><!--end col-->
            
            <div class="col-lg-4 col-md-6">
                <!-- Post-->
                <article class="post bg-white mb-30">
                    <div class="post-preview">
                        <a href="blog_single.html"><img src="<?= base_url('assets/landing/') ?>images/blog/img-15.jpg" alt="img-missing" class="img-fluid"></a>
                    </div>

                    <div class="post-head-content">
                        <div class="post-header">
                            <h2 class="post-title"><a href="blog_single.html">Josh Woodward – Already There</a></h2>
                            <ul class="post-meta list-unstyled">
                                <li class="list-inline-item"><i class="fas fa-tag"></i> <a href="#"><small>Fashion</small></a></li>
                                <li class="list-inline-item"><i class="far fa-calendar-check"></i> <small>April 01, 2019</small></li>
                                <li class="list-inline-item"><i class="fas fa-user"></i> <a href="#"><small>Quickgen</small></a></li>
                            </ul>
                        </div>

                        <div class="post-content">
                            <p class="text-muted mb-0">Cupidatat non sunt in culpa qui officia deserunt mollit anim id est laborum Separated they live in Bookmarksgrove right at the coast of the Semantics.</p>
                        </div>
                        <span class="bar"></span>
                        <div class="post-footer">
                            <div class="likes">
                                <ul class="post-meta list-unstyled blog-social">
                                    <li class="list-inline-item"><a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="post-more"><a href="#">Read More <i class="mdi mdi-arrow-right"></i></a></div>
                        </div>
                    </div>
                </article>
                <!-- Post end--> 
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- BLOG END -->

<!-- CONTACT START -->
<section class="section bg-light" id="contact">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Contact me</h6>
                    <h3 class="f-24">Get In Touch !</h3>
                    <div class="line-bot"></div>
                    <div class="spacer-15"></div>
                    <p class="text-muted">All the lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                    <div class="spacer-45"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->

        <div class="row align-items-center">
            <div class="col-md-7">
                <div class="custom-form">
                    <div id="message"></div>
                    <form method="post" action="https://shreethemes.in/quickgen/layouts/php/contact.php" name="contact-form" id="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="name" id="name" type="text" class="form-control" placeholder="First Name :">
                                </div>
                            </div><!--end col-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="email" id="email" type="email" class="form-control" placeholder="Your email :">
                                </div> 
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input name="subject" id="subject" class="form-control" placeholder="Your subject :">
                                </div>                                                                               
                            </div><!--end col-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Your Message :"></textarea>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="submit" id="submit" name="send" class="submitBnt btn btn-custom w-100" value="Send Message">
                                <div id="simple-msg"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!--end col-->

            <div class="col-md-5 text-center">
                <img src="<?= base_url('assets/landing/') ?>images/contact-map.png" class="img-fluid mt-sm-30 mx-auto" width="460" alt="">
            </div>
        </div><!--end row-->
    </div><!--end container-->
</section>
<section class="section-2 bg-light pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="contact-details text-center mt-30 p-20">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="contact-head">
                        <p class="mb-0 info-title f-16">Location</p>
                        <p class="mb-0"><a href="#" class="text-muted">3179 Raccoon Run, WA</a></p>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-details text-center mt-30 p-20">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="contact-head">
                        <p class="mb-0 info-title f-16">Email</p>
                        <p class="mb-0"><a href="#" class="text-muted">youremailid@gmail.com</a></p>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-details text-center mt-30 p-20">
                    <div class="contact-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="contact-head">
                        <p class="mb-0 info-title f-16">Website</p>
                        <p class="mb-0"><a href="#" class="text-muted">www.yourdomain.com</a></p>
                    </div>
                </div>
            </div><!--end col-->
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-details text-center mt-30 p-20">
                    <div class="contact-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="contact-head">
                        <p class="mb-0 info-title f-16">Call</p>
                        <p class="mb-0">012-345-6789</p>
                    </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- CONTACT END -->