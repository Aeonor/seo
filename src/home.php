<?php
$congres_past = getData('home', NO_LNG, 'congres_past', 'images/biarritz.jpg');
$congres_past_label = getData('home', $_SESSION['lng'], 'congres_past_label', 'Biarritz, Juillet 2012');
$congres_future = getData('home', NO_LNG, 'congres_future', 'images/shanghai.jpg');
$congres_future_label = getData('home', $_SESSION['lng'], 'congres_future_label', 'Shanghai, Juillet 2013');

$blocs = array();
for ($i=1; $i<5; $i++) {
  $blocs[$i] = array(
    'title' => getData('home', $_SESSION['lng'], 'bloc_title_'.$i, 'Titre '.$i),
    'img'   => getData('home', NO_LNG, 'bloc_img_'.$i, 'http://fc04.deviantart.net/fs24/i/2007/329/f/0/Who_Are_We__by_MultiCurious.jpg'),
    'content' => getData('home', $_SESSION['lng'], 'bloc_content_'.$i, 'Et quoniam mirari posse quosdam peregrinos existimo haec lecturos forsitan, si contigerit, quamobrem cum oratio ad ea monstrandahil praeitates harum similis alias, summatim causas perstringam nusquam a veritate sponte propria digressurus.')
  );
}

?>

<div class="row congres">
  <div class="span6">
    <figure>
      <img src="<?php echo $congres_past ?>" alt="Dernier congrès" />
      <figcaption contentname="congres_past_label"><?php echo $congres_past_label ?></figcaption>
    </figure>
  </div>
  <div class="span6">
    <figure>
      <img src="<?php echo $congres_future ?>" alt="Congrès de Shanghai" />   
      <figcaption contentname="congres_future_label"><?php echo $congres_future_label ?></figcaption>
    </figure>   
  </div>
</div>
<div class="row thumbnails">
  <ul class="inline">
    <?php foreach($blocs AS $i=>$bloc) : ?>
    <li class="span3 ">
      <a href="#">
        <h2 contentname="bloc_title_<?php echo $i ?>"><?php echo $bloc['title'] ?></h2>
        <figure><span contentname="bloc_img_<?php echo $i ?>"><img src="<?php echo $bloc['img'] ?>" alt="Image de <?php echo $bloc['img'] ?>" /></span></figure>
        <p contentname="bloc_content_<?php echo $i ?>"><?php echo $bloc['content'] ?></p>
      </a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>