<?php 
session_start();

$_SESSION['menuHeader'] = 'eventCalendar';
include_once 'layout/header.php';
include 'config/connectdb.php';
?>
<link rel="stylesheet" type="text/css" href="css/calendar.css">

<div class="c-layout-page">
	<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->
	<div class="c-layout-breadcrumbs-1 c-subtitle c-fonts-uppercase c-fonts-bold">
		<div class="container">
			<div class="c-page-title c-pull-left">
				<h3 class="c-font-uppercase c-font-sbold">Full Width Gallery</h3>
				<h4 class="">Page Sub Title Goes Here</h4>
			</div>
			<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>/</li>
				<li>
					Events Calendar
				</li>
			</ul>
		</div>
	</div>
	<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-2 -->

	<div class="container" style="margin-bottom: 3%;">

		<div class="page-header">
			<div class="pull-right form-inline">
				<div class="btn-group">
					<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
					<button class="btn btn-default" data-calendar-nav="today">Today</button>
					<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
				</div>
				<div class="btn-group">
					<button class="btn btn-warning" data-calendar-view="year">Year</button>
					<button class="btn btn-warning active" data-calendar-view="month">Month</button>
					<button class="btn btn-warning" data-calendar-view="week">Week</button>
					<button class="btn btn-warning" data-calendar-view="day">Day</button>
				</div>
			</div>
			<h3></h3>
			<small>To see example with events navigate to Februray 2018</small>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div id="showEventCalendar"></div>
			</div>
			<div class="col-md-3">
				<a style="width: 100%;"><button class="btn btn-default" style="width: 100%;">
					<i class="icon-bubbles">Create New Event</i>
				</button></a>
				<br><br>
				<h4>All Events List</h4>
				<ul id="eventlist" class="nav nav-list"></ul>
			</div>
		</div>
	</div>	
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/events.js"></script>
<?php include_once 'layout/footer.php'; ?>

