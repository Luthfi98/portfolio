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
            <form method="post" action="<?= base_url('sosmed_accounts/update/'.encrypt_decrypt('encrypt', $account->id)) ?>">
               <div class="mb-3">
                  <label class="form-label" for="sosmed_id">Sosial Media</label>
                  <select name="sosmed_id" id="sosmed_id" data-placeholder="Pilih Sosial Media" class="form-control select2">
                     <option value=""></option>
                     <?php foreach ($sosmed as $value): ?>
                        <option value="<?= $value->id ?>" <?= $account->sosmed_id == $value->id ? 'selected' : ''  ?> data-icon="<?= $value->icon ?>"><?= $value->name ?></option>
                     <?php endforeach ?>
                  </select>
                   <?= isset($error['sosmed_id']) ? $error['sosmed_id'] : ''  ?>
               </div>
                <div class="mb-3">
                   <label for="name" class="form-label">Nama Akun Media Sosial</label>
                   <input type="text" class="form-control" id="name" value="<?= set_value('name', $account->name) ?>" name="name" required placeholder="">
                   <?= isset($error['name']) ? $error['name'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="link" class="form-label">Link</label>
                   <input type="url" class="form-control" id="link" value="<?= set_value('link', $account->link) ?>" name="link" required placeholder="">
                   <?= isset($error['link']) ? $error['link'] : ''  ?>
               </div>
               <div class="text-end">
                  <a href="<?= base_url('sosmed_accounts') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
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
      templateResult: formatState,
      theme:'bootstrap-5',
      placeholder: function(){
           $(this).data('placeholder');
       }
   })

   function formatState (state) {
     if (!state.id) {
       return state.text;
     }
     var icon = $(state.element).data('icon') 
     // console.log($(state.element).data('icon'))
     var $state = $(
       `<span class="${icon}"> ${state.text}</span>`
     );
     return $state;
   };
</script>
