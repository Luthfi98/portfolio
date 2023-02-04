<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
               <div class="hstack gap-2 justify-content-sm-end">
                  <a href="<?= base_url('menus/create') ?>" class="btn btn-sm btn-primary"><span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span><span>Tambah</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>

<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-8 col-12">
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
                           <th scope="col">Parent</th>
                           <th scope="col">Judul</th>
                           <th scope="col">URL</th>
                           <th scope="col">Icon</th>
                           <th width="10%">#</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                        $no =1;
                        foreach ($menu as $value): ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $value->parent ? $value->parent->title : '' ?></td>
                           <td><?= $value->title ?></td>
                           <td><?= $value->url ?></td>
                           <td><?= $value->icon ?></td>
                           <td>
                              <a class="btn btn-neutral text-warning btn-sm" href="<?= base_url('menus/edit/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-pencil"></i> </a>
                              <a class="btn btn-neutral text-danger btn-sm" href="javascript:;" onclick="showModalDelete(this)" data-href="<?= base_url('menus/destroy/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-trash"></i></a>
                           </td>
                        </tr>
                        <?php endforeach ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-12">
            <div class="card">
               <div class="card-header border-bottom">
                  <h5 class="mb-0">Urutan Menu</h5>
               </div>
               <div class="card-body">
                  <div class="dd dd-menu mb-3" id="nestable3">
                     <ol class="dd-list">
                        <?php foreach ($sorting as $value): ?>
                           <li class="dd-item dd3-item" data-id="<?= encrypt_decrypt('encrypt',$value->id) ?>">
                                 <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content"><?= $value->title ?></div>
                                 <ol class="dd-list">
                             <?php foreach ($value->child as $value1): ?>
                                 <li class="dd-item dd3-item" data-id="<?= encrypt_decrypt('encrypt',$value1->id) ?>">
                                       <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content"><?= $value1->title ?></div> 
                                     </li>
                             <?php endforeach ?>
                                 </ol>
                            </li>
                        <?php endforeach ?>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<link rel="stylesheet" href="<?= base_url('assets/css/nestable.css') ?>">
<script src="<?= base_url('assets/js/nestable.js') ?>" type="text/javascript"></script>
<script>
   $("#dt").dataTable()
</script>
<script>
   $('.dd-menu').nestable().on('change',function(e){    
        var list = e.length ? e : $(e.target);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: `${base_url}menus/sorting`,
            data: {data:list.nestable('serialize')},
            success: function(response)
            {
               
            }
        })
    })
</script>