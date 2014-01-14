<?php

    interface iController {
        static public function getVarstoRender();
        static public function setVarstoRender( $varstoRender );
    }

    /**
    * 
    */
    abstract class Controller implements iController {

        private static $varstoRender = array();
        private static $actionAlternative = array(
            'new' => 'create',
            'modificar' => 'edit',
            'edit-password' => 'editPassword'
        );

        static public function getAction( $action ) {
            foreach ( self::$actionAlternative as $key => $value ) {
                if ( $action == $key ) {
                    $action = $value;
                }
            }
            
            return( $action );
        }
        
        static public function getVarstoRender() {
            return( self::$varstoRender );
        }

        static public function setVarstoRender( $varstoRender ) {
            self::$varstoRender = $varstoRender;
        }

        static public function prepareItems( $objController, $action ) {
            if ( !empty( $objController ) && !empty( $action ) ) {
                $action = self::getAction( $action );
                if ( method_exists( $objController, $action ) ) {
                    $objController->$action( Config::getParams() );
                } else {
                    die( '<h1>The "' . $action . '" Action is invalid</h1>' );
                }
            } else {
                die( 'Unable to load the "' . $controller . '" Controller' );
            }
        }
    }

?>