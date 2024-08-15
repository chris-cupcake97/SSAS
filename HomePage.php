<?php session_start();

if(!isset($_SESSION["usersnames"]))
{
	header('Location:Login_Page.php');
	
}

 ?>
<?php


include 'dbconnection.php';
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>SSAS</title>
	<link rel="icon" href="Pics/icon.jpg" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="CSS/Style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
	<script type="text/javascript">
	
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
		
		
		
	function validateSem2()
	{
		var degree = document.getElementById("sem2").value;
		if(degree=="notselected")
		{
			alert("Select the Semester!");
			return false;
		}
			return true;
	}	
		
		function validateSem3()
	{
		var degree = document.getElementById("sem3").value;
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
	function validateYear2()
	{
		var degree = document.getElementById("year2").value;
		if(degree=="notselected")
		{
			alert("Select the Year!");
			return false;
		}
			return true;
	}	
	function validateYear3()
	{
		var degree = document.getElementById("year3").value;
		if(degree=="notselected")
		{
			alert("Select the Year!");
			return false;
		}
			return true;
	}	
		

		
	function Validate()
	{
		if(validateYear()&&validateSem())
		{

		}
		else
		{
			event.preventDefault();
		}
	}
		
		function Validate2()
	{
		if(validateYear2()&&validateSem2())
		{

		}
		else
		{
			event.preventDefault();
		}
	}
	function Validate3()
	{
		if(validateYear3()&&validateSem3())
		{

		}
		else
		{
			event.preventDefault();
		}
	}
	
	
	</script>

	
</head>

<body>
	
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	
	<table style="width: 100%; background-color: #FFC857; height: 70px">
	<td width="75%">
		<div><img src="Pics/Login_NavNew.jpg" style="width: 25%; margin-left: 4%"></div>	
	</td>
	
	<td width="25%">
		<div><a href="UserProfile_Edit.php"><img src="Pics/User.png" style="width: 15%; float: right; margin-right: 8%"></a></div>
		
		
	</td>
	</table>
	
	
	<div class="wrapper">
	<div class="navbar navbar_1">
		<ul class="menu">
			<li><a href="HomePage.php" class="active">Posts</a></li>
			<li><a href="#">Library</a></li>
			<li><a href="#">Online Kuppi</a></li>
			<li><a href="About_Page.php">About Us</a></li>
			<li><a href="Contact_Page.php">Contact Us</a></li>
			
		</ul>
	</div>
</div>
	
	<br><br>
	
	<a href="#"><img src="Pics/bot.gif" class="chatbot"></a>
	
	<!-- The form -->
<form class="example" action="searchBar.php" method="post">
  <input type="text" placeholder="Search" name="search">
  <button type="submit" name="submit-search"><i class="fa fa-search"></i></button>
</form>
	
	<br><br>
	
	<div class="post-bar">
  <a href="#" class="popup-trigger" title="info"><i class="fa fa-pencil-square-o"></i></a>  
  <a href="#" class="popup1-trigger" title="info"><i class="fa fa-file-image-o"></i></a> 
  <a href="#" class="popup2-trigger" title="info"><i class="fa fa-file-video-o"></i></a> 
</div>
	
	<div class="popup" role="alert">
		
<form id="form1" name="form1" method="post" action="HomePage.php" enctype="multipart/form-data">
  <div class="popup-container">
    <a href="#0" class="popup-close img-replace">Close</a>
    <h2 align="center" style="color: #FFC857; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', 'monospace'; margin-top: -60px">Create Post</h2>
	  <hr>
	 			  <div class="contentTime">
    <div class="author">
		 <?php
		
			
		$sql ="SELECT * FROM `user` WHERE `email`='".$_SESSION["usersnames"]."'";	
		$result = mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo"<img class='author__avatar' src='".$row["filepath"]."'/>
				<div class ='author__details'>
				 <div><a href='#' rel='author'>".$row["first_Name"]."</a></div>
				 </div>
				 </div>
				 </div>";
				
			}
		}
					
		
		
		?>
	  <table style="margin-left: 2%;">
			<tr>
			<td> 
				<select name="year" id="year" class="Selectoption" >
				  <option selected disabled value="notselected">Select Year</option>
				  <option value="Year 01">Year 01</option>
				  <option value="Year 02">Year 02</option>
				  <option value="Year 03">Year 03</option>
				</select>
			</td>
				
			<td> 
				<select name="sem" id="sem" class="Selectoption" > 
				  <option selected disabled value="notselected">Select Semester</option>
				  <option value="Semster 01">Semster 01</option>
				  <option value="Semster 02">Semster 02</option>
				</select>
			</td>
			</tr>
			</table>
	  <br>
<textarea class="popuptextarea"  name="txtTitle"  id="txtTitle"  placeholder="Whats on your mind, Users-Name?" required></textarea>
<?php

	   if(isset($_POST["btnsubmit"]))
	   {
		   date_default_timezone_set("Asia/Colombo");
		  
		
		   $title = $_POST["txtTitle"];		   
		   $year= $_POST["year"];
		   $sem= $_POST["sem"];
		
		   
		   $sql = "INSERT INTO `post` (`postId`, `title`, `email`, `year`, `sem`, `dateTime`, `imagePath`, `videoPath`) VALUES (NULL, '".$title."', '".$_SESSION['usersnames']."', '".$year."', '".$sem."', '".date("Y-m-d h:i:sa")."', '0', '0');";

	if(  mysqli_query($con,$sql))
	{
		echo "File uploaded Successfully";
		 
	}
	else
	{
		
		echo "Opps something is wrong, Please select the file again";
	}
		
} 
	  ?> 
	   <br><br>
	  <button type="submit"  name="btnsubmit" onClick="Validate()"  class="submit">Post</button>
  </div> 
	  </form>
</div>
	
	
	
	
	
	
	
		<div class="popup1" role="alert">
	<form id="form2" name="form2" method="post" action="HomePage.php" enctype="multipart/form-data">
  <div class="popup1-container">
    <a href="#0" class="popup1-close img-replace">Close</a>
    <h2 align="center" style="color: #FFC857; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', 'monospace'; margin-top: -60px">Upload Image</h2>
	  <hr>
	 			  <div class="contentTime">
	  <div class="author">
		  <?php
		  
		  		
			$sql ="SELECT * FROM `user` WHERE `email`='".$_SESSION["usersnames"]."'";	
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo"<img class='author__avatar' src='".$row["filepath"]."'/>
					<div class ='author__details'>
					 <div><a href='#' rel='author'>".$row["first_Name"]."</a></div>
					 </div>
					 </div>
					 </div>";

				}
		}
					
		  
		  
		  ?>
		   <table style="margin-left: 2%;">
			<tr>
			<td> 
				<select name="year2" id="year2" class="Selectoption" >
				  <option selected disabled value="notselected">Select Year</option>
				  <option value="Year 01">Year 01</option>
				  <option value="Year 02">Year 02</option>
				  <option value="Year 03">Year 03</option>
				</select>
			</td>
				
			<td> 
				<select name="sem2" id="sem2" class="Selectoption" > 
				  <option selected disabled value="notselected">Select Semester</option>
				  <option value="Semster 01">Semster 01</option>
				  <option value="Semster 02">Semster 02</option>
				</select>
			</td>
			</tr>
			</table><br><br>
		  
		
	<textarea class="popuptextarea"  name="txtTitle2"  id="txtTitle2"  placeholder="Whats on your mind, Users-Name?" required></textarea><br>
	     
  		
		<div>
		
                    <!--<img src="Pics/Email_Icon.png">-->
				
				<input type="file" id="myfile" name="myfile" class="submitFile"  required>
		
			 
		  
		 </div> <br><br>
	
	<?php
		  
		  
		    if(isset($_POST["btnsubmit2"]))
	   {
		   date_default_timezone_set("Asia/Colombo");
		  
		
		   $title = $_POST["txtTitle2"];		   
		   $year= $_POST["year2"];
		   $sem= $_POST["sem2"];
			$image = "uploads/".basename($_FILES["myfile"]["name"]);
			move_uploaded_file($_FILES["myfile"]["tmp_name"],$image);
			
		
		   
		   $sql = "INSERT INTO `post` (`postId`, `title`, `email`, `year`, `sem`, `dateTime`, `imagePath`, `videoPath`) VALUES (NULL, '".$title."', '".$_SESSION['usersnames']."', '".$year."', '".$sem."', '".date("Y-m-d h:i:sa")."', '".$image."', '0');";

	if(  mysqli_query($con,$sql))
	{
		echo "File uploaded Successfully";
	}
	else
		echo "Opps something is wrong, Please select the file again";
		
} 
	  ?>   
		  
	  <br>
    <button type="submit"  name="btnsubmit2" onClick="Validate2()"  class="submit">Post</button>
  </div> 
</form>
</div>
	<!---The last submit form -->

				<div class="popup2" role="alert">
	<form id="form3" name="form3" method="post" action="HomePage.php" enctype="multipart/form-data">
  <div class="popup2-container">
    <a href="#0" class="popup2-close img-replace">Close</a>
    <h2 align="center" style="color: #FFC857; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', 'monospace'; margin-top: -60px">Upload Video</h2>
	  <hr>
	 			  <div class="contentTime">
	  <div class="author">
		<?php
		  
		  		
		 
			$sql ="SELECT * FROM `user` WHERE `email`='".$_SESSION["usersnames"]."'";	
			$result = mysqli_query($con,$sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					echo"<img class='author__avatar' src='".$row["filepath"]."'/>
					<div class ='author__details'>
					 <div><a href='#' rel='author'>".$row["first_Name"]."</a></div>
					 </div>
					 </div>
					 </div>";

				}
		}
					
		  ?>
		    <table style="margin-left: 2%;">
			<tr>
			<td> 
				<select name="year3" id="year3" class="Selectoption" >
				  <option selected disabled value="notselected">Select Year</option>
				  <option value="Year 01">Year 01</option>
				  <option value="Year 02">Year 02</option>
				  <option value="Year 03">Year 03</option>
				</select>
			</td>
				
			<td> 
				<select name="sem3" id="sem3" class="Selectoption" > 
				  <option selected disabled value="notselected">Select Semester</option>
				  <option value="Semster 01">Semster 01</option>
				  <option value="Semster 02">Semster 02</option>
				</select>
			</td>
			</tr>
			</table>
	<textarea class="popuptextarea"  name="txtTitle3"  id="txtTitle3"  placeholder="Whats on your mind, Users-Name?" required></textarea><br>
		   <label for="path"><b>Select your file </b></label>
        <input type="file" name="contentFile" required />
		 	<?php
		  
		  
		    if(isset($_POST["btnsubmit3"]))
	   {
		   date_default_timezone_set("Asia/Colombo");
		  
		
		   $title = $_POST["txtTitle3"];		   
		   $year= $_POST["year3"];
		   $sem= $_POST["sem3"];
			$image = "uploads/".basename($_FILES["contentFile"]["name"]);
			move_uploaded_file($_FILES["contentFile"]["tmp_name"],$image);
			
		
		   
		   $sql = "INSERT INTO `post` (`postId`, `title`, `email`, `year`, `sem`, `dateTime`, `imagePath`, `videoPath`) VALUES (NULL, '".$title."', '".$_SESSION['usersnames']."', '".$year."', '".$sem."', '".date("Y-m-d h:i:sa")."', '0', '0');";

	if(  mysqli_query($con,$sql))
	{
		echo "File uploaded Successfully";
	}
	else
		echo "Opps something is wrong, Please select the file again";
		
} 
	  ?> 
		  <br><br>
	    <button type="submit"  name="btnsubmit3" onClick="Validate3()"  class="submit">Post</button>
  </div> 
</form>
		
						
</div>
	
		
	<br><br><br>
	<?php
		$checked = false;
		
		
			
	
			$sql = "SELECT user.first_Name,user.filepath,post.postId,post.title,post.imagePath,post.year,post.sem,post.dateTime FROM user,post WHERE post.email=user.email ORDER BY post.postId DESC";
			
				
					$result = mysqli_query($con,$sql);
				

					if(mysqli_num_rows($result)> 0)
					{
						while($row = mysqli_fetch_assoc($result))
						{
							
								

							echo"
									<div class='TimeLinecontainer'>
								<div class='box box1'>
										  <div class='contentTime'>
							  <div class='author'>
								<img class='author__avatar' src='".$row["filepath"]."'>
								<div class='author__details'>
								  <div><a href='#' rel='author'>".$row["first_Name"]."</a></div>
								  
								  <time title='29 July 2020'>".$row["dateTime"]."</time>

								</div>
							  </div>
							</div>
							
							
								<div class='text-box'>
							<p style='padding-left: 5%'>".$row["year"]."</p>
							<p style='padding-left: 5%'>".$row["sem"]."</p>
							</div>

							<div class='text-box'>
								<p>".$row["title"]."</p>
							</div>";

							if(!$row["imagePath"]==0)
							{
									echo"	<img src='".$row["imagePath"]."' alt='Paul George' class='box-img'>";
							}
							
							
							
							
							
							
							$sql12 = "SELECT `filepath` FROM `user` WHERE `email`='".$_SESSION['usersnames']."'";
							$result12 = mysqli_query($con,$sql12);
							$row5 = mysqli_fetch_assoc($result12);
									
				
							
								echo"	
								<table> 
								<tr>
									
									
										<td>
											<div class='contentTime'>
											  <div class='author'>
												<img class='author__avatar' src='".$row5["filepath"]."'>
												<div class='author__details'>
												</div>
											  </div>
											</div>
										</td>	
										
								<td>
							
									<form id='form11' name='form11' method='post' action='addComment.php?id=".$row['postId']."' enctype='multipart/form-data'>
									
									
									<textarea class='posttextarea' name='txtComment' id='txtComment' placeholder='Write a comment...' required></textarea>
									</td>

									<td>";
									/////miss help
									if(isset($_POST["btnsubmit11"])&& (!$checked))
								   {



									   $comment = $_POST["txtComment"];	
										
									
										
										   
										   //$postid= "SELECT postId FROM `post` WHERE `postId`='".$row["postId"]."' ";
											

										//$sql3 = "INSERT INTO `comment` (`commentId`, `email`, `postId`, `comment`, `date`) VALUES (NULL, '".$_SESSION['usersnames']."', '".$row["postId"]."','".$comment."', '1');";
										
										$sql3 = "INSERT INTO `comment` (`commentId`, `email`, `postId`, `comment`, `date`) VALUES (NULL, '".$_SESSION['usersnames']."','".$_GET['id']."','".$comment."', '1');";
										
										
										
										if(  mysqli_query($con,$sql3))
										{
										echo "Comment Added!";
										}
										else
											echo "Try again later";
										$checked= true;

									}

									echo "	<button class='submitComment' name='btnsubmit11' id='btnsubmit'>Post</button>
										</td>
									</tr>
									</table>";
									
									
									
									
									
									
									
									
							
								echo "</form>";
										
										
										
										
															
							
							
							
						echo "<form id='form13' name='form13' method='post'action=''>
						<div class='accordion'>
							<div class='accordion-item-header'>
							 <a href=''#' style='color: white; font-size: 20px'><i class='fa fa-comments'></i></a><span style='font-size: 18px; margin-left: 2%'> Comments</span>
							</div>
							<div class='accordion-item-body'>
							  <div class='accordion-item-body-content'>";			
							
							
			
				
				//	$sqlForComments = "SELECT * FROM `comment` WHERE `postId`='".$row["postId"]."'";
							
							$sqlForComments="SELECT comment.email,comment.commentId,comment.postId,comment.comment,comment.date,user.first_Name,user.filepath FROM user,comment WHERE comment.postId = '".$row["postId"]."' AND comment.email = user.email";
					//$sqlForComments = "SELECT comment.commentId,comment.email,comment.postId,comment.comment,comment.date,user.first_Name,user.filepath
									//	FROM user,comment,post
										//WHERE post.postId ='".$row["postId"]."' ";
					$result101 = mysqli_query($con,$sqlForComments);

						if(mysqli_num_rows($result101)> 0)
						{
							while($row101 = mysqli_fetch_assoc($result101))
							{			



										  echo "<div class='contentTime'>
									  <div class='author'>
										<img class='author__avatar' src='".$row101["filepath"]."' alt=' '>
										<div class='author__details'>
										  <div><a href='#' rel='author'>".$row101["first_Name"]."</a></div>
										  <time title='29 July 2020'></time>
										   <div><p href='#' rel='author' style='margin-top: 5%; color: white'>".$row101["comment"]."</p></div>
										</div>
									  </div>
									</div>";


								
							}
							
							
									
						}
				
			
				
				
			
		
							
				echo"		
				
				  </div>
							</div>
						</div>
						</div>

					</div>
					</form>
				</div>

				<br><br><br><br><br>";
						
					
				}
			}
		
		
						
		
		?>
	
		
					
	
	<br><br>
	<br>
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
		

	
</section>
	
	<script>
		jQuery(document).ready(function($){
  //open popup
  $('.popup-trigger').on('click', function(event){
    event.preventDefault();
    $('.popup').addClass('is-visible');
  });
  
  //close popup
  $('.popup').on('click', function(event){
    if( $(event.target).is('.popup-close') || $(event.target).is('.popup') ) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $('.popup').removeClass('is-visible');
      }
    });
});
		

				jQuery(document).ready(function($){
  //open popup
  $('.popup1-trigger').on('click', function(event){
    event.preventDefault();
    $('.popup1').addClass('is-visible');
  });
  
  //close popup
  $('.popup1').on('click', function(event){
    if( $(event.target).is('.popup1-close') || $(event.target).is('.popup1') ) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $('.popup1').removeClass('is-visible');
      }
    });
});
	
				jQuery(document).ready(function($){
  //open popup
  $('.popup2-trigger').on('click', function(event){
    event.preventDefault();
    $('.popup2').addClass('is-visible');
  });
  
  //close popup
  $('.popup2').on('click', function(event){
    if( $(event.target).is('.popup2-close') || $(event.target).is('.popup2') ) {
      event.preventDefault();
      $(this).removeClass('is-visible');
    }
  });
  //close popup when clicking the esc keyboard button
  $(document).keyup(function(event){
      if(event.which=='27'){
        $('.popup2').removeClass('is-visible');
      }
    });
});
		

		const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {

    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }
    
  });
});
		
	</script>
	
</body>
</html>
