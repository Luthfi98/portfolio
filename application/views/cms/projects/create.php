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
            <form method="post" action="<?= base_url('projects/store') ?>" enctype="multipart/form-data">
                <div class="mb-3">
                   <label for="title" class="form-label">Nama Projek</label>
                   <input type="text" class="form-control" id="title" value="<?= set_value('title') ?>" name="title" required placeholder="">
                   <?= isset($error['title']) ? $error['title'] : ''  ?>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="type">Tipe</label>
                  <select name="type" id="type" required class="form-control select2">
                     <?php foreach ($type as $value): ?>
                        <option value="<?= $value->type ?>"><?= $value->type ?></option>
                     <?php endforeach ?>
                  </select>
                   <?= isset($error['type']) ? $error['type'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="description" class="form-label">Deskripsi</label>
                   <textarea class="form-control" id="description" name="description"><?= set_value('description') ?></textarea>
                   <?= isset($error['description']) ? $error['description'] : ''  ?>
               </div>
               <div class="mb-3">
                   <label for="image" class="form-label">Gambar</label>
                   <input type="file" accept="image/*" class="form-control" id="image" value="<?= set_value('image') ?>" name="image" required placeholder="">
                   <?= isset($error['image']) ? $error['image'] : ''  ?>
               </div>
               <div class="text-end">
                  <a href="<?= base_url('projects') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
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

