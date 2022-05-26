<main class="details">

	<section class="profiles">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<img src="<?= base_url("assets/images/profile/");?>man.png" class="w-100">
				</div>
				<div class="col-md-10">
					<h2>Detail Profile</h2>
					<div class="row produk">
						<div class="col-md-12">
							<form class="row g-3">
								<div class="col-md-6">
									<label for="nama" class="form-label">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama">
								</div>
								<div class="col-md-6">
									<label for="nomor" class="form-label">Nomor Telepon</label>
									<input type="nomor" class="form-control" id="nomor">
								</div>
								<div class="col-md-6">
									<label for="inputEmail4" class="form-label">Email</label>
									<input type="email" class="form-control" id="inputEmail4">
								</div>
								<div class="col-md-6">
									<label for="inputPassword4" class="form-label">Password</label>
									<input type="password" class="form-control" id="inputPassword4">
								</div>
								<div class="col-12">
									<label for="inputAddress" class="form-label">Address</label>
									<input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
								</div>
								<div class="col-md-6">
									<label for="inputCity" class="form-label">City</label>
									<input type="text" class="form-control" id="inputCity">
								</div>
								<div class="col-md-4">
									<label for="inputState" class="form-label">State</label>
									<select id="inputState" class="form-select">
										<option selected>Choose...</option>
										<option>...</option>
									</select>
								</div>
								<div class="col-md-2">
									<label for="inputZip" class="form-label">Zip</label>
									<input type="text" class="form-control" id="inputZip">
								</div>
								<div class="col-12">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
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