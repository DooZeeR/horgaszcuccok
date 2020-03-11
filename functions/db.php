<?php 

$con = mysqli_connect('localhost', 'root', '12345678','login_db');


function row_count($result){
    return mysqli_num_rows($result);
}



function escape($string){
    global $con;
    return mysqli_real_escape_string($con, $string);
}




function query($query){
    global $con;
    return mysqli_query($con, $query);
}




function confirm($result){
    global $con;
    if (!$result) {
        die(" Hiba a lekérdezésben!". mysqli_error($con));
    }
}




function fetch_array($result){
    global $con;
    return mysqli_fetch_array($result);
}


function kapcsolodas(){
	$servername = "localhost";
	$username = "root";
	$password = "12345678";
	$dbname = "login_db";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysqli_query($conn, "SET NAMES 'UTF8';");
	return $conn;	
}



?>