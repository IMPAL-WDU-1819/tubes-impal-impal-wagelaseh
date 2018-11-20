<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Laporan Pembelian</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>asset/css/main.css">
</head>
<body>
   
            
    <div class="container-fluid print-area" id="print-area">
        <div class="row">
            <div class="col-sm-6">
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
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="text-center no-print"><a href="<?=base_url()?>">[Kembali]</a></div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            window.print();
        })
    </script>
</body>
</html>