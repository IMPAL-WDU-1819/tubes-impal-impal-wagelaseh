<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Tambah Barang</title>
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
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="<?=base_url('admin/lihat_barang');?>">Kelola Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Barang</li>
                    </ol>
                </nav>

                <h2 class="mb-4">Tambah Barang</h2>

                <?php if ($this->session->flashdata('tambah_id')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal</strong> menambah data barang ! ID Barang <strong>#<?=$this->session->flashdata('tambah_id');?></strong> tersebut sudah ada.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <div class="card col-sm-12 px-0">
                    <div class="card-body">
                        <form method="POST">

                            <div class="form-group row">
                                <label for="id_barang" class="col-sm-4 col-form-label">ID Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="ID barang" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama barang" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga_barang" class="col-sm-4 col-form-label">Harga  Barang</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="harga_barang" id="harga_barang" placeholder="Harga barang" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_kadaluarsa" class="col-sm-4 col-form-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tgl_kadaluarsa" id="tgl_kadaluarsa" placeholder="Tanggal kadaluarsa" required>
                                </div>
                            </div>
                            <?php if ($suppliers) { ?>
                            <div class="form-group row">
                                <label for="supplier" class="col-sm-4">Supplier</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="supplier" name="id_supplier">
                                        <?php foreach ($suppliers as $supplier) { ?>
                                        <option value="<?=$supplier['id_supplier'];?>"><?='#'.$supplier['id_supplier'].'-'.$supplier['nama_supplier'];?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php } ?>
                            <div class=" row">
                                <div class="col-sm-4"></div>
                                <div class="col-md-4 offset-xs-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-danger" href="<?=base_url()?>admin/lihat_barang">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                <a href="" class="btn btn-danger modal-action">Ya</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            </div>
        </div>
    </div>

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    
  </script>
</body>
</html>