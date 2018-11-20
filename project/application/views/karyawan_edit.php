<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store :: Edit Karyawan</title>
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

                <h2 class="mb-4">Edit Karyawan <small>#<?=$karyawan[0]['id_karyawan'];?></small></h2>

                <div class="card col-sm-12 px-0">
                    <div class="card-body">
                        <form method="POST">

                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama Karyawan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama karyawan" value="<?=$karyawan[0]['nama']?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-4 form-check form-check-inline">  
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="l" name="jenis_kelamin" value="L" <?=($karyawan[0]['jenis_kelamin'] == 'L') ? 'checked' : ''; ?>> Laki-laki
                                    </label>      
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="p" name="jenis_kelamin" value="P" <?=($karyawan[0]['jenis_kelamin'] == 'P') ? 'checked' : ''; ?>> Perempuan
                                    </label>   
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=$karyawan[0]['email']?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" value="<?=$karyawan[0]['no_telp']?>" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required> <?=$karyawan[0]['alamat']?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jabatan</label>
                                <div class="col-sm-4 form-check form-check-inline">  
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="admin" name="jabatan" value="admin" <?=($karyawan[0]['jabatan'] == 'ADMIN') ? 'checked' : ''; ?> disabled> Admin
                                    </label>      
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" id="kasir" name="jabatan" value="kasir" <?=($karyawan[0]['jabatan'] == 'KASIR') ? 'checked' : ''; ?>> Kasir
                                    </label>   
                                </div>
                            </div>

                            <div class=" row">
                                <div class="col-sm-4"></div>
                                <div class="col-md-4 offset-xs-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a class="btn btn-danger" href="<?=base_url()?>admin/lihat_karyawan">Batal</a>
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
                    <h5 class="modal-title">Hapus Karyawan #<span class="detail font-bold"></span></h5>
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

    <script type="text/javascript">
    $(document).ready(function() {
        $('#modal_konfirmasi_hapus').on('show.bs.modal', function (e) {
            var btn = $(e.relatedTarget);

            var modal = $(this);
            modal.find('.modal-title span.detail').text(`${btn.data('id')}-${btn.data('nama')}`);
            modal.find('.modal-action').attr('href', "admin/hapus_karyawan/" + btn.data('id'));
        })
    })
  </script>
</body>
</html>