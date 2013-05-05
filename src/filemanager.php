<?php
if (empty($_GET['field']) && !isset($_GET['image'])) {
    exit('ERROR in script loading');
}

$fieldName = (isset($_GET['field']) ) ? $_GET['field'] : null;
$imageName = (isset($_GET['image']) ) ? $_GET['image'] : null;
?>

<?php
$directory = realpath(__DIR__ . '/../upload/') . '\\';
if (!empty($_POST['submit'])) {
    $file = $_FILES['f_file'];
    $fileName = $file['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    $name = randomString();
  echo  $path = $directory . $name . '.' . $fileExtension;
    move_uploaded_file($file['tmp_name'], $path);
}
?>

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

<div class="row" style="padding:20px">  
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


    <div class="span6">
        <form method="post" enctype="multipart/form-data">

            <hr />
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
