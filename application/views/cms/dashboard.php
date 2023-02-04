<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3">👋</span>Halo, <?= user()->fullname ?>!</h1>
            </div>
         </div>

      </div>
   </div>
</header>
<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
      <div class="row g-6 mb-6">
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Keahlian</span> <span class="h3 font-bold mb-0"><?= $skill ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle"><i class="bi bi-view-list"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Pengalaman Kerja</span> <span class="h3 font-bold mb-0"><?= $experience ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"><i class="bi bi-view-list"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Projek</span> <span class="h3 font-bold mb-0"><?= $project ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i class="bi bi-people"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">User</span> <span class="h3 font-bold mb-0"><?= $user ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-warning text-white text-lg rounded-circle"><i class="bi bi-person-gear"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Pengunjung Harian</span> <span class="h3 font-bold mb-0"><?= $day ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i class="bi bi-people"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Pengunjung Bulanan</span> <span class="h3 font-bold mb-0"><?= $month ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i class="bi bi-people"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col"><span class="h6 font-semibold text-muted text-sm d-block mb-2">Pengunjung Tahunan</span> <span class="h3 font-bold mb-0"><?= $year ?></span></div>
                     <div class="col-auto">
                        <div class="icon icon-shape bg-info text-white text-lg rounded-circle"><i class="bi bi-people"></i></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-header border-bottom">
            <h5 class="mb-0">List Rekomendasi</h5>
         </div>
         <div class="table-responsive">
            <table class="table table-hover table-nowrap">
               <thead class="table-light">
                  <tr>
                     <th scope="col">Nama Siswa</th>
                     <th scope="col">Rekomendasi</th>
                     <th scope="col">Nilai</th>
                  </tr>
               </thead>
               <tbody>
                  <?php if (count($lists)): ?>
                     <?php foreach ($lists as $value): ?>
                        <tr>
                           <td>
                              <a class="text-heading font-semibold" href="<?= base_url('students/show/'.encrypt_decrypt('encrypt', $value['student_id'])) ?>">
                                 <?= $value['student']['nis'] ?> - 
                                 <?= $value['student']['name'] ?>
                                    
                              </a>
                           </td>
                           <td><?= $value['alternative']['name'] ?></td>
                           <td><span class="badge badge-lg badge-dot">
                              <?= $value['value'] ?></span></td>
                        </tr>
                     <?php endforeach ?>
                  <?php else: ?>
                     <tr>
                        <td colspan="3" class="text-center">Belum ada data</td>
                     </tr>
                  <?php endif ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</main>