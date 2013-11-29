<?php

    /**
     * 
     */
    abstract class Database {

        /**
         * [$host description]
         * @var string
         */
        public static $host = 'localhost';
        public static $user = 'root';
        public static $pass = '1234abcd';
        public static $name = 'crud_mvc';
        
        /**
         * [connection description]
         * @return [type]
         */
        public static function connection() {
            return new mysqli( self::$host, self::$user, self::$pass, self::$name );
        }

        /**
         * Find One Resource Unique from Query SQL
         * @param  [ String ] $SQL [ Query SQL ]
         * @param  [ Object ] $link [ Connection Object ]
         * @return [ Array ] [ Rows Resource Query if is true ]
         */
        public static function findOne( $SQL, $link ) {
            if ( !is_null( $SQL ) && !is_null( $link ) ) {

                if ( $result = $link->query( $SQL ) ) {
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
        public static function findMany( $SQL, $link ) {
            if ( !is_null( $SQL ) && !is_null( $link ) ) {

                if ( $result = $link->query( $SQL ) ) {
                    if ( $result->num_rows != 0 )
                        return( $result );
                    else
                        return( NULL );
                } else
                    return( false );

            } else 
                return( false );
        }

        public static function createNew( $SQL, $link ) {
            if ( !is_null( $SQL ) && !is_null( $link ) ) {

                if ( $link->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function delete( $SQL, $link ) {
            if ( !is_null( $SQL ) && !is_null( $link ) ) {

                if ( $link->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

        public static function updates( $SQL, $link ) {
            if ( !is_null( $SQL ) && !is_null( $link ) ) {

                if ( $link->query( $SQL ) )
                    return( true );
                else
                    return( false );

            } else 
                return( false );
        }

    }

?>