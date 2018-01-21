<?php
session_start();

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
				
				<div class="c-body">
					<div class="row">
						<div class="col-md-12">
							<table id="example" class="table table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>First name</th>
										<th>Last name</th>
										<th>Position</th>
										<th>Office</th>
										<th>Start date</th>
										<th>Salary</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>a</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>b</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>c</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>d</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>e</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>f</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>g</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>h</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>i</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>j</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>
									<tr>
										<td>k</td>
										<td>Last name</td>
										<td>Position</td>
										<td>Office</td>
										<td>Start date</td>
										<td>Salary</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<button type="button" class="btn btn-success">
				<i class="icon-bubbles">Create Group</i>
			</button>
		</div>
	</div>
</div>

<?php
include_once 'layout/footer.php';
?>