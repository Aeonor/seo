<?php

header('Content-type: application/json');
if (empty($_POST['page']) OR empty($_POST['name']) OR empty($_POST['content'])) {
  echo json_encode('Parameters page, name & content must be given');
}
else {
  $page = $_POST['page'];
  $lng = $_SESSION['lng'];
  $name = $_POST['name'];
  $value = $_POST['content'];

  // Override page
  if (strpos($name, '/') !== false) {
    $name = explode('/', $name);
    if (sizeof($name) == 2) {
      $page = $name[0];
      $name = $name[1];
    }
  }

  // set data
  setData($page, $lng, $name, $value);
  
  echo json_encode(true);
}