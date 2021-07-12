<?php
	include 'config.php';
	$sql = "SELECT Email FROM history2 ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
            ?>
            <option value="<?=$row['Email'];?>"><?=$row['Email'];?></option>
            <?php
	   }
	}  

	mysqli_close($conn);
?>
