$(document).ready(function(){

   $("#register").click(function(){
		
		var registerUsername = $("#register_user_name").val();
		var registerUserEmail = $("#register_user_email").val();
        var registerUserPassword = $("#register_user_password").val();
		var registerUserConfirmPassword = $("#register_user_password_confirm").val();	
		
		if (registerUserPassword.length >= 1) {
			
			if(registerUserPassword != registerUserConfirmPassword){
				// Prevent form submission
				event.preventDefault();
				$("#register_user_name").attr("placeholder", "Username").val("").focus().blur();
				$("#register_user_email").attr("placeholder", "Email Address").val("").focus().blur();
				$("#register_user_password").attr("placeholder", "Password").val("").focus().blur();
				$("#register_user_password_confirm").attr("placeholder", "Confirm Password").val("").focus().blur();
				$("#register-message").html("Passwords must match!");
				
						
			}else{
				$("#register_user_name").attr("placeholder", "Username").val("").focus().blur();
				$("#register_user_email").attr("placeholder", "Email Address").val("").focus().blur();
				$("#register_user_password").attr("placeholder", "Password").val("").focus().blur();
				$("#register_user_password_confirm").attr("placeholder", "Confirm Password").val("").focus().blur();
				
				$.ajax({
					type: "POST",
					url: "register.php",
					data: { 
						registeruser:registerUsername,
						registeremail:registerUserEmail, 
						registerpassword:registerUserPassword 
					},
					success: function(output){
						$("#register-message").html(registerUsername + " you have been registered!");

					}, error: function(output){
						$("#register-message").html("Ajax failed!");
					},
				});
				
				event.preventDefault();
				
			}
		}else{
			// Prevent form submission
            event.preventDefault();
			$("#register_user_name").attr("placeholder", "Username").val("").focus().blur();
			$("#register_user_email").attr("placeholder", "Email Address").val("").focus().blur();
			$("#register_user_password").attr("placeholder", "Password").val("").focus().blur();
			$("#register_user_password_confirm").attr("placeholder", "Confirm Password").val("").focus().blur();
			$("#register-message").html("Passwords cannot be blank!");
			
		}
		
    });

});
	
