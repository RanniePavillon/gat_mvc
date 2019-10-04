<html>
<head>
	<title></title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/style.css" />
	
	<script src="<?= URL;?>public/js/jquery-2.1.4.min.js"></script>
	<script src="<?= URL;?>public/js/animate.min.js"></script>
	<script src="<?= URL;?>public/js/bootstrap.min.js"></script>
	<script>
		$(function(){
			$('#cp').click(function(){
				$('#change_password').modal('toggle');
			});
		});
	</script>
	
</head>

<body class="body1">
	<div class="container-fluid">
		<div class="row marg">
			<div class="col-sm-3 col-md-4">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="panel panel-default text-center custom" >
					<div class="panel-body">
						<h3> Change Password</h3>	
						<br>
						<form method="post" >
									<input type="password" class="form-control input-lg" name="new_password" placeholder="New Password" autofocus >
									<br>
									<input type="password" class="form-control input-lg" name="con_password" placeholder="Change Password" autofocus >
									<br>
								<div class="signup">
									<button type="submit" class="btn btn-default continue "> Change Password </button>
								</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-sm-3  col-md-4">
			</div>
		</div>
	</div>

</body>
</html>