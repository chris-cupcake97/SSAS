<?php 
session_start();
include ('includes/header.php');
include ('includes/navbar.php');

?>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="addadminprofile" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">
      <div class="modal-body">
      <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control checking_email" placeholder="Enter Email">
                <small class="error_email" style="color: red;"></small>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>

        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="registerbtn" value="Save Changes" class="btn btn-primary">
      </div>
</form>
    </div>
  </div>
</div>

<div class="container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-1">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
       Add Admin Profile 
      </button>
</h6>
</div>

<div class="card-body">

<?php  
if(isset($_SESSION['success'])&& $_SESSION['success'] !='')
{
    echo '<h3>'. $_SESSION['success'].'</h3>';
    unset($_SESSION['success']);
}
if(isset($_SESSION['status'])&& $_SESSION['status'] !='')
{
    echo '<h3>'. $_SESSION['status'].'</h3>';
    unset($_SESSION['status']);
}


?>

    <div class="table-responsive">
     
    <?php
    $connection=mysqli_connect("localhost:3308","root","","admin");
    $query="SELECT * FROM register";
    $query_run = mysqli_query($connection, $query);
    ?>

        <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Edit</th>
                <th>Delete</th>
               </tr>
           </thead>
       <tbody>
       <?php 
       if(mysqli_num_rows($query_run)>0)
      {
        while($row = mysqli_fetch_assoc($query_run))
        {
         ?>

        
            <tr>
             <td><?php echo $row['userID']; ?></td>
             <td><?php echo $row['username']; ?></td>
             <td><?php echo $row['email'];  ?></td>
             <td><?php echo $row['password']; ?></td>
             <td>
               <form action="register_edit.php" method="post">
                  
                 <input type="hidden" name="edit_id" value="<?php echo $row['userID'];?>">
                   <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
        </form>
             </td>
             <td>
                 <form action="code.php" method="post">
                 <input type="hidden" name="delete_id" value="<?php echo $row['userID'];?>">
                  <button type="submit" name="deletebtn" class="btn btn-success">DELETE </button>
                  </form>
             </td>
           </tr>
           <?php
         }
       }
      else{
        echo "No record found";
      }
     ?>
       </tbody> 
      </table>
    </div >
</div>
</div>
</div>
</div> 
            







<?php 
include ('includes/scripts.php');
include ('includes/footer.php');
?>











 