<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Tambah Supplier</title>
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
                        <li class="breadcrumb-item"><a href="<?=base_url('admin/lihat_supplier');?>">Kelola Supplier</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Supplier</li>
                    </ol>
                </nav>

                <h2 class="mb-4">Tambah Supplier</h2>

                <div class="card col-sm-12 px-0">
                    <div class="card-body">
                        <form method="POST">

                            <!-- <div class="form-group row">
                                <label for="id_supplier" class="col-sm-4 col-form-label">ID Supplier</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_supplier" id="id_supplier" placeholder="ID supplier" required>
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="nama_supplier" class="col-sm-4 col-form-label">Nama Supplier</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_supplier" id="nama_supplier" placeholder="Nama supplier" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor telepon" required>
                                </div>
                            </div>

                            <div class=" row">
                                <div class="col-sm-4"></div>
                                <div class="col-md-6 offset-xs-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <a class="btn btn-danger" href="<?=base_url()?>admin/lihat_supplier">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
  </script>
</body>
</html>