<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Edit Barang</title>
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Barang</li>
                    </ol>
                </nav>

                <h2 class="mb-4">Edit Barang <small>#<?=$barang[0]['id_barang'];?></small></h2>

                <div class="card col-sm-12 px-0">
                    <div class="card-body">
                        <form method="POST">

                            <div class="form-group row">
                                <label for="nama_barang" class="col-sm-4 col-form-label">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama barang" value="<?=$barang[0]['nama_barang']?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga_barang" class="col-sm-4 col-form-label">Harga  Barang</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="harga_barang" id="harga_barang" placeholder="Harga barang" value="<?=$barang[0]['harga_barang']?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stok_barang" class="col-sm-4 col-form-label">Stok  Barang</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="stok_barang" id="stok_barang" placeholder="Stok barang" value="<?=$barang[0]['stok_barang']?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tgl_kadaluarsa" class="col-sm-4 col-form-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" name="tgl_kadaluarsa" id="tgl_kadaluarsa" placeholder="Tanggal kadaluarsa" value="<?=$barang[0]['tgl_kadaluarsa']?>" required>
                                </div>
                            </div>

                            <?php if ($suppliers) { ?>
                            <div class="form-group row">
                                <label for="supplier" class="col-sm-4">Supplier</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="supplier" name="id_supplier">
                                        <?php foreach ($suppliers as $supplier) { ?>
                                        <option <?=($supplier['id_supplier'] == $barang[0]['id_supplier']) ? 'selected' : '';?> value="<?=$supplier['id_supplier'];?>"><?='#'.$supplier['id_supplier'].'-'.$supplier['nama_supplier'];?></option>
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
    
  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>

</body>
</html>