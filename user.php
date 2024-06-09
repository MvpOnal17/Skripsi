<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
	echo "<script type='text/javascript'>
   window.location.replace('index.php');
  </script>";
}
?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Sistem Informasi Prediksi Menggunakan Algoritma Naive Bayes Pada Kasus Data Numeric">
	<!--favicon-->
	<link rel="icon" href="assets/images/bys-favicon.png" type="image/png" />
	<!--plugins-->
	<link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- sweet css -->
	<link rel="stylesheet" href="assets/sweet/sweetalert2.css">
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css" />
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<link rel="stylesheet" href="assets/css/header-colors.css" />
	<title>Sistem Informasi - Naive Bayes</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="assets/images/bys.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Bayes</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li class="menu-label">Form Layout</li>
				<li>
					<a href="user.php?page=form-prediction">
						<div class="parent-icon"><i class='bx bx-edit'></i>
						</div>
						<div class="menu-title">Prediction</div>
					</a>
				</li>

				<li class="menu-label">Calculation Results</li>
				<li>
					<a href="user.php?page=probability">
						<div class="parent-icon"><i class='bx bx-pulse'></i>
						</div>
						<div class="menu-title">Probability</div>
					</a>
				</li>
				<li>
					<a href="user.php?page=result-classification">
						<div class="parent-icon"><i class='bx bx-calculator'></i>
						</div>
						<div class="menu-title">Result Classification</div>
					</a>
				</li>
				<li>
					<a href="user.php?page=confusion-matrix">
						<div class="parent-icon"><i class='bx bx-chart'></i>
						</div>
						<div class="menu-title">Confusion Matrix</div>
					</a>
				</li>
				<li class="menu-label">Profile</li>
				<li>
					<a href="user.php?page=users-data">
						<div class="parent-icon"><i class='bx bx-user-circle'></i>
						</div>
						<div class="menu-title">User Settings</div>
					</a>
				</li>
				<li class="menu-label">Help Center</li>
				<li>
					<a href="user.php">
						<div class="parent-icon"><i class='bx bx-support'></i>
						</div>
						<div class="menu-title">Panduan</div>
					</a>
				</li>
				<li class="menu-label">Utility</li>
				<li>
					<a href="aksi-login/logout.php">
						<div class="parent-icon"><i class='bx bx-log-out'></i>
						</div>
						<div class="menu-title">Log Out</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search...">
							<span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-notifications-list">
									</div>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
								<div class="dropdown-menu dropdown-menu-end">
									<div class="header-message-list">
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="assets/images/avatars/user.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0"><?php echo "$_SESSION[nama]"; ?></p>
								<p class="designattion mb-0"><?php echo "$_SESSION[hak_akses]"; ?></p>
							</div>
						</a>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<?php
				$page = (isset($_GET['page'])) ? $_GET['page'] : "main";
				switch ($page) {
					case 'form-prediction':
						include "page-user/form.php";
						break;

					case 'probability':
						include "page-user/probability.php";
						break;
					case 'result-classification':
						include "page-user/result-test.php";
						break;
					case 'confusion-matrix':
						include "page-user/confusion-matrix.php";
						break;

					case 'prediction':
						include "page-user/uji-data.php";
						break;
					case 'prediction-result':
						include "page-user/hasil-prediksi.php";
						break;
					case 'selesai':
						include "page-user/hapus-prediksi.php";
						break;

					case 'users-data':
						include "page-user/users-data.php";
						break;
					case 'ganti-sandi':
						include "page-user/ganti-password.php";
						break;

					default:
						include 'dashboard-user.php';
				}
				?>
			</div>
		</div>

		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2022. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	<!--start switcher-->
	<div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr />
			<h6 class="mb-0">Theme Styles</h6>
			<hr />
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr />
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr />
			<h6 class="mb-0">Header Colors</h6>
			<hr />
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>

			<hr />
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr />
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>


		</div>
	</div>
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<!--datatable js -->
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/js/table-datatable.js"></script>
	<!--notification js -->
	<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
	<!--sweet alert -->
	<script src="assets/js/sweet/sweetalert2.all.min.js "></script>
	<!-- grafik -->
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/plugins/chartjs/js/chartjs-custom.js"></script>

	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Tepat (%)", "Terlambat (%)"],
				datasets: [{
					label: '',
					data: [<?php echo "" . $persenA . ""; ?>, <?php echo "" . $persenB . ""; ?>, ],
					barPercentage: .5,
					backgroundColor: ["#0d6efd", "#f41127"]
				}]
			},
			options: {
				responsive: true,
				scales: {
					xAxes: [{
						ticks: {
							beginAtZero: true,
							autoSkip: false,
							maxRotation: 15
						}
					}],
					yAxes: [{
						ticks: {
							beginAtZero: true,
							autoSkip: false,
							maxRotation: 0
						}
					}]
				}
			}
		});
	</script>

</body>

</html>