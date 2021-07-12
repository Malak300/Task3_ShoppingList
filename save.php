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


	
    $sql2= "SELECT * FROM `history` WHERE Email='$email' ";
	$res= mysqli_query($conn, $sql2);
	$row = mysqli_fetch_row($res);

	$r= $row[1].', '.$name;

	$sql3=  "UPDATE `history` SET `previous_purchase`='$r' WHERE `Email`='wissal.kmerat99@gmail.com'";
	if (mysqli_query($conn, $sql3)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}





	mysqli_close($conn);


?>
 