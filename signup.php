<?php include_once 'header.php';?>


<?php
// Declare variables
  $fname= $lname = $email = $password = $confirm_password = "";
  $error_fname = $error_lname = $error_email= $error_password = $error_confirm_password = "";

  // Check if user has made entries, remove unwanted characters and validate inputs

  if($_SERVER["REQUEST_METHOD"]=== "POST"){
    if(empty($_POST["fname"])){
      $error_fname = "Enter your first name";
      // $_POST["fname"] = "";

    }else{
      $fname = valData($_POST["fname"]);
      // check if name contains only alphabets and whitespace

      if(!preg_match("/^[a-zA-Z ]*$/", $fname)){
        $error_fname = "Enter only letter";
      }
    }

    if(empty($_POST["lname"])){
      $error_lname = "Enter your last name";
    }else{
      $lname = valData($_POST["lname"]);
      // check if name contains only alphabets and whitespace

      if(!preg_match("/^[a-zA-Z ]*$/", $lname)){
        $error_lname = "Enter only letter";
      }

    }

    if(empty($_POST["email"])){
      $error_email = "Enter your email";
    }else{
      $email = valData($_POST["email"]);
      // check is email is valid
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_email = "enter valid email";
      }
    }

    if(empty($_POST["password"])){
      $error_password = "Enter a valid password";
    }else{
      $password = valData($_POST["password"]);
    }

    if(empty($_POST["confirm_password"])){
      $error_confirm_password = "Confirm your password";
    }else{
      $confirm_password = valData($_POST["confirm_password"]);
    }
    if($password != $confirm_password){
      echo "Password and Confirm Password do not match";
    }

    $fname = valData($_POST["fname"]);
    $lname = valData($_POST["lname"]);
    $email = valData($_POST["email"]);
    $password = valData($_POST["password"]);
    $confirm_password = valData($_POST["confirm_password"]);
  }
  // Take off unwanted characters

  function valData($userData){
    $userData = trim($userData);
    $userData = stripslashes($userData);
    $userData = htmlspecialchars($userData);
    return $userData;

  }

?>

<div id="div_for_form">
  
<!-- <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> -->
<form method="POST" action="server.php">
    <div id="div_sign_inputs">

      <label for="fname">First name</label><span class= "error_message"><?php echo $error_fname; ?></span><br>
      <input type="text" id="fname" name="fname" value="<?php echo $fname?>" required>
      <br>
    
      <label for="lname">Last name</label><span class= "error_message"><?php echo $error_lname; ?></span><br>
      <input type="text" id="lname" name="lname" value="<?php echo $lname?>" required>
      
      <br>

      <label for="email">Email</label><br>
      <input type="email" id="email" name="email" value="<?php echo $email?>" required>
      <span class= "error_message"><?php echo $error_email; ?></span>
      <br>

      <label for="password">Password</label><span class= "error_message"><?php echo $error_password; ?></span><br>
      <input type="password" id="password" name="password" value="<?php echo $password?>" required>
      <br>

      <label for="confirm_password">Confirm Password</label><span class= "error_message"><?php echo $error_confirm_password; ?></span><br>
      <input type="confirm_password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password?>" required>
      <br>

      <input type="submit" value="Submit" name="submit" id="register_button">

    </div>
    
  </form>
</div>