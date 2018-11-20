<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Data Supplier</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>asset/css/main.css">
</head>
<body>

    <!-- NAVBAR -->
    <?php $this->load->view('partial/navbar.php'); ?>
    <!--/ NAVBAR -->

    <div class="container-fluid">
        <div class="row">
            <!-- SIDEBAR -->
            <?php $this->load->view('partial/sidebar.php'); ?>
            <!--/ SIDEBAR -->

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3 pl-4" role="main">

                <?php if ($this->session->userdata('jabatan') == 'ADMIN') { ?>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb pl-0">
                            <li class="breadcrumb-item active" aria-curent="page">Kelola Supplier</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h1>Kelola Supplier</h1>
                        <a href="<?=base_url('admin/tambah_supplier');?>" class="btn btn-primary">Tambah Supplier</a>
                    </div>
                <?php } else { ?>
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h1>Data Supplier</h1>
                    </div>
                <?php } ?>
                
            <!-- NOTIFICATION -->
                <!-- NOTIFICATION::hapus_supplier -->
                <?php if ($this->session->flashdata('hapus_id')) { 
                        if ($this->session->flashdata('hapus_berhasil')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menghapus data supplier <strong>#<?=$this->session->flashdata('hapus_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> menghapus data supplier <strong>#<?=$this->session->flashdata('hapus_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!-- NOTIFICATION::tambah_supplier -->
                <?php if ($this->session->flashdata('tambah_id')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menambah data supplier <strong>#<?=$this->session->flashdata('tambah_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>

                <!-- NOTIFICATION::edit_supplier -->
                <?php if ($this->session->flashdata('edit_id')) { 
                        if (!$this->session->flashdata('edit_gagal')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> mengedit data supplier <strong>#<?=$this->session->flashdata('edit_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> mengedit data supplier <strong>#<?=$this->session->flashdata('edit_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>
                <!--/ NOTIFICATION -->


            <?php if (!$suppliers) { ?>
                <div class="alert alert-warning" role="alert">
                    Tidak ada supplier!
                </div>
            <?php } else { ?>         
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th># ID Supplier</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
		                        <?php if ($this->session->userdata('jabatan') == 'ADMIN') { ?>
                                <th>*</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($suppliers as $supplier) { ?>
                            <tr>
                                <td><?=$supplier['id_supplier']; ?></td>
                                <td><?=$supplier['nama_supplier']; ?></td>
                                <td><?=$supplier['alamat']; ?></td>
                                <td><?=$supplier['no_telp']; ?></td>
		                        <?php if ($this->session->userdata('jabatan') == 'ADMIN') { ?>
                                <td>
                                    <a href="#" role="button" class="popover-test text-danger" data-toggle="modal" data-target="#modal_konfirmasi_hapus" data-id="<?=$supplier['id_supplier']; ?>" data-nama="<?=$supplier['nama_supplier']; ?>">Hapus</a>
                                    <a href="<?=base_url('admin/edit_supplier/' . $supplier['id_supplier']); ?>" class="text-warning">Edit</a>
                                </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            </main>
        </div>
    </div>

  <!-- MODAL:: konfirmasi hapus -->
    <div class="modal fade" id="modal_konfirmasi_hapus">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Barang #<span class="detail font-bold"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin akan menghapus data ini?</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-danger modal-action">Ya</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal_konfirmasi_hapus').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);

            var modal = $(this);
            modal.find('.modal-title span.detail').text(`${btn.data('id')}-${btn.data('nama')}`);
            modal.find('.modal-action').attr('href', "hapus_supplier/" + btn.data('id'));
        })
    })
    </script>
</body>
</html>