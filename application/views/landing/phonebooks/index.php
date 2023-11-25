<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
     <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
     <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js" type="text/javascript" charset="utf-8"></script>
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
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                   <?php if ($this->session->flashdata('alert')): ?>
                      <?= $this->session->flashdata('alert'); ?>
                   <?php endif ?>
                   <div class="card-header border-bottom">
                      <h5 class="mb-0">Data <?= $title ?> <a href="<?= base_url('phonebooks/create') ?>" class="btn btn-sm btn-primary float-right"><span>Tambah</span></a></h5>
                   </div>
                   <div class="table-responsive card-body">

                      <table width="100%" class="table table-hover table-nowrap table-bordered" id="dt">
                         <thead>
                            <tr>
                               <th scope="col" width="1%">No.</th>
                               <th scope="col">Nama</th>
                               <th scope="col">Nomer</th>
                               <th scope="col">Grup</th>
                               <th width="10%">#</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php 
                            $no =1;
                            foreach ($phonebook as $value): ?>
                            <tr>
                               <td><?= $no++ ?></td>
                               <td><?= $value->name ?></td>
                               <td><?= $value->number ?></td>
                               <td><?= $value->group ?></td>
                               <td class="text-nowrap">
                                  <a class="btn btn-warning btn-sm" href="<?= base_url('Phonebooks/edit/'.encrypt_decrypt('encrypt',$value->id)) ?>">Ubah </a>
                                  <a class="btn btn-danger btn-sm" href="javascript:;" onclick="showModalDelete(this)" data-name="<?= $value->name ?>" data-href="<?= base_url('Phonebooks/destroy/'.encrypt_decrypt('encrypt',$value->id)) ?>">Hapus </a>
                               </td>
                            </tr>
                            <?php endforeach ?>
                         </tbody>
                      </table>
                   </div>
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->
</section>

<script type="text/javascript">
    function showModalDelete(_data){
        var href = $(_data).data('href')
        var name = $(_data).data('name')
        if (confirm(`Apakah Anda yakin ingin menghapus kontak ${name} ?`)) {
            window.location.href=href;
        }
    }

    $("#dt").DataTable()
</script>