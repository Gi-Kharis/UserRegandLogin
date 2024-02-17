<?php
$servername = "localhost";
$username = "root";
$password = "";
$dataBase = "electronic_shop_db";


//Establish a connection
$connection = new mysqli($servername, $username, $password, $dataBase);

// Check the connection if it is working
if($connection->connect_error){
  die("Connection has failed: ".$connection->connect_error);
}
// echo "Connection was successful";

// user details
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

// Hash password before sending to base
$pwhashed = password_hash($password, PASSWORD_DEFAULT);

// Write sql query to insert user details
$sql = "INSERT INTO users (fname, lname, email, password, confirm_password)
        VALUES ('$fname', '$lname', '$email', '$pwhashed', '$confirm_password')";

if($connection->query($sql)===TRUE){
  echo "Your detais have been submitted successfully";
}else{
  echo "There is a problem, try again in few minutes". $connection->error;
}

echo $pwhashed;

$connection->close();

  ?>


