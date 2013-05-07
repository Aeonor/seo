<?php
  if ( empty($_GET['id']) ) {
    header('Location: congres.php');    
  }
  $galerie = getGalerie($_GET['id']);
  
?>

<h1><?php echo $galerie->name ?></h1>