
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
		    	<div class="row">
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Perusahaan</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $experience->office ?></p>
		    		</div>

		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Posisi</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= $experience->role ?></p>
		    		</div>
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Tanggal Bekerja</label>
		    		</div>
		    		<div class="col-lg-8 col-6">
				    	<p>: <?= date("M Y", strtotime($experience->start_at)) ?> - <?= $experience->end_at ?  date("M Y", strtotime($experience->end_at)) : "Sekarang" ?></p>
		    		</div>
		    		<div class="col-lg-4 col-6">
				    	<label class="form-label">Deskripsi</label>
		    		</div>
		    		<div class="col-lg-8 col-6"> <?= $experience->description ?>
		    		</div>
		    	</div>
				<a href="<?= base_url('experiences') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
	    	</div>
         </div>
      </div>
   </div>
</main>
