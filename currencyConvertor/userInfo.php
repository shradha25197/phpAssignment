<?php
include "dbConnection.php";
include "header.php";
?>
<html>
<head>
<link rel="stylesheet"
	href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
	crossorigin="anonymous">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>

function deleteUser(user)
{
 				$.ajax({
 				url:"ajax.php",
 				type:"POST",
 				data:{"userInfo":user},
 				success: function(data) {
 				if(data == "SUCCESS")
 				{
 				alert("User Deleted Successfully");
 				location.reload();
 				}
 				else
 				{
 				alert("User Deleted Failure");
 				}
 				},
 				error: function (error)
 				{
 				alert("by");
 				}
 				
                });
}
</script>
</head>
<body>
<?php

$sql = "SELECT * FROM USER_MASTER";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    ?>
     <table border="1">

		<tbody>

<?php

while ($row = mysqli_fetch_assoc($result)) {
        ?>
<tr>
				<td>
	<?php echo $row['USER_ID']; ?>
    
</td>
				<td>
	<?php echo $row['USER_NAME']; ?>
    
</td>
				<td>
	<?php echo $row['USER_EMAIL']; ?>
    
</td>
				<td>
					<button class="form-control"
						onclick="deleteUser('<?php echo $row['USER_ID']; ?>')">Delete</button>

				</td>
			</tr>
   <?php }?>
</tbody>
	</table>
    <?php 
}?>

</body>
</html>