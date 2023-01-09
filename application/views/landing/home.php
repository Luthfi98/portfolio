<!-- HOME START-->
<section class="bg-home" style="background-color: #030d0f;" id="home">
<!-- <section class="bg-home" style="background-color: #030d0f; background-image:url(<?= base_url('assets/landing/images/home/bg-personal.jpg')?>)" id="home"> -->
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row pt-70">
                    <div class="col-lg-8">
                        <div class="title-heading">
                            <h1 class="text-white">Luthfi Ihdalhusnayain</h1>
                            <h2 class="text-white mb-4">Saya adalah seorang  <span class="element text-custom" data-elements=" <?= web()->seo_tag ?>"></span></h2>                                    
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
<section class="section text-light" id="skill" style="background-color: #030d0f;">
 <div class="progressbox" style="margin-bottom: 100px;">
    <!-- <h6 class="font-weight-normal"><?= $value->name ?></h6> -->
    <div class="progresses bg-dark">
        <div class="progresses-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        </div>
    </div>
</div>
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="section-title mb-30">
                    <h6>Tentang Saya</h6>
                    <!-- <h3 class="f-22">Siapakah Saya ?</h3> -->
                    <div class="spacer-15"></div>
                    <p class="text-light text-justify">
                        Saya adalah seorang Sarjana Teknik dari Universitas Ibn Khaldun Bogor, Saya telah terjun ke real project sejak semester 4, dan saya memfokuskan diri sebagai backend dan Web Developer.
                    </p>
                    <div class="about-personal">
                        <ul class="list-unstyled">
                            <li><span class="font-weight-bold title-head">Nama : </span> <span> <?= web()->name ?> </span></li>
                            <li><span class="font-weight-bold title-head">Email : </span> <span>
                                <a style="color:white;" href="mailto:<?= web()->email ?>"><?= web()->email ?></a>
                            </span></li>
                            <li><span class="font-weight-bold title-head">Alamat : </span> <span> <?= web()->address ?> </span></li>
                            <li><span class="font-weight-bold title-head">Website : </span> <span> <a style="color:white;" href="https://ourporto.com/" title="Kunjungi Link">https://ourporto.com/</a> </span></li>
                            <li><span class="font-weight-bold title-head">Telpon : </span> <span> 
                                <a style="color:white;" href="tel:<?= web()->phone ?>"><?= web()->phone ?></a>
                            </span></li>
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
                    <!-- <h3 class="f-22">Kemampuan Saya</h3> -->
                    <div class="spacer-15"></div>
                    <p class="text-light">Obviously I'M Web Designer. Web Developer with over 8 years of experience, making this the first true generator on the Internet.</p>
                    <div class="spacer-15"></div>                            
                </div>
                <div class="skills-progress">
                    <?php foreach ($skill as $value): ?>
                        <div class="progressbox">
                            <h6 class="font-weight-normal"><?= $value->name ?></h6>
                            <div class="progresses bg-dark">
                                <div class="progresses-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <span class="text-light"><?= $value->level ?></span>
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
<section class="section" style="background-color: #030d0f;" id="experience">
 <div class="progressbox" style="margin-bottom: 100px;">
    <!-- <h6 class="font-weight-normal"><?= $value->name ?></h6> -->
    <div class="progresses bg-dark">
        <div class="progresses-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
        </div>
    </div>
</div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Pengalaman</h6>
                    <h3 class="f-24 text-light">Pengalaman Kerja</h3>
                    <div class="line-bot"></div>
                    <!-- <div class="spacer-15"></div> -->
                    <!-- <p class="text-light">Beberapa Pengalaman Kerja Saya.</p> -->
                    <div class="spacer-45"></div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
        <!-- Section: Timeline -->
        <section class="">
          <ul class="timeline">
            <?php foreach ($experience as $value): ?>
                <li class="timeline-item mb-5">
                    <div class="card bg-dark text-light">
                        <div class="card-body">
                          <h5 class="fw-bold"><?= $value->office ?></h5><small class="text-light"><?= $value->role ?></small>
                          <p class="text-light mb-2 fw-bold"><?= date("M Y", strtotime($value->start_at)) ?> - <?= $value->end_at ?  date("M Y", strtotime($value->end_at)) : "Sekarang" ?></p>
                          <p class="text-light">
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
<section class="section" id="project" style="background-color: #030d0f;">
     <div class="progressbox" style="margin-bottom: 100px;">
        <!-- <h6 class="font-weight-normal"><?= $value->name ?></h6> -->
        <div class="progresses bg-dark">
            <div class="progresses-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>Portfolio</h6>
                    <h3 class="f-24 text-light">Project Terbaru</h3>
                    <div class="line-bot"></div>
                    <div class="spacer-15"></div>
                    <p class="text-light">Berikut beberapa project terakhir yang saya kerjakan.</p>
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
                    <div class="col-lg-4 col-md-6 <?= url_title($value->type, 'dash', true) ?> p-1">
                        <div class="portfolio-box mt-0 mb-0">                                
                            <img src="<?= base_url($value->image) ?>" class="img-fluid" alt="image">
                            <div class="portfolio-bg-overlay">                                    
                                <a class="mfp-image text-center" href="<?= base_url($value->image) ?>" title="<?= $value->type ?>"><i class="fas fa-image text-white"></i></a>
                            </div>
                            <div class="gallary-title text-center">
                                <h6><a href="<?= base_url('project/'.$value->slug) ?>"><?= $value->title ?></a></h6>
                                <span><?= $value->type ?></span>
                            </div>
                        </div>
                    </div><!--end col-->
                <?php endforeach ?>

            </div><!--end row-->
            <!-- end portfoliocontainer-->
        </div>
    </div>
</section>
<!-- PORTFOLIO END -->

