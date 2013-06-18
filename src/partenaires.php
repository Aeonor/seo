<?php
$chapo = getData($_PAGE, $_SESSION['lng'], 'chapo', 'Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstrandahil praeitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.');
?>
<div class="row">
  <p class="span12" data-content-name="partenaires/chapo"><?php echo $chapo ?></p>
</div>

<div class="span12" data-content-name="partenaires/no/part"><?php getData($_PAGE, NO_LNG, 'part', ''); ?></p>