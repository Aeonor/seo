<div class="row members">  
  <div class="span3 offset2">
    <h2 data-content-name="congres/annuel_label"><?php echo getData($_PAGE, $_SESSION['lng'], 'annuel_label', 'Congrès annuel') ?></h2>
     <ul class="unstyled">
      <?php $i = 1;
        
      do {
        $stop = true;
        $consul = getData($_PAGE, $_SESSION['lng'], 'congres_annuel_'.$i, null);   
        if ( !empty($consul) ) {
          ?><li><a href="congres.php?ann=<?php echo $i ?>&cong=<?php echo slugify($consul) ?>" data-content-name="congres/congres_annuel_<?php echo $i ?>"><?php echo $consul ?></a></li><?php
          $i++;
          $stop = false;
        }        
      } while(!$stop); ?>
        <li><div data-content-name="congres/congres_annuel_<?php echo $i ?>"></div></li>
    </ul>
  </div>
  <div class="span3 offset2">
    <h2 data-content-name="congres/congres_future"><?php echo getData($_PAGE, $_SESSION['lng'], 'congres_future', 'Congrès annuel') ?></h2>
     <ul class="unstyled">
      <?php $i = 1;
        
      do {
        $stop = true;
        $consul = getData($_PAGE, $_SESSION['lng'], 'congres_future_'.$i, null);   
        if ( !empty($consul) ) {
          ?><li><a href="congres.php?fut=<?php echo $i ?>&cong=<?php echo slugify($consul) ?>" data-content-name="congres/congres_future_<?php echo $i ?>"><?php echo $consul ?></a></li><?php
          $i++;
          $stop = false;
        }        
      } while(!$stop); ?>
          <li><div data-content-name="congres/congres_future_<?php echo $i ?>"></div></li>
    </ul>
  </div>
</div>
