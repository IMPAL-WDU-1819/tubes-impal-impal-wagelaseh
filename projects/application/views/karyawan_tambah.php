<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Tambah Karyawan</title>
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
                        <li class="breadcrumb-item"><a href="<?=base_url('admin/lihat_karyawan');?>">Kelola Karyawan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Karyawan</li>
                    </ol>
                </nav>

                <h2 class="mb-4">Tambah Karyawan</h2>

                <?php if ($this->session->flashdata('tambah_id')) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal</strong> menambah data karyawan! ID Karyawan <strong>#<?=$this->session->flashdata('tambah_id');?></strong> tersebut sudah ada.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                <?php } ?>

                <div class="card col-sm-12 px-0">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group row">
                                <label for="id_karyawan" class="col-sm-4 col-form-label">ID Karyawan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="ID karyawan" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama karyawan" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-4 form-check form-check-inline">  
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="l" name="jenis_kelamin" value="L"> Laki-laki
                                    </label>      
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="p" name="jenis_kelamin" value="P"> Perempuan
                                    </label>   
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-4 form-check form-check-inline">  
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="admin" name="jabatan" value="admin" disabled> Admin
                                    </label>      
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="kasir" name="jabatan" value="kasir" checked> Kasir
                                    </label>   
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                            </div>

                            <div class=" row">
                                <div class="col-sm-4"></div>
                                <div class="col-md-6 offset-xs-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning">Reset</button>
                                    <a class="btn btn-danger" href="<?=base_url()?>admin/lihat_karyawan">Batal</a>
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