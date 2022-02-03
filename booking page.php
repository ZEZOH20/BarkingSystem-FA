<html>
<?php session_start(); //must be inserted up page ?>
<head>
  <title>booking Page</title>
  <link rel="icon" href="logo.png">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">




  <style>
    body {
      width: 100%;
      height: 100%;
      background-image: url(Car.jpeg);
      background-size: 100%;

    }

    .d4 {
      text-align: center;
      visibility: hidden;
    }



    .d3 {
      background-color: darkgrey;
      text-align: center;
      width: 33%;
      height: 550px;
      border-radius: 30px;
      margin-left: 30%;

    }

    .d3:focus {
      width: 250px;
    }

    p {
      margin: 0;
      padding: 3px;
      font-family: cursive;
      font-weight: bold;
      color: rgb(0, 0, 0);
    }

    input[type="text"],
    input[type="email"],
    input[type="number"] {
      border: none;
      border-bottom: 1px solid black;
      border-radius: 5px;
      background-color: honeydew;
      outline: none;
      height: 25px;
      color: darkblue;
      font-size: 15px;
      font-family: cursive;
    }

    select {
      margin: 0;
      padding: 0;
      font-family: cursive;
      font-weight: bold;
      font-size: 15;
      background-color: rgb(238, 238, 238);
    }

    .submit {
      background-color: rgb(0, 0, 0);
      color: rgb(0, 0, 0);
      padding: 10px 10px;
      font-weight: bold;
      font-size: 15px;
      border: none;
      cursor: pointer;
      width: 20%;
    }


    .select {

      margin: 0;
      padding: 0;
      font-family: cursive;
      font-weight: bold;
      font-size: 15;
      background-color: honeydew;

    }

    .submit {
      background-color: rgb(0, 0, 0);
      color: rgb(249, 249, 249);
      padding: 10px 10px;
      font-weight: bold;
      font-size: 15px;
      border: none;
      cursor: pointer;
      width: 20%;
    }
  </style>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-warning">
    <h3>Car Parking</h3>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav" style="margin-left: 70%;">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="n.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="project1.html">Contact Us</a>
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
    <h1>Please, Fill this form</h1>
    <form name="frm-pin" method="post" action="phpFiles/booking.php">
      <p><b>choose date</b></p><input type="date" name="date">
      <p><b>from</b></p><input type="number" name='start_time' id="n1">
      <p><b>to</b></p><input type="number" name='end_time' id="n2">

     
      <script>
        function calc() {

          var n1 = parseInt(document.getElementById('n1').value);
          var n2 = parseInt(document.getElementById('n2').value);
          var result = n1 - n2;
          if (n1 > n2)
            document.getElementById('res').value = n1 - n2;
          else
            document.getElementById('res').value = n2 - n1;



        }
      </script>


      <p><b>Your vehicle type?</b></p>
      <select name="cost" onchange="calcAmount(this.value)" required>
        <option value="" disabled selected> choose your option </option>
        <option value="10"> private car </option>
        <option value="20"> pickup truck </option>
        <option value="30"> transportation car </option>
        <option value="40"> car quarter transport </option>
        <option value="50"> travel car </option>
        <option value="60"> Public transport </option>
      </select>
      <p><b>Total cost </b></p><input type="text" id="help" disabled selected>
      <script>
        function calcAmount(val) {

          var tot_price = val * 1;
          var divobj = document.getElementById('help');
          divobj.value = tot_price;

        }
      </script>

      <br><br>
      <button type='submit' class="submit">Submit</button>

      <?php
      //************************** */
      if(isset($_SESSION['empty'])){
        echo "<div  style='color:#f00;'>" . $_SESSION['empty'] . "</div>";
      }?> 

  </div>

  </form>

</body>

</html>
<?php
//************************** */
//user login data
if (isset($_COOKIE['login'])) {
  echo $_COOKIE['login'];
} else {
  echo "cookie expired";
}
    //************* */*/
 if(isset( $_SESSION['transaction'])){
  echo "<div  style='color:#f00;'>" . $_SESSION['transaction'] . "</div>";
 }   
 
 session_destroy();