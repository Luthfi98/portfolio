
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
			    	<label class="form-label">Username</label>
	    		</div>
	    		<div class="col-lg-8 col-6">
			    	<p>: <?= $user->username ?></p>
	    		</div>

	    		<div class="col-lg-4 col-6">
			    	<label class="form-label">Nama Lengkap</label>
	    		</div>
	    		<div class="col-lg-8 col-6">
			    	<p>: <?= $user->fullname ?></p>
	    		</div>
	    		<div class="col-lg-4 col-6">
			    	<label class="form-label">Email</label>
	    		</div>
	    		<div class="col-lg-8 col-6">
			    	<p>: <?= $user->email ?></p>
	    		</div>
	    	</div>
				<a href="<?= base_url('users') ?>" class="btn btn-secondary btn-sm" >Kembali</a>
         </div>
      </div>
   </div>
</main>
