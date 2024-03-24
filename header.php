<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("config.php");

if(!isset($_SESSION['user'])) {
    header("location:index.php");
} else {
    $phone = $_SESSION['user'];
    $q3="select * from `user` where `phone`='$phone'";
    $e3=mysqli_query($conn,$q3);
    if(mysqli_num_rows($e3)>0)
    {
        $res=mysqli_fetch_row($e3);
    }
    $q4="SELECT * FROM `transaction` WHERE `phone` = '$phone' ORDER BY `id` DESC";
    $e4=mysqli_query($conn,$q4);
    if(mysqli_num_rows($e4)>0)
    {
        $res2=mysqli_fetch_row($e4);
    }
}
?>
<div class="row">
    <div class="col-lg-12 bg-primary">
        <nav class="navbar navbar-expand-sm navbar-light">
            <a class="navbar-brand" href="#">Welcome<span class="badge badge-primary"><?php echo"$res[1]";?></span></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="profile.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Wallet <span class="text-white">(<?php echo"$res2[6]";?>)</span></a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile Setting</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                           <!-- <a class="dropdown-item" href="change_pwd.php">Change Password</a> -->
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
