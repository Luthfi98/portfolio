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
            <form method="post" action="<?= base_url('sosmeds/store') ?>">
                <div class="mb-3">
                   <label for="name" class="form-label">Nama Media Sosial</label>
                   <input type="text" class="form-control" id="name" value="<?= set_value('name') ?>" name="name" required placeholder="">
                   <?= isset($error['name']) ? $error['name'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="icon" class="form-label">Icon</label>
                   <div class="input-group">
                     <span class="input-group-text" id="show-icon">#</span>
                     <input type="text" class="form-control" id="icon" value="<?= set_value('icon') ?>" name="icon" required placeholder="">
                   </div>
                   <?= isset($error['icon']) ? $error['icon'] : ''  ?>
               </div>
           <!--     <div class="mb-3">
                   <label for="color" class="form-label">Warna</label>
                   <input type="color" class="form-control" id="color" value="<?= set_value('color') ?>" name="color" required placeholder="">
                   <?= isset($error['color']) ? $error['color'] : ''  ?>
               </div> -->
               <div class="text-end">
                  <a href="<?= base_url('sosmeds') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
                  <button type="submit" class="btn btn-sm btn-primary" >Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</main>

<script>

   $("#icon").change(function(){
      var icon = $(this).val()
      console.log(icon)

      $("#show-icon").html(`<span class="${icon}"></span>`)
   })

</script>

