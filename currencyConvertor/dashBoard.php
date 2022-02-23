<?php
session_start();
include "header.php";
if (isset($_SESSION['USER_ID']) && isset($_SESSION['USER_NAME'])) {

    ?>

<!DOCTYPE html>

<html>

<head>



</head>

<body>

	<h1>Hello, <?php echo $_SESSION['USER_NAME']; ?></h1>


</body>

</html>

<?php
} else {

    header("Location: index.php");

    exit();
}

?>