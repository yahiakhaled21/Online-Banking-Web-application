<?php
session_start();
include('conn.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Welcome</title>
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
                <a class="nav-link"><button class="button2"
                    style=" margin-left:3% ; background-color: #555;color: white;padding: 16px 20px;border: none;cursor: pointer;opacity: 0.8;position: fixed;bottom: 23px; width: 280px; text-align: center;"
                    onclick="openForm() ">Contact us</button>

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

  <br><br><br>

  <div id="carouselExampleCaptions" class="carousel slide rounded" data-bs-ride="carousel"
    style="height: 600; width : 75%; margin-left: 12.5%; margin-right: 12.5%; box-shadow: 10px 10px 54px -6px; overflow: hidden;">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="3000">
        <img src="images/3.png" style="max-height: 600px; margin: auto;" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="images/123.png" style="max-height: 600px; margin: auto;" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
      <div class="carousel-item" data-bs-interval="3000">
        <img src="images/1234.png" style="max-height: 600px; margin: auto;" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">

        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>
  <div style="width: 300px; margin-left: 42%;">
    <!-- Simple Currency Rates Table START -->
    <link rel="stylesheet" type="text/css"
      href="//www.exchangerates.org.uk/widget/ER-SCRT2-css.php?w=300&nb=10&bdrc=E0E0E0&mbg=FFFFFF&fc=333333&tc=333333"
      media="screen" />
    <div id="erscrt2">
      <div id="erscrt2-widget"></div>
      <div id="erscrt2-infolink"><a rel="nofollow"
          href="//www.exchangerates.org.uk/Egyptian-Pound-EGP-currency-table.html" target="_new"><img
            src='https://www.exchangerates.org.uk/widget/logo-333333.png' alt='ExchangeRates.org.uk'></a></div>
      <script type="text/javascript">
        var tz = 'userset';
        var w = '300';
        var mc = 'EGP';
        var nb = '10';
        var c1 = 'USD';
        var c2 = 'EUR';
        var c3 = 'AUD';
        var c4 = 'JPY';
        var c5 = 'INR';
        var c6 = 'CAD';
        var c7 = 'ZAR';
        var c8 = 'NZD';
        var c9 = 'ARS';
        var c10 = 'CNY';
        var t = 'Live Exchange Rates';
        var tc = '333333';
        var bdrc = 'E0E0E0';
        var mbg = 'FFFFFF';
        var fc = '333333';

        var ccHost = (("https:" == document.location.protocol) ? "https://www." : "http://www.");
        document.write(unescape("%3Cscript src='" + ccHost + "exchangerates.org.uk/widget/ER-SCRT2-1.php' type='text/javascript'%3E%3C/script%3E"));
      </script>
    </div>
    <!-- Simple Currency Rates Table END -->
  </div>
  <!-- <br>
  <h1 style="text-align: center;">Exchange Rates(EGP)</h1>
  <div style="text-align: center;" class="ms-webpart-zone ms-fullWidth">
    <div id="MSOZoneCell_WebPartWPQ2"
      class="s4-wpcell-plain ms-webpartzone-cell ms-webpart-cell-vertical ms-fullWidth ">
      <div class="ms-webpart-chrome ms-webpart-chrome-vertical ms-webpart-chrome-fullWidth ">
        <div WebPartID="39c7deec-4f38-4b18-8dc3-da30617408de" HasPers="false" id="WebPartWPQ2" width="100%"
          class="ms-WPBody " allowDelete="false">
          <table style="width: 50%; margin-left: 25%; margin-right: 25%;" class="table table-dark table-striped">
            <thead>
              <tr>
                <th>Currency</th>
                <th>Buy</th>
                <th>Sell</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><strong> Dollar </strong>

                </td>
                <td>24.4400</td>
                <td>24.5164</td>
              </tr>
              <tr>
                <td><strong>Euro </strong>

                </td>
                <td>25.2465</td>
                <td>25.3352</td>
              </tr>
              <tr>
                <td><strong>Pound Sterling </strong>

                </td>
                <td>28.8588</td>
                <td>28.9588</td>
              </tr>
              <tr>
                <td><strong>Swiss Franc </strong>

                </td>
                <td>25.7290</td>
                <td>25.8203</td>
              </tr>
              <tr>
                <td><strong>Japanese Yen 100 </strong>

                </td>
                <td>17.4322</td>
                <td>17.4905</td>
              </tr>
              <tr>
                <td><strong>Saudi Riyal </strong>

                </td>
                <td>6.5003</td>
                <td>6.5217</td>
              </tr>
              <tr>
                <td><strong>Kuwaiti Dinar </strong>

                </td>
                <td>79.3017</td>
                <td>79.6582</td>
              </tr>
              <tr>
                <td><strong>UAE Dirham </strong>

                </td>
                <td>6.6538</td>
                <td>6.6749</td>
              </tr>
              <tr>
                <td><strong>Chinese yuan </strong>

                </td>
                <td>3.4148</td>
                <td>3.4269</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>

  </div>
  </div> -->



  <script src="js/bootstrap.min.js"></script>
</body>

</html>