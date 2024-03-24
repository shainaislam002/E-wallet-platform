<?php 
include("config.php"); 
?>
<?php
session_start();
?>
<?php if(isset($_SESSION['user']))
{
  header("location:profile.php");
}
?>
<?php
if(isset($_POST['btn2']))
{
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $status=$_POST['status'];

  $q3="select * from `user` where `phone`='$phone'";
  $e3=mysqli_query($conn,$q3);
  if(mysqli_num_rows($e3)>0)
  {
    $msg = "Acount already exist";
  }
  else
  {
  $q1="INSERT INTO `user`(`name`, `phone`, `password`, `status`) VALUES ('$name', '$phone','$password','$status')";
  $e1=mysqli_query($conn,$q1);

  $q2="INSERT INTO `transaction` (`phone`,`description`,`amount`,`type`,`wallet`) VALUES ('$phone', 'ACCOUNT CREATION', '50', '-','50');";
  $e2=mysqli_query($conn,$q2);

  if($e1 && $e2)
  {
    $msg="Inserted sucessfully";
  }
  else
  {
    $msg="Insertion failed";
  }
}
}
//////
else if(isset($_POST['btn1']))
{
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $q3="select * from `user` where `phone`='$phone' and `password`='$password'";
  $e3=mysqli_query($conn,$q3);
  if(mysqli_num_rows($e3)>0)
  {
    $_SESSION['user']=$phone;
    header("location:profile.php");
  }
  else
  {
  $msg="invalid login details";
}
}
  else
  {
    $msg="";
  }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-sm navbar-light bg-light">
                    <a class="navbar-brand" href="#">PayTM</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <button type="button" class="btn btn-primary mr-2" data-toggle="modal" data-target="#loginModal">Login</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Register</button>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <h4><?php echo $msg ?></h4>
                <img src="saving-money-to-e-wallet-concept-financial-saving-transfer-and-online-payment-landing-page-template-for-banner-flyer-ui-web-mobile-app-poster-free-vector.jpg" class="img-fluid" alt="Image" style="height: 691px; width: 100%;">
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">User Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="loginPhone">Phone</label>
                            <input type="number" class="form-control" name="phone" id="loginPhone" aria-describedby="loginPhoneHelp" placeholder="Enter your phone number" required>
                            <small id="loginPhoneHelp" class="form-text text-muted">Please enter your phone number.</small>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password</label>
                            <input type="password" class="form-control" name="password" id="loginPassword" aria-describedby="loginPasswordHelp" placeholder="Enter your password" required>
                            <small id="loginPasswordHelp" class="form-text text-muted">Please enter your password.</small>
                        </div>
                        <button type="submit" name="btn1" class="btn btn-primary">Login</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">User Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="registerName">Name</label>
                            <input type="text" class="form-control" name="name" id="registerName" aria-describedby="registerNameHelp" placeholder="Enter your name" required>
                            <small id="registerNameHelp" class="form-text text-muted">Please enter your name.</small>
                        </div>
                        <div class="form-group">
                            <label for="registerPhone">Phone</label>
                            <input type="number" class="form-control" name="phone" id="registerPhone" aria-describedby="registerPhoneHelp" placeholder="Enter your phone number" required>
                            <small id="registerPhoneHelp" class="form-text text-muted">Please enter your phone number.</small>
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Password</label>
                            <input type="password" class="form-control" name="password" id="registerPassword" aria-describedby="registerPasswordHelp" placeholder="Enter your password" required>
                            <small id="registerPasswordHelp" class="form-text text-muted">Please enter your password.</small>
                        </div>
                        <input type="hidden" value="1" name="status">
                        <button type="submit" name="btn2" class="btn btn-primary">Register</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>