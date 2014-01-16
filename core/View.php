<?php

    /**
    * 
    */
    class View {

        private static $layout = true;
        
        function __construct() {
            # code...
        }

        static public function render( $controller, $action ) {
            if ( Config::isAjax() || !self::isLayout() ) {
                self::loadView( $controller, $action );                
            } else {
                Template::getHead();
                self::loadView( $controller, $action );
                Template::getFoot();
            }

        }

        static public function loadView( $controller, $action ) {
            $resource = $controller->getVarstoRender();
            $params = Config::getParams();
            if ( !empty( $resource ) ) { extract( $resource ); }
            $ViewPath = VIEWS_PATH . Controller . '/';
            $view = $controller->getView( $action );
            if ( is_readable( $ViewPath . $view . '.phtml' ) ) {
                include_once( $ViewPath . $view . '.phtml' );
            } else {
                if ( !isset( $params[ 'format' ] ) ) {
                    die( 'View not found for this action "' . $view . '"' );
                }
            }
        }

        static public function setLayout( $layout ) {
            self::$layout = $layout;
        }

        static public function isLayout() {
            return( self::$layout );
        }
    }

?>