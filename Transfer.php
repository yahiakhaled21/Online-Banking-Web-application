<?php
session_start();
include('conn.php');

if (isset($_POST['transfer'])) {
  $transferfrom = $_SESSION['login_accnumber'];
  $transferto = $_POST['transferto'];
  $amount = $_POST['amount'];

  $query = "SELECT * FROM account WHERE acnumber = '$transferto'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  $count = mysqli_num_rows($result);
  if ($result) {
    if ($count > 0 && $transferfrom != $transferto) {
      $sql = "SELECT balance FROM account WHERE acnumber = '$transferfrom'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      if ($row['balance'] > $amount) {
        $sql = "UPDATE account SET balance = balance - $amount  WHERE acnumber = '$transferfrom';";
        $sql .= "UPDATE account SET balance = balance + $amount  WHERE acnumber = '$transferto'";
        if ($conn->multi_query($sql) === TRUE) {
          $_SESSION['login_balance'] = $_SESSION['login_balance'] - $amount;
          echo '<script type="text/javascript">';
          echo 'alert("Transfer complete!");';
          echo 'window.location.href = "Account.php";';
          echo '</script>';
        } else {
          echo "<script>alert ('You don't have enough balance, please try again!'); </script>";
        }
      } else {
        echo "<script>alert ('You don't have enough balance, please try again!'); </script>";
      }

    } else {
      echo "<script>alert ('Account not found, please try again!'); </script>";
    }
  } else {
    echo "<script>alert ('You don't have enough balance, please try again!'); </script>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Transfer</title>
  <link rel="stylesheet" href="animation.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body
  style="background-image: url(images/old-gray-cement-wall-backgrounds.jpg); background-size: cover; background-repeat: repeat;">
  <div style="width: 1000px;" class="container">
    <nav class="navbar navbar-dark bg-dark fixed-top">
      <div class="navbar-brand" style="margin-left: 10px;">
        <img src="images/bank_icon.png" class="d-inline-block align-middle mr-2" alt="Bank Icon"
          style="height: 50%; width: 60px;">
        <img src="images/unknown.png" class="d-inline-block align-middle mr-2" alt="Bank Name"
          style="width: 200px; height: 30px; margin-top: 30px;">
      </div>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <?php
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
          echo '<a class="btn btn-primary button4" href="Login.php" role="button">Login</a>';
          echo '<a class="btn btn-primary button4" href="Register.php" role="button">Register</a>';
        } else {
          echo '<a class="btn btn-primary button4" href="Logout.php" role="button">Logout</a>';
        }
        ?>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
          aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Capital Gains</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
              aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Welcome.php">Home</a>
              </li>
              <?php
              if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
                echo '<li class="nav-item"><a class="nav-link" href="About.php">About</a></li>';
              } else {
                echo '<li class="nav-item"><a class="nav-link" href="About.php">About</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="Account.php">My Account</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="Loan.php">Request a Loan</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="Transfer.php">Make a Transfer</a></li>';
              }
              ?>
              <li class="nav-item">
                <a class="nav-link"><button
                    style=" margin-left:3% ; background-color: #555;color: white;padding: 16px 20px;border: none;cursor: pointer;opacity: 0.8;position: fixed;bottom: 23px; width: 280px; text-align: center;"
                    onclick="openForm()" class="button2">Contact us</button>

                  <div
                    style="display: none;position: fixed;bottom: 0;right: 15px;z-index: 9; align-items: center; justify-content: center;  width: 25%; margin-left: 37.5%; padding: 15px; box-shadow: 10px 10px 54px -6px; background-image: url(images/old-gray-cement-wall-backgrounds.jpg); background-size: cover; background-repeat: no-repeat;"
                    id="myForm">
                    <form action="/action_page.php" style="  max-width: 300px;padding: 10px; ">

                      <p
                        style="color: #f18913;font-size: 1.1rem;font-weight: 600; line-height: 1.8rem;font-family: Gill Sans;">
                        For any inquiries, feel free to contact us via Email: <br>
                        yahiakhaled49@gmail.com <br>
                        youssefmahmoud102000@gmail.com <br>
                        Or via the following numbers: <br>
                        +201019540140 <br>
                        +201127684111
                      </p>
                      <button type="button" class="btn cancel" onclick="closeForm()"
                        style="background-color: red;">Close</button>

                    </form>
                  </div>

                  <script>
                    function openForm() {
                      document.getElementById("myForm").style.display = "block";
                    }

                    function closeForm() {
                      document.getElementById("myForm").style.display = "none";
                    }
                  </script>
                </a>
              </li>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <br><br><br><br><br>

  <div style="width: 50%; margin-left: 25%; padding: 15px;">
    <h2> Transfer</h2>
  </div>
  <form action="" method="post">
    <div class="rounded"
      style="align-items: center; justify-content: center;  width: 50%; margin-left: 25%; padding: 15px; box-shadow: 10px 10px 54px -6px">
      <label
        style="color: #f18913;font-size: 1.1rem;font-weight: 600; line-height: 1.8rem;font-family: Gill Sans; display: inline-block; width: 150px;"><strong>Account
          Balance:</strong></label>
      <input type="text" id="balancetxt" readonly placeholder="<?php echo $_SESSION['login_balance']; ?>"
        style="border: solid;background-color: #f5f5f5;border-width: 2px!important;border-radius: 10px!important;">
      <br><br>
      <label
        style="color: #f18913;font-size: 1.1rem;font-weight: 600; line-height: 1.8rem;font-family: Gill Sans; display: inline-block; width: 150px;"><strong>Transfer
          From:</strong></label>
      <input type="text" id="transferFromtxt" name="transferfrom" readonly
        placeholder="<?php echo $_SESSION['login_accnumber']; ?>"
        style="border: solid;background-color: #f5f5f5;border-width: 2px!important; border-radius: 10px!important;">
      <br><br>
      <label
        style="color: #f18913;font-size: 1.1rem;font-weight: 600; line-height: 1.8rem;font-family: Gill Sans; display: inline-block; width: 150px;"><strong>Transfer
          To:</strong></label>
      <input type="text" id="transferTotxt" name="transferto"
        style="border: solid;background-color: #f5f5f5;border-width: 2px!important; border-radius: 10px!important;">
      <br><br>
      <label
        style="color: #f18913;font-size: 1.1rem;font-weight: 600; line-height: 1.8rem;font-family: Gill Sans; display: inline-block; width: 150px;"><strong>Amount:</strong></label>
      <input type="text" id="amounttxt" name="amount"
        style="border: solid;background-color: #f5f5f5;border-width: 2px!important; border-radius: 10px!important;">
      <br><br>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Agree to terms and conditions
          </label>
        </div>
      </div>
      <br>
      <div>
        <button type="submit" id="submitbtn" name="transfer" class="btn btn-success">Make Transfer</button>
        <a style="margin-left: 25px;" class="btn btn-primary" href="Account.php" role="button">Cancel</a>
      </div>
    </div>
  </form>



  <script src="js/bootstrap.min.js"></script>
</body>

</html>