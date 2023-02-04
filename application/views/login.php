
<!doctype html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover">
      <meta name="color-scheme" content="dark light">
      <title><?= web()->name.' || '.$title ?></title>
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/main.css">
      <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/utilities.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <script defer="defer" data-domain="webpixels.works" src="https://plausible.io/js/script.js"></script>
   </head>
   <body>
      <div>
         <div class="px-5 py-5 p-lg-0 min-h-screen bg-surface-secondary d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center">
               <div class="col-12 col-md-9 col-lg-7 ">
                  <div class="py-lg-16 px-lg-20">
                     <div class="row justify-content-center">
                        <div class="col-lg-10 col-md-9 col-xl-6">
                           <div class="mt-10 mt-lg-5 mb-6 d-lg-block">
                              <!-- <span class="d-inline-block d-lg-block h1 mb-4 mb-lg-6 me-3">👋</span> -->
                              <h1 class="ls-tight font-bolder h2">Selamat Datang!</h1>
                           </div>
                           <?php if ($this->session->flashdata('alert')): ?>
                              <?= $this->session->flashdata('alert'); ?>
                           <?php endif ?>
                           <form class="auth-form login-form" method="POST">         
                              <div class="email mb-3">
                                 <label class="sr-only" for="username">Username</label>
                                  <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?= $this->security->get_csrf_hash();?>" />
                                 <input id="username" name="username" value="<?= set_value('username') ?>" type="text" class="form-control username" placeholder="Username" required="required">
                              </div><!--//form-group-->
                              <div class="password mb-3">
                                 <label class="sr-only" for="password">Password</label>
                                 <input id="password" name="password" type="password" class="form-control password" placeholder="Password" required="required">
                              </div><!--//form-group-->
                              <div class="text-center">
                                 <button type="submit" class="btn btn-primary w-100 theme-btn mx-auto">Masuk</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="position-lg-absolute bottom-0 end-0 my-8 mx-12 text-center text-lg-end"><small>Already have an account?</small> <a href="/pages/authentication/side-register.html" class="text-warning text-sm font-semibold">Sign up</a></div> -->
               </div>
            </div>
         </div>
      </div>
      <script src="<?= base_url('assets') ?>/js/main.js"></script>
   </body>
</html>