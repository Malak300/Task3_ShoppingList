<?php
	include 'config.php';
	$name=$_POST['name_item'];
	$quantity=$_POST['quantity_item'];
	//$email=$_POST['userEmail'];
	$email= 'wissal.kmerat99@gmail.com';

	$sql = "INSERT INTO `shoppinglist`(`Email` ,`Item_name`, `Quantity`) 
	VALUES ('$email', '$name','$quantity')";

	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);


?>
 