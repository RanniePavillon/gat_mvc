<?php 
	$data = $this->score;
	// echo "<pre>";
	// print_r($data);
?>
	<div class="container-fluid mar-top">
		<div class="col-xs-10 col-xs-offset-1">
			<div class="row text-left mb-30">
				<h3 style="margin: 0px;">List of Reports</h3>
			</div>
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered table-striped table-hover" id="tblUser">
						<thead>
							<tr>
								<th>Username</th>
								<th>Score</th>
								<th>Interpretation</th>
								<th>Remarks</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data as $each): ?>
								<tr>	
									<td><?= ucfirst($each['last_name']).", ".ucfirst($each['first_name']) ?></td>
									<td><?= $each['overall_total'] ?></td>
									<?php if($each['overall_total'] >= 166): ?>
										<td>Above Average</td>
										<td>Passed</td>
									<?php elseif($each['overall_total'] >= 114 ): ?>
										<td>Average</td>
										<td>Passed</td>
									<?php elseif($each['overall_total'] >= 0 ): ?>
										<td>Below Average</td>
										<td>Failed</td>
									<?php endif; ?>
									<td><button class="btn btn-default viewReport" value="<?= $each['user_id'] ?>">View Answers</button></td>
									
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
	<form id="addUserForm" method="post">
		<div id="viewReportModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<!-- <div class="modal-header" style="background: #000; color:#fff">
					</div> -->
					<div class="modal-body" id='returnReport'>
						
					</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	
