<?php
session_start();
include('conn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>About</title>
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
        <!-- <a class="btn btn-primary" href="Login.php" role="button">Login</a>
        <a class="btn btn-primary" href="Register.php" role="button">Register</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
          aria-controls="offcanvasDarkNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Capital Gais</h5>
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

  <br><br><br><br><br><br>

  <div class="container text-center" style="width: 1000px;">
    <div class="row align-items-start">
      <div class="col">
        <div class="card mb-3" style="max-width: 540px; max-height: 320px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/Yahia.png" style="height: 320px;" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8 card1">
              <div class="card-body card3">
                <h5 class="card-title">Yahia Khaled</h5>
                <p class="card-text">Chairman <br>21 Years old <br> Computer Engineer </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-3" style="max-width: 540px; max-height: 320px;">
          <div class="row g-0">
            <div class="col-md-4">
              <img src="images/Joe.png" style="height: 320px;" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8 card1">
              <div class="card-body card3">
                <h5 class="card-title">Youssef Mahmoud Farouk</h5>
                <p class="card-text">Chairman <br>22 Years old <br> Computer Engineer</p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>



    <br><br><br>
    <div>
      <p style="font-size: 1.3rem;">Our website for the Bank lets you have the ability to Login on your existing account
        or create a new account
        associated to your card number and SSN.
        You can view your full account details and Transaction history.
        You can also Transfer funds to other Accounts associated with our Bank and request loans.
        Finally, you can view our Branches’ locations and get contact details for any help required.
      </p>
    </div>
    <br>
    <div class="loader">
      <span>Capital.Gains</span>
      <span>Capital.Gains</span>
    </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>