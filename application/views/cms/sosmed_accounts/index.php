<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
               <div class="hstack gap-2 justify-content-sm-end">
                  <a href="<?= base_url('sosmed_accounts/create') ?>" class="btn btn-sm btn-primary"><span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span><span>Tambah</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>

<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
      <?php if (count($sosmed)): ?>
         <div class="row justify-content-center">
         <?php foreach ($sosmed as $value): ?>
               <div class="card col-xl-4 col-lg-4 col-md-6 col-12 m-2">
                  <div class="card-body">
                     <a href="<?= $value->link ?>" target="__BLANK" title="<?= $value->name ?>">
                        <b>
                           <span class="<?= $value->sosmed->icon ?>"></span>
                           <?= $value->name ?>
                        </b>
                     </a>
                     <br>
                     <div class="text-center mt-2">
                        
                        <a class="text-warning" href="<?= base_url('sosmed_accounts/edit/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-pencil"></i> Ubah</a>
                        <a class="text-danger" href="javascript:;" onclick="showModalDelete(this)" data-href="<?= base_url('sosmed_accounts/destroy/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-trash"></i> Hapus</a>
                     </div>
                  </div>
               </div>
         <?php endforeach ?>
         </div>
      <?php else: ?>
         <div class="card">
            <div class="card-body text-center">
               <b>
               Belum ada data akun sosial media
               </b>
            </div>
         </div>
      <?php endif ?>
   </div>
</main>