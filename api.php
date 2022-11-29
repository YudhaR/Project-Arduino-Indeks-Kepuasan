<?php 

require 'koneksi.php';

ini_set('date.timezone', 'Asia/Jakarta');

$now = new DateTime();

$datenow = $now->format("Y-m-d H:i:s");

    	$data1 = $_POST['data1'];
    	$data2 = $_POST['data2'];
    	$data3 = $_POST['data3'];

	    $sql = "INSERT INTO orakom VALUES ('','$datenow', '$data1', '$data2', '$data3' )";

		if ($conn->query($sql) === TRUE) {
		    echo json_encode("Ok");
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
	$conn->close();
?>