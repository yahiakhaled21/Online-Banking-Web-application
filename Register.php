<?php
include('conn.php');
if (isset($_POST['Register'])) {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $ssn = $_POST['ssn'];
  $acnumber = $_POST['acnumber'];
  $actype = $_POST['actype'];
  $phoneno = $_POST['phoneno'];
  $address = $_POST['address'];
  $bid = $_POST['bid'];
  $email = $_POST['email'];
  $dob = $_POST['dob'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM account WHERE email = '$email' or username = '$username'";

  $res = mysqli_query($conn, $sql);

  if (mysqli_num_rows($res) > 0) {

    $row = mysqli_fetch_assoc($res);
    if ($email == isset($row['email']) || $username == isset($row['username'])) {
      echo "<script>alert ('Email or username already exists!'); </script>";
    }
  } else {

    $sql = "INSERT INTO customer (custssn, fname, lname, address, dob) VALUES ('$ssn', '$fname', '$lname', '$address', '$dob');";
    $sql .= "INSERT INTO customer_phone_numbers (custssn, number) VALUES ('$ssn', '$phoneno');";
    $sql .= "INSERT INTO account (acnumber, custssn, type, balance, username, password, bid, email) VALUES ('$acnumber', '$ssn', '$actype', 0, '$username', '$password', '$bid', '$email')";


    if ($conn->multi_query($sql) === TRUE) {
      echo '<script type="text/javascript">';
      echo 'alert("Registration Successful!");';
      echo 'window.location.href = "Login.php";';
      echo '</script>';
    } else {
      echo "<script>alert ('Email or username already exists!'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register</title>
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

  <form class="row g-3" method="post" action="">
    <div class="rounded mb-3"
      style="align-items: center; justify-content: center;  width: 50%; margin-left: 25%; padding: 15px; box-shadow: 10px 10px 54px -6px">
      <div class="col-md-3">
        <label class="form-label">First name</label>
        <input type="text" name="fname" class="form-control" required pattern="^[A-Za-z]{3,}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Last name</label>
        <input type="text" name="lname" class="form-control" required pattern="^[A-Za-z]{3,}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required pattern="^\w+$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">SSN</label>
        <input type="text" name="ssn" class="form-control" required pattern="^[0-9]{14}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Account Number</label>
        <input type="text" name="acnumber" class="form-control" required pattern="^[0-9]{16}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Account Type</label>
        <input type="text" name="actype" class="form-control" required>
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phoneno" class="form-control" required pattern="^[0-9]{11}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" required pattern="^[A-Za-z0-9\s]{3,}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Branch ID</label>
        <input type="text" name="bid" class="form-control" required pattern="^[1|2]{1}$">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control" required pattern="[a-zA-Z0-9_\.]{2,}@[a-zA-Z]+.[a-zA-Z]+$">
        <div class="form-text">Example: test_1@gmail.com</div>
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Date of Birth</label>
        <input type="date" name="dob" class="form-control" required max="<?php echo date("Y-m-d"); ?>">
      </div>
      <br>
      <div class="col-md-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required pattern="^([a-zA-Z$_0-9]){8,32}$">
        <div class="form-text">Password must be between 8 and 32 characters.</div>
      </div>
      <br>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
          <label class="form-check-label" for="invalidCheck2">
            Agree to terms and conditions
          </label>
        </div>
      </div>
      <br>
      <div class="col-12">
        <button class="btn btn-primary button3" type="submit" name="Register">Sign Up</button>
      </div>
    </div>
  </form>

  <script src="js/bootstrap.min.js"></script>
</body>

</html>