<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
               <div class="hstack gap-2 justify-content-sm-end">
                  <!-- <a href="<?= base_url('visitors/create') ?>" class="btn btn-sm btn-primary"><span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span><span>Tambah</span></a> -->
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
                     <th scope="col" width="10%">IP</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col">Jumlah Hit</th>
                     <th scope="col">Terakhir Online</th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</main>

<script>
	$(document).ready(function(){
		loadData()
	})

	function loadData() {
    dt = $("#dt").DataTable({
        "lengthChange": true,
        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "destroy": true,
        "ajax": {
            "url": base_url + "visitors",
            "type": "POST",
            "headers": {
                "X-CSRF-TOKEN": '<?= $this->security->get_csrf_hash() ?>'
            }
        },
        "columnDefs": [
            {
                targets: [-1, 0],
                orderable: false
            },
            {
                targets: [-1, 0],
                class: 'text-nowrap text-center'
            },
        ],
        "order": [],
    });
}

</script>
