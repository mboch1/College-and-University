$(document).ready(function(){

   $("#login").click(function(){
    
        username = $("#user_name").val();
        password = $("#password").val();
         $.ajax({
            type: "POST",
            url: "login.php",
            data: { 
				user:username,
				pass:password
			},
            success: function(html){
              if(html=='true')
              {
				$("#user_name").attr("placeholder", "Username").val("").focus().blur();
				$("#password").attr("placeholder", "Password").val("").focus().blur();
				$("#profile").html("<a class='logout-title ui-btn' href='logout.php'><img src='images/user2.png' style='width:30px; height:30px;'>Logout<img src='images/arrow_right.png' style='width:30px; height:30px; float: right;'></a>");
				$("#login-message").html("Welcome " + username + "... Enjoy!");
              }
              else
              {
                $("#user_name").attr("placeholder", "Username").val("").focus().blur();
				$("#password").attr("placeholder", "Password").val("").focus().blur();
				$("#login-message").html("Wrong username or password");
              }
            },
            beforeSend:function()
			{
                 $("#login-message").html("Loading...")
            }
        });
         return false;
    });
	
});