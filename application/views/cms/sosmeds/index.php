<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
               <div class="hstack gap-2 justify-content-sm-end">
                  <a href="<?= base_url('sosmeds/create') ?>" class="btn btn-sm btn-primary"><span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span><span>Tambah</span></a>
               </div>
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
         <div class="card-header border-bottom">
            <h5 class="mb-0">Data <?= $title ?></h5>
         </div>
         <div class="table-responsive card-body">

            <table class="table table-hover table-nowrap" id="dt">
               <thead class="table-light">
                  <tr>
                     <th scope="col" width="1%">No.</th>
                     <th scope="col" width="10%">Icon</th>
                     <th scope="col">Nama</th>
                     <th width="10%">#</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $no =1;
                  foreach ($sosmed as $value): ?>
                  <tr>
                     <td><?= $no++ ?></td>
                     <td><span style="font-size: 20px;" class="<?= $value->icon ?>"></span></td>
                     <td><?= $value->name ?></td>
                     <td>
                        <a class="btn btn-neutral text-warning btn-sm" href="<?= base_url('sosmeds/edit/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-pencil"></i> </a>
                        <a class="btn btn-neutral text-danger btn-sm" href="javascript:;" onclick="showModalDelete(this)" data-href="<?= base_url('sosmeds/destroy/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-trash"></i></a>
                     </td>
                  </tr>
                  <?php endforeach ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</main>

<script>
   $("#dt").dataTable()

</script>