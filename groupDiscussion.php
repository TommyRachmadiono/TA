<?php
session_start();
include 'config/connectdb.php';

$_SESSION['menuHeader'] = 'groupDiscussion';
include_once 'layout/header.php';
?>
<div class="c-layout-page">
	<div class="c-content-box c-size-md c-bg-white">
		<div class="container">
			<div class="c-content-title-1">
				<h3 class="c-center c-font-dark c-font-uppercase">Group Discussion</h3>
				<div class="c-line-center c-theme-bg"></div>
				<p class="c-center">Create your own discussion group and invite your friend to discuss anything you want.</p>
			</div>
			<div class="c-content-panel">
				<a class="c-link dropdown-toggle" data-toggle="modal" data-target="#create-group"><button type="button" class="btn btn-success" style="margin-top: 2%; margin-left: 2%;">
					<i class="icon-bubbles">Create Group</i>
				</button></a>
				<div class="c-body">
					<div class="row">
						<div class="col-md-12">
							<table id="example" class="table table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>ID</th>
										<th>Group Topic</th>
										<th>Created By</th>
										<th>Date Created</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php	
									$sql = "SELECT * FROM grup";
									$result = $conn->query($sql);

									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) { ?>
										<tr>
											<td><?php echo $row["id"] ?></td>
											<td><?php echo $row["topik_grup"] ?></td>
											<td><?php echo $row["user_id"] ?></td>
											<td><?php echo $row["tgl_dibuat"] ?></td>
											<td>Show</td>
										</tr>
										<?php	}
									} else {
										echo "0 results";
									}
									$conn->close();
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade c-content-login-form" id="create-group" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content c-square">
			<div class="modal-header c-no-border">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3 class="c-font-24 c-font-sbold">Create New Discussion Group</h3>
				<form action="create_group.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="create-group" class="">Topic Discussion</label>
						<input type="text" class="form-control input-lg c-square" id="topic_discussion" placeholder="Topic Discussion" name="topic_discussion" required=""> 
					</div>

					<div class="form-group">
						<button type="submit" class="btn c-theme-btn btn-md c-btn-uppercase c-btn-bold c-btn-square c-btn-login" style="float: right;" name="create-group" id="create-group">Create</button><br><br>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
include_once 'layout/footer.php';
?>



<!-- DATATABLES -->
<script type="text/javascript" src="assets/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="assets/DataTables/js/buttons.print.min.js"></script>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {

		} );
	} );
</script>

