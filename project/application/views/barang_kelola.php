<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Data Barang</title>
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
                        <li class="breadcrumb-item active" aria-curent="page">Kelola Barang</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>Kelola Barang</h1>
                    <div class="">
                        <a href="<?=base_url('admin/tambah_barang');?>" class="btn btn-primary">Tambah Barang</a>
                        <a href="<?=base_url('admin/cetak_laporan_barang');?>" class="btn btn-secondary">Cetak Laporan</a>
                    </div>
                </div>
                <?php } else { ?>
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>Data Barang</h1>
                </div>
                <?php } ?>
                <!-- NOTIFICATION -->
                <!-- NOTIFICATION::hapus_barang -->
                <?php if ($this->session->flashdata('hapus_id')) { 
                        if ($this->session->flashdata('hapus_berhasil')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menghapus data barang <strong>#<?=$this->session->flashdata('hapus_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> menghapus data barang <strong>#<?=$this->session->flashdata('hapus_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!-- NOTIFICATION::tambah_barang -->
                <?php if ($this->session->flashdata('tambah_id')) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menambah data barang <strong>#<?=$this->session->flashdata('tambah_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>

                <!-- NOTIFICATION::edit_barang -->
                <?php if ($this->session->flashdata('edit_id')) { 
                        if (!$this->session->flashdata('edit_gagal')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> mengedit data barang <strong>#<?=$this->session->flashdata('edit_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> mengedit data barang <strong>#<?=$this->session->flashdata('edit_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!-- NOTIFICATION::tambah_stok_barang -->
                <?php if ($this->session->flashdata('tambah_stok_id')) { 
                        if ($this->session->flashdata('tambah_stok_berhasil')) { 
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil</strong> menambah stok barang <strong>#<?=$this->session->flashdata('tambah_stok_id');?>!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } else { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal</strong> menambah barang <strong>#<?=$this->session->flashdata('tambah_stok_id');?>!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php 
                        }
                    }
                ?>

                <!--/ NOTIFICATION -->


            <?php if (!$barangs) { ?>
                <div class="alert alert-warning" role="alert">
                    Tidak ada barang!
                </div>
            <?php } else { ?>         
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th># ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Tanggal Kadaluarsa</th>
                                <th>Supplier</th>
		                        <?php if ($this->session->userdata('jabatan') == 'ADMIN') { ?>
                                <th>*</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($barangs as $barang) { ?>
                            <tr>
                                <td><?=$barang['id_barang']; ?></td>
                                <td><?=$barang['nama_barang']; ?></td>
                                <td><?=$barang['stok_barang']; ?></td>
                                <td><?=$barang['harga_barang']; ?></td>
                                <td><?=$barang['tgl_kadaluarsa']; ?></td>
                                <td><?='#'.$barang['id_supplier'].'-'.$barang['nama_supplier'];?></td>
		                        <?php if ($this->session->userdata('jabatan') == 'ADMIN') { ?>
                                <td>
                                    <a href="#" role="button" class="popover-test text-danger" data-toggle="modal" data-target="#modal_konfirmasi_hapus" data-id="<?=$barang['id_barang']; ?>" data-nama="<?=$barang['nama_barang']; ?>">Hapus</a>
                                    <a href="<?=base_url('admin/edit_barang/' . $barang['id_barang']); ?>" class="text-warning">Edit</a>
                                    <a href="#" role="button" data-toggle="modal" data-target="#modal_tambah_stok" data-id="<?=$barang['id_barang']; ?>" data-nama="<?=$barang['nama_barang']; ?>">Tambah Stok</a>
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

    <!-- MODAL:: tambah stok barang -->
    <div class="modal fade" id="modal_tambah_stok">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Stok Barang #<span class="detail font-bold"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <form class="form-inline" id="form_tambah_stok" method="POST">
                    <label class="mr-sm-2">Jumlah Barang: </label>
                    <input type="number" class="form-control mb-2 mr-sm-2 mb-sm-0" name="jumlah_barang" id="jumlah_barang" placeholder="0" required>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary modal-action">Simpan</button>
            </div>
        </div>
    </div>

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal_konfirmasi_hapus').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);

            var modal = $(this);
            modal.find('.modal-title span.detail').text(`${btn.data('id')}-${btn.data('nama')}`);
            modal.find('.modal-action').attr('href', `<?=base_url()?>admin/hapus_barang/${btn.data('id')}`);
        });
        $('#modal_tambah_stok').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);
            var id = btn.data('id');
            var nama = btn.data('nama');
            var modal = $(this);
            var form = modal.find('#form_tambah_stok');
            form.attr('action', "<?=base_url('admin/tambah_stok_barang/') ?>" + id);
            modal.find('.modal-title span.detail').text(`${id}-${nama}`); 
            modal.find('.modal-action').on('click', function() { form.submit(); });
        
        })
    })
  </script>
</body>
</html>