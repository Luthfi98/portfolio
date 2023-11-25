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
<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
      <div class="card">
		<?php if ($this->session->flashdata('alert')): ?>
			<?= $this->session->flashdata('alert'); ?>
		<?php endif ?>
	<?php $error = $this->session->flashdata('error') ?>

         <div class="card-header border-bottom">
            <h5 class="mb-0">Form <?= isset($breadcrumb) ? $breadcrumb : $title ?></h5>
         </div>
         <div class="table-responsive card-body">
                <form class="settings-form" method="post" enctype="multipart/form-data" action="<?= base_url('settings/save') ?>">
                	<h5>Informasi Website</h5>
                	<hr>
                   <div class="mb-3">
                      <label for="name" class="form-label">Nama Website</label>
                   <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                      <input type="text" class="form-control" id="name" value="<?= set_value('name', $setting->name) ?>" name="name" required>
                      <?= isset($error['name']) ? $error['name'] : ''  ?>
                  </div>
                	<div class="row">
                		<div class="col-lg-6 col-12">
            			    <div class="mb-3">
            			    	<label for="icon" class="form-label">Icon</label>
            			    	<div id="show-icon">
            			    		<img src="<?= base_url($setting->icon) ?>" width="20%" alt="Icon">
            			    	</div>
            			    	<input type="hidden" name="id" id="id" value="<?= encrypt_decrypt("encrypt",$setting->id) ?>">
            			    	<input type="file" name="icon" id="icon" class="form-control">
            				    <?= isset($error['icon']) ? $error['icon'] : ''  ?>
            			    </div>

                		</div>
                		<div class="col-lg-6 col-12">
            			    <div class="mb-3">
            			    	<label for="logo" class="form-label">Logo</label>
            			    	<div id="show-logo">
            			    		<img src="<?= base_url($setting->logo) ?>" width="50%" alt="Logo">
            			    	</div>
            			    	<input type="file" name="logo" id="logo" class="form-control">
            				    <?= isset($error['logo']) ? $error['logo'] : ''  ?>

            			    </div>
                		</div>
                	</div>
      			   
                	<h5>SEO Website</h5>
                	<hr>
                	<div class="row">
                		<div class="col-lg-6 col-12">
                			<div class="mb-3">
            				    <label for="seo_tag" class="form-label">Tags</label>
            				    <select required name="seo_tag[]" id="seo_tag" class="form-control" multiple>
            				    </select>
            				    <?= isset($error['seo_tag']) ? $error['seo_tag'] : ''  ?>
            				</div>
                		</div>
                		<div class="col-lg-6 col-12">
                			<div class="mb-3">
            				    <label for="seo_description" class="form-label">Deskripsi</label>
            				    <textarea name="seo_description" rows="5" id="seo_description" class="form-control"><?= set_value('seo_description', $setting->seo_description) ?></textarea>
            				    <?= isset($error['seo_description']) ? $error['seo_description'] : ''  ?>
            				</div>
                		</div>
                	</div>

					<h5>Google Tag</h5>
                	<hr>
                	<div class="row">
                		<div class="col-lg-6 col-12">
                			<div class="mb-3">
            				    <label for="gtag_header" class="form-label">Tag on Header</label>

								<textarea name="gtag_header" rows="5" id="gtag_header" class="form-control"><?= set_value('gtag_header', $setting->gtag_header) ?></textarea>
            				    <?= isset($error['gtag_header']) ? $error['gtag_header'] : ''  ?>
            				</div>
                		</div>
                		<div class="col-lg-6 col-12">
                			<div class="mb-3">
								<label for="gtag_body" class="form-label">Tag on Body</label>
            				    <textarea name="gtag_body" rows="5" id="gtag_body" class="form-control"><?= set_value('gtag_body', $setting->gtag_body) ?></textarea>
            				    <?= isset($error['gtag_body']) ? $error['gtag_body'] : ''  ?>
            				</div>
                		</div>
                	</div>
            		<button type="submit" class="btn app-btn-primary" >Simpan</button>
                </form>
         </div>
      </div>
   </div>
</main>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$("#seo_tag").select2({
		data:<?= json_encode(explode(",", $setting->seo_tag)) ?>,
		tags:true,
		theme:'bootstrap-5'
	}).val(<?= json_encode(explode(",", $setting->seo_tag)) ?>).trigger('change')
</script>
