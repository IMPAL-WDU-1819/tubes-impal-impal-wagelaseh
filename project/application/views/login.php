<!DOCTYPE html>
<html lang="en">
<head>
	<title>ACIM Store</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?=base_url()?>asset/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>asset/css/main-login.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?=base_url()?>asset/images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="POST" action="<?=base_url('login/login');?>">
					<?php if ($this->session->userdata('login-gagal')) {?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<strong>Login gagal!</strong> Masukan ID dan password dengan benar.
						</div>
					<?php } ?>
					<span class="login100-form-title">
						ACIM Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan ID yang benar">
						<input id="id_karyawan" name="id_karyawan" class="input100" type="text" placeholder="ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Masukkan password yang benar">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<script src="<?=base_url()?>asset/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>asset/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>asset/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>asset/vendor/select2/select2.min.js"></script>
	<script src="<?=base_url()?>asset/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="<?=base_url()?>asset/js/main.js"></script>
</body>
</html>