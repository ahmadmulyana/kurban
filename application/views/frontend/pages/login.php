<main class="details">
	
	<section>
		<div class="dalil">
			<div class="row no-gutter">
				<div class="col-md-6" style="background: url(<?= base_url('assets/images/banner/');?>child.jpg); background-size: cover; background-position: center center; background-repeat: no-repeat;">
				</div>
				<div class="col-md-6 bg-login-white">
					<div class="p-5">
						<h2 class="mb-4">Selamat datang di kurbandipelosok.com. Silahkan login.</h2>
						<?php if($this->session->flashdata('success')){ ?>
							<div class="alert alert-success" id="success-alert">
								<a href="" class="close" data-dismiss="alert">&times;</a>
								<strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
							</div>
						<?php }else if($this->session->flashdata('error')){  ?>
							<div class="alert alert-danger" id="error-alert">
								<a href="" class="close" data-dismiss="alert">&times;</a>
								<strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php } ?>
						<form class="row" method="POST" action="<?= site_url("action/do_loginfront");?>" enctype="multipart/form-data">
							<div class="mb-3">
								<label for="no_telp" class="form-label">Nomor Telepon</label>
								<input type="text" class="form-control" name="no_telp" id="no_telp" aria-describedby="no_telp">
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" name="password" id="password" aria-describedby="no_telp">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
						<div class="logreg">Belum punya Akun, silahkan <a href="<?= site_url('website/register');?>">Register disini!</a></div>
					</div>
				</div>
			</div>
		</div>	
	</section>

</main>