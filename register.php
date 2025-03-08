<?php
@include 'config.php';
$username = $password = $email = "";
$insert_result = false;

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$select = "SELECT * FROM users WHERE username = '$username' OR email = '$email' ";
	$result = mysqli_query($conn, $select);
}

if(isset($result) && mysqli_num_rows($result) > 0) {
	$error[] = 'User or email already exist!';
} else{
	$insert = "INSERT INTO users(username, email,password) VALUES('$username','$email','$password')";
	$insert_result = mysqli_query($conn, $insert);
}
if(isset($_POST['submit'])){
	if ($insert_result){
		header('location:login.php');
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<title>Register Form</title>
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
		<h3>Register</h3>
		<input type="text" name="username" required placeholder="Enter your username">
		<input type="email" name="email" required placeholder="Enter your email">
		<input type="password" name="password" required placeholder="Enter your password">
		<input type="submit" name="submit" value="Register" class="form-btn">
		<p>Already have an account? <a href="login.php">Login now!</a></p>
	</form>
</body>
</html>