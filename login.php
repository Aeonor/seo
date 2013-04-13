<?php
session_start();

if ( isset($_POST['submit'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  
  if ( !empty($login) && !empty($password) && $login=='admin' && $password='test' ) {
    $_SESSION['admin'] = true;
    header('Content-type: application/json');
    echo json_encode(true);
    exit;
  }
  else {
   ?> Erreur <?php
  }
}
?>


<form method="post">
  <input type="text" name="login" placeholder="your login" />
  <input type="password" name="password" placeholder="your password" />
  <input type="submit" name="submit" value="Login" />
</form>