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
            <form method="post" action="<?= base_url('menus/update/'.encrypt_decrypt('encrypt', $menu->id)) ?>">
               <div class="mb-3">
                  <label class="form-label" for="parent_id">Parent</label>
                  <select name="parent_id" id="parent_id" data-placeholder="Pilih Parent" class="form-control select2">
                     <option value=""></option>
                     <?php foreach ($parent as $value): ?>
                        <option value="<?= $value->id ?>" <?= $value->id == $menu->parent_id ? 'selected' : ''  ?>><?= $value->title ?></option>
                     <?php endforeach ?>
                  </select>
                   <?= isset($error['parent_id']) ? $error['parent_id'] : ''  ?>
               </div>

                <div class="mb-3">
                   <label for="title" class="form-label">Nama Menu</label>
                   <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                   <input type="text" class="form-control" id="title" value="<?= set_value('title', $menu->title) ?>" name="title" required placeholder="">
                   <?= isset($error['title']) ? $error['title'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="url" class="form-label">URL</label>
                   <div class="input-group">
                     <span class="input-group-text"><?= base_url() ?></span>
                     <input type="text" class="form-control" id="url" value="<?= set_value('url', $menu->url) ?>" name="url" required placeholder="">
                   </div>
                   <?= isset($error['url']) ? $error['url'] : ''  ?>
               </div>

               <div class="row">
                  <div class="col-lg-8 col-12 mb-3">
                      <label for="icon" class="form-label">Icon</label>
                      <div class="input-group">
                        <span class="input-group-text" id="show-icon"><?= $menu->icon ?></span>
                        <input type="text" class="form-control" id="icon" value="<?= set_value('icon', $menu->icon) ?>" name="icon" required placeholder="">
                      </div>
                      <?= isset($error['icon']) ? $error['icon'] : ''  ?>
                  </div>
                  <div class="col-lg-4 col-12 mb-3">
                     <label for="sort" class="form-label">Urutan</label>
                     <input type="number" min="0"  class="form-control" id="sort" value="<?= set_value('sort', $menu->sort) ?>" name="sort" required placeholder="">
                      <?= isset($error['sort']) ? $error['sort'] : ''  ?>
                  </div>
               </div>
               <div class="text-end">
                  <a href="<?= base_url('menus') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
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

   $("#icon").change(function(){
      var icon = $(this).val()
      console.log(icon)

      $("#show-icon").html(`<span class="${icon}"></span>`)
   })

</script>

