<?php
  include_once( './core/Config.php' );
  Config::loadCore();

  if ( Config::isAjax() ) {
    Bootstrap::init();
    die();
  }
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRUD MVC Testin</title>
  <link rel="stylesheet" type="text/css" href="app/assets/stylesheets/metro-bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="app/assets/stylesheets/style.css"/>
</head>
<body>

  <?php Bootstrap::init(); ?>

  <script type="text/javascript" src="app/assets/javascripts/jquery.min.js"></script>
  <script type="text/javascript" src="app/assets/javascripts/users.js"></script>
</body>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</html>
