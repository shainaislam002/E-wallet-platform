<?php 
include("config.php"); 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
       <?php include("header.php"); ?>
<?php
if(isset($_POST['btn1']))
{
  extract($_POST);
  $q5="SELECT * FROM `transaction` WHERE `phone` = '$phone2' ORDER BY `id` DESC";
  $e5=mysqli_query($conn,$q5);
  if(mysqli_num_rows($e5)>0)
  {
      $res3=mysqli_fetch_row($e5);
  }

   if($amount<=$res2[6])
   {
    $wallet=$res2[6]-$amount;//mine
    $wallet2=$res3[6]+$amount;//to
    $description="Amount sended sucessfully to account ".$phone2;
    $q2="INSERT INTO `transaction` (`phone`,`description`,`amount`,`type`,`wallet`) VALUES ('$phone', '$description', '$amount', 'DR','$wallet')";
    $e2=mysqli_query($conn,$q2);

    $description2="Amount credited sucessfully from account ".$phone;
    $q3="INSERT INTO `transaction` (`phone`,`description`,`amount`,`type`,`wallet`) VALUES ('$phone2', '$description2', '$amount', 'CR','$wallet2')";
    $e3=mysqli_query($conn,$q3);

  if($e3)
  {
    $msg="Sended sucessfully";
  }
  else
  {
    $msg="failed";
  }
   }
   else
   {
      $msg = "Insufficient Balance";
   }
  
}
else
{
  $msg="";
}
?>

        <div class="row">
        <?php include("side_menu.php"); ?>
            <div class="col-lg-11">
              <!-- ///////////// -->
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">
             <span aria-hidden="true">&times;</span>
               <span class="sr-only">Close</span>
          </button>
           <strong><?php echo"$msg";?></strong>
            </div>
                <!-- //////////// -->
               <form action="" method="post">
                    <div class="form-group">
                      <label for="">Phone</label>
                      <input type="text" class="form-control" name="phone" value="<?php echo"$phone";?>" readonly id="" aria-describedby="emailHelpId" placeholder="">
                      <!--<small id="emailHelpId" class="form-text text-muted">*</small>-->
                    </div>
                    <div class="form-group">
                      <label for="">To</label>
                      <input type="number" class="form-control" name="phone2" id="" aria-describedby="emailHelpId" placeholder="">
                      <!--<small id="emailHelpId" class="form-text text-muted">*</small>-->
                    </div>
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="number" class="form-control" name="amount" id="" aria-describedby="emailHelpId" placeholder="">
                      <!--<small id="emailHelpId" class="form-text text-muted">*</small>-->
                    </div>
                    <div class="form-group">
                      <label for="">Type</label>
                      <input type="hidden" value="CR" class="form-control" name="type" id="" aria-describedby="emailHelpId" placeholder="">
                      <!--<small id="emailHelpId" class="form-text text-muted">*</small>-->
                    </div>
                    <button type="submit" name="btn1" class="btn btn-primary">Send</button>
               </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

