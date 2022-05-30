<main class="details">
	<?php foreach($getkategori as $row) { ?>
	<section class="donate-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12 mb-5">
					<h1 class="mb-3">#<?= $row->kategori;?></h1>
					<img src="<?= base_url('assets/images/banner/');?>child.jpg" class="w-100">
				</div>
				<div class="col-md-4">
					<img src="<?= base_url('assets/images/background/' . $row->gambar);?>" class="w-100">
				</div>
				<div class="col-md-8">
					<em><blockquote>&ldquo;Ada yang setiap saat bisa makan daging, ada yang Idul Adhanya selalu makan daging, ada pula yang seumur-umur belum pernah mencicipi daging.&rdquo;</blockquote></em>
					<h2>Kenapa harus #<?= $row->kategori;?>?</h2>
					<h4><?= $row->prioritas;?></h4>
					<?= $row->deskripsi;?>
					<div class="row produk">
						<?php foreach($getproduk as $daftar) { ?>
						<div class="col-md-4">
							<div class="card">
								<div class="card-body">
									<img src="<?= base_url('assets/images/produk/' . $daftar->gambar);?>" class="w-100">
									<div class="detail-content">
										<h2><?= $daftar->nama_produk;?></h2>
										<h4>Rp. <?= number_format($daftar->harga)?></h4>
										<form method="POST" action="<?= site_url('cart/add');?>" enctype="multipart/form-data">
											<input type="hidden" name="nama_produk" value="<?= $daftar->nama_produk;?>">
											<input type="hidden" name="harga" value="<?= $daftar->harga;?>">
											<input type="hidden" name="id" value="<?= $daftar->id;?>">
											<input type="hidden" name="id_unique" value="<?= $daftar->id_unique;?>">
											<input type="hidden" name="kategori" value="<?= $daftar->kategori;?>">
											<div class="qty">
												<span>Jumlah :</span>
												<input type="number" name="qty" id="qty" class="form-control" min="1" required>
											</div>
											<input class="add_cart btn btn-primary mt-3" type="submit" value="Add to cart">
										</form>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php } ?>
</main>