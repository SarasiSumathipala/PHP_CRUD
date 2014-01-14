<?php

    interface iDatabase {
        public static function link();
        public static function findOne( $SQL );
        public static function findMany( $SQL );
        public static function createNew( $SQL );
        public static function delete( $SQL );
        public static function updates( $SQL );
    }

    /**
     * 
     */
    abstract class Database implements iDatabase {

        /**
         * [$host description]
         * @var string
         */
        public static $host = 'localhost';
        public static $user = 'root';
        public static $pass = '1234abcd';
        public static $name = 'crud_mvc';
        private static $link = NULL;
        
        /**
         * [connection description]
         * @return [type]
         */
        public static function link() {
            if ( !( self::$link instanceof mysqli ) ) {
                self::$link = new mysqli( self::$host, self::$user, self::$pass, self::$name );
            }
            
            return( self::$link );
        }

        /**
         * Find One Resource Unique from Query SQL
         * @param  [ String ] $SQL [ Query SQL ]
         * @param  [ Object ] $link [ Connection Object ]
         * @return [ Array ] [ Rows Resource Query if is true ]
         */
        public static function findOne( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( $result = self::link()->query( $SQL ) ) {
                    if ( $result->num_rows != 0 )
                        return( $result->fetch_assoc() );
                    else
                        return( NULL );
                } else
                    return( false );

            } else 
                return( false );
        }

        /**
         * Find Many Resource from Query SQL
         * @param  [ String ] $SQL [ Query SQL ]
         * @param  [ Object ] $link [ Connection Object ]
         * @return [ Object ] [ Resource Query if is true ]
         */
        public static function findMany( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( $result = self::link()->query( $SQL ) ) {
                    if ( $result->num_rows != 0 )
                        return( $result );
                    else
                        return( NULL );
                } else
                    return( false );

            } else 
                return( false );
        }

        public static function createNew( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( self::link()->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function delete( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( self::link()->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function updates( $SQL ) {
            if ( !is_null( $SQL ) ) {

                if ( self::link()->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }
    }