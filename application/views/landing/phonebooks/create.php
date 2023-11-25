<section class="section bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <div class="spacer-45"></div>
                    <h3 class="f-24"><?= $title ?></h3>
                    <div class="spacer-15"></div>
                </div>
            </div><!--end col--> 
        </div><!--end row-->
        <?php $error = $this->session->flashdata('error');?>
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                         <div class="card-header border-bottom">
                            <h5 class="mb-0">Form <?= isset($breadcrumb) ? $breadcrumb : $title ?></h5>
                         </div>
                         <div class="table-responsive card-body">
                            <form method="post" action="<?= base_url('phonebooks/store') ?>">
                                <div class="mb-3">
                                   <label for="name" class="form-label">Nama</label>
                                   <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                                   <input type="text" class="form-control" id="name" value="<?= set_value('name') ?>" name="name" required placeholder="">
                                   <?= isset($error['name']) ? $error['name'] : ''  ?>
                               </div>
                               <div class="mb-3">
                                   <label for="number" class="form-label">Nomer</label>
                                   <input type="number" class="form-control" id="number" value="<?= set_value('number') ?>" name="number" required placeholder="">
                                   <?= isset($error['number']) ? $error['number'] : ''  ?>
                               </div>
                               <div class="mb-3">
                                  <label class="form-label" for="group">Grup</label>
                                  <select name="group" id="group" required class="form-control select2">
                                     <?php foreach ($group as $value): ?>
                                        <option value="<?= $value->group ?>"><?= $value->group ?></option>
                                     <?php endforeach ?>
                                  </select>
                                   <?= isset($error['group']) ? $error['group'] : ''  ?>
                               </div>
                               <div class="text-end">
                                  <a href="<?= base_url('phonebooks') ?>" class="btn btn-sm btn-secondary" >Kembali</a>
                                  <button type="submit" class="btn btn-sm btn-primary" >Simpan</button>
                                  
                               </div>
                            </form>
                         </div>
                      </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>


   $(".select2").select2({
      tags:true,
      theme:'bootstrap-5'
   })
</script>

