
<?php 
	$userSession = Session::getSession('user');
?>
<html>
<head>
	<title>Growth Adaptability Test</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<!-- <link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/bootstrap.min.css" /> -->
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/DataTables/datatables.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/style.css" />
	
	<script src="<?= URL;?>public/js/jquery-2.1.4.min.js"></script>
	<script src="<?= URL;?>public/DataTables/datatables.min.js"></script>
	<script src="<?= URL;?>public/js/animate.min.js"></script>
	<!-- <script src="<?= URL;?>public/js/bootstrap.min.js"></script> -->
	<script src="<?= URL;?>public/js/jquery-me.js"></script>
	<script>
		var URL = "<?=URL?>";
	</script>
</head>
<body>

	<div class="navbar nav-me navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Growth Adaptability Test (GAT)</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a><?=$userSession['username']?></a></li>
					<li><a href="<?=URL?>user/logout">Logout</a></li>
				</ul>
			</div>
		</div>
	</div>