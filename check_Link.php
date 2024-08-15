<?php


$con = mysqli_connect("localhost","root","","divergent_db");


$id =mysqli_real_escape_string($con,$_GET['id']);


mysqli_query($con,"update user set verification_status='1' where verification_id='$id'");
echo "your account verified";
?>
<a href= "Login_Page.php"><br><strong>Click here for Login</strong></br></a>



?>