<nav class="col-sm-3 col-md-2 d-none d-sm-block sidebar">
    <ul class="nav nav-pills flex-column">
      	<li class="nav-item">
        	<span class="nav-link disabled">Barang</span>
      	</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'lihat_barang' || $this->uri->segment(2) == FALSE) ? 'active' : ''; ?>" href="<?=base_url(strtolower($this->session->userdata('jabatan'))) ?>">
				<?=($this->session->userdata('jabatan') == 'ADMIN') ? "Kelola" : "Data" ?> Barang 
			</a>
		</li>
	</ul>  
	<?php if($this->session->userdata('jabatan') == 'ADMIN') { ?>
	<ul class="nav nav-pills flex-column">
		<li class="nav-item">
			<span class="nav-link disabled">Supplier</span>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'lihat_supplier') ? 'active' : ''; ?>" href="<?=base_url(strtolower($this->session->userdata('jabatan')) . '/lihat_supplier'); ?>">
				Kelola Supplier  
			</a>
		</li>
	</ul>  
	<?php } ?>
	<ul class="nav nav-pills flex-column">
		<li class="nav-item">
			<span class="nav-link disabled">Karyawan</span>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'lihat_karyawan') ? 'active' : ''; ?>" href="<?=base_url(strtolower($this->session->userdata('jabatan')) . '/lihat_karyawan'); ?>">
				<?=($this->session->userdata('jabatan') == 'ADMIN') ? "Kelola" : "Data" ?> Karyawan 
			</a>
		</li>
	</ul>  
	<?php if ($this->session->userdata('jabatan') == 'KASIR') { ?>
	<ul class="nav nav-pills flex-column">
		<li class="nav-item">
			<span class="nav-link disabled">Penjualan</span>
		</li>
		<li class="nav-item">
			<a class="nav-link <?=($this->uri->segment(2) == 'penjualan') ? 'active' : ''; ?>" href="<?=base_url(strtolower($this->session->userdata('jabatan')) . '/penjualan'); ?>">Transaksi Penjualan </a>
		</li>
	</ul>
	<?php } ?>

	

</nav>
