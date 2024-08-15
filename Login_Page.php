<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel="icon" href="Pics/icon.jpg" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body class="loginBody">
	<form method="post">
	 <div class="container">

        <div class="section1">
            <h2>Welcome Back!</h2>
            <p>Log in to your account to upload or download pictures, videos or music.</p>
			
            <input type="email" name="email" id="email" placeholder="Enter your Email Address">
			<input type="password" name="password" id="password" placeholder="Enter your Password"><br><br>
					<p style="padding-left: 10%"><button type="button" onClick="login_now()" class="submit">Login Now</button></p> <br>
			<div class="message"></div>
            <div class="Forget">
				
                <a href="#">Forgot password?</a>
            </div>
            <hr>
           <h5 style="color: #323031" align="center">Don't you have an account yet?<a style="text-decoration: none; color: #177E89" href="Register_Page.php"> Register</a></h5>
        </div>
		</div>
	</form>
	<style>
	

	.container .message{
		color:red;
	}
	</style>
	
	<script>
function login_now(){
	var email=jQuery('#email').val();
	var password=jQuery('#password').val();
	
	jQuery.ajax({
		url:'login_check.php',
		type:'post',
		data:'email='+email+'&password='+password,
		success:function(result){
			if(result=='done'){
				window.location.href='HomePage.php';
			}
			jQuery('.message').html(result);
		}
	});
}
</script>
</body>
</html>
