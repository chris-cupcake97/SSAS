<?php
	$msg="";

if(isset($_POST['submit'])){

	
	
	$con=  mysqli_connect('localhost','root','','divergent_db');
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$comment = mysqli_real_escape_string($con,$_POST['message']);
	
	mysqli_query($con,"INSERT INTO `contact_us` (`id`, `name`, `email`, `comment`) VALUES (NULL, '".$name."', '".$email."', '".$comment."');");
	$msg= "Email Send! Will contact You as soon as possible!! ";
	
	
	$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>Email</td><td>$email</td></tr><br/><tr><td>Message</td><td>$comment</td></tr></table>";
	
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
	$mail->addAddress("divergent1500@gmail.com");
	$mail->IsHTML(true);
	$mail->Subject="New Contact Us";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	$mail->send();
	echo $msg;
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Contact Us</title>
	<link rel="icon" href="Pics/icon.jpg" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
</head>

<body>
	
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	
	<!-- Navigation Bar-->
	
	<table style="width: 100%; background-color: #FFC857; height: 70px">
	<td width="75%">
		<div><img src="Pics/Login_NavNew.jpg" style="width: 25%; margin-left: 4%"></div>	
	</td>
	
	<td width="25%">
		<div><a href="UserProfile_Edit.html"><img src="Pics/User.png" style="width: 15%; float: right; margin-right: 8%"></a></div>
		
		
	</td>
	</table>
	
	<div class="wrapper">
	<div class="navbar navbar_1">
		<ul class="menu">
			<li><a href="HomePage.php">Posts</a></li>
			<li><a href="#">Library</a></li>
			<li><a href="#">Online Kuppi</a></li>
			<li><a href="About_Page.php">About Us</a></li>
			<li><a href="Contact_Page.php" class="active">Contact Us</a></li>
		</ul>
	</div>
</div>
	
	<br><br><br><br>
	
	<form method="post">
	
		<div class="content">
	<div class="contact">
		<div class="other">
			<h1 style="color: #1eabff; padding-left: 3%; font-size: 50px">Get In Touch</h1>
			<h4 style="color: #ffffff; padding-left: 5%">Have any Qesuestions?</h4>
			<h4 style="color: #ffffff; padding-left: 5%">We'd Love to hear from You!</h4>
			
		</div>
		<div class="form">
			<h1>Contact Us!</h1>
			
				<div class="flex-rev">
					<input type="text" placeholder="Anderson Carter" name="name" id="name"  required/>
					<label for="name" style="font-size: 15px; font-weight: 750">Full Name</label>
				</div>
				<div class="flex-rev">
					<input type="email" placeholder="anderson98@gmail.com" name="email" id="email"  required/>
					<label for="email" style="font-size: 15px; font-weight: 750">Your Email</label>
				</div>

				<div class="flex-rev">
					<textarea placeholder="I have an idea for a project...." name="message" id="message" required></textarea>
					<label for="message" style="font-size: 15px; font-weight: 750">Your Message</label>
				</div>
				<button type="submit"class="submit" name="submit" id="submit">Send Message</button>
			<br/>
				<span style="color:red; padding-right: 140px;"><?php echo $msg ?>	</span> 	
						
		</div>
	</div>
</div>
	
	
	</form>
	
	
	<br><br>
	<div class="contact-info">
  <div class="card">
    <i class="icon fas fa-envelope"></i>
    <div class="card-content">
      <h3>Email</h3>
      <span>help@ssas.com</span>
    </div>
  </div>

  <div class="card">
    <i class="icon fas fa-phone"></i>
    <div class="card-content">
      <h3>Phone Number</h3>
      <span>(+94) 77 1551559</span>
    </div>
  </div>

  <div class="card">
    <i class="icon fas fa-map-marker-alt"></i>
    <div class="card-content">
      <h3>Location</h3>
      <span>Sri Lanka</span>
    </div>
  </div>
</div>
	<br><br>
	
	<!-- Footer -->
	
	<div class="wrapper">
    <div class="footer">
        <div class="footer_menu">
			
			 <div class="col_1" style="padding-left: 4%">
             <div class="title">
				 <br><br>
                Quick Links
              </div>  
              <ul>
                <li><a href="#">Past Papers</a></li>
                <li><a href="#">Reference Books</a></li>
                <li><a href="#">Quiz</a></li>
                <li><a href="#">Online Kuppi</a></li>
              </ul>
           </div>
         
           <div class="col_2" style="padding-left: 7%">
             <div class="title">
				 <br><br>
                About  
              </div>  
              <ul>
                <li><a href="About_Page.php">About Us</a></li> 
                <li><a href="Developers_Page.php">About Developers</a></li>
              </ul>
           </div>
			
			 <div class="col_3" style="padding-left: 7%">
             <div class="title">
				 <br><br>
                Contact
              </div>  
              <ul>
                <li><a href="Contact_Page.php">Contact Us</a></li>
                <li><a href="ContactLecturers_Page.php">Contact Lecturers</a></li>
              </ul>
           </div>
			
			 <div class="col_4" style="padding-left: 7%">
             <div class="title">
				 <br><br>
                Help & Support 
              </div>  
              <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Terms & Conditions</a></li>
              </ul>
           </div>
			
			
			
           <div class="col_5"> 
              <ul>
                <li><a href="HomePage.php"><img src="Pics/logo.jpg" width="75%" style="float: right; clear: right; padding-right: 20%"></a></li>
              </ul>
          </div>
			
			
        </div>
        
        <div class="social_media">
            <ul>
                <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
            </ul>
            <p>Copyright © Team Divergents</p>
			<br><br>
        </div>
    </div>
</div>
	
</body>
</html>
