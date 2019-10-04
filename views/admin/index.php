<?php 
	$data = $this->getData;
	// echo "<pre>";
	// print_r($data);
?>
	<div class="container-fluid mar-top">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="row text-right mb-30">
				<div class="col-xs-6 text-left">
					<h3 style="margin: 0px;">List of Users</h3>
				</div>
				<div class="col-xs-6">
					<button class="btn btn-default" id="addUserAdmin"><span class="fa fa-plus"></span>Add User</button>
				</div>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="tblUser">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Username</th>
								<th>Date Added</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $each): ?>
								<tr>	
									<td><?= $each->name ?></td>
									<td><?= $each->email ?></td>
									<td><?= $each->username ?></td>
									<td><?= $each->dateCreated ?></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<form id="addUserForm" method="post">
		<div id="addUserModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background: #000; color:#fff">
						<h4>ADD USER</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-xs-10 col-xs-offset-1">
								<div class="form-group">
									<label>Name:</label>
									<input class="form-control" name="name" type="text" required>
								</div>
								<div class="form-group">
									<label>Email:</label>
									<input class="form-control" name="email" type="email" required>
								</div>
								<div class="form-group">
									<label>Username:</label>
									<input class="form-control" name="username" type="text" required>
								</div>
								<div class="form-group">
									<label>Password:</label>
									<input class="form-control" name="password" type="password" required>
								</div>
								<div class="form-group">
									<label>Confirm Password:</label>
									<input class="form-control" name="confirmpass" type="password" required>
								</div>
							</div>
						</div>
							<div class="snackbar"></div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Add</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
