<html>
<head>
	<title>Growth Adaptability Test Admin</title>
	
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
		var URL = "<?=URL?>";

		$(function(){
			$('#pass').hide();

			$('#username').keypress(function (e) {
				var key = e.which;
				if(key == 13)  // the enter key code
				{
					$('#next').click();
					return false;  
				}
			});   

			$('#next').click(function(){
				var username =  $('#username').val();
				$.post(URL+"user/admincheckUser",{'username':username})
				.done(function(returnData){
					if(returnData==1){
						$('.snackbar').addClass('show').text('Username does not Exist');
						setTimeout(function(){
							$('.snackbar').removeClass('show');
						}, 3000)

					}
					else if(returnData==0){
						$('#mail').hide();
						$('#pass').show();
						$('#password').focus();
					}
				})	
			});

			$('#cp').click(function(){
				$('#change_password').modal('toggle');
			});

			$('#loginForm').submit(function(){
				var form = $(this).serialize();
				$.post(URL+"user/adminlogin",form)
				.done(function(returnData){
					if(returnData==1){
						window.location.href = URL+"admin/reports";
					}
					else if(returnData==2){
						$('.snackbar').addClass('show').text('Wrong Password');
						setTimeout(function(){
							$('.snackbar').removeClass('show');
						}, 3000)
					}
				})	

				return false;
			})
		});
	</script>
	
</head>

<body class="body1">
	<div class="container-fluid">
		<div class="row mt-100">
			<div class="col-sm-3 col-md-4">
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<div class="panel panel-default text-center pad-20">
					<div class="panel-body mb-30">
						<div class="col-xs-12 mb-20">
							<h3 class="fw-900"> Growth Adaptability Test </h3>
							<h5 class="fw-300"> ADMIN</h5>	
						</div>
						<form method="post" id="loginForm">
							<div class="col-xs-12" id="mail">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username">
									<br>
								<div class="next">
									<button type="button" id="next" class="btn btn-default continue btn-block"> NEXT </button>
								</div>
							</div>
							<div class="col-xs-12" id="pass">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" autofocus >
									<br>
								<div class="signup">
									<button type="submit" class="btn btn-default continue btn-block"> LOGIN </button>
									<br>
									<!-- <a href="#" id="cp"> Forgot Password? </a> -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="change_passwordlabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" data-dismiss="modal" aria-label="Close"><span arie-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body text-center">
							Send change password link to email?
						</div>
						<div class="modal-footer center-block">
							<button type="button" class="btn btn-default" > Yes </button>
							<button class="btn btn-default" data-dismiss="modal"> No </button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3  col-md-4">
			</div> 
			<div class="snackbar"></div>
		</div>
	</div>

</body>
</html>