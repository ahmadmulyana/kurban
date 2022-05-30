<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>child.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
						<h2 class="mb-4">Selamat datang di kurbandipelosok.com. Silahkan Register.</h2>
						<form class="row" method="POST" action="<?php echo base_url("action/do_regisfront");?>" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="nama_klien" class="form-label">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama_klien" name="nama_klien" aria-describedby="nama_klien" required>
							</div>
							<div class="mb-3">
								<label for="no_telp" class="form-label">Nomor Telepon</label>
								<input type="text" class="form-control" id="no_telp" name="no_telp" aria-describedby="no_telp" required>
								<small>Wajib diisi dengan nomor yang aktif dan terdaftar di whatsapp</small>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" aria-describedby="email">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password" aria-describedby="password" required>
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
						<div class="logreg">Sudah punya Akun, silahkan <a href="<?= site_url('website/login');?>">Login disini!</a></div>
					</div>
				</div>
			</div>
		</div>	
	</section>

</main>