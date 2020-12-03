<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>Annex - Responsive Bootstrap 4 Admin Dashboard</title>
	<meta content="Admin Dashboard" name="description" />
	<meta content="Mannatthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="shortcut icon" href="<?= base_url() ?>/favicon.ico">

	<link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>/assets/css/client.css" rel="stylesheet" type="text/css">

</head>


<body>

	<!-- Loader -->
	<div id="preloader">
		<div id="status">
			<div class="spinner"></div>
		</div>
	</div>

	<!-- Navigation Bar-->
	<header id="topnav">
		<div class="topbar-main">
			<div class="container-fluid">

				<!-- Logo container-->
				<div class="logo">
					<!-- Text Logo -->
					<!--<a href="index.html" class="logo">-->
					<!--Annex-->
					<!--</a>-->
					<!-- Image Logo -->
					<a href="index.html" class="logo">
						<i class="mdi mdi-ticket" style="color: black;">Crash</i>
					</a>

				</div>
				<!-- End Logo container-->


				<div class="menu-extras topbar-custom">

					<ul class="list-inline float-right mb-0">


						<!-- notification-->
						<li class="list-inline-item dropdown notification-list">
							<a class="nav-link dropdown-toggle arrow-none  waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
								<i class="mdi mdi-bell-outline noti-icon"></i>
								<span class="badge badge-success noti-icon-badge">21</span>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
								<!-- item-->
								<div class="dropdown-item noti-title">
									<h5>Notification (3)</h5>
								</div>

								<!-- item-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									<div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
									<p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
								</a>

								<!-- All-->
								<a href="javascript:void(0);" class="dropdown-item notify-item">
									View All
								</a>

							</div>
						</li>
						<li class="menu-item list-inline-item">
							<!-- Mobile menu toggle-->
							<a class="navbar-toggle nav-link">
								<div class="lines">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</a>
							<!-- End mobile menu toggle-->
						</li>

					</ul>
				</div>
				<!-- end menu-extras -->

				<div class="clearfix"></div>

			</div> <!-- end container -->
		</div>
		<!-- end topbar-main -->

		<!-- MENU Start -->
		<div class="navbar-custom">
			<div class="container-fluid">
				<div id="navigation">
					<!-- Navigation Menu-->
					<ul class="navigation-menu">

						<li class="has-submenu">
							<a href="index.html"><i class="mdi mdi-airplay"></i>Dashboard</a>
						</li>

						<li class="has-submenu">
							<a href="#"><i class="mdi mdi-layers"></i>Advanced UI</a>
							<ul class="submenu">
								<li><a href="advanced-highlight.html">Highlight</a></li>
								<li><a href="advanced-rating.html">Rating</a></li>
								<li><a href="advanced-alertify.html">Alertify</a></li>
								<li><a href="advanced-rangeslider.html">Range Slider</a></li>
							</ul>
						</li>

					</ul>
					<!-- End navigation menu -->
				</div> <!-- end #navigation -->
			</div> <!-- end container -->
		</div> <!-- end navbar-custom -->
	</header>
	<!-- End Navigation Bar-->


	<div class="wrapper">
		<div class="container-fluid">

			<!-- Page-Title -->
			<?= $this->renderSection('content'); ?>

			<!-- end page title end breadcrumb -->

		</div> <!-- end container -->
	</div>
	<!-- end wrapper -->


	<!-- Footer -->
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					© 2018 Annex by Mannatthemes.
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer -->


	<!-- jQuery  -->
	<script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
	<script src="<?= base_url() ?>/assets/js/waves.js"></script>
	<script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
	<script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
	<script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>

	<!-- App js -->
	<script src="<?= base_url() ?>/assets/js/app.js"></script>

</body>

</html>