<?php
$chapo = getData($_PAGE, $_SESSION['lng'], 'chapo', 'Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstrandahil praeitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.');

?>
<div class="row">
<p class="span12" data-content-name="qui_sommes_nous/chapo"><?php echo $chapo ?></p>
</div>

<div class="row members">
  <div class="span3 bureau">
    <h2 data-content-name="qui_sommes_nous/bureau_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_label', 'Bureau') ?></h2>
    <ul class="unstyled">
      <li>
        <h3 data-content-name="bureau_president_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_president_label', 'Président') ?></h3>
        <div class="bureau_content" data-content-name="bureau_president_content"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_president_content', 'President CV') ?></div>
      </li>
      <li>
        <h3 data-content-name="bureau_secretaire_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_secretaire_label', 'Secrétaire') ?></h3>
        <div class="bureau_content" data-content-name="bureau_secretaire_content"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_secretaire_content', 'Secrétaire CV') ?></div>
      </li>
        <h3 data-content-name="bureau_tresorier_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_tresorier_label', 'Trésorier') ?></h3>
        <div class="bureau_content" data-content-name="bureau_tresorier_content"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_tresorier_content', 'Trésorier CV') ?></div>
      </li>
    </ul>
  </div>
  <div class="span3">
    <h2 data-content-name="qui_sommes_nous/conseil_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'conseil_label', 'Conseil d\'administration') ?></h2>
    <ul class="unstyled">
      <?php $i = 1;
        
      do {
        $stop = true;
        $consul = getData($_PAGE, NO_LNG, 'conseil_membre_'.$i, null);   
        if ( !empty($consul) ) {
          ?><li data-content-name="qui_sommes_nous/no/conseil_membre_<?php echo $i ?>"><?php echo $consul ?></li><?php
          $i++;
          $stop = false;
        }        
      } while(!$stop); ?>
      <li data-content-name="qui_sommes_nous/no/conseil_membre_<?php echo $i ?>"></li>
    </ul>
  </div>
  <div class="span3">
    <h2 data-content-name="qui_sommes_nous/comite_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'comite_label', 'Comité scientifique') ?></h2>
     <ul class="unstyled">
      <?php $i = 1;
        
      do {
        $stop = true;
        $consul = getData($_PAGE, NO_LNG, 'comite_membre_'.$i, null);   
        if ( !empty($consul) ) {
          ?><li data-content-name="qui_sommes_nous/no/comite_membre_<?php echo $i ?>"><?php echo $consul ?></li><?php
          $i++;
          $stop = false;
        }        
      } while(!$stop); ?>
      <li data-content-name="qui_sommes_nous/no/comite_membre_<?php echo $i ?>"></li>
    </ul>
  </div>
  <div class="span3">
    <h2 data-content-name="qui_sommes_nous/honneur_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'honneur_label', 'Membres d\'honneur') ?></h2>
     <ul class="unstyled">
      <?php $i = 1;
        
      do {
        $stop = true;
        $consul = getData($_PAGE, NO_LNG, 'honneur_membre_'.$i, null);   
        if ( !empty($consul) ) {
          ?><li data-content-name="qui_sommes_nous/no/honneur_membre_<?php echo $i ?>"><?php echo $consul ?></li><?php
          $i++;
          $stop = false;
        }        
      } while(!$stop); ?>
      <li data-content-name="qui_sommes_nous/no/honneur_membre_<?php echo $i ?>"></li>
    </ul>
  </div>
</div>
