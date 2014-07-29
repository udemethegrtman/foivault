<?php
require_once('includes/config.php');

$arr=array();
$query = "SELECT * FROM requests WHERE title LIKE '%".$_GET['chars']."%' LIMIT 0, 10";
try{
	$stmt = $conn->prepare($query);
	$stmt->execute();
	while($data= $stmt->fetch()){
        // Store data in array
        $arr[]=$data[1];
    }
	
} catch (PDOException $e) {
	echo "Error: ".$e->getMessage();
}


// Encode it with JSON format
echo json_encode($arr);
?>