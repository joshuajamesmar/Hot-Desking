<?php
    // require './require/config.php';

	// session_start();

	// if(isset($_POST['submit'])){
	// $email = mysqli_real_escape_string($conn, $_POST["email"]);
	// $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
	// $userType = mysqli_real_escape_string($conn, $_POST["user_type"]);

	// if (empty($email) || empty($password)) {
	// 	echo '<script type = "text/javascript">';
	// 	echo 'alert(All fields are required!)';
	// 	echo '</script>';
	// }
	// else if ($userType == "hide") {
	// echo "Choose your user type";
	// }
	// else {
	// $sql = "SELECT * FROM users WHERE email = '$email' && password = '$password' && user_type = '$userType'";
	// $result = mysqli_query($conn, $sql);
	// $rowCount = mysqli_num_rows($result);

	// if ($rowCount > 0) {
	// 	// $_SESSION["isLoggedIn"] = true;
	// 	$_SESSION["user"] = $email;

	// 	if ($userType == "admin") {
	// 	$_SESSION["admin"] = true;
	// 	header('location:./admin/dashboard.php');
	// 	}

	// 	if ($userType == "secretary") {
	// 	$_SESSION["secretary"] = true;
	// 	header('location:./admin/dashboard.php');
	// 	}

	// 	if ($userType == "user") {
	// 	$_SESSION["user"] = true;
	// 	header('location:./user/home-user.php');
	// 	}
	// }
	// else {
	// 	echo "Invalid login, please try again";
	// }
	// }
	// }
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/e10d2c55ce.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/login.css">
	<title>Login</title>
</head>
<style>

.modals {
	z-index: 1000;
	height: 100vh;
	width: 100%;
	background-color: rgba(0, 0, 0, 0.4);
	display: none;
	justify-content: center;
	align-items: center;
	position: fixed;
	top: 0;
	left: 0;
}

.modals.active {
	display: flex;
}

.custom-modal i {
	display: inline-block;
    animation: beating 1.5s infinite;
}

.custom-modal h3 {
	display: inline-block;
    animation: beating 1.5s infinite;
}

.custom-modal {
	display: flex;
	justify-content: space-around;
	align-items: center;
	color: #ff4d4d;
	width: 400px;
	height: 200px;
	background-color: #ffffff;
	padding: 2rem;
	border-radius: 18px;
	flex-direction: column;
	animation: beating 1.5s infinite;
}

@keyframes beating {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
	
</style>

<div class="modals">
	<div class="custom-modal">
		<i class="fa-solid fa-volcano fa-2xl" style="color: #ff4d4d;"></i>
		<h3>Account is Awaiting Approval!</h3>
	</div>
</div>

<body>
	<div class="main">
		<div class="left">
			<div>
				<a href="index.php">
					<img class="logo"src="images/lavaroom-logo.png" alt="">
				</a>
			</div>
			<div>
				<img class="img-left" src="images/log-img.png" alt="">
			</div>
		</div>
		<div class="cont">
			<div class="container login">
				<form action="" method="POST" class="login-email">
					<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
					<?php
						if(isset($error)){
							foreach($error as $error) {
								echo '<div class="alert">'.$error.'</div>';
							};
						};

					?>
					<div class="input-group">
						<input autocomplete="off" type="text" placeholder="Enter your email" required name="email" >
					</div>
					<div class="input-group">
						<input autocomplete="off" type="password" placeholder="Enter your password" required name="password" >
					</div>
					<div class="input-group" >
						<select class="select" name="user_type" id="">
							<option value="hide" class="type placeholder">User Type</option>
							<option value="admin" class="type">Admin</option>
							<option value="secretary" class="type">Secretary</option >
							<option value="user" class="type">User</option >
						</select>
					</div>
					<div class="input-group login">
						<button type="submit" name="submit" class="btn">Login</button>
					</div>
					
					<p class="login-register-text">Don't have an account? <a href="register.php"
					>Register Here</a>.</p>
					<div class="social-media">
						<div class="social-text">
							<p>login with</p>
						</div>
						<a class="social-option" href=""><img  src="images/google.png" alt=""></a>
						<a class="social-option" href=""><img  src="images/fb.png" alt=""></a>
						<a class="social-option" href=""><img  src="images/insta.png" alt=""></a>
						
						
					</div>
				</form>
				
			</div>

		</div>
	

	</div>
	<script src="./js/ajaxLogin.js"></script>
	
	
</body>
</html>