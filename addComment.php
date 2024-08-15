<?php session_start();



		
$con = mysqli_connect("localhost","root","","divergent_db");
										if(!$con)
										{	
											die("Cannot upload the file, Please choose another file");		
										}
										
										   
										   //$postid= "SELECT postId FROM `post` WHERE `postId`='".$row["postId"]."' ";
											

										//$sql3 = "INSERT INTO `comment` (`commentId`, `email`, `postId`, `comment`, `date`) VALUES (NULL, '".$_SESSION['userName']."', '".$row["postId"]."','".$comment."', '1');";
 $comment = $_POST["txtComment"];	
										
										$sql3 = "INSERT INTO `comment` (`commentId`, `email`, `postId`, `comment`, `date`) VALUES (NULL, '".$_SESSION['userName']."','".$_GET['id']."','".$comment."', '1');";
										
										
										
										 mysqli_query($con,$sql3);
header('Location:HomePage.php');
										





?>