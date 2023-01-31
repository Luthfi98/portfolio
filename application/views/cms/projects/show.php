
<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
            </div>
         </div>
      </div>
   </div>
</header>

<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body">
		    	<div class="row mb-3">
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Nama Projek</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $project->title ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Tipe</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $project->type ?></p>
		    		</div>
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Gambar</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<div>
				    		<a href="<?= base_url($project->image) ?>" title="Lihat Thumbnail" target="_BLANK">
				    		    <img src="<?= base_url($project->image) ?>" alt="Thumbnail Project" width="250px">
				    		</a>
				    	</div>
		    		</div>
		    		<div class="col-12"> 
				    	<label class="form-label">Deskripsi</label>
		    			<?= $project->description ?>
		    		</div>
		    	</div>
				<a href="<?= base_url('projects') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
	    	</div>
         </div>
      </div>
   </div>
</main>
