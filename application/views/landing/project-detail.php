<!-- BLOG START -->
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <!-- BLOG START --> 
            <div class="col-md-8">
                <!-- Post Start -->
                <article class="post m-0">
                    <div class="post-preview">
                        <a href="<?= base_url($project->image) ?>"><img src="<?= base_url($project->image) ?>" alt="" class="img-fluid mx-auto d-block"></a>
                    </div>

                    <div class="post-head-content">
                        <div class="post-header">
                            <ul class="post-meta list-unstyled">
                                <li class="list-inline-item"><i class="fas fa-tag"></i> <a href="#"><small><?= $project->type ?></small></a></li>
                            </ul>
                        </div>

                        <div class="post-content">
                            <p class="text-muted"><?= $project->description ?></p>
                        </div>

                    </div>
                </article>                        
            </div>
            <!-- BLOG END -->
            
            <!-- SIDEBAR START -->
            <div class="col-md-4 mt-sm-30">
                <!-- SEARCH -->
				<div class="sidebar">
					<!-- Search widget-->
                    <aside class="widget widget_search mb-0">
                        <form>
                            <input type="text" value="" class="form-control" name="s" id="s" placeholder="Search">
                            <button class="search-button" type="submit"><span class="fas fa-search"></span></button>
                        </form>
                    </aside>
                    <!-- Search widget-->
				</div>
				<!-- SEARCH -->
				
				<!-- LATEST BLOG -->
                <div class="sidebar">
					<div class="widget">
                        <h4 class="text-uppercase text-center f-17">Project Lainnya</h4>
                        <div class="widget_recent_entries_custom">
                            <ul class="">
                                <?php foreach ($projects as $value): ?>
                                    <li class="clearfix">
                                        <div class="wi">
                                            <a href="<?= base_url('project/'.$value->slug) ?>"><img src="<?= base_url($value->image) ?>" alt="" class="img-fluid"></a>
                                        </div>
                                        <div class="wb"><a href="<?= base_url('project/'.$value->slug) ?>"><?= $value->title ?></a> <span class="post-date"><i class="fas fa-tag"></i> <?= $value->type ?></span></div>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Recent entries widget-->
                </div>
				<!-- LATEST BLOG -->

				<!-- TAG -->
				<!-- <div class="sidebar">
					<div class="widget">
						<h4 class="text-uppercase text-center f-17">Kategori</h4>
						<div class="tagcloud">
                            <?php foreach ($type as $value): ?>
    							<a href="<?= base_url('project/kategori/').$value->type ?>"><?= $value->type ?></a>
                            <?php endforeach ?>
						</div>
					</div>
				</div> -->
				<!-- TAG -->

            </div>
            <!-- SIDEBAR END -->
        </div><!--end row-->
    </div><!--end container-->
</section>
<!-- BLOG END -->