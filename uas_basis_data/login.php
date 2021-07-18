<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
			<title>Login</title>
			<link rel="stylesheet" href="css/style.css" />
		</head>
		<body>
			<center>
			<?php
				require('db.php');
				session_start();
				// If form submitted, insert values into the database.
				if (isset($_POST['username'])){
		
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
		
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE username='$username' and password='".md5($password)."'";
		$result = mysqli_query($con,$query) or die(mysqli_error($mysql));
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "
			<div class='form'>
				<h3>Username/password yang anda masukan salah.</h3>
				<br/>Klik di sini 
				<a href='login.php'>Login</a>
				<p>Belum DAFTAR? 
					<a href='registration.php'>daftar di sini</a>
				</p>
			</div>";
				}
    }else{
?>
			<div class="form">
				<h1>Masuk</h1>
				<form action="" method="post" name="login">
					<input type="text" name="username" placeholder="Username" required />
					<input type="password" name="password" placeholder="Password" required />
					<input name="submit" type="submit" value="Login" />
				</form>
				<p>Belum DAFTAR? 
					<a href='registration.php'>daftar di sini</a>
				</p>
			</div>
			<?php } ?>
	</center>
		</body>
		</html>
<marquee> <span id="copy-text" class="pull-left no-float-xs block-xs align-center-xs">&copy; <?php echo date("Y"); ?>  All Rights Reserved - Made by <a href='#'>SUGIH HARTONO</span>	</marquee>