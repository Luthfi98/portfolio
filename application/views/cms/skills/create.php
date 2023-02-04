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
            <form method="post" action="<?= base_url('skills/store') ?>">
                <div class="mb-3">
                   <label for="name" class="form-label">Nama Kemampuan</label>
                   <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                   <input type="text" class="form-control" id="name" value="<?= set_value('name') ?>" name="name" required placeholder="">
                   <?= isset($error['name']) ? $error['name'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="percentage" class="form-label">Persentase</label>
                   <input type="range" class="form-range" min="0" max="100" onchange="updateTextInput(this.value);" step="0.5" id="percentage" value="<?= set_value('percentage',0) ?>" name="percentage" required placeholder="">
                   <span id="textInput">0</span>%
                   <?= isset($error['percentage']) ? $error['percentage'] : ''  ?>
               </div>
               <div class="mb-3">
                  <label class="form-label" for="level">Level</label>
                  <select name="level" id="level" required class="form-control select2">
                     <?php foreach ($level as $value): ?>
                        <option value="<?= $value->level ?>"><?= $value->level ?></option>
                     <?php endforeach ?>
                  </select>
                   <?= isset($error['level']) ? $error['level'] : ''  ?>
               </div>
               <div class="text-end">
                  <a href="<?= base_url('skills') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
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
      theme:'bootstrap-5'
   })

   function updateTextInput(val) {
      $("#textInput").text(val) 
     }
</script>

