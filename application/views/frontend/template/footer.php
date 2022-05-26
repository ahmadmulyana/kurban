
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="<?= base_url('assets/images/');?>logo-white.png">
						<p class="mb-2">Jl. Taruna Jaya No.99 Kelurahan Cibubur, Kecamatan Ciracas, <br>Kota Adm. Jakarta Timur DKI Jakarta 13720</p>
						<p>Official Contact : <a href="https://wa.me/628111620333">08111620333</a></p>
						<p>Alternative Contact : <a href="https://wa.me/628116601230">08116601230</a></p>
						<p>Email: <a href="mailto:halo@tcare.id">halo@tcare.id</a></p>
					</div>
					<div class="col-md-3">
						<h2>Useful Link</h2>
						<ul class="useful">
							<li><a href="<?= site_url();?>">Home</a></li>
							<li>History</li>
							<li><a href="https://tcare.id/" target="_blank">T.CARE</a></li>
							<li><a href="<?= site_url('website/login');?>">Login / Register</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h2>Connect with Us</h2>
						<ul class="socmed">
							<li><span class="fa fa-facebook"></span></li>
							<li><a href="https://www.instagram.com/tcare.id/" target="_blank"><span class="fa fa-instagram"></span></a></li>
							<li><span class="fa fa-youtube"></span></li>
						</ul>
					</div>
				</div>
				<div class="copyright">
					Copyright &copy; 2022 <a href="https://tcare.id/" target="_blank">T.CARE</a>. All Rights Reserved.
				</div>
			</div>
			
		</footer>

		<div class="poswa"> <!-- 628111620333 -->
			<a href="https://api.whatsapp.com/send?phone=628971504125&text=Assalamu'alaikum,%20Saya%20ingin%20tanya%20tentang%20kurban%20di%20T.CARE!" class="float" target="_blank">
				<span class="fa fa-whatsapp my-float"></span>
			</a>
		</div>


		<script src="<?= base_url('assets/vendor/node_modules/bootstrap/dist/');?>js/bootstrap.bundle.min.js"></script>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>
			/**
			 * Listen to scroll to change header opacity class
			 */
			function checkScroll(){
			    var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

			    if($(window).scrollTop() > startY){
			        $('.navbar').addClass("scrolled");
			    }else{
			        $('.navbar').removeClass("scrolled");
			    }
			}

			if($('.navbar').length > 0){
			    $(window).on("scroll load resize", function(){
			        checkScroll();
			    });
			}
		</script>


	</body>
	</html>