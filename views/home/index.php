<html>
<head>
	<title>Growth Adaptability Test</title>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/animate.css" />
	<link rel="stylesheet" type="text/css" href="<?= URL;?>public/css/style.css" />

	<style type="text/css">
		#loginForm input{
			margin-bottom: 5px;
		}
		<style type="text/css">
		#loginForm input{
			margin-bottom: 5px;
		}
		input[type="number"]::-webkit-outer-spin-button,
		input[type="number"]::-webkit-inner-spin-button {
		    -webkit-appearance: none;
		    margin: 0;
		}
		input[type="number"] {
		    -moz-appearance: textfield;
		}
	</style>
	
	<script src="<?= URL;?>public/js/jquery-2.1.4.min.js"></script>
	<script src="<?= URL;?>public/js/animate.min.js"></script>
	<script src="<?= URL;?>public/js/bootstrap.min.js"></script>

	<script>
		var URL = "<?=URL?>";
		$(function(){

			$('#loginForm').submit(function(){
				var form = $(this).serialize();
				$('#loginForm input').prop('disabled', true);
				$.post(URL+"user/register",form)
				.done(function(returnData){
					$('#loginForm input').prop('disabled', false);
					// alert(returnData);
					if(returnData==1){
						window.location.href = URL;
					}
					else if(returnData==2){
						$('.snackbar').addClass('show').text('Registration failed!');
					} else if(returnData==3) {
						$('.snackbar').addClass('show').text('Email already used.');
					}
					setTimeout(function(){
						$('.snackbar').removeClass('show');
					}, 3000)
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
							<h4 class="fw-300"> Please enter your information here.</h4>	
						</div>
						<form method="post" id="loginForm">
							<div class="col-xs-12" id="mail">
								<input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" required>
								<input type="text" class="form-control" id="middleInitial" name="middleInitial" placeholder="Middle Initial">
								<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
								<input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Email address" required>
								<input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
								<input type="number" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact number" required>
								<input type="text" class="form-control" id="contactNumber" name="appliedPosition" placeholder="Applied position" required>
									
								<div class="signup">
									<button type="submit" class="btn btn-default continue btn-block"> Register </button>
									<br>
									<a href="<?=URL?>/login" id="goToLogin"> Already have an account?</a>
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