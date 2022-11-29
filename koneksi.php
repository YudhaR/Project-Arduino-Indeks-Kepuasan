<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "dborakom";

$conn = mysqli_connect($servername, $username, $password, $database);

function query($query){
	global $conn;
	$hasil = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($hasil)){
		$rows[] = $row;
	}
	return $rows;
}

?>