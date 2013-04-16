<?php
session_start();
if ( !empty($_GET['lng']) && in_array($_GET['lng'], array('fr', 'en')) ) {
  $_SESSION['lng'] = $_GET['lng'];  
}

$uri = empty($_SERVER['HTTP_REFERER']) ? 'index.php' : $_SERVER['HTTP_REFERER'];
header('Location: ' . $uri);