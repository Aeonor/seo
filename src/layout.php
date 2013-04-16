<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>  

    <title>S.E.O</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.min.css">  
    <link rel="stylesheet" type="text/css" href="less/styles.css">  
    <!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
    <script src="js/less-1.3.3.min.js"></script>
  </head>
  <body id="<?php echo $_PAGE ?>">
    <div id="wrapper">
      <header>
        <div class="container">
          <div class="row">
            <div class="span4">
              <a href="/" id="logo"><img src="images/logo.png" alt="Logo S.E.O" /></a>
            </div>
            <ul class="pull-right unstyled" id="languages">
              <li><a href="lang.php?lng=en" class="en<?php if ($_SESSION['lng'] == LNG_EN): ?> selected<?php endif; ?>"><img src="images/en.png" alt="Drapeau anglais" /> English</a></li>
              <li><a href="lang.php?lng=fr" class="fr<?php if ($_SESSION['lng'] == LNG_FR): ?> selected<?php endif; ?>"><img src="images/fr.png" alt="Drapeau français" /> Français</a></li>
            </ul>
          </div>
        </div>
      </header>

      <div class="navbar ">
        <div class="container">
          <div class="navbar-inner"><div class="span12" style="float:none;margin: auto;">
              <a class="btn btn-navbar pull-left" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>

              <form class="navbar-search pull-right hidden-phone">
                <div class="input-append">
                  <input type="text" class="searc" placeholder="Search">
                  <button type="submit" class="btn"><i class="icon-search"></i></button>
                </div>
              </form>
              <div class="nav-collapse collapse pull-left">
                <ul class="nav">
                  <li<?php if ( $_PAGE=='home'): ?> class="active"<?php endif; ?>><a href="index.php">Accueil</a></li>
                  <li<?php if ( $_PAGE=='qui_sommes_nous'): ?> class="active"<?php endif; ?>><a href="qui_sommes_nous.php">Qui sommes nous ?</a></li>
                  <li<?php if ( $_PAGE=='congres'): ?> class="active"<?php endif; ?>><a href="congres.php">Nos congrès</a></li>
                  <li<?php if ( $_PAGE=='news'): ?> class="active"<?php endif; ?>><a href="news.php">News</a></li>
                  <li<?php if ( $_PAGE=='partenaires'): ?> class="active"<?php endif; ?>><a href="partenaires.php">Nos partenaires</a></li>
                  <li<?php if ( $_PAGE=='contact'): ?> class="active"<?php endif; ?>><a href="contact.php">Contact</a></li>
                </ul>
              </div></div>
          </div>
        </div>
      </div>

      <section id="container">
        <div class="container">
<?php echo $_CONTENTS ?>
        </div>
      </section>
      <div id="push"></div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="span3">
            <div data-content-name="layout/adress"><?php echo getData('layout', $_SESSION['lng'], 'adress', '<strong>S.E.O</strong><br />Société Eurasienne d\'Ophtalmologie<br />1 rue du Moulin<br />75 000 Paris<br />') ?></div>
            <a href="contact.html" data-content-name="layout/email"><?php echo getData('layout', NO_LNG, 'email', 'contact@seoph.com') ?></a>
          </div>
          <div class="span9">
            <form class="pull-right hidden-phone">
              <div class="input-append">
                <input type="text" class="searc" placeholder="Search">
                <button type="submit" class="btn"><i class="icon-search"></i></button>
              </div>
            </form>
            <div class="clearfix">
              <ul class="inline pull-right">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#" class="admin">Admin</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/tinymce/tinymce.min.js"></script>
  </body>
</html>