<?php
	include 'config.php';
    $user_mail=$_POST['user_mail'];
	$name=$_POST['names'];
    $quantity=$_POST['quantities'];
	$i=0;
    for($i=0;$i<count($names);$i+=1) {
        $sql = "INSERT INTO `history2`( `Email`, `itemName`, `quantity`) 
        VALUES ('$user_mail','$name[$i]','$quantity[$i]',)";
        if (mysqli_query($conn, $sql)) {
            echo json_encode(array("statusCode"=>200));
        } 
        else {
            echo json_encode(array("statusCode"=>201));
        }
    }
	
	mysqli_close($conn);
?>
