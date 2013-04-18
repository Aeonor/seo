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
        <div class="bureau_content" data-content-name="qui_sommes_nous/bureau_president_content"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_president_content', '<p>President CV</p>') ?></div>
      </li>
      <li>
        <h3 data-content-name="bureau_secretaire_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_secretaire_label', 'Secrétaire') ?></h3>
        <div class="bureau_content" data-content-name="qui_sommes_nous/bureau_secretaire_content"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_secretaire_content', '<p>Secrétaire CV</p>') ?></div>
      </li>
      <h3 data-content-name="bureau_tresorier_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_tresorier_label', 'Trésorier') ?></h3>
      <div class="bureau_content" data-content-name="qui_sommes_nous/bureau_tresorier_content"><?php echo getData($_PAGE, $_SESSION['lng'], 'bureau_tresorier_content', '<p>Trésorier CV</p>') ?></div>
      </li>
    </ul>
  </div>
  <div class="span3">
    <h2 data-content-name="qui_sommes_nous/conseil_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'conseil_label', 'Conseil d\'administration') ?></h2>
    <div data-content-name="qui_sommes_nous/no/conseil_content"><?php echo getData($_PAGE, NO_LNG, 'conseil_content', '<ul class="unstyled"><li>Premier membre</li></ul>') ?></div>
  </div>
  <div class="span3">
    <h2 data-content-name="qui_sommes_nous/comite_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'comite_label', 'Comité scientifique') ?></h2>
    <div data-content-name="qui_sommes_nous/no/comite_content"><?php echo getData($_PAGE, NO_LNG, 'comite_content', '<ul class="unstyled"><li>Premier membre</li></ul>') ?></div>
  </div>
  <div class="span3">
    <h2 data-content-name="qui_sommes_nous/honneur_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'honneur_label', 'Membres d\'honneur') ?></h2>
    <div data-content-name="qui_sommes_nous/no/honneur_content"><?php echo getData($_PAGE, NO_LNG, 'honneur_content', '<ul class="unstyled"><li>Premier membre</li></ul>') ?></div>
  </div>
</div>
