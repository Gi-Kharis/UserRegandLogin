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
//  echo "connection was successful";

// Form data
$email = $_POST["email"];
$password = $_POST["password"];

// echo $email;
// echo $password;

// Hash password before sending to base
// $user_password = password_hash($password, PASSWORD_DEFAULT);

// Select user's email based on what has been provided in the email field
$sql = "SELECT * FROM users WHERE email = ?";
$statement = $connection->prepare($sql);
$statement->bind_param("s", $email);
$statement->execute();
$result = $statement->get_result();

if ($result->num_rows > 0) {
   // User found, check password
   $row = $result->fetch_assoc();
   $db_password = $row["password"];

   // Check if entered password matches the hashed password from the database
   if (password_verify($password, $db_password)) {
       // Password is correct, login successful
       // Redirect to index.php after successful login
       header("Location: index.php");
       exit(); // Make sure to stop the script execution after the redirect
   } else {
       // Password is incorrect
       echo "Incorrect password. Please try again.";
       echo $pwhashed. "<br>";
       echo $password. "<br>";
   }

   // if ($user_password === $db_password) {
   //        // Password is correct, login successful
   //        // Redirect to index.php after successful login
   //        header("Location: index.php");
   //        exit(); // Make sure to stop the script execution after the redirect
   //    } else {
   //        // Password is incorrect
   //        echo "Incorrect password. Please try again.";
        
   //    } 
   //  echo $password;
   //  echo  $db_password;

} else {
   // User not found
   echo "User with email '$email' not found. Please register.";
}


// Close the connection

$statement->close();
$connection->close();

?>


