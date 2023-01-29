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
               <h4 class="mb-0"><span class="bi bi-person"></span> Data Diri</h4>
            <!-- <h5 class="mb-0">Form <?= isset($breadcrumb) ? $breadcrumb : $title ?></h5> -->
         </div>
         <form action="<?= base_url('update-profile') ?>" method="post">
            <div class="table-responsive card-body">
            	<div class="row gy-4">
            		<div class="col-12 col-md-12 col-lg-6">
   						<div class="item">
   							<div class="row justify-content-between align-items-center">
                           <div class="col-12 mb-3">
                              <div class="item-label"><strong>Nama Lengkap</strong></div>
                              <div class="item-data">
                                 <input type="hidden" name="id"id="id" value="<?= $profile ? encrypt_decrypt('encrypt', $profile->id) : '' ?>">
                                 <input type="text" name="name" required id="name" class="form-control" value="<?= set_value('name',  $profile ? $profile->name : '') ?>">
                              </div>
                           </div><!--//col-->
   								<div class="col-lg-6 col-12 mb-3">
   									<div class="item-label"><strong>Jenis Kelamin</strong></div>
   									<div class="item-data">
                                 <label for="gender-male" class="form-check-label">
                                    <input type="radio" required id="gender-male" name="gender" value="Laki-Laki" class="form-check-input" <?= set_value('gender',  $profile ? $profile->gender : '') == 'Laki-Laki' ? 'checked' : ''  ?> placeholder=""> Laki-Laki
                                 </label>
                                 <label for="gender-female" class="form-check-label">
                                    <input type="radio" required id="gender-female" name="gender" value="Perempuan" class="form-check-input" <?= set_value('gender',  $profile ? $profile->gender : '') == 'Perempuan' ? 'checked' : ''  ?> placeholder=""> Perempuan
                                 </label>
   									</div>
   								</div><!--//col-->
   								<div class="col-lg-6 col-12 mb-3">
   									<div class="item-label"><strong>Status Pernikahan</strong></div>
   									<div class="item-data">
                                 <label for="marital-1" class="form-check-label">
                                    <input type="radio" required id="marital-1" name="marital_status" value="Belum Menikah" class="form-check-input" <?= set_value('marital_status',  $profile ? $profile->marital_status : '') == 'Belum Menikah' ? 'checked' : ''  ?> placeholder=""> Belum Menikah
                                 </label>
                                 <label for="marital-2" class="form-check-label">
                                    <input type="radio" required id="marital-2" name="marital_status" value="Sudah Menikah" class="form-check-input" <?= set_value('marital_status',  $profile ? $profile->marital_status : '') == 'Sudah Menikah' ? 'checked' : ''  ?> placeholder=""> Sudah Menikah
                                 </label>
   									</div>
   								</div><!--//col-->

                           <div class="col-lg-6 col-12 mb-3">
                              <div class="item-label"><strong>Tempat Lahir</strong></div>
                              <div class="item-data">
                                 <input type="text" name="pob" required id="pob" value="<?= set_value('pob',  $profile ? $profile->pob : '') ?>" class="form-control">
                              </div>
                           </div><!--//col-->
                           <div class="col-lg-6 col-12 mb-3">
                              <div class="item-label"><strong>Tanggal Lahir</strong></div>
                              <div class="item-data">
                                 <input type="date" name="dob" required id="dob" value="<?= set_value('dob',  $profile ? $profile->dob : '') ?>" class="form-control">
                              </div>
                           </div><!--//col-->

                           <div class="col-lg-6 col-12 mb-3">
                              <div class="item-label"><strong>Tinggi Badan</strong></div>
                              <div class="item-data">
                                 <input type="range" step="1" min="0" max="250"  onchange="updateTextInput(this);" name="height" id="height" value="<?= set_value('height',  $profile ? $profile->height : '') ?>" class="form-range">
                                  <span id="textInput-height"><?= $profile ? $profile->height : '0' ?></span> cm
                              </div>
                           </div><!--//col-->
                           <div class="col-lg-6 col-12 mb-3">
                              <div class="item-label"><strong>Berat Badan</strong></div>
                              <div class="item-data">
                                 <input type="range" step="1" min="0"  max="150" onchange="updateTextInput(this);" name="weight" id="weight" value="<?= set_value('weight',  $profile ? $profile->weight : '') ?>" class="form-range">
                                  <span id="textInput-weight"><?= $profile ? $profile->weight : '0' ?></span> kg
                              </div>
                           </div><!--//col-->
                           <div class="col-12 mb-3">
                              <div class="item-label"><strong>Posisi</strong></div>
                              <div class="item-data">
                                 <input type="text" name="role" id="role" class="form-control" value="<?= set_value('role',  $profile ? $profile->role : '') ?>">
                              </div>
                           </div><!--//col-->
   							</div><!--//row-->
   						</div><!--//item-->
            		</div><!--//col-->

                  <div class="col-12 col-md-12 col-lg-6">
                     <div class="item">
                        <div class="row justify-content-between align-items-center">
                           <div class="col-12 mb-3">
                              <div class="item-label"><strong>Nomer HP</strong></div>
                              <div class="item-data">
                                 <input type="text" name="phone" required id="phone" class="form-control" value="<?= set_value('phone',  $profile ? $profile->phone : '') ?>">
                              </div>
                           </div><!--//col-->
                           <div class="col-12 mb-3">
                              <div class="item-label"><strong>Email</strong></div>
                              <div class="item-data">
                                 <input type="email" name="email" required id="email" class="form-control" value="<?= set_value('email',  $profile ? $profile->email : '') ?>">
                              </div>
                           </div><!--//col-->

                            <div class="col-12 mb-3">
                              <div class="item-label"><strong>Alamat</strong></div>
                              <div class="item-data">
                                 <textarea  name="address" required id="address"rows="4" class="form-control"><?= set_value('address',  $profile ? $profile->address : '') ?></textarea>
                              </div>
                           </div><!--//col-->

                           <div class="col-12 col-lg-6 mb-3">
                              <div class="item-label"><strong>Nama Kota</strong></div>
                              <div class="item-data">
                                 <input type="text" name="city" required id="city" class="form-control" value="<?= set_value('city',  $profile ? $profile->city : '') ?>">
                              </div>
                           </div><!--//col-->
                           <div class="col-12 col-lg-6 mb-3">
                              <div class="item-label"><strong>Kode Pos</strong></div>
                              <div class="item-data">
                                 <input type="text" name="zip_code" required id="zip_code" class="form-control" value="<?= set_value('zip_code',  $profile ? $profile->zip_code : '') ?>">
                              </div>
                           </div><!--//col-->

                            
                        </div><!--//row-->
                     </div><!--//item-->
                  </div><!--//col-->

                   <div class="col-12 mb-3">
                     <div class="item-label"><strong>Tentang Saya</strong></div>
                     <div class="item-data">
                        <textarea  name="about" id="about" class="form-control"><?= set_value('about',  $profile ? $profile->about : '') ?></textarea>
                     </div>
                  </div><!--//col-->
            	</div><!--//row-->

            </div>
            <div class="card-footer p-4 mt-auto text-end">
               <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div><!--//card-footer-->
         </form>
      </div>
   </div>
</main>

<script>
   function updateTextInput(data) {
      $(`#textInput-${$(data).attr('id')}`).text($(data).val()) 
     }
</script>