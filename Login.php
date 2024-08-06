<?php
session_start();
include('conn.php');
if (isset($_POST['login'])) {


  $myusername = $_POST['username'];
  $mypassword = $_POST['password'];


  $sql = "SELECT * FROM account WHERE username = '$myusername' and password = '$mypassword'";

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);


  $count = mysqli_num_rows($result);


  if ($count == 1) {
    $_SESSION['login_user'] = $myusername;
    $_SESSION['login_accnumber'] = $row['acnumber'];
    $_SESSION['login_custssn'] = $row['custssn'];
    $_SESSION['login_acctype'] = $row['type'];
    $_SESSION['login_balance'] = $row['balance'];
    $_SESSION['login_bid'] = $row['bid'];
    $_SESSION["loggedin"] = true;
    header("location: Account.php");
  } else {
    $_SESSION["loggedin"] = false;
    header("location:Login.php?Invalid= Username or Password is incorrect, please try again!");
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
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
                    <form action="/action_page.php" style="max-width: 300px; padding: 10px;">

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

  <form action="" method="post" style="width: 50%; margin-left: 25%; padding: 15px;">
    <div class="rounded mb-3"
      style="align-items: center; justify-content: center;  width: 50%; margin-left: 25%; padding: 15px; box-shadow: 10px 10px 54px -6px">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <br>
        <input type="text" class="form-control" id="username" name="username" style="display: inline-block; width: 60%;"
          required>
        <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <br>
        <input type="password" class="form-control" id="exampleInputPassword1"
          style="display: inline-block; width: 60%;" name="password" required pattern="^([a-zA-Z$_0-9]){8,32}$">
        <div class="form-text">Password must be between 8 and 32 characters.</div>
      </div>
      <button type="submit" name="login" class="btn btn-primary button3">Login</button>
      <?php
      if (@$_GET['Invalid'] == true) {
        ?>

        <div class="p-3 bg-danger-subtle rounded-3" style="color: rgb(204, 106, 106); display: block">
          <h4>
            <?php echo $_GET['Invalid'] ?>
          </h4>
        </div>

        <?php
      }
      ?>
    </div>
  </form>



  <script src="js/bootstrap.min.js"></script>
</body>

</html>