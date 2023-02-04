
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
             <form method="post" action="<?= base_url('experiences/update/'.encrypt_decrypt('encrypt', $experience->id)) ?>">
                <div class="mb-3">
                   <label for="office" class="form-label">Nama Perusahaan</label>
                   <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                   <input type="text" class="form-control" id="office" value="<?= set_value('office', $experience->office) ?>" name="office" required placeholder="">
                   <?= isset($error['office']) ? $error['office'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="role" class="form-label">Posisi</label>
                   <input type="text" class="form-control" id="role" value="<?= set_value('role', $experience->role) ?>" name="role" required placeholder="">
                   <?= isset($error['role']) ? $error['role'] : ''  ?>
               </div>
               <div class="mb-3">
                  <label for="">Tanggal Bekerja</label>
                  <div class="input-group mb-3">
                     <input type="month" class="form-control" max="<?= date("Y-m") ?>" value="<?= set_value('start_at', $experience->start_at) ?>" name="start_at" id="start_at">
                     <span class="input-group-text">s/d</span>
                     <input type="month" max="<?= date("Y-m") ?>" class="form-control" value="<?= set_value('end_at', $experience->end_at) ?>" name="end_at" id="end_at">
                     <span class="input-group-text">
                        <label for="now">
                           <input type="radio" name="now" id="now" value="now" <?= $experience->end_at == null ? 'checked' : '' ?>> Saya Masih Bekerja
                        </label>
                     </span>
                  </div>
                   <?= isset($error['start_at']) ? $error['start_at'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="description" class="form-label">Deskripsi</label>
                   <textarea class="form-control" id="description" name="description"><?= set_value('description', $experience->description) ?></textarea>
                   <?= isset($error['description']) ? $error['description'] : ''  ?>
               </div>
               <div class="text-end">
                  <a href="<?= base_url('experiences') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
                  <button type="submit" class="btn btn-sm btn-primary" >Simpan</button>
                  
               </div>
            </form>
         </div>
      </div>
   </div>
</main>

<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#description' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
</script>
