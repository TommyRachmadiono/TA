<?php
session_start();
$_SESSION['menuHeader'] = 'mata_pelajaran';
include 'config/connectdb.php';
include_once 'layout/header.php';

$info = getdate();
$date = $info['mday'];$month = $info['mon'];$year = $info['year'];
$hour = $info['hours'] ;$min = $info['minutes'];$sec = $info['seconds'];
$current_date = "$date/$month/$year = $hour:$min:$sec";
$current_time = "$hour:$min";
?>

<div class="c-layout-page">
	<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
	<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold">
		<div class="container">
			<div class="c-page-title c-pull-left">
				<h3 class="c-font-uppercase c-font-sbold">
					<span class="glyphicon glyphicon-book"></span> Materi
				</h3>
				<h4>Mata Pelajaran</h4>
			</div>
			<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>/</li>
				<li>
					Mata Pelajaran
				</li>
			</ul>
		</div>
	</div>
	<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

	<div class="container">
		<div class="c-layout-sidebar-menu c-theme ">
			<!-- BEGIN: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-time"></span> Clock
					</h3>
				</div>
				<div class="panel-body">
					Server : <?php echo $current_time; ?>
				</div>
			</div>
			<?php if($_SESSION["login"] == true){ ?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Logged In User
					</h3>
				</div>
				<div class="panel-body">
					<h2><?php echo $_SESSION["username"];?></h2>
					<br>
					<a href="#" data-toggle="modal" data-target="#modalLogout">Log Out
						<i class="glyphicon glyphicon-log-out"> </i>
					</a>
				</div>
			</div>
			<?php } ?>
			<ul class="c-sidebar-menu collapse " id="sidebar-menu-2">

                <li class="c-active">
                    <a class="c-toggler">Mata Pelajaran
                        <span class="c-arrow"></span>
                    </a>
                <li>
                    <a href="#">
                        <i class="icon-social-dribbble"></i> Example Link</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-bell"></i> Example Link</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-bubbles"></i> Example Link</a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-user"></i> Example Link</a>
                </li>
                </li>
            </ul>
			<div class="c-padding-20 c-margin-t-40 c-bg-grey-1 c-bg-img-bottom-right" style="background-image:url(assets/base/img/content/misc/feedback_box_2.png)">
				<div class="c-content-title-1 c-margin-t-20">
					<h3 class="c-font-uppercase c-font-bold">Have a question?</h3>
					<div class="c-line-left"></div>
					<p class="c-font-thin">Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered!</p>
				</div>
			</div>
			<!-- END: LAYOUT/SIDEBARS/SIDEBAR-MENU-1 -->
		</div>
		

		<div class="c-layout-sidebar-content">
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Daftar Materi</h3>
				<div class="c-line-center"></div>
			</div>
			<div class="panel panel-info" style="width: 100%;">
				<div class="panel-heading">
					<h3 class="panel-title"><h3>WEEK 1</h3>
					<a class="anchorjs-link" href="#panel-title">
						<span class="anchorjs-icon"></span>
					</a>
				</h3>
			</div>
			<div class="panel-body"> 
				<div class="panel panel-danger">
					<div class="panel-heading">
						<a href="#"><h3 class="panel-title"><h3>Tugas Kuliah</h3></a>
					</div>
			</div>
			<div class="panel panel-danger">
					<div class="panel-heading">
						<a href="#"><h3 class="panel-title"><h3>Tugas Kuliah</h3></a>
					</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<?php
include_once './layout/footer.php';
?>