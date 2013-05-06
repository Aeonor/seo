<div class="row members">  
  <div class="span3 offset2">
    <h2 data-content-name="news/annuel_label">
      <?php echo getData($_PAGE, $_SESSION['lng'], 'annuel_label', 'Congrès passé') ?>
    </h2>
    
    <div class="link-list" data-content-name="news/annuel_content">
      <a href="#">
        
      </a>
      <?php echo getData($_PAGE, $_SESSION['lng'], 'annuel_content', '') ?>
    </div>
  </div>
  <div class="span3 offset2">
    <h2 data-content-name="news/congres_future">
      <?php echo getData($_PAGE, $_SESSION['lng'], 'congres_future', 'Congrès à venir') ?>
    </h2>
    
    <div class="link-list" data-content-name="news/future_content">
      <?php echo getData($_PAGE, $_SESSION['lng'], 'future_content', '') ?>
    </div>
  </div>
</div>
