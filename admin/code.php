 <?php
session_start();

$connection=mysqli_connect("localhost:3308","root","","admin");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];   
    $cpassword = $_POST['confirmpassword'];

    
    if($password===$cpassword)
    {
        $query = "INSERT INTO register(username,email,password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);
            
        if($query_run)
        {
        //echo "Saved";
            $_SESSION['success'] = "Admin Profile Added";
            header('Location: register.php');
        }
        else 
        {
             $_SESSION['status'] = "Admin Profile Not Added";
            header('Location: register.php');  
        }
    }
    else 
    {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
    }
    
}
    




//when update button is clicked its redirected here-

if(isset($_POST['updatebtn']))
{
    $userID=$_POST['edit_id'];
    $username=$_POST['edit_username'];
    $email=$_POST['edit_email'];
    $password=$_POST['edit_password'];
    $query="UPDATE register SET username='$username',email='$email',password=' $password' WHERE userID='$userID'";
    $query_run=mysqli_query($connection,$query);

    IF($query_run)
    {
        $_SESSION['success']="Updated succesfully!";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status']="Unable to update!";
        header('Location: register.php');
    }
}


//when delete button is clicked
 

if(isset($_POST['deletebtn']))
{
    $userID=$_POST['delete_id'];
    $query="DELETE * FROM register WHERE userID='$userID' ";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success']="Deleted succesfully!";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status']="Unable to delete!";
        header('Location: register.php');
    }
    

}





//when login button is clicked

 if(isset($_POST['login_btn']))
 {
     $email_login=$_POST['email'];
     $password_login=$_POST['password'];

     $query="SELECT * FROM register WHERE email='$email_login' AND password='$password_login'";
     $query_run=mysqli_query($connection,$query);

     if(mysqli_fetch_array($query_run))
     {
         $_SESSION['username']=$email_login;
         header('Location: index.php');
     }
     else
     {
         $_SESSION['status']="Email or password is Invalid";
         header('Location: login.php');
     }

 }


?>