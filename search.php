
<?php 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "task_three"; 
 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
} 
 
$searchTerm = $_GET['term']; 
 
$query = $db->query("SELECT * FROM products WHERE Item_name LIKE '%".$searchTerm."%' "); 
 
$nameData = array(); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $data['id'] = $row['id']; 
        $data['value'] = $row['Item_name']; 
        array_push($nameData, $data); 
    } 
} 
 
echo json_encode($nameData); 
?>