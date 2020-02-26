$(document).ready(function(){
	
	$('#RSO_btn').click(function(){
		
		var $phone=$('#RSO_phone');
		var phone=$phone.val().trim();
		
		if(phone=='' || (phone!='' && !isValidPhoneNo(phone)))
		{alert('phone not valid')}
		else
		{
			$('#RSO_btn').hide();
			$('#RSO_process').show();
			
			var formdata=$('#register_send_otp').serialize();
			$.ajax({
				url:'/register/send_otp',
				type:'POST',
				dataType:"json",
				data:formdata,
				success:function(data)
					{
						$('#RSO_btn').show();
						$('#RSO_process').hide();
						if(data.result=='success')
						{
							$('#REO_phone').val(data.phone);
							$('.phoneNoEntered').text(phone);
							
							$('#register_enter_otp').show();
							$('#register_send_otp').hide();
						}
						else
						{
							alert(data.error);
						}
					}
			});
		}
	});
	
	$('#REO_resendOTP').click(function(){
		
			var submitBtn=$('#REO_resendOTP');
			var processBtn=$('#REO_resendOTP_process');
			
			submitBtn.hide();
			processBtn.show();
			
			var formdata=$('#register_send_otp').serialize();
			$.ajax({
				url:'/register/send_otp',
				type:'POST',
				dataType:"json",
				data:formdata,
				success:function(data)
					{
						submitBtn.show();
						processBtn.hide();
						if(data.result=='success')
						{
							alert('OTP resent');
							$('#REO_ROModal').modal('toggle');
						}
						else
						{
							alert(data.error);
						}
					}
				});
	});
	
	$('#REO_btn').click(function(){
		
		var $otp=$('#REO_otp');
		var otp=$otp.val().trim();
		
		if(otp=='')
		{alert('Please enter otp')}
		else
		{
			$('#REO_btn').hide();
			$('#REO_process').show();
			var formdata=$('#register_enter_otp').serialize();
			
			$.ajax({
			url:'/register/check_otp',
			type:'POST',
			data:formdata,
			dataType:'json',
			success:function(data)
				{
					$('#REO_btn').show();
					$('#REO_process').hide();
					
					if(data.result=='success')
					{
						$('#R_phone').val(data.phone);
						
						$('#register_form').show();
						$('#register_enter_otp').hide();
					}
					else
					{
						alert(data.error);
					}
				}
			});
		}
			
	});
	
	$('#register_submit').click(function(){
		
			var register_submit=$('#register_submit');
			var register_submit_process=$('#register_submit_process');
			
			var $pwd=$('#register_pwd');
			var $fname=$('#register_fname');
			var $lname=$('#register_lname');
			var $email=$('#register_email');
			var $account_type=$('#register_account_type');
			
			var pwd=$pwd.val().trim();
			var fname=$fname.val().trim();
			var lname=$lname.val().trim();
			var email=$email.val().trim();
			var account_type=$account_type.val().trim();
			
			if(pwd=='' || fname=='' || lname=='' || email=='' || (email!='' && !isValidEmailAddress(email)) || account_type=='')
			{
				var alerts='';
				if(pwd=='')
					alerts +='pwd  ';
				if(fname=='')
					alerts +='fname  ';
				if(lname=='')
					alerts +='lname  ';
				if(email=='')
					alerts +='email  ';
				if(email!='' && !isValidEmailAddress(email))
					alerts +='isValidEmailAddress(email)  ';
				if(account_type=='')
					alerts +='account_type  ';
				alert(alerts);
			}
			else
			{
					register_submit.hide();
					register_submit_process.show();
					
					var formdata=$('#register_form').serialize();
					
					$.ajax({
					url:'/register/submit',
					type:'POST',
					data:formdata,
					dataType:'json',
					success:function(data)
						{
							register_submit.show();
							register_submit_process.hide();
							if(data.result=='success')
							{
								window.location='/account'
							}
							else
							{
								alert(data.error);
							}
						}
				});
		}
		
	});
	
	$('#LF_submit').click(function(){
		
		var $phone=$('#LF_phone');
		var $password=$('#LF_password');
		
		var phone=$phone.val().trim();
		var password=$password.val().trim();
		
		if(phone=='' || (phone!='' && !isValidPhoneNo(phone)) || password=='')
		{alert('Form validation')}
		else
		{
			var submitBtn=$('#LF_submit');
			var submitBtnProcess=$('#LF_process');
			submitBtn.hide();
			submitBtnProcess.show();
			var formdata=$('#login_form').serialize();
			
			$.ajax({
			url:'/loginsubmit',
			type:'POST',
			data:formdata,
			success:function(data)
				{
					if(data=='wrong_details')
					{
						alert(data);
						submitBtn.show();
						submitBtnProcess.hide();
					}
					else
					{
						window.location='/account';
					}
				}
			});
		}
	});
	
	
	//Forgot password #STARTS
	$('#form_fp_optionPhone').click(function(){
		$('#form_fp_phoneNo').show();
		$('#form_fp_emailId').hide();
		$('#FPEO_otp_phoneText').show();
		$('#FPEO_otp_emailText').hide();
		$('#form_fpro_phoneNoPrefix').show();
	});
	
	$('#form_fp_optionEmail').click(function(){
		$('#form_fp_emailId').show();
		$('#form_fp_phoneNo').hide();
		$('#FPEO_otp_emailText').show();
		$('#FPEO_otp_phoneText').hide();
		$('#form_fpro_phoneNoPrefix').hide();
	});
	
	$('#form_fp_submit').click(function(){
		var submitBtn=$('#form_fp_submit');
		var submitBtnProcess=$('#form_fp_process');
		
		var $phone=$('#form_fp_phone');
		var $email=$('#form_fp_email');
		
		var phone=$phone.val().trim();
		var email=$email.val().trim();
		
		var radioValue = $("input[name='form_fp_option']:checked").val();
		if(radioValue=='1' && (phone=='' || (phone!='' && !isValidPhoneNo(phone))))
		{alert('phone validation');}
		else if(radioValue=='2' && (email=='' || (email!='' && !isValidEmailAddress(email))))
		{alert('email validation');}
		else
		{
			submitBtnProcess.show();
			submitBtn.hide()
			
			var formdata=$('#form_fp').serialize();
			$.ajax({
				url:'/forgotpassword/send_otp',
				type:'POST',
				dataType:"json",
				data:formdata,
				success:function(data)
					{
						submitBtnProcess.hide();
						submitBtn.show();
						
						if(data.result=='error')
						{
							alert(data.error)	;
						}
						else
						{
							if(radioValue=='1' )
							var phoneNoEmailEnteredText=phone;
							else if(radioValue=='2')
							var phoneNoEmailEnteredText=email;
							$('#form_fpro_phoneNoEmailEntered').text(phoneNoEmailEnteredText);
							$('#forgotPasswordModal').modal('toggle');
							$('#form_fp_enter_otp').show();
							$('#login_form').hide();
							$('#FPEO_user').val(data.user);
						}
					}
			});
		}
	});
	
	$('#FPEO_btn').click(function(){
		var submitBtn=$('#FPEO_btn');
		var submitBtnProcess=$('#FPEO_process');
		
		var $otp=$('#FPEO_otp');
		var otp=$otp.val().trim();
		if(otp=='')
		{alert('Please enter otp')}
		else
		{
			submitBtn.hide();
			submitBtnProcess.show();
			var formdata=$('#form_fp_enter_otp').serialize();
			
			$.ajax({
			url:'/forgotpassword/check_otp',
			type:'POST',
			data:formdata,
			dataType:'json',
			success:function(data)
				{
					submitBtn.show();
					submitBtnProcess.hide();
					
					if(data.result=='success')
					{
						$('#FPRP_user').val(data.user);
						
						$('#form_fp_resetPass').show();
						$('#form_fp_enter_otp').hide();
					}
					else
					{
						alert(data.error);
					}
				}
			});
			
		}
	});
	
	$('#FPRP_btn').click(function(){
		
		var submitBtn=$('#FPRP_btn');
		var submitBtnProcess=$('#FPRP_process');
			
		var $pwd=$('#FPRPpwd');
		var $pwd_c=$('#FPRPpwd_c');
		
		var pwd=$pwd.val().trim();
		var pwd_c=$pwd_c.val().trim();
		
		if(pwd=='' || pwd_c=='' || pwd!=pwd_c)
		{
			var alerts='';
			if(pwd=='')
				alerts +='pwd  ';
			if(pwd_c=='')
				alerts +='pwd_c  ';
			if(pwd!=pwd_c)
				alerts +='pwd!=pwd_c  ';
			alert(alerts);
		}
		else
		{
			submitBtn.hide();
			submitBtnProcess.show();
					
			var formdata=$('#form_fp_resetPass').serialize();
					
			$.ajax({
			url:'/forgotpassword/reset_pass',
			type:'POST',
			data:formdata,
			dataType:'json',
			success:function(data)
				{
					submitBtn.show();
					submitBtnProcess.hide();
					if(data.result=='success')
					{
						window.location='/'
					}
					else
					{
						alert('some error');
					}
				}
		});
	}
		
	});
	
	$('#form_fpro_submit').click(function(){
		var submitBtn=$('#form_fpro_submit');
		var submitBtnProcess=$('#form_fpro_process');
		
		submitBtn.hide();
		submitBtnProcess.show();
		var formdata=$('#form_fp').serialize();
			$.ajax({
				url:'/forgotpassword/send_otp',
				type:'POST',
				dataType:"json",
				data:formdata,
				success:function(data)
					{
						submitBtn.show();
						submitBtnProcess.hide();				
						if(data.result=='success')
						{
							alert('OTP resent');
							$('#forgotPasswordROModal').modal('toggle');
						}
					}
			});
			
	});
	//Forgot password #ENDS
		
});