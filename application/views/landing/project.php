<section class="section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <div class="spacer-45"></div>
                    <h3 class="f-24">PROJECT</h3>
                    <div class="spacer-15"></div>
                </div>
            </div><!--end col--> 
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
                <?php foreach ($projects as $value): ?>
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
    </div><!--end container-->
</section>