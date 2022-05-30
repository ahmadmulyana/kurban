<main class="details">

	<section class="profiles">
		<div class="container">
			<div class="row">
				<div class="col-md-2 profilemobile">
					<img src="<?= base_url("assets/images/profile/");?>man.png" class="w-100">
				</div>
				<div class="col-md-10">
					<h2>Detail Profile</h2>
					<div class="row produk">
						<div class="col-md-12">
							<form class="row g-3" method="POST" action="<?php echo base_url("profile/update_profile");?>" enctype="multipart/form-data">
								<?php foreach($getProfile as $row) { ?>
								<div class="col-md-6">
									<label for="nama_klien" class="form-label">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama_klien" name="nama_klien" value="<?= $row->nama_klien ;?>">
								</div>
								<div class="col-md-6">
									<label for="no_telp" class="form-label">Nomor Telepon</label>
									<input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $row->no_telp ;?>">
								</div>
								<div class="col-md-6">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" name="email" value="<?= $row->email ;?>">
								</div>
								<div class="col-6">
									<label for="alamat" class="form-label">Alamat</label>
									<textarea class="form-control" id="alamat" name="alamat"><?= $row->alamat ;?></textarea>
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary">Update</button>
								</div>
								<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<h2 class="mb-3">History Order</h2>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Tanggal Order</th>
								<th scope="col">Produk</th>
								<th scope="col">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>24 Mei 2022</td>
								<td>#KURBANdiPelosok Kambing</td>
								<td><span class="badge bg-success">Paid</span></td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>24 Mei 2022</td>
								<td>#KURBANdiKota</td>
								<td><span class="badge bg-success">Paid</span></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

</main>