<!DOCTYPE html>
<html>
<head>
	<title>ACIM Store</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="<?=base_url()?>asset/css/main.css">
</head>
<body>

  <div class="container">
    <form class="form-signin col-sm-4" method="POST" action="<?=base_url('login/login');?>">
      <?php if ($this->session->userdata('login-gagal')) {?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>Login gagal!</strong> Masukan ID karyawan dan password dengan benar.
      </div>
      <?php } ?>

      <h2 class="form-signin-heading text-center">ACIM Login</h2>
      <label for="id_karyawan" class="sr-only">ID Karyawan</label>
      <input type="text" id="id_karyawan" name="id_karyawan" class="form-control" placeholder="ID" required autofocus>
      <label for="password" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>

  </div> <!-- /container -->

  <!-- Bootstrap JS -->
	<script type="text/javascript" src="<?=base_url()?>asset/js/popper.1.11.0.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>asset/js/bootstrap.min.js"></script>
</body>
</html>
