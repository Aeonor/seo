<?php 
session_start();
require 'index.def.php';

$_PAGE  = (empty($_GET['page'])) ? 'home' : $_GET['page'];
header('Content-Type: text/html; charset=UTF-8');
require_once 'Mysql.class.php';


if ( empty($_SESSION['lng']) ) {
  $_SESSION['lng'] = LNG_FR;
}


// PART 
$path = __DIR__ . '/src/' . $_PAGE . '.php';
ob_start();

if ( file_exists($path) ) { 
  include $path ;
}
$_CONTENTS = ob_get_contents();
ob_end_clean();

// LAYOUT

if ( isset($_POST['ajax']) AND $_POST['ajax'] === "true" ) {
  echo $_CONTENTS;
}
else {
  $path = __DIR__ . '/src/layout.php';
  ob_start();
  if ( file_exists($path) ) { 
    include $path ;
  }
  ob_end_flush();
}