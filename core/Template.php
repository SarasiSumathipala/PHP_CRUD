<?php

    /**
    * 
    */
    class Template {
        
        public function __construct() {
            
        }

        public function loadLayout( $layout ) {
            $layoutPath = VIEWS_PATH . 'layouts/';
            if ( is_readable( $layoutPath . $layout . '.phtml' ) ) {
                return( eval( '?>'. file_get_contents( $layoutPath . $layout . '.phtml' ) ) );
            } else {
                return( false );
            }
        }

        public function loadStylesheets() {
            $cssFiles = array( 'metro-bootstrap', 'style' );
            $toEcho = '';
            $stylesheetsURL = './app/assets/stylesheets/';
            foreach ( $cssFiles as $value ) {
                $toEcho .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"". $stylesheetsURL . $value .".css\" />\n";
            }

            return( $toEcho );
        }

        public function loadJavascripts() {
            $jsFiles = array( 'jquery.min', 'users' );
            $toEcho = '';
            $javascriptsURL = './app/assets/javascripts/';
            foreach ($jsFiles as $value) {
                $toEcho .= "<script type\"text/javascript\" src=\"". $javascriptsURL . $value .".js\"></script>\n";
            }

            return( $toEcho );
        }

        public function getHead() {
            $head = self::loadLayout( 'head' );
            print_r( $head );
        }

        public function getFoot() {
            $foot = self::loadLayout( 'foot' );
            return( $foot );
        }
    }

?>