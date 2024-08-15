<?php session_start();

if(!isset($_SESSION["usersnames"]))
{
	header('Location:Login_Page.php');
}

 ?>
<?php

	include 'header.php';
?>


<h3>Search Page</h3>

	<?php



		if(isset($_POST['submit-search'])){
			
			$search = mysqli_real_escape_string($con, $_POST['search']); //prevent sql injection 
			//$sql = "SELECT * FROM post WHERE title LIKE '%$search%' OR sem LIKE '%$search%' or year LIKE '%$search%'";
			
			$sql = "SELECT user.first_Name,user.filepath,post.postId,post.title,post.imagePath,post.year,post.sem,post.dateTime FROM user,post WHERE post.email=user.email AND post.title LIKE '%$search%' OR post.sem LIKE '%$search%' or post.year LIKE '%$search%'";
			$results = mysqli_query($con, $sql);
			$queryResults = mysqli_num_rows($results);
			
			echo "There are ".$queryResults." Results!"; 
			echo"<br/> <br/> <br/> ";
			
			if($queryResults >0){
				while($row = mysqli_fetch_assoc($results)){
					
					
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
										
									
										$con = mysqli_connect("localhost","root","","divergent_db");
										if(!$con)
										{	
											die("Cannot upload the file, Please choose another file");		
										}
										
										   
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
		
		}
	?>
<script>



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
	






</script>
