
<?php
$msg = "";
if(isset($_POST['submit'])){
	

	$email = $_POST['email'];
	$password = $_POST['password'];
	$degree = $_POST["degree"];
	$sem = $_POST["sem"];
	$year = $_POST["year"];
	$first_Name = $_POST["first_Name"];
	$last_Name = $_POST["last_Name"];
	$it_Num = $_POST["it_Num"];
	$mobile_Num =$_POST["mobile_Number"];
	
	
	 $con = mysqli_connect("localhost", "root", "","divergent_db"); 
	 if(!$con)
	 {
				 die("cannot connect to DB server");
	 }
	
	 $sql2 ="SELECT * FROM `user` WHERE email = '$email'";
	$check = mysqli_query($con,$sql2);
	if(mysqli_num_rows($check)>0)
	{
		$msg = "Email id already present";
	}
	else
	{
	
		$verification_id = rand(111111111,999999999);
		
	
		mysqli_query($con,"INSERT INTO `user` (`id`, `first_Name`, `last_Name`, `mobile_Num`, `it_Num`, `degree_Type`, `year`, `semester`, `email`, `password`, `verification_status`, `verification_id`, `otp`, `filepath`) VALUES (NULL, '$first_Name', '$last_Name', '$mobile_Num', '$it_Num', '$degree', '$year', '$sem', '$email', '$password', '0', '$verification_id', '0', 'images/user.png');");
		
		
		
		$msg="We've just sent a verification link to <strong>$email</strong>.Please check your inbox and click on the link to get started.If you cant find this email(which could be due to spam filters),just request a new one here.";
		
		$mailHtml="please confirm your account registration by clicking the button or link below:<a href='
		http://localhost/final_project/check_Link.php?id=$verification_id'>
		http://localhost/final_project/check_Link.php?id=$verification_id</a>";
		
		include('smtp/PHPMailerAutoload.php');
		$mail=new PHPMailer(true);
		$mail->isSMTP();
		$mail->Host="smtp.gmail.com";
		$mail->Port=587;
		$mail->SMTPSecure="tls";
		$mail->SMTPAuth=true;
		$mail->Username="divergent1500@gmail.com";
		$mail->Password="196426kavi";
		$mail->SetFrom("divergent1500@gmail.com");
		$mail->addAddress($email);
		$mail->IsHTML(true);
		$mail->Subject="Account Verification";
		$mail->Body=$mailHtml;
		$mail->SMTPOptions=array('ssl'=>array(
			'verify_peer'=>false,
			'verify_peer_name'=>false,
			'allow_self_signed'=>false
		));
	$mail->send();
	
	}
		
}
	
	




?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<link rel="icon" href="Pics/icon.jpg" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	
	
	<style>
	
	.container
	</style>
	<script type="text/javascript">
function validatefirstName()
{
	var name = document.getElementById("first_Name").value;
	if((name == "")||(name == null))
	{
		alert("Please Enter your First name");
		return false;
	}
	return true;
}
function validatelastName()
{
	var name = document.getElementById("last_Name").value;
	if((name == "")||(name == null))
	{
		alert("Please Enter your Last name");
		return false;
	}
	return true;
}
function validateEmail()
{
	var email = document.getElementById("email").value;
	var at = email.indexOf("@");
	var dt = email.lastIndexOf(".");
	var len = email.length;
	
	if((at < 2)||(dt-at < 2)||(len-dt < 2))
	{
		alert("Please enter a valid email address");
		return false;
	}
	return true;
}
function validatePassword()
{
	var pwd = document.getElementById("password").value;
	var cpwd = document.getElementById("confirm_Passowrd").value;
	if((pwd.length < 5)||( pwd != cpwd))
	{
		alert("Please Enter Correct password and confirmation Password");
		return false;
	}
return true;
}
function validateContact()
{
	var cno = document.getElementById("mobile_Number").value;
	if((isNaN(cno))||(cno.length != 10))
	{
		alert("Please enter a valid contact number");
		return false;
	}
	return true;
}
function validateItnumber()
{
	var cno = document.getElementById("it_Num").value;
	if(cno.length != 10)
	{
		alert("Please enter a valid It number");
		return false;
	}
	return true;
}	
		
function validateDegree()
{
	var degree = document.getElementById("degree").value;
	if(degree=="notselected")
	{
		alert("Select A Degree Type");
		return false;
	}
	return true;
}		
	
function validateSem()
{
	var degree = document.getElementById("sem").value;
	if(degree=="notselected")
	{
		alert("Select the Semester!");
		return false;
	}
	return true;
}		
		
		
		
function validateYear()
{
	var degree = document.getElementById("year").value;
	if(degree=="notselected")
	{
		alert("Select the Year!");
		return false;
	}
	return true;
}		
						
		
		
		
		
function Validate()
{
	if(validatefirstName()&& validatelastName()&& validateContact() && validateItnumber()&&validateDegree()&&validateSem()&&validateYear()&& validateEmail()&&validatePassword())
	{
		
	}
	else
	{
		event.preventDefault();
	}
}
</script>
</head>

<body class="loginBody">
	<form method="post">
	 <div class="container">
		

        <div class="section1">
            <h2>Create Account!</h2>
            <p>Register with SASS for  better a learnig experience!</p>
			
			<table>
			<tr>
			<td> <input type="text" name="first_Name" id="first_Name"placeholder="First Name"></td>
			<td> <input type="text" name="last_Name" id="last_Name" placeholder="Last Name"></td>
			</tr>
			<tr>
			<td> <input type="text" name="it_Num" id="it_Num" placeholder="IT Number"></td>
			<td> <input type="text" name="mobile_Number" id="mobile_Number"placeholder="Mobile Number"></td>
			</tr>
			</table>
			
			<select name="degree" id="degree" class="SelectFull" >
			  <option selected disabled value="notselected">Select Degree Type</option>
			  <option value="B.Sc. (Hons) Computer Science and Software Engineering (UOB)">B.Sc. (Hons) Computer Science and Software Engineering (UOB)</option>
			  <option value="B.Sc. (Hons) Computer Networking (UOB)">B.Sc. (Hons) Computer Networking (UOB)</option>
              <option value="BA (Hons) Business Administration (UOB)">BA (Hons) Business Administration (UOB)</option>
			  <option value="Foundation Certificate in Information Technology (FCIT)">Foundation Certificate in Information Technology (FCIT)</option>
		      <option value="Foundation Certificate in Business Management (FCBM)">Foundation Certificate in Business Management (FCBM)</option>
			</select>
			
			<table>
			<tr>
			<td> 
				<select name="year" id="year" class="SelectHalf" style="width: 120%">
				  <option selected disabled value="notselected">Select Year</option>
				  <option value="Year 01">Year 01</option>
				  <option value="Year 02">Year 02</option>
				  <option value="Year 03">Year 03</option>
				</select>
			</td>
				
			<td> 
				<select name="sem" id="sem" class="SelectHalf" style="margin-left: 40%" > 
				  <option selected disabled value="notselected">Select Semester</option>
				  <option value="Semster 01">Semster 01</option>
				  <option value="Semster 02">Semster 02</option>
				</select>
			</td>
			</tr>
			</table>
			
			<input type="email" name="email" id="email"placeholder="Email Address" style="width: 85%">
			<input type="password" name="password" id="password" placeholder=" Password" style="width: 85%">
			<input type="password" name="confirm_Passowrd" id="confirm_Passowrd" placeholder=" Confirm Password" style="width: 85%">
			<br><br>
			<p style="padding-left: 12%"><button type="submit" id="submit" name="submit" onClick="Validate()" class="submit">Register</button></p> <br>
			
           
			<div class = "message">
			<?php
			echo "$msg";
			?>
		</div>	
           <h5 style="color: #323031" align="center">Do have an account?<a style="text-decoration: none; color: #177E89" href="Login_Page.php"> Login</a></h5>
        </div>
	
    </div>
	</form>
	<style>
	
	
	.container .message{
		color:red;
	}
	</style>
	
</body>
</html>

