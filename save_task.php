<?php

include('db.php');

if (isset($_POST['save_task'])) {
 
  $username = $_POST['username'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $cellno = $_POST['cellno'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];

  echo '<pre>';
  print_r($_POST);
 
  
  
  $query = "INSERT INTO task(username,lastname,password,cellno,email,gender,dob) 
  VALUES (
    '".$username."',
    '".$lastname."',
    '".$password."',
    '".$cellno."',
    '".$email."',
    '".$gender."',
    '".$dob."')
    ";

  $result = mysqli_query($conn,$query);

  if(!$result) {
    echo die("Connection Failed due to . ".mysqli_error($conn));
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location:main.php');

}

?>
