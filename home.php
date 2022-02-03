<!DOCTYPE html>
<html>

<head>

  <title>Home Page</title>

  <style>
    .d3 {
      text-align: center;
      color: gold;
      width: 50%;
      height: 600px;
      margin-left: 25%;
      margin-right: 10%;
      margin-top: 10%;
      float: left;
      font-size: 45px;
      font-weight: 40;
      font-family: cursive;
      padding: 20px 10px 20px 10px;
    }
  </style>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


  <link rel="stylesheet" type="text/css" href="style3.css">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-warning">
    <h3>Car Parking</h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="margin-left: 70%;">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="project1.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="n.html">Contact Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="landing.html">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

</head>

<body>
  <div class="d3">

    <p> Make your park more safe</p>
    <p>,cheaper and more fun!!</p>
    <?php
    //user login data
    if (!isset($_COOKIE['login'])) {
      $path = "Signup.php";
    } else {
      $array = explode(' ', $_COOKIE['login'], -2);
      $path = "booking page.php";
    }
    //************* */
    ?>
     
    <a href="<?php echo $path ?>"><button type="button" class="btn btn-warning" style="margin-left: 10%;">Get Started</button></a>
    <?php if (isset($array)) { //login******user card information 
    ?>
      <div class="container">
        <div class="card" style='color:#fff;background-color: rgb(0, 255, 0,1)!important;font-size:20px;left:0;top:60px;height:150px;width:300px; position:absolute;'>
          <div class='row'>
            <div class="card-header">
              profile Info :

              <?php foreach ($array as $key => $value) { ?>
                <div class='col-lg-12' style='color:#000'><?php echo $value ?></div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    <?php } //************************** */?>
    
    <?php
    session_start();
    //if empity ceils  
    if (isset($_SESSION['$exceptions'])) { ?>
      <div class="container">
        <div class='row'>
        <?php
        foreach ($_SESSION['$exceptions'] as $key => $value) {
          if (isset($_SESSION['$exceptions'][$key])) {
            echo "<div class='col-md-12' style='color:#00ff00;position:absolute;left:0;top:120px'>" . $value . "</div>";
            $_SESSION['$exceptions'][$key] = '';
          }
        }
        //if empity ceils 
      } ?>
        </div>
      </div>
</body>

</html>