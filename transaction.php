
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
    <?php include("config.php"); ?>
    <?php
    $q1 = "SELECT * FROM `transaction` WHERE `phone`='$phone' ORDER BY `id` desc";
    $e1 = mysqli_query($conn, $q1);
    ?>
    <div class="row">
        <?php include("side_menu.php"); ?>
        <div class="col-lg-11">
        <input class="form-control col" id="myInput" type="text" placeholder="Search..">
            <table class="table">
                <thead>
                    <tr>
                        <th>Sl no</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Details</th>
                        <th>Wallet</th>
                        <th>Transaction Date</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    <?php
                    while ($result = mysqli_fetch_array($e1, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td scope="row"><?php echo $result["id"]; ?></td>
                            <td><?php echo $result["phone"]; ?></td>
                            <td>
                              <?php 
                              if($result["type"] == "DR")
                              {
                                echo "<label style = 'color:red;'> -".$result["amount"]."</label>"; 
                              }
                              else{
                                echo "<label style = 'color:green;'> +".$result["amount"]."</label>"; 
                              }
                                ?>
                              </td>

                            <td><?php echo $result["description"]; ?></td>
                            <td><?php echo $result["wallet"]; ?></td>
                            <td><?php echo $result["date"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

