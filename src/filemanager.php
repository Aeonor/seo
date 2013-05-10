<?php
if (empty($_GET['field']) && !isset($_GET['image'])) {
  exit('ERROR in script loading');
}

$fieldName = (isset($_GET['field']) ) ? $_GET['field'] : null;
$imageName = (isset($_GET['image']) ) ? $_GET['image'] : null;
$errorGal = $errorVid = null;
?>

<?php
$directory = realpath(__DIR__ . '/../upload/') . '\\';
if (!empty($_POST['submit'])) {
  $file = $_FILES['f_file'];
  $fileName = $file['name'];
  $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

  $name = randomString();
  $path = $directory . $name . '.' . $fileExtension;
  move_uploaded_file($file['tmp_name'], $path);
}

if (!empty($_POST['submit-gal']) && !empty($_POST['name'])) {
  $gal = getGalerieByName($_POST['name']);

  if ($gal && !empty($gal)) {
    $errorGal = 'La galerie existe déjà sous ce nom !';
  } else {
    addGalerie($_POST['name']);
  }
  ?>
<script>
    var TAB = 2;
</script>
<?php }

if (!empty($_POST['submit-video']) && !empty($_POST['name'])) {
  $name = $_POST['name'];
  
  // FILTRE
  if ( preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $name, $matches) ) {
    $name = $matches[0];
  }
  
  $vid = getVideo($name);

  if ($vid && !empty($vid)) {
    $errorVid = 'La vidéo existe déjà !';
  } else {
    addVideo($name);
  }
  ?>
<script>
    var TAB = 1;
</script>
<?php } ?>

<script>
  var FIELD = '<?php echo $fieldName; ?>';
  var IMAGE = '<?php echo $imageName; ?>';
</script>

<style>
  .image-preview {
    display:inline-block;
    height:60px;
    width:80px;
    opacity: .7;
    margin-right: 20px;
  }
  .image-preview:hover {
    opacity: 1;
  }
</style>
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Images</a></li>
    <li><a href="#tabs-2">Vidéos</a></li>
    <li><a href="#tabs-3">Galeries</a></li>
  </ul>
  
<div class="row" id="tabs-1" style="padding:20px">  
  <div class="span6">
<?php
$files = scandir($directory);
foreach ($files AS $file):
  if (!in_array($file, array('.', '..'))):
    ?><a href="#" class="image-preview"><img src="./upload/<?php echo $file ?>" class="img-polaroid"></a><?php
  endif;
endforeach;
?>
  </div>


  <div class="span6" style="margin-top: 20px">
    <form method="post" enctype="multipart/form-data">
      <span>
        <input  type="file" 
                style="visibility:hidden; width: 1px;" 
                id="f_file" name="f_file"  
                onchange="$(this).parent().find('span').html($(this).val().replace('C:\\fakepath\\', ''))"  /> <!-- Chrome security returns 'C:\fakepath\'  -->
        <input class="btn btn-warning" type="button" value="Upload File.." onclick="$(this).parent().find('input[type=file]').click();"/> <!-- on button click fire the file click event -->
        &nbsp;
        <span  class="badge badge-warning" ></span>
        &nbsp;
        <input type="submit" class="btn btn-primary" name="submit" value="Charger" />
      </span>
    </form>
  </div>
</div>
  
  <div class="row" id="tabs-2" style="padding: 20px">
    <div class="span6">      
        <?php $videos = getVideos(); 
        foreach ( $videos AS $video): ?> 
          <a href="#" class="image-preview" data-id="<?php ?>"><img src="http://img.youtube.com/vi/<?php echo $video; ?>/0.jpg" alt="Video" class="img-polaroid" /></a>       
        <?php endforeach; ?>
    </div>
    <div class="span6" style="margin-top: 50px">
      <?php if ( !empty($errorVid) ): ?>
    <div class="alert alert-error"><?php echo $errorVid ?></div>
    <?php endif; ?>
     <form method="post" class="form-horizontal">
      <span>
        <div class="control-group">
          <label class="control-label" for="f-name">
            <strong>Nouvelle vidéo youtube</strong> :
          </label>
          <div class="controls">
            <input type="text" id="f-name" placeholder="Id ou URL de la vidéo" name="name" required="required">&nbsp;&nbsp;
            <input type="submit" class="btn btn-primary" name="submit-video" value="Ajouter" />
          </div>
        </div>
      </span>
    </form>
  </div>
  </div>


<div class="row"  id="tabs-3" style="padding:20px">
  <div class="span6">
    <ul class="nav nav-list">
<?php
$galeries = getGaleries();
foreach ($galeries AS $galerie):
  if (!in_array($file, array('.', '..'))):
    ?><li><a href="#" class="link-preview" data-id="<?php echo $galerie->id ?>"><?php echo $galerie->name ?></a></li><?php
  endif;
endforeach;
?>
    </ul>
  </div>
  <div class="span6" style="margin-top: 20px">
    <?php if ( !empty($errorGal) ): ?>
    <div class="alert alert-error"><?php echo $errorGal ?></div>
    <?php endif; ?>
    <form method="post" class="form-horizontal">
      <span>
        <div class="control-group">
          <label class="control-label" for="f-name">
            <strong>Nouvelle galerie</strong> :
          </label>
          <div class="controls">
            <input type="text" id="f-name" placeholder="Nom de la galerie" name="name" required="required">&nbsp;&nbsp;
            <input type="submit" class="btn btn-primary" name="submit-gal" value="Créer" />
          </div>
        </div>
      </span>
    </form>
  </div>
</div>

</div>