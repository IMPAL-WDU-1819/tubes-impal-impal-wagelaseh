<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Resi Pembelian</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?=base_url()?>asset/css/main.css">
</head>
<body>
   
            
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="list-group resi">
                <?php if (!$penjualan_detail) { ?>
                    <div class="alert alert-warning" role="alert">
                        Terjadi kesalahan!
                    </div>
                <?php 
                    } else { 
                        $harga_total = 0;
                        foreach ($penjualan_detail as $item) {
                            $harga_total = $harga_total + $item['total'];
                ?> 
                    <div class="list-group-item">
                        <span class=""><?='#'.$item['id_barang'].' '.$item['nama_barang'].' '.$item['jumlah'].'@'.$item['harga_barang'];?></span>
                        <span class=""><?='Rp '.$item['total'].',-'?></span>
                    </div>
                <?php } ?>
                    <div class="list-group-item total">
                        <span class="">Total</span>
                        <h3 class="font-weight-bold"><?='Rp '.$harga_total.',-'?></h3>
                    </div>
                    <div class="list-group-item">
                        <span class="">Bayar</span>
                        <h4 class=""><?='Rp '.$bayar.',-'?></h4>
                    </div>
                    <div class="list-group-item">
                        <span class="">Kembalian</span>
                        <h4 class="font-weight-bold"><?='Rp '.($bayar-$harga_total).',-'?></h4>
                    </div>
                <?php } ?>
                <div class="text-center"><a href="<?=base_url()?>">[Kembali]</a></div>
                </div>
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