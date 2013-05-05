<?php
if ( !empty($_SESSION['admin']) && $_SESSION['admin'] ) {
    session_destroy();
    die(json_encode(false));
}

$passwordT = getData('login', NO_LNG, 'admin');

if ( isset($_POST['submit'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
  
  if ( !empty($login) && !empty($password) && $login=='admin' && sha1($password)==$passwordT ) {
    $_SESSION['admin'] = true;
    header('Content-type: application/json');
    echo json_encode(true);
    exit;
  }
  else {
   echo json_encode(false);
  }
}