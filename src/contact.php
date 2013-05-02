<?php
$errors = null;
$ok = false;
$email = null;
$sujet = null;
$content = null;

if (!empty($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['sujet']) || empty($_POST['content'])) {
        $errors = 'Tous les champs sont requis';
    } else {
        $email = $_POST['email'];
        $sujet = $_POST['sujet'];
        $content = $_POST['content'];

        try {
            $ok = true;
            require_once __DIR__ . '/../phpmailer/class.phpmailer.php';
            $mail = new PHPmailer();
            $mail->CharSet = 'UTF-8'; // évite d'avoir des caractères chinois :)
            $mail->From = $_POST['email']; // adresse mail du compte qui envoi
            //$mail->FromName = "Data Engine Dasihaulien"; // remplace le nom du destinateur lors de la lecture d'un email
            $mail->AddAddress('contact@seoph.org'); // adresse du destinataire, plusieurs adresses possibles en même temps !
            //$mail->AddReplyTo('postmaster[at]monsite.e4y.fr'); // renvoi une copie de l'email au destinateur, fonctionnalité pas toujours opérationnelle
            $mail->Subject = $_POST['sujet']; // l'entête = nom du sujet
            $mail->Body = $_POST['content']; // le corps = le message en lui-même, codé en HTML si vous voulez
        } catch (Exception $exception) {
            $ok = false;
            $errors = 'Une erreur est survenue dans l\'envoi de l\'email, vous pouvez nous joindre à contact@seoph.org';
        }

    }
}
?>
<?php if ($ok): ?>
    <div class="alert alert-success">Votre e-mail a bien été envoyé</div>
<?php else:
    if (!empty($errors)): ?><div class="alert alert-error"><?php echo $errors; ?></div><?php endif; 
?>
<form method="post" class="form-horizontal">
    <fieldset>
        <legend data-content-name="contact/chapo"><?php echo getData($_PAGE, $_SESSION['lng'], 'chapo', 'Formulaire de contact'); ?></legend>

        <div class="control-group">
            <label class="control-label" for="f-email"><span data-content-name="contact/email"><?php echo getData($_PAGE, $_SESSION['lng'], 'email', 'Votre e-mail'); ?></span> :</label>
            <div class="controls">
                <input type="text" id="f-email" placeholder="email@domain.com" name="email" required="required" value="<?php echo $email ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="f-sujet"><span data-content-name="contact/sujet"><?php echo getData($_PAGE, $_SESSION['lng'], 'sujet', 'Sujet'); ?></span> :</label>
            <div class="controls">
                <input type="text" id="f-sujet" name="sujet" required="required" value="<?php echo $sujet ?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="f-content"><span data-content-name="contact/content"><?php echo getData($_PAGE, $_SESSION['lng'], 'content', 'Message'); ?></span> :</label>
            <div class="controls">
                <textarea rows="5" id="f-content" name="content" required="required"><?php echo $content ?></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <input type="submit" class="btn btn-primary" name="submit" value="Ok">
            </div>
        </div>

    </fieldset>    
</form>
<div style="padding-top:10px; font-size:.9em"><em>&raquo; Tous les champs sont requis</em></div>
<?php
   endif;