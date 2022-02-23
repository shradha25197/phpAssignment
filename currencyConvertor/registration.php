<?php
session_start();
include "header.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="loginStyle.css">
</head>
<body>

	<form action="userController.php" method="POST">
		<div class="container">
			<h1>Registration</h1>
			<p>Please fill in this form to add the user.</p>
			<hr>

			<input type="hidden" id="action" name="action" value="A"> <label
				for="email"><b>User Name</b></label> <input type="text"
				placeholder="Enter User Name" name="userName" id="userName" required>

			<label for="email"><b>Email</b></label> <input type="text"
				placeholder="Enter Email" name="email" id="email" required> <label
				for="address"><b>Address</b></label> <input type="text"
				placeholder="Enter Address" name="address" id="address" required> <label
				for="psw"><b>Password</b></label> <input type="password"
				placeholder="Enter Password" name="userPass" id="userPass" required>

			<hr>


			<button type="submit" class="registerbtn">Register</button>
		</div>

	</form>

</body>
</html>

