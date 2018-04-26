<?php
session_start();
$_SESSION['menuHeader'] = 'tugas';
include 'config/connectdb.php';
include_once 'layout/header.php';

?>
<div class="c-layout-page">
	<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
	<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold">
		<div class="container">
			<div class="c-page-title c-pull-left">
				<h3 class="c-font-uppercase c-font-sbold">
					<span class="glyphicon glyphicon-cloud-upload"></span> Pengumpulan Tugas
				</h3>
				<h4>Tugas Sekolah</h4>
			</div>
			<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>/</li>
				<li>
					Tugas
				</li>
			</ul>
		</div>
	</div>
	<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
	<div class="c-content-box c-size-md c-bg-white">
	
	<div class="container">
		<div class="panel panel-success" style="width: 100%;">
				<div class="panel-heading">
					<h3 class="panel-title"><h3 style="text-align: center;">Upload Tugas Sekolah</h3>
				</h3>
			</div>
			<div class="panel-body"> 
				UPLOAD DISINI
		</div>
	</div>
	</div>
	</div>
</div>

<?php
include_once 'layout/footer.php';
?>