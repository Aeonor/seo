<?php
require 'Mysql.class.php';
define('URI', 'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], 'index.php')));
if ($_SERVER['HTTP_HOST'] == 'localhost') { 
  define('DATABASE_HOST', 'localhost');
  define('DATABASE_USER', 'root');
  define('DATABASE_PASSWORD', '');
  define('DATABASE_NAME', 'seo');
}
else {
  define('DATABASE_HOST', 'db433080666.db.1and1.com');
  define('DATABASE_USER', 'dbo433080666');
  define('DATABASE_PASSWORD', 'cacahuete');
  define('DATABASE_NAME', 'db433080666');
}

define('LNG_EN', 'en');
define('LNG_FR', 'fr');
define('NO_LNG', 'no');

// FUNCTIONS
function getData($_page, $_lng, $_name, $_default_value = null) { 
  $mysql = Mysql::getInstance();
  $return = $mysql->selectOne('SELECT value FROM data WHERE page=? AND lng=? AND name=?', array($_page, $_lng, $_name)); 
  return empty($return) ? $_default_value : $return->value;
}
// FUNCTIONS
function setData($_page, $_lng, $_name, $_value) { 
  $mysql = Mysql::getInstance();
  $return = $mysql->selectOne('SELECT value FROM data WHERE page=? AND lng=? AND name=?', array($_page, $_lng, $_name)); 
  
  // UPDATE
  if ( $return != false ) {
    $mysql->update('UPDATE data SET value=? WHERE page=? AND lng=? AND name=?', array($_value, $_page, $_lng, $_name));    
  }
  
  // INSERT
  else {
    $mysql->insert('INSERT INTO data(page, lng, name, value) VALUES(?,?,?,?)', array($_page, $_lng, $_name, $_value));    
  }
}