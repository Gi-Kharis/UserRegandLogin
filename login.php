<?php include_once 'header.php';?>

<div id="div_for_form">
  <form method="POST" action="authentication.php">
    <div id="div_log_input">
      <label for="email">Email</label><br>
      <input type="email" id="email" name="email" value=""><br>

      <label for="password">Password</label><br>
      <input type="password" id="password" name="password" value=""><br>

      <input type="submit" value="Submit" id="login_button">

    </div>

  </form>
</div>