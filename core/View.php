<?php

    /**
    * 
    */
    class View {
        
        function __construct() {
            # code...
        }

        static public function render() {
            self::loadView( Controller::getVarstoRender() );
        }

        static public function loadView( $resource ) {
            $params = Config::getParams();
            if ( !is_null( $resource ) ) { extract( $resource ); }
            $ViewPath = VIEWS_PATH . Controller . '/';
            $action = Controller::getAction( Action );
            if ( is_readable( $ViewPath . $action . '.phtml' ) ) {
                include_once( $ViewPath . $action . '.phtml' );
            } else {
                if ( !isset( $params[ 'format' ] ) ) {
                    die( 'View not found for this action "' . $action . '"' );
                }
            }
        }
    }

?>