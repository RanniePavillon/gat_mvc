$(function(){
	// alert();

	$('.viewReport').click(function(){
		var userid = $(this).val();
		$('#viewReportModal').modal('toggle');
		$.post(URL+"admin/returnReport", {'userid': userid})
		.done(function(returnData){
			$('#returnReport').html(returnData);

		})
		return false;
	})
	$('#tblUser').DataTable({
		"lengthMenu": [[8, 25, 50, -1], [8, 25, 50, "All"]],
        "pageLength": 8	
	});
	$('#addUserAdmin').click(function(){
		$('#addUserModal').modal('toggle');
	})
	$('#addUserForm').submit(function(){
		var form = $(this).serialize();
		var password = $('input[name="password"]').val();
		var confirmpass = $('input[name="confirmpass"]').val();

		if(password == confirmpass){
			$.post(URL+'admin/addUser', form)
			.done(function(returnData){
				if(returnData==1){
					$('.snackbar').css('background-color','#4cae4c');
					$('.snackbar').addClass('show').text('User has been Added');
					setTimeout(function(){
						$('.snackbar').removeClass('show');
						$('#addUserModal').modal('toggle');
						$('#addUserForm').find('input').val('');
					}, 3000)
					
				}		
			})
		}
		else{
			$('.snackbar').css('background-color','#843534');
			$('.snackbar').addClass('show').text('Password do not match');
			setTimeout(function(){
				$('.snackbar').removeClass('show');
			}, 3000)
		}
		return false;
	})
	$('.txtAnswer').attr('maxlength','1');
	$('.txtAnswer').keyup(function(){
		var $th = $(this);
    	$th.val( 
    		$th.val().replace(/[^1-5]/g, function(str) { 
    			 return ''; 
    		}) 
    	);
	})
	$('#answerForm').submit(function(){
		var form = $(this).serialize();

		$('#loaderModal').modal({
				backdrop: 'static', 
				keyboard: false,
				toggle: true
		});

		$.post(URL+"index/insertAnswers",form)
		.done(function(returnData){
			// alert(returnData);
			if(returnData==1){
				$('#successModal').modal({
					backdrop: 'static', 
					keyboard: false,
					toggle: true
				});
			
			}
		})	
		return false;
	})

	if(data==1){
		$('#loaderModal').modal({
			backdrop: 'static', 
			keyboard: false,
			toggle: true
		});
		setTimeout(function(){
			$('#loaderModal').modal('toggle'); 
			$('#questions').hide();
			$('#results').fadeIn();
		},1000)
	} else {
		if(start==0){
			$('#instructionModal').modal({
				backdrop: 'static', 
				keyboard: false,
				toggle: true
			});
		} else if (start==2){
			$('#instructionModal2').modal({
				backdrop: 'static', 
				keyboard: false,
				toggle: true
			});
		} else if (start==3){
			$('#successModal').modal({
				backdrop: 'static', 
				keyboard: false,
				toggle: true
			});
		}
	}
		

})