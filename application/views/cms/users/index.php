<header>
   <div class="container-fluid">
      <div class="border-bottom pt-6">
         <div class="row align-items-center">
            <div class="col-sm col-12">
               <h1 class="h2 ls-tight"><span class="d-inline-block me-3"></span><?= isset($breadcrumb) ? $breadcrumb : $title ?></h1>
            </div>
            <div class="col-sm-auto col-12 mt-4 mt-sm-0">
               <div class="hstack gap-2 justify-content-sm-end">
                  <a href="<?= base_url('users/create') ?>" class="btn btn-sm btn-primary"><span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span><span>Tambah</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>
<main class="py-6 bg-surface-secondary">
   <div class="container-fluid">
	    <div class="card shadow-sm mb-5">
		<?php if ($this->session->flashdata('alert')): ?>
		   <?= $this->session->flashdata('alert'); ?>
		<?php endif ?>
		 <div class="card-header border-bottom">
            <h5 class="mb-0">Data <?= $title ?></h5>
         </div>
		    <div class="card-body">
			    <div class="table-responsive">
			        <table id="example" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th class="cell" width="1%">No</th>
								<th class="cell">Nama Lengkap</th>
								<th class="cell">Email</th>
								<th class="cell">Username</th>
								<th class="cell" width="10%">#</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($users as $value): ?>
							<tr>
								<td class="cell"><?= $no++ ?>.</td>
								<td class="cell"><?= $value->fullname ?></td>
								<td class="cell"><?= $value->email ?></td>
								<td class="cell"><?= $value->username ?></td>
								<td class="cell">
									<a class="btn btn-neutral text-info btn-sm" href="<?= base_url('users/show/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-eye"></i> </a>
	                        <a class="btn btn-neutral text-warning btn-sm" href="<?= base_url('users/edit/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-pencil"></i> </a>
	                        <a class="btn btn-neutral text-danger btn-sm" href="javascript:;" onclick="showModalDelete(this)" data-href="<?= base_url('users/destroy/'.encrypt_decrypt('encrypt',$value->id)) ?>"><i class="bi bi-trash"></i></a>
								</td>
							</tr>
								
							<?php endforeach ?>

						</tbody>
					</table>
		        </div><!--//table-responsive-->
		       
		    </div><!--//app-card-body-->		
		</div><!--//app-card-->
	</div>
</main>

	<script>
		$(document).ready(function () {
		    $('#example').DataTable();
		});
	</script>