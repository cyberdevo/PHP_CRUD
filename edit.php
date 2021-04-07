<?php
include("db.php");
$title = '';
$description= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM task WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
   
    $username = $row['username'];
    $lastname = $row['lastname'];
    $password = $row['password'];
    $cellno = $row['cellno'];
    $email = $row['email'];
    $gender = $row['gender'];
    $dob = $row['dob'];
  
  }
  else {
    # code...
    print_r("Error");
  }
}

if (isset($_POST['update'])) {
  $id = $_POST['id'];

  $username = $_POST['username'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $cellno = $_POST['cellno'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];


  $query = "UPDATE task set username = '".$_POST['username']."',
                            lastname = '".$_POST['lastname']."',
                            password = '".$_POST['password']."',
                            cellno = '".$_POST['cellno']."',
                            email = '".$_POST['email']."',
                            gender = '".$_POST['gender']."',
                            dob ='".$_POST['dob']."'
                             WHERE id = '".$_POST['id']."' ";
   
   
mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: main.php');

}


?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $id; ?>" method="POST">
       
      <legend class= "text-success text-center font-weight-bolder">Updatation Form</legend>
          <div class="form-group">
          <input type="hidden" value="<?php echo $id;?>" name="id">
            <label for="" class = "text-success blockquote">Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">LastName</label>
            <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>"  >
          </div>
          <div class="form-group">
          <label for="" class = " text-success blockquote">Cell Number</label>
     
            <input type="text" name="cellno" class="form-control" value="<?php echo $cellno; ?>" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote" >DOB</label>
     
            <input type="date" id="dob" name="dob"class="form-control"  value="<?php echo $dob; ?>">
          </div>

          <div class="form-group d-flex justify-content-center m-auto ">

            <input type="radio" class = "checkbox-inline m-3" name="gender"  value="<?php echo $male; ?>"> <span class="text-success font-weight-bolder m-2 pt-1"> Male</span><br>
            <input type="radio" class = "checkbox-inline m-3" name="gender" value="<?php echo $female; ?>" > <span class="text-success font-weight-bolder m-2 pt-1"> Female</span><br>
            <input type="radio" class = "checkbox-inline m-3" name="gender" value="<?php echo $other; ?>"> <span class="text-success font-weight-bolder m-2 pt-1"> Other</span>
          </div>
          <button class="btn btn-rounded btn-success" name="update">
          Update
          </button>
       
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
