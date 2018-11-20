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
                        <li class="breadcrumb-item active" aria-current="page">Transaksi Penjualan Barang</li>
                    </ol>
                </nav>

                <h2 class="mb-4">Penjualan Barang</h2>
                <?php if ($this->session->flashdata('simpan_error')) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal menyimpan penjualan!</strong> Terjadi kesalahan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card bg-light" id="keranjang">
                            <div class="card-header d-flex justify-content-between">
                                <form class="form-inline pr-3" id="form_tambah" method="POST" action="<?=base_url('kasir/keranjang_tambah/');?>">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-lg" name="id_barang" id="id_barang" placeholder="Masukkan ID Barang" aria-label="Masukkan ID Barang" required>
                                        <span class="input-group-btn">
                                            <button class="btn btn-success btn-lg" type="submit">Tambahkan</button>
                                        </span>
                                    </div>
                                </form>
                                
                                <a href="<?=base_url('kasir/keranjang_hapus_semua')?>" id="hapus_semua" class="btn btn-danger btn-lg">Hapus Semua</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="keranjang_tabel">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th># ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Sisa Stok</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>*</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $harga_total = 0; 
                                        if ($keranjang = $this->session->userdata('keranjang')) {
                                            foreach ($keranjang as $item) {
                                                $harga_total += $item['total'];
                                        ?>
                                            <tr>
                                                <td><?=$item['id_barang'];?></td>
                                                <td><?=$item['nama_barang'];?></td>
                                                <td><?=$item['stok_temp'];?></td>
                                                <td><?="Rp ".$item['harga_barang'];?></td>
                                                <td>
                                                    <form class="form-inline form_jumlah" data-id="<?=$item['id_barang'];?>" action="<?=base_url('kasir/keranjang_update_jumlah/'.$item['id_barang']);?>">
                                                        <input type="number" min="1" class="form-control w-100" name="jumlah" value="<?=$item['jumlah'];?>">
                                                    </form>
                                                </td>
                                                <td><?="Rp ".$item['total'];?></td>
                                                <td>
                                                    <a href="keranjang_hapus/<?=$item['id_barang'];?>" data-id="<?=$item['id_barang'];?>" class="btn btn_hapus_item" onclick="hapus_item(event, <?=$item['id_barang'];?>)">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php 
                                            } 
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 pl-0" id="keranjang_detail">
                        <form action="<?=base_url('kasir/keranjang_simpan');?>" method="POST"       >
                            <div class="list-group detail">
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Harga Total</span> 
                                    <input type="text" id="harga_total" name="harga_total" readonly class="form-control-plaintext" value="<?="Rp ".$harga_total.",-"?>">
                                </div>
                                <div class="list-group-item">
                                    <input type="number" class="form-control form-control-lg" <?=($harga_total > 0) ? '' : 'disabled';?> name="jumlah_bayar" id="jumlah_bayar" placeholder="Masukkan jumlah bayar" aria-label="Masukkan jumlah bayar" required>
                                </div>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>Kembalian</span> <span id="kembalian">Rp 0,-</span>
                                </div>
                                <div class="list-group-item d-flex ">
                                    <button type="submit" id="btn_selesai" class="btn btn-lg btn-primary w-100 disabled">SELESAI</button>
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
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function update_keranjang(res) {
            var keranjang = "";
            var harga_total = 0;
            res.map(function(item) {
                keranjang += `<tr>` +
                                `<td>${item.id_barang}</td>` +
                                `<td>${item.nama_barang}</td>` +
                                `<td>${item.stok_temp}</td>` +
                                `<td>Rp ${item.harga_barang},-</td>` +
                                `<td>` +
                                    `<form class="form-inline form_jumlah" data-id="${item.id_barang}" action="keranjang_update_jumlah/${item.jumlah}">` +
                                        `<input type="number" min="1" class="form-control w-100" name="jumlah" value="${item.jumlah}">` +
                                    `</form>` +
                                `</td>` +
                                `<td>Rp ${item.total},-</td>` +
                                `<td><a href="keranjang_hapus/${item.id_barang}" data-id="${item.id_barang}" class="btn btn_hapus_item" onclick="hapus_item(event, ${item.id_barang}).bind(this)">Hapus</td>` +
                                `</tr>`;
                harga_total += item.total;
            })
            $('#keranjang #keranjang_tabel tbody').html(keranjang);
            $('#keranjang_detail #harga_total').attr('value', `Rp ${harga_total},-`);
            $('#keranjang_detail span#kembalian').html(`Rp 0,-`);
            $('#keranjang_detail #jumlah_bayar').attr('value', '');
            if (harga_total > 0) {
                $('#keranjang_detail #jumlah_bayar').removeAttr('disabled');
            } else {
                $('#keranjang_detail #jumlah_bayar').attr('disabled', true);
            }
        }

        function hapus_item(e, id) {
            e.preventDefault();
            $.ajax({
                url: `keranjang_hapus/${id}`,
                dataType: "json",
                success: function(res) {
                    if (res.error) {
                        $('#keranjang .card-body').prepend(`<div class="alert alert-danger alert-dismissible" id="alert_error" role="alert"><strong>Terjadi kesalahan!</strong> ${res.error}.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`);
                    } else {
                        update_keranjang(res);
                    }
                }
            })
        }

        $(document).ready(function() {
            $('#keranjang #form_tambah').submit(function(e) {
                console.log('submiterd');
                e.preventDefault();
                $('.alert-danger').alert('close');
                $.ajax({
                    type: 'POST',
                    url: 'keranjang_tambah',
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(res) {
                        if (res.error) {
                            $('#keranjang .card-body').prepend(`<div class="alert alert-danger alert-dismissible" id="alert_error" role="alert"><strong>Terjadi kesalahan!</strong> ${res.error}.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`);
                        } else {
                            update_keranjang(res);
                        }
                    }
                });
                $(this).find('#id_barang').val('');
            });          
            
            $('#keranjang_tabel tbody').on('change', '.form_jumlah', function() {
                var form = $(this);
                var id = form.data('id');
                $('.alert-danger').alert('close');
                $.ajax({
                    url: `keranjang_update_jumlah/${id}`,
                    dataType: "json",
                    data: $(this).serialize(),
                    success: function(res) {
                        if (res.error) {
                            $('#keranjang .card-body').prepend(`<div class="alert alert-danger alert-dismissible" id="alert_error" role="alert"><strong>Terjadi kesalahan!</strong> ${res.error}.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>`);
                            form.children('.form-control').val(form.children('.form-control').attr('value'));
                        } else {
                            update_keranjang(res);
                        }
                    }
                })
            });
            $('#keranjang_tabel tbody').on('submit', '.form_jumlah', function(e) {
                e.preventDefault();
            });            
            
            $('#keranjang_detail #jumlah_bayar').on('keyup', function() {
                var jumlah_bayar = $(this).val();
                var harga_total = $('#keranjang_detail #harga_total').val().slice(3, -2);
                var kembalian = jumlah_bayar - harga_total;
                if (kembalian >= 0) {
                    $('#keranjang_detail #kembalian').html(`Rp ${kembalian},-`);
                    $('#keranjang_detail #btn_selesai').removeClass('disabled');
                } else {
                    $('#keranjang_detail #kembalian').html(`Rp 0,-`);
                }
            });
            $('#keranjang_detail form').on('submit', function(e) {
                var harga_total = parseInt($(this).find('#harga_total').attr('value').slice(3, -2));
                var jumlah_bayar = parseInt($(this).find('#jumlah_bayar').val());
                // console.log('harga total ' + harga_total);
                // console.log('jumlah bayar ' + jumlah_bayar);
                // console.log(harga_total > jumlah_bayar);
                if (harga_total > jumlah_bayar) {
                    e.preventDefault();
                } else {
                    console.log('OKE');
                }
            });
        })
    </script>

</body>
</html>