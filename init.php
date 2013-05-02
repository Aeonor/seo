<?php
session_start();
require 'index.def.php';
require_once 'Mysql.class.php';
header('Content-Type: text/html; charset=UTF-8');

$_PAGE  = (empty($_GET['page'])) ? 'home' : $_GET['page'];
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
  header('Content-type: application/json');
  echo $_CONTENTS;
}
else { 
  $_LAYOUT = (isset($_LAYOUT) ) ? $_LAYOUT : 'layout'; 
  $path = __DIR__ . '/src/'.$_LAYOUT.'.php';
  ob_start();
  if ( file_exists($path) ) { 
    include $path ;
  }
  ob_end_flush();
}