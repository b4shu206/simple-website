<?php
@include 'config.php';
$username = $password = "";

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$select = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
	$result = mysqli_query($conn, $select);
}

if(isset($result) && mysqli_num_rows($result) > 0) {
	header('location:dashboard.php');
	exit();
} elseif(isset($_POST['submit'])) {
	$error[] = 'Wrong password or username!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="form-container">
	<form action="" method="POST">
		<?php
		if(isset($error)){
			foreach($error as $error){
				echo '<span class="error-msg">'.$error.'</span>';
			};
		};
		?>
		<h3>Login</h3>
		<input type="text" name="username" required placeholder="Enter your username">
		<input type="password" name="password" required placeholder="Enter your password">
		<input type="submit" name="submit" value="Login" class="form-btn">
		<p>No have an account? <a href="register.php">Register now!</a></p>
	</form>
</body>
</html>