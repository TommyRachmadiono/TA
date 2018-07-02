<?php 
session_start();
$_SESSION['menuHeader'] = 'home';
include_once 'layout/header.php';
include 'config/connectdb.php';

if ($_SESSION["login"] == false) {
	echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
	echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>

<div class="c-layout-page">
	<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
		<div class="container">
			<div class="c-page-title c-pull-left">
				<h3 class="c-font-uppercase c-font-sbold">Admin Page</h3>
			</div>
			<ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
				<li>
					<a href="#">Admin</a>
				</li>
				<li>/</li>
				<li>
					<a href="javascript:;">Report</a>
				</li>
			</ul>
		</div>
	</div>

	<div style="margin: 2%;">
		<h1>Tabel Report</h1>
		<table id="tabel-report" class="table table-hover table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">ID Postingan</th>
					<th style="text-align: center;">Postingan</th>
					<th style="text-align: center;">Jumlah Report</th>
					<th style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT r.postingan_id as id, SUM(r.postingan_id) as Jumlah_Report, p.isi FROM report r INNER JOIN postingan p on r.postingan_id = p.idpostingan";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						if($row['Jumlah_Report'] != NULL) {
						?>
						<tr>
							<td style="text-align: center;"><?php echo $row['id']; ?></td>
							<td style="text-align: center;"><?php echo $row['isi']; ?></td>
							<td style="text-align: center;"><?php echo $row['Jumlah_Report']; ?></td>
							<td style="text-align: center;">
								<button class="btn btn-info" data-toggle="modal" data-target="#ignorePostingan<?php echo $row['id'] ?>">Ignore</button>
								<button class="btn btn-info" data-toggle="modal" data-target="#deletePostingan<?php echo $row['id'] ?>">Delete</button>

							</td>
						</tr>

						<!-- BEGIN: MODAL DELETE STATUS -->
						<div class="modal fade" id="deletePostingan<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content c-square">
									<div class="modal-body">
										<h3 class="c-font-24 c-font-sbold">Are you sure want to delete postingan id <?php echo $row['id']; ?> ?</h3>
										<div class="form-group">
											<button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
											<form method="POST" action="reportController.php" style="display: inline-block;">
												<input type="hidden" name="act" value="delete_postingan">
												<input type="hidden" name="postingan_id" value="<?php echo $row['id']; ?>">
												<button class="btn btn-info" >Delete</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END: MODAL DELETE STATUS -->

						<!-- BEGIN: MODAL IGNORE REPORT -->
						<div class="modal fade" id="ignorePostingan<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content c-square">
									<div class="modal-body">
										<h3 class="c-font-24 c-font-sbold">Are you sure want to ignore report for postingan id <?php echo $row['id']; ?> ?</h3>
										<div class="form-group">
											<button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
											<form method="POST" action="reportController.php" style="display: inline-block;">
												<input type="hidden" name="act" value="ignore_report">
												<input type="hidden" name="postingan_id" value="<?php echo $row['id']; ?>">
												<button class="btn btn-info" >Ignore</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END: MODAL IGNORE REPORT -->

						<?php 
					}}}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<?php 
	include_once 'layout/footer.php';
	?>

	<script>
		var table = $('#tabel-report').DataTable( {
			lengthChange: false,
			buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
		} );
	</script>