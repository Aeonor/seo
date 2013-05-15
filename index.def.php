<?php

define('PARTIAL_URI', substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], 'index.php')));
define('URI', 'http://' . $_SERVER['HTTP_HOST'] . PARTIAL_URI);
if ($_SERVER['HTTP_HOST'] == 'localhost') {
  define('DATABASE_HOST', 'localhost');
  define('DATABASE_USER', 'root');
  define('DATABASE_PASSWORD', '');
  define('DATABASE_NAME', 'seo');
  require 'Mysql.class.php';
  $CONNEXION = Mysql::getInstance();
} else {
  define('DATABASE_HOST', 'db470397123.db.1and1.com');
  define('DATABASE_USER', 'dbo470397123');
  define('DATABASE_PASSWORD', 'limvotan64');
  define('DATABASE_NAME', 'db470397123');
  require 'Mysql.class.php';
  $CONNEXION = Mysql::getInstance();
}

define('LNG_EN', 'en');
define('LNG_FR', 'fr');
define('NO_LNG', 'no');

// FUNCTIONS
function isAdmin() {
  return true;
}

function slugify($text) {
  $text = strip_tags($text);

  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  if (function_exists('iconv')) {
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  }

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

function randomString($_length = 8) {
  $s = 'abcdefghijklmnopqrstuvwxyz0123456789';
  $sl = strlen($s) - 1;
  $string = null;
  do {
    $string .= $s{rand(0, $sl)};
  } while (strlen($string) < $_length);
  return $string;
}

function getData($_page, $_lng, $_name, $_default_value = null) {
  global $CONNEXION;
  $mysql = $CONNEXION;
  $return = $mysql->selectOne('SELECT value FROM data WHERE page=? AND lng=? AND name=?', array(&$_page, &$_lng, &$_name));
  return empty($return) ? $_default_value : $return->value;
}

// FUNCTIONS
function setData($_page, $_lng, $_name, $_value) {
  global $CONNEXION;
  $mysql = $CONNEXION;
  $return = $mysql->selectOne('SELECT value FROM data WHERE page=? AND lng=? AND name=?', array(&$_page, &$_lng, &$_name));

  // DELETE
  $value_stripped = strip_tags($_value);
  if (empty($_value) OR empty($value_stripped)) {
    $mysql->delete('DELETE FROM data WHERE page=? AND lng=? AND name=?', array(&$_page, &$_lng, &$_name));
  }

  // UPDATE
  elseif ($return != false) {
    $mysql->update('UPDATE data SET value=? WHERE page=? AND lng=? AND name=?', array(&$_value, &$_page, &$_lng, &$_name));
  }

  // INSERT
  else {
    $mysql->insert('INSERT INTO data(page, lng, name, value) VALUES(?,?,?,?)', array(&$_page, &$_lng, &$_name, &$_value));
  }
}

function getGaleries() {
  global $CONNEXION;
  $mysql = $CONNEXION;

  $return = $mysql->select('SELECT * FROM galeries ORDER BY name');
  return $return;
}

function getVideos() {
  global $CONNEXION;
  $mysql = $CONNEXION;

  $return = array();
  $return2 = $mysql->select('SELECT id FROM videos ORDER BY id');
  if (!empty($return2)) {
    foreach ($return2 AS $ret) {
      $return[] = $ret->id;
    }
  }
  return $return;
}

function getVideo($_name) {
  global $CONNEXION;
  $mysql = $CONNEXION;

  $return = $mysql->selectOne('SELECT * FROM videos WHERE id=?', array($_name));
  if ( !empty($return) && $return) {
    return $return->id;
  }
  return false;
}

function getGalerie($_id) {
  global $CONNEXION;
  $mysql = $CONNEXION;

  return $mysql->selectOne('SELECT * FROM galeries WHERE id=?', array($_id));
}

function getGalerieByName($_name) {
  global $CONNEXION;
  $mysql = $CONNEXION;

  return $mysql->selectOne('SELECT * FROM galeries WHERE name=?', array($_name));
}

function addGalerie($_name) {
  global $CONNEXION;
  $mysql = $CONNEXION;

  return $mysql->insert('INSERT INTO galeries(name) VALUES(?)', array($_name));
}

function addVideo($_name) {
  global $CONNEXION;
  $mysql = $CONNEXION;

  return $mysql->insert('INSERT INTO videos(id) VALUES(?)', array($_name));
}