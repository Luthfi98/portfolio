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
            <form method="post" action="<?= base_url('educations/store') ?>">
                <div class="mb-3">
                   <label for="name" class="form-label">Nama Universitas / Sekolah</label>
                   <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                   <input type="text" class="form-control" id="name" value="<?= set_value('name') ?>" name="name" required placeholder="">
                   <?= isset($error['name']) ? $error['name'] : ''  ?>
               </div>
               <div class="row">
                  <div class="mb-3 col-lg-2 col-12">
                      <label for="level" class="form-label">Tingkat Pendidikan</label>
                      <select  name="level" id="level" required data-placeholder="Pilih Tingkat Pendidikan" class="form-control select2">
                           <option value=""></option>
                           <option value="S3">S3</option>
                           <option value="S2">S2</option>
                           <option value="S1">S1</option>
                           <option value="SMA/SMK">SMA/SMK</option>
                           <option value="SMP/MTS">SMP/MTS</option>
                           <option value="SD/MI">SD/MI</option>
                      </select>
                      <?= isset($error['level']) ? $error['level'] : ''  ?>
                  </div>
                   <div class="mb-3 col-lg-4 col-6">
                      <label for="major" class="form-label">Jurusan</label>
                      <input type="text" class="form-control" id="major" value="<?= set_value('major') ?>" name="major" required placeholder="">
                      <?= isset($error['major']) ? $error['major'] : ''  ?>
                  </div>

                  <div class="mb-3 col-lg-4 col-6">
                      <label for="title" class="form-label">Gelar</label>
                      <input type="text" class="form-control" id="title" value="<?= set_value('title') ?>" name="title" placeholder="">
                      <?= isset($error['title']) ? $error['title'] : ''  ?>
                  </div>

                  <div class="mb-3 col-lg-2 col-6">
                      <label for="ipk" class="form-label">IPK/GPA</label>
                      <input type="text" class="form-control" id="ipk" value="<?= set_value('ipk') ?>" name="ipk" placeholder="">
                      <?= isset($error['ipk']) ? $error['ipk'] : ''  ?>
                  </div>
               </div>
               <div class="mb-3">
                  <label for="">Waktu</label>
                  <div class="input-group mb-3">
                     <input type="month" class="form-control" max="<?= date("Y-m") ?>" name="in" id="in">
                     <span class="input-group-text">s/d</span>
                     <input type="month" max="<?= date("Y-m") ?>" class="form-control" name="out" id="out">
                     <!-- <span class="input-group-text">
                        <label for="now">
                           <input type="radio" name="now" id="now" value="now"> Masih Berlangsung
                        </label>
                     </span> -->
                  </div>
                   <?= isset($error['in']) ? $error['in'] : ''  ?>
               </div>
               <div class="text-end">
                  <a href="<?= base_url('educations') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
                  <button type="submit" class="btn btn-sm btn-primary" >Simpan</button>
                  
               </div>
            </form>
         </div>
      </div>
   </div>
</main>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>


   $(".select2").select2({
      tags:true,
      theme:'bootstrap-5',
      placeholder: function(){
           $(this).data('placeholder');
       }
   })

</script>