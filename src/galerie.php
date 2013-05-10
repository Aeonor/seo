<?php
if (empty($_GET['id'])) {
  header('Location: congres.php');
}
$galerie = getGalerie($_GET['id']);
$galerieName = 'galerie' . $galerie->id;
?>

<h1><?php echo $galerie->name ?></h1>

<div class="row members">
  <?php 
  $i = 1;
  do {
    $continue = true;
    $type  = getData($galerieName, NO_LNG, 'type'.$i, 'photo');
    $photo = getData($galerieName, NO_LNG, 'photo'.$i, '');
    $legende = getData($galerieName, $_SESSION['lng'], 'legende'.$i, 'Légende ' . $i);
    
    if ( empty($photo) OR !$photo) {      
      $continue = false;
    }
    else { ?>    
    <figure class="span2">
      <img data-content-name="<?php echo $galerieName ?>/no/photo<?php echo $i ?>" src="<?php echo $photo ?>" alt="Photo 1" />
      <figcaption data-content-name="<?php echo $galerieName ?>/legende<?php echo $i ?>"><?php echo $legende ?></figcaption>
    </figure>
    <?php }
    $i++;
  } while($continue); ?> 

<object width="425" height="355"><param name="movie" value="http://www.youtube.com/v/0HBAgLyEGSg&rel=1"></param><param name="wmode" value="transparent"></param><embed src="http://www.youtube.com/v/0HBAgLyEGSg&rel=1" type="application/x-shockwave-flash" wmode="transparent" width="425" height="355"></embed></object> 

</div>
