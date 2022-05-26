<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Kurban di Tcare">
		<meta name="author" content="T.care">
		<meta name="generator" content="tcare-kurban v.1">
		<title>kurbandipelosok.com</title>

		<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">

		<!-- Bootstrap -->
		<link href="<?= base_url('assets/vendor/node_modules/bootstrap/dist/');?>css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom -->
		<link href="<?= base_url('assets/');?>css/custom.css" rel="stylesheet">
		<!-- Mobile -->
		<link href="<?= base_url('assets/');?>css/mobile.css" rel="stylesheet">

		<!-- Favicons -->
		<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
		<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
		<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
		<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
		<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
		<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
		<meta name="theme-color" content="#712cf9">

		<!-- Fontawesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		
	</head>
	<body class="<?= $this->uri->segment('2');?>">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top">
			<div class="container">
				<a class="navbar-brand" href="<?= site_url();?>">
					<img src="<?= base_url('assets/images/');?>logo-white.png">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav me-auto mb-2 mb-md-0">
						<!-- <li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Link</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled">Disabled</a>
						</li> -->
					</ul>
					<form class="d-flex" role="search">
						<ul class="navbarmenu">
							<li>
								<a class="nav-link" href="<?= site_url();?>">Home</a>
							</li>
							<li>
								<a class="nav-link" href="#">History</a>
							</li>
							<li>
								<a class="nav-link" href="https://tcare.id/" target="_blank">T.CARE</a>
							</li>
							<li>
								<a class="nav-link navlogin" href="<?= site_url('website/login');?>">Login</a>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</nav>