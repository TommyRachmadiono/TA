<?php 
session_start();
include_once 'layout/header.php';
include 'config/connectdb.php';

if ($_SESSION["login"] == false) {
	echo '<script type="text/javascript">alert("Silahkan login terlebih dahulu"); </script>';
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
					<a href="javascript:;">Master User</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- END: LAYOUT/BREADCRUMBS/BREADCRUMBS-1 -->
	<!-- BEGIN: PAGE CONTENT -->
	<div style="margin: 2%;">
		<button class="btn btn-info" data-toggle="modal" data-target="#add-user">Add New User</button>
		<table id="user" class="table table-hover table-bordered">
			<thead>
				<tr>
					<th style="text-align: center;">ID</th>
					<th style="text-align: center;">Foto</th>
					<th style="text-align: center;">Nama</th>
					<th style="text-align: center;">Username</th>
					<th style="text-align: center;">Password</th>
					<th style="text-align: center;">Role</th>
					<th style="text-align: center;">Jurusan</th>
					<th style="text-align: center;">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql = "SELECT * FROM `user` WHERE NOT role = 'admin'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						?>
						<tr>
							<th style="text-align: center;"><?php echo $row['id']; ?></th>
							<td style="text-align: center;"><?php echo $row['foto']; ?></td>
							<td style="text-align: center;"><?php echo $row['nama']; ?></td>
							<td style="text-align: center;"><?php echo $row['username']; ?></td>
							<td style="text-align: center;"><?php echo $row['password']; ?></td>
							<td style="text-align: center;"><?php echo $row['role']; ?></td>
							<td style="text-align: center;"><?php echo $row['jurusan']; ?></td>
							<td style="text-align: center;">
								<button class="btn btn-info" data-toggle="modal" data-target="#editUser<?php echo $row['id'] ?>">Edit</button>
								<button class="btn btn-info" data-toggle="modal" data-target="#deleteUser<?php echo $row['id'] ?>">Delete</button>
							</td>
						</tr>
						<!-- MODAL EDIT USER -->
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
						<!-- END MODAL EDIT USER -->

						<!-- BEGIN: MODAL DELETE USER -->
						<div class="modal fade" id="deleteUser<?php echo $row['id'] ?>" tabindex="-1" role="dialog">
							<div class="modal-dialog">
								<div class="modal-content c-square">
									<div class="modal-body">
										<h3 class="c-font-24 c-font-sbold">Are you sure want to delete User <?php echo $row['nama']; ?> ?</h3>
										<div class="form-group">
											<button  data-dismiss="modal" class="btn btn-danger">Cancel</button>
											<form method="POST" action="userController.php" style="display: inline-block;">
												<input type="hidden" name="act" value="delete_user">
												<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
												<button class="btn btn-info" >Delete</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- END: MODAL DELETE USER -->
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
		var table = $('#user').DataTable( {
			lengthChange: false,
			buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
		} );
	</script>

	<!-- MODAL ADD USER -->
	<div id="add-user" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content c-square">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myLargeModalLabel">Add New User</h4>
				</div>
				<div class="modal-body">
					
					<div class="c-content-title-1 c-title-md c-margin-b-20 clearfix">
						<h3 class="c-center c-font-uppercase c-font-bold">New User</h3>
						<div class="c-line-center c-theme-bg"></div>
					</div>
					<form action="userController.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						<div class="form-group">
							<label class="col-md-4 control-label">Nama</label>
							<div class="col-md-6">
								<input name="nama" class="form-control  c-square c-theme input-lg" type="text" placeholder="Nama User" required=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input name="username" class="form-control  c-square c-theme input-lg" type="text" placeholder="Username" required=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input name="password" class="form-control  c-square c-theme input-lg" type="text" placeholder="Password" required=""> 
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Role</label>
							<div class="col-md-6">
								<select name="role" class="form-control  c-square c-theme input-lg" required="">
									<option value="" disabled selected>-- Select Role --</option>
									<option value="murid">murid</option>
									<option value="guru">guru</option>
									<option value="ortu">ortu</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Jurusan</label>
							<div class="col-md-6">
								<select name="jurusan" class="form-control  c-square c-theme input-lg">
									<option value="" selected>-- Select Jurusan --</option> 
									<option value="ipa">IPA</option>
									<option value="ips">IPS</option>
								</select>
								<span class="help-block">Select jurusan only if role is <b>murid</span>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Foto</label>
							<div class="col-md-6">
								<input class="form-control  c-square c-theme input-lg" type="file" name="file"> 
							</div>
						</div>
						<div class="form-group c-margin-t-40">
							<div class="col-sm-offset-8 col-md-4">
								<input type="hidden" name="act" value="add_user">
								<button type="submit" class="btn btn-default c-btn-square c-btn-uppercase c-btn-bold">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>

	</div>
        <!-- END MODAL ADD USER -->