<?php 

session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="../vendor/css/adminStyle.css">

	<link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">
</head>

<body>
	<div>
		<p Id="FAJ_LOGO">PERL JEWL ADMIN SYSTEM</p>
	</div>
	<form action="./backend/login_backend.php" method="post">
		<h2>LOGIN</h2>
		<?php
		if (isset($_SESSION['error']) && $_SESSION['error'] != "") {
			echo $_SESSION['error'];
			unset($_SESSION['error']);
		} elseif (isset($_SESSION['success']) && $_SESSION['success'] != "") {
			echo $_SESSION['success'];
			unset($_SESSION['success']);
		}
		?>
		<label>User Name</label>
		<input type="text" name="name" placeholder="User Name"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button name="login" type="submit">Login</button>
	</form>
</body>

</html>