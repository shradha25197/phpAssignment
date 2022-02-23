<!DOCTYPE html>

<html>

<head>

<title>LOGIN</title>

<link rel="stylesheet" type="text/css" href="loginStyle.css">

</head>

<body>

	<form action="login.php" method="post" style="margin: 10%;">
		<div class="container">
   <?php if(isset($_GET['error'])) {?>
   <p style="color: red"><?php echo $_GET['error'];?></p>
   <?php }?>
   
    <label for="uname"><b>Username</b></label> <input type="text"
				placeholder="Enter Username" name="uname" required> <label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password"
				required>

			<button type="submit">Login</button>
			<label> <input type="checkbox" checked="checked" name="remember">
				Remember me
			</label>
		</div>

	</form>

</body>

</html>