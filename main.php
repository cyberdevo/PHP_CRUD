<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row d-flex justify-content-center">
    <div class="col-md-8">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body shadow-lg p-5">
        <form action="save_task.php" method="POST">
          <legend class= "text-success text-center font-weight-bolder">Registeration Form</legend>
          <div class="form-group">
            <label for="" class = "text-success blockquote">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">LastName</label>
            <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" >
          </div>
          <div class="form-group">
          <label for="" class = " text-success blockquote">Cell Number</label>
     
            <input type="text" name="cellno" class="form-control" placeholder="Enter Cellno" >
          </div>
          <div class="form-group">
          <label for="" class = "text-success blockquote">DOB</label>
     
            <input type="date" id="dob" name="dob"class="form-control" >
          </div>

          <div class="form-group d-flex justify-content-center m-auto ">

            <input type="radio"  class = "checkbox-inline m-3" name="gender" value="male"> <span class="text-success font-weight-bolder m-2 pt-1"> Male</span><br>
            <input type="radio" class = "checkbox-inline m-3" name="gender" value="female"> <span class="text-success font-weight-bolder m-2 pt-1"> Female</span><br>
            <input type="radio" class = "checkbox-inline m-3" name="gender" value="other"> <span class="text-success font-weight-bolder m-2 pt-1"> Other</span>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Submit">
        </form>
      </div>
    </div>
    </div>
    <div class="row my-5">
    <div class="col-md-12">
      <table class="table table-bordered shadow-lg">
        <thead>
          <tr>
            <th>Username</th>
            <th>Lastname</th>
            <th>Password</th>
            <th>Cell Number</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Dob</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['lastname']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['cellno']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['created_at']; ?></td>

            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
