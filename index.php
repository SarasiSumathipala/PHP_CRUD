<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CRUD MVC Testin</title>
  <link rel="stylesheet" type="text/css" href="app/assets/stylesheets/metro-bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="app/assets/stylesheets/style.css"/>
</head>
<body>

  <?php
    if ( isset( $_GET[ 'section' ] ) && !empty( $_GET[ 'section' ] ) ) {

      if ( is_dir( 'app/views/'. $_GET[ 'section' ] ) ) {

        if ( isset( $_GET[ 'page' ] ) && !empty( $_GET[ 'page' ] ) )

          if ( is_readable( 'app/views/'. $_GET[ 'section' ] .'/'. $_GET[ 'page' ] .'.phtml' ) ) include 'app/views/'. $_GET[ 'section' ] .'/'. $_GET[ 'page' ] .'.phtml';
          else echo '<h1>Error 404 - Page Not Found</h1>';

        else
          include 'app/views/'. $_GET[ 'section' ] .'/index.phtml';

      } else
        echo '<h1>Error 404 - Page Not Found</h1>';
    } else
      include 'app/views/users/index.phtml';
  ?>

  <script type="text/javascript" src="app/assets/javascripts/jquery.min.js"></script>
  <script type="text/javascript" src="app/assets/javascripts/users.js"></script>
</body>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</html>