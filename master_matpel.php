<?php 
session_start();
include_once 'layout/header.php';
include 'config/connectdb.php';

if ($_SESSION["login"] == false) {
	echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
	echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
if($_COOKIE['role'] != 'admin') {
	echo '<script type="text/javascript">alert("Hanya Admin Yang Boleh Akses Halaman Ini"); </script>';
	echo '<script type="text/javascript"> window.location = "index.php" </script>';
}
?>
<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
	<!-- BEGIN: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
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
					<a href="javascript:;">Master Mata Pelajaran</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
	<!-- BEGIN: PAGE CONTENT -->
	<div style="margin: 2%;">
		<button class="btn btn-info" data-toggle="modal" data-target="#add-matpel">Add New Matpel</button>
		<table id="matpel" class="table table-hover table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">ID</th>
					<th style="text-align: center;">Nama Mata Pelajaran</th>
					<th style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM matpel";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<tr>
							<th style="text-align: center;"><?php echo $row['id']; ?></th>
							<td style="text-align: center;"><?php echo $row['nama_pelajaran']; ?></td>
							<td style="text-align: center;">
								<button class="btn btn-info" data-toggle="modal" data-target="#editMatpel<?php echo $row['id'] ?>">Edit</button>
								<button class="btn btn-info" data-toggle="modal" data-target="#deleteMatpel<?php echo $row['id'] ?>">Delete</button>
							</td>
						</tr>
						<!-- MODAL EDIT MATPEL -->
						<div class="modal fade c-content-login-form" id="editMatpel<?php echo $row['id'] ?>" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content c-square">
									<div class="modal-header c-no-border">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<h3 class="c-font-24 c-font-sbold">Edit Matpel <?php echo $row['nama_pelajaran']; ?></h3>
										<?php
										$matpel_id = $row['id'];
										$sql2 = "SELECT * FROM matpel WHERE id = '$matpel_id'";
										$result2 = $conn->query($sql2);
										if ($result2->num_rows > 0) {
											while ($row2 = $result2->fetch_assoc()) { ?>
											<form action="matpelController.php" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label for="" class="">Nama Matpel</label>
													<input type="text" class="form-control input-lg c-square" placeholder="Nama Matpel" name="nama_matpel" required="" value="<?php echo $row2['nama_pelajaran'] ?>"> 
													<input type="hidden" name="matpel_id" value="<?php echo $row['id']; ?>">
													<input type="hidden" name="act" value="edit_matpel">
												</div>

												<div class="form-group">
													<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;">Update</button><br><br>
												</div>
											</form>
											<?php	}
										} 
										?>
									</div>
								</div>
							</div>
						</div>
						<!-- END MODAL EDIT MATPEL -->

						<!-- BEGIN: MODAL DELETE MATPEL -->
						<div class="modal fade" id="deleteMatpel<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content c-square">
									<div class="modal-body">
										<h3 class="c-font-24 c-font-sbold">Are you sure want to delete Matpel <?php echo $row['nama_pelajaran']; ?> ?</h3>
										<div class="form-group">
											<button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
											<form method="POST" action="matpelController.php" style="display: inline-block;">
												<input type="hidden" name="act" value="delete_matpel">
												<input type="hidden" name="matpel_id" value="<?php echo $row['id']; ?>">
												<button class="btn btn-info" > Delete</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END: MODAL DELETE MATPEL -->
						<?php 
					}}
					?>
				</tbody>
			</table>
		</div>
		<!-- END: PAGE CONTENT -->
	</div>
	<!-- END: PAGE CONTAINER -->

	<?php
	include_once 'layout/footer.php';
	?>
	<script>
		var table = $('#matpel').DataTable( {
			lengthChange: false,
			buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
		} );
	</script>

	<!-- MODAL ADD NEW MATPEL -->
	<div class="modal fade c-content-login-form" id="add-matpel" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content c-square">
				<div class="modal-header c-no-border">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h3 class="c-font-24 c-font-sbold">Add New Matpel</h3>
					<form action="matpelController.php" method="POST" enctype="multipart/form-data">
						<div class="form-group">
							<label for="create-group" class="">Nama Matpel</label>
							<input type="text" class="form-control input-lg c-square" id="nama_matpel" placeholder="Nama Matpel" name="nama_matpel" required=""> 
							<input type="hidden" name="act" value="add_matpel">
						</div>

						<div class="form-group">
							<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-group" id="create-group">Add</button><br><br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
        <!-- END MODAL ADD NEW MATPEL -->