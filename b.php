<!DOCTYPE html>
<html>

<head>
	<title>Login Page</title>



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<h3>Log In</h3>
					<div class="d-flex justify-content-end social_icon">
						<span><i class="fab fa-facebook-square"></i></span>
						<span><i class="fab fa-google-plus-square"></i></span>
						<span><i class="fab fa-twitter-square"></i></span>
					</div>
				</div>
				<div class="card-body">
					<form action='phpFiles/login.php' method='POST'>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input name='e_mail' type="text" class="form-control" placeholder="Email">

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input name='password' type="password" class="form-control" placeholder="Password">
						</div>
						<div class="row align-items-center remember">
							<input type="checkbox">Remember Me
						</div>
						<div class="form-group">
							<button type='submit' class="btn btn-link btn float-right login_btn" data-toggle="button" aria-pressed="false">Login</button>
						</div>
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account?<a href="Signup.php">Sign Up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="#">Forgot your password?</a>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php
//************************** */
if (!isset($_COOKIE['login'])) {
	echo "login cookie is not set! expire time";
} else {
	echo $_COOKIE['login'];
}
session_start();
//if empity ceils 
if (isset($_SESSION['$exceptions'])) {
	foreach ($_SESSION['$exceptions'] as $key => $value) {
		if (isset($_SESSION['$exceptions'][$key])) {
			echo "<div style='color:#fff;'>" . $value . "</div>";
			$_SESSION['$exceptions'][$key] = '';
		}
	}
}
//if empity ceils

?>