<?php
if (empty($_GET['id'])) {
  header('Location: congres.php');
}
$galerie = getGalerie($_GET['id']);
$galerieName = 'galerie' . $galerie->id;
?>

<h1><?php echo $galerie->name ?></h1>

  <?php 
  $i = 1;
  do {
    $continue = true;
    $photo = getData($galerieName, NO_LNG, 'photo'.$i, '');
    $legende = getData($galerieName, $_SESSION['lng'], 'legende'.$i, 'Légende ' . $i);
    
    if ( empty($photo) OR !$photo) {      
      $continue = false;
      break;
    }
    else { 
      if ( $i == 1 ) { ?>
      <h2>Photos du congrès</h2>
        <div class="row photos">
      <?php }
      ?>    
  <a href="#" class="span3">
    <figure class="">
      <img data-content-name="<?php echo $galerieName ?>/no/photo<?php echo $i ?>" src="<?php echo $photo ?>" alt="Photo 1" />
      <figcaption data-content-name="<?php echo $galerieName ?>/legende<?php echo $i ?>"><?php echo $legende ?></figcaption>
    </figure>
  </a>
    <?php }
    $i++;
  } while($continue); 
  
  if ( $i > 1 ) { echo '</div>'; }
?> 

</div>

<div class="row videos">
  <?php 
  $i = 1;
  do {
    $continue = true;
    $photo = getData($galerieName, NO_LNG, 'video'.$i, '');
    $legende = getData($galerieName, $_SESSION['lng'], 'legendevideo'.$i, 'Légende ' . $i);
    
    if ( empty($photo) OR !$photo) {      
      $continue = false;
    }
    else { 
      if ( $i == 1 ) { ?>
      <h2>Vidéos du congrès</h2>
        <div class="row photos">
      <?php }
      ?>      
  <a href="#" class="span3">
    <figure class="">
      <img data-content-name="<?php echo $galerieName ?>/no/photo<?php echo $i ?>" src="<?php echo $photo ?>" alt="Photo 1" />
      <figcaption data-content-name="<?php echo $galerieName ?>/legende<?php echo $i ?>"><?php echo $legende ?></figcaption>
    </figure>
  </a>
    <?php }
    $i++;
  } while($continue); 
  if ( $i > 1 ) { echo '</div>'; }
?> 

</div>
