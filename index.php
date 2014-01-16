<?php
  include_once( './core/Config.php' );
  Config::loadCore();

  if ( Config::isAjax() ) {
    Bootstrap::init();
    die();
  }
  
  Bootstrap::init();