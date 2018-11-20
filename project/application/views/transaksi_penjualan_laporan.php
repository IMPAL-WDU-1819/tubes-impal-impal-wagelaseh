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
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb pl-0">
                        <li class="breadcrumb-item"><a href="#">Penjualan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan</li>
                    </ol>
                </nav>

                <h2 class="mb-4">Laporan Penjualan</h2>
           

            <?php if (!$penjualans) { ?>
                <div class="alert alert-warning" role="alert">
                    Tidak ada data penjualan!
                </div>
            <?php } else { ?>         
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th># ID Penjualan</th>
                                <th>Kasir</th>
                                <th>Tanggal Penjualan</th>
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

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>

</body>
</html>