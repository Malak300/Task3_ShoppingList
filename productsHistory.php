<?php
	include 'config.php';
	$sql = "SELECT * FROM history2";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            ?>
            <option value="<?=$row['itemName'];?>"><?=$row['itemName'];?></option>
            
	   }
	}
	mysqli_close($conn);
?>
