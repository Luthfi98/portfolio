<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
         </div>
      </div>
   </div>
</header>
   <?php $error = $this->session->flashdata('error');
    ?>
<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
      <div class="card">
         <div class="card-header border-bottom">
            <h5 class="mb-0">Form <?= isset($breadcrumb) ? $breadcrumb : $title ?></h5>
         </div>
         <div class="table-responsive card-body">
            <form class="settings-form" method="post" action="<?= base_url('users/store') ?>">
			    <div class="mb-3">
				    <label for="fullname" class="form-label">Nama Lengkap</label>
				    <input type="text" class="form-control" id="fullname" value="<?= set_value('fullname') ?>" name="fullname" required placeholder="John Doe">
				    <?= isset($error['fullname']) ? $error['fullname'] : ''  ?>
				</div>
				<div class="mb-3">
				    <label for="email" class="form-label">Email</label>
				    <input type="text" class="form-control" id="email" value="<?= set_value('email') ?>" name="email" required placeholder="email">
				    <?= isset($error['email']) ? $error['email'] : ''  ?>
				</div>
				<div class="mb-3">
				    <label for="username" class="form-label">Username</label>
				    <input type="text" class="form-control" id="username" value="<?= set_value('username') ?>" name="username" required placeholder="username">
				    <?= isset($error['username']) ? $error['username'] : ''  ?>
				</div>
				<div class="mb-3">
				    <label for="password" class="form-label">Password</label>
				    <input type="password" class="form-control" id="password" value="<?= set_value('') ?>" name="password" required placeholder="********">
				    <?= isset($error['password']) ? $error['password'] : ''  ?>
				</div>
				<div class="mb-3">
				    <label for="conf_password" class="form-label">Konfirmasi Password</label>
				    <input type="password" class="form-control" id="conf_password" value="<?= set_value('') ?>" name="conf_password" required placeholder="********">
				    <?= isset($error['conf_password']) ? $error['conf_password'] : ''  ?>
				</div>
				<div class="text-end">
					<a href="<?= base_url('users') ?>" class="btn btn-secondary" >Kembali</a>
					<button type="submit" class="btn btn-primary" >Simpan</button>
				</div>
		    </form>
         </div>
      </div>
   </div>
</main>
