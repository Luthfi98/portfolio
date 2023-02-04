<!doctype html>
<html lang="en" data-theme="light">
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
      <meta name="color-scheme" content="dark light">
      <title><?= web()->name.' || '.$title ?></title>
      <link rel="icon" href="<?= base_url(web()->icon) ?>" type="image/x-icon">
      <link rel="shortcut icon" href="<?= base_url(web()->icon) ?>" type="image/x-icon">
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/main.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/utilities.css">
      <link rel="preconnect" href="https://fonts.googleapis.com/">
      <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
     <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8"></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
     <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript" charset="utf-8"></script>
     <script>
        var base_url = `<?= base_url()?>`;
     </script>
   </head>
   <body>
      <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
         <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg scrollbar" id="sidebar">
            <div class="container-fluid">
               <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button> 
               <a class="navbar-brand d-inline-block py-lg-2 mb-lg-5 px-lg-6 me-0" href="<?= base_url('dashboard') ?>">
                  <h4><img src="<?= base_url(web()->logo) ?>" width="50px" alt="Logo"><?= web()->name ?></h4>
                  <!-- <img src="<?= base_url(web()->logo) ?>" width="150px" alt="Logo"> -->
               </a>
               <div class="navbar-user d-lg-none">
                  <div class="dropdown">
                     <a href="#" id="sidebarAvatar" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar-parent-child"><img alt="..." src="<?= base_url('assets') ?>/img/people/img-profile.jpg" class="avatar avatar- rounded-circle"> <span class="avatar-child avatar-badge bg-success"></span></div>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sidebarAvatar">
                        <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Masuk Sebagai :  </span> <span class="d-block text-heading font-semibold"><?= user()->fullname ?></span></div>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?= base_url('account') ?>"><i class="bi bi-person"></i> Akun</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-in-left"></i> Keluar</a>
                     </div>
                  </div>
               </div>
               <div class="collapse navbar-collapse" id="sidebarCollapse">
                  <ul class="navbar-nav">
                     <?php foreach (getMenu() as $parent): ?>
                        <?php if (count($parent->child) == 0): ?>
                              <li class="nav-item"><a class="nav-link py-2" orihref="<?= encrypt_decrypt('encrypt', $parent->url) ?>" href="<?= base_url($parent->url) ?>"><i class="<?= $parent->icon ?>"></i> <?= $parent->title ?></a></li>
                        <?php else: ?>
                              <li class="nav-item">
                                 <a class="nav-link" id="<?= encrypt_decrypt('encrypt', $parent->id) ?>"  href="#submenu-<?= encrypt_decrypt('encrypt', $parent->id) ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="submenu-<?= encrypt_decrypt('encrypt', $parent->id) ?>"><i class="<?= $parent->icon ?>"></i> <?= $parent->title ?></a>
                                 <div class="collapse" id="submenu-<?= encrypt_decrypt('encrypt', $parent->id) ?>">
                                    <ul class="nav nav-sm flex-column">
                                       <?php foreach ($parent->child as $child): ?>
                                          <li class="nav-item"><a href="<?= base_url($child->url) ?>" 
                                             orihref="<?= encrypt_decrypt('encrypt', $child->url) ?>"
                                             parent="<?= encrypt_decrypt('encrypt', $parent->id) ?>"
                                             class="nav-link"><?= $child->title ?></a></li>
                                       <?php endforeach ?>
                                    </ul>
                                 </div>
                              </li>                           
                        <?php endif ?>
                     <?php endforeach ?>
                  </ul>
                  <!-- <hr class="navbar-divider my-4 opacity-70">
                  <ul class="navbar-nav">
                     <li><span class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide">Resources</span></li>
                     <li class="nav-item"><a class="nav-link py-2" href="docs/index.html"><i class="bi bi-code-square"></i> Documentation</a></li>
                     <li class="nav-item"><a class="nav-link py-2 d-flex align-items-center" href="https://webpixels.io/themes/clever-admin-dashboard-template/releases" target="_blank"><i class="bi bi-journals"></i> <span>Changelog</span> <span class="badge badge-sm bg-soft-success text-success rounded-pill ms-auto">v1.0.0</span></a></li>
                  </ul> -->
                  <div class="mt-auto"></div>
                  <div class="my-4 px-lg-6 position-relative">
                     <div class="dropup w-full">
                        <a class="btn-primary d-flex w-full py-3 ps-3 pe-4 align-items-center shadow shadow-3-hover rounded-3" href="<?= base_url('settings') ?>"><span class="me-3 bi bi-gear"> </span><span class="flex-fill text-start text-sm font-semibold">Pengaturan</span><span><i class="bi bi-chevron-expand text-white text-opacity-70"></i></span></a>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <div class="flex-lg-1 h-screen overflow-y-lg-auto">
            <nav class="navbar navbar-light position-lg-sticky top-lg-0 d-none d-lg-block overlap-10 flex-none bg-white border-bottom px-0 py-3" id="topbar">
               <div class="container-fluid">
                  <div class="hstack gap-2"></div>
                  <div class="navbar-user d-none d-sm-block">
                     <div class="hstack gap-3 ms-4">
                        <div class="dropdown">
                           <a class="d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                              <div>
                                 <!-- <div class="avatar avatar-sm bg-warning rounded-circle text-white"></div> -->
                              </div>
                              <div class="d-none d-sm-block ms-3"><span class="h6"><?= user()->username ?></span></div>
                              <div class="d-none d-md-block ms-md-2"><i class="bi bi-chevron-down text-muted text-xs"></i></div>
                           </a>
                           <div class="dropdown-menu dropdown-menu-end">
                              <div class="dropdown-header"><span class="d-block text-sm text-muted mb-1">Masuk Sebagai :  </span> <span class="d-block text-heading font-semibold"><?= user()->fullname ?></span></div>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?= base_url('account') ?>"><i class="bi bi-person"></i> Akun</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="bi bi-box-arrow-in-left"></i> Keluar</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </nav>
            <?= $contents ?>
         </div>
      </div>
       <div class="modal fade" id="modal-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
             <div class="modal-body text-center">
               <span style="font-size: 20px; font-weight: bold;">
                  Yakin ingin menghapus data ?
               </span>
               <p>Data yang sudah dihapus tidak bisa dikembalikan lagi.</p>
             </div>
             <div class="modal-footer text-center">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
               <a href="#" title="Hapus Data" class="btn btn-primary" id="btn-submit-delete">Ya</a>
             </div>
           </div>
         </div>
       </div>      
      <script src="<?= base_url('assets') ?>/js/main.js"></script>
      <script>
      window.setTimeout(function(){
          $('.alert').fadeTo(500, 0).slideUp(500,function(){
            $(this).remove();
          });
        }, 3000);

         function showModalDelete(dt)
         {
            var href = $(dt).data('href');

            $("#modal-delete").modal('show')
            $("#btn-submit-delete").attr('href', href);

         }

         // Get the current URL
         var currentUrl = `<?= encrypt_decrypt('encrypt',$this->uri->segment(1))?>`;
         // console.log(currentUrl)
         // Select all menu items
         var menuItems = $('.navbar-nav a');

         var active = $(menuItems).filter(function() {
             return $(this).attr('orihref') == currentUrl;
         });

         var parent_id = active.attr('parent');
            $(`#${parent_id}`).addClass('active').siblings().removeClass('active')
            $(`#submenu-${parent_id}`).addClass('show').siblings().removeClass('show')
         if (parent_id) {
            active.addClass('font-bold').siblings().removeClass('font-bold'); 
         }else{
            active.addClass('active').siblings().removeClass('active'); 
         }
    </script>
   </body>
</html>