<script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-9hY6A1D3piaFWjRj"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<main class="checkouts">
	
	<section class="checkout-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="mb-3">Checkout</h1>
				</div>
				<div class="col-md-12">
				
					<?php $cart_check = $this->cart->contents();
         			// If cart is empty, this will show below message.
					if(empty($cart_check)) {
						echo '<p">Belum ada Produk di keranjang, Silahkan pilih order Kurban yang tersedia</p>';
					} ?> 

					<table class="table">

						<tr>
							<th style="text-align:center">QTY</th>
							<th>Nama Produk</th>
							<th style="text-align:center">Kategori</th>
							<th style="text-align:right">Harga</th>
						</tr>

						<?php $i = 1; ?>

						<?php foreach ($this->cart->contents() as $items): ?>
							<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

							<tr>
								<td id="qty"><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'class' => 'form-control uksiz', 'maxlength' => '3', 'size' => '5')); ?></td>
								<td id="nama_produk">
									<?php echo $items['name']; ?>

									<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

										<p>
											<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

												<strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

											<?php endforeach; ?>
										</p>

									<?php endif; ?>

								</td>
								<td style="text-align:center" id="kategori">#<?php echo $items['kategori']; ?></td>
								<!-- <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td> -->
								<td style="text-align:right" id="harga">Rp. <?php echo number_format($items['price']); ?></td>
							</tr>

							<?php $i++; ?>

						<?php endforeach; ?>

						<tr>
							<td colspan="2"> </td>
							<td class="right"><strong>Total</strong></td>
							<td style="text-align:right"><strong>Rp. <?php echo number_format($this->cart->total()); ?></strong></td>
						</tr>

					</table>

					<!-- <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
						<input type="hidden" name="result_type" id="result-type" value=""></div>
						<input type="hidden" name="result_data" id="result-data" value=""></div>
						<input type="text" name="nama_produk" value="<?php echo $items['name']; ?>">
						<input type="text" name="kategori" value="<?php echo $items['kategori']; ?>">
						<input type="text" name="harga" value="<?php echo $items['price']; ?>">
						<input type="text" name="qty" value="<?php echo $items['qty']; ?>">
						<input type="text" name="id_unique" value="<?php echo $items['id_unique']; ?>">
						<button class="btn btn-primary" id="pay-button">Checkout</button>
					</form>
 -->
 					<button class="btn btn-primary" style="float: right;" id="pay-button">Checkout</button>

				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<img src="<?= base_url('assets/images/banner/');?>banner-promo.jpg" class="w-100">
		</div>
	</section>

</main>

<script type="text/javascript">

	$('#pay-button').click(function (event) {
		event.preventDefault();
		$(this).attr("disabled", "disabled");

		var qty = $(#id).val();
		var nama_produk = $(#nama_produk).val();
		var kategori = $(#kategori).val();
		var harga = $(#harga).val();

		$.ajax({
			type: POST,
			url: '<?=site_url()?>/snap/token',
			data: {
				qty = qty,
				nama_produk = nama_produk,
				kategori = kategori,
				harga = harga
			},
			cache: false,

			success: function(data) {
	        //location = data;

	        console.log('token = '+data);
	        
	        var resultType = document.getElementById('result-type');
	        var resultData = document.getElementById('result-data');

	        function changeResult(type,data){
	        	$("#result-type").val(type);
	        	$("#result-data").val(JSON.stringify(data));
	          //resultType.innerHTML = type;
	          //resultData.innerHTML = JSON.stringify(data);
		      }

		      snap.pay(data, {

		      	onSuccess: function(result){
		      		changeResult('success', result);
		      		console.log(result.status_message);
		      		console.log(result);
		      		$("#payment-form").submit();
		      	},
		      	onPending: function(result){
		      		changeResult('pending', result);
		      		console.log(result.status_message);
		      		$("#payment-form").submit();
		      	},
		      	onError: function(result){
		      		changeResult('error', result);
		      		console.log(result.status_message);
		      		$("#payment-form").submit();
		      	}
		      });
		  	}
		});
	});

</script>