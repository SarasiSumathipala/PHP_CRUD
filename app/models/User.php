<?php

    require 'Database.class.php';

    /**
    * 
    */
    class User extends Database {

        protected $link;
        private static $table = 'users';
        
        public function __construct() {
            $this->link = parent::connection();
        }

        public function find(
            $value,
            $options = array(
                'where' => 'id',
                'many?' => false
            )
        ) {
            if ( !isset( $options[ 'many?' ] ) || !$options[ 'many?' ] ) {
                $SQL = "SELECT * FROM ". self::$table ." WHERE ". $options[ 'where' ] ."='". $value ."' LIMIT 1";
                return( parent::findOne( $SQL, $this->link ) );
            } else {
                $SQL = "SELECT * FROM ". self::$table ." ORDER BY id ASC";
                return( parent::findMany( $SQL, $this->link ) );
            }
        }

        public function create(
            $fieldsToAdd = array(
                'username' => null,
                'password' => null,
                'email' => null
            )
        ) {
            $SQL = "INSERT INTO ". self::$table ." VALUES( '', '". $fieldsToAdd[ 'username' ] ."', '". md5( $fieldsToAdd[ 'password' ] ) ."', '". $fieldsToAdd[ 'email' ] ."' )";
            return( parent::createNew( $SQL, $this->link ) );
        }

        public function update(
            $id,
            $fieldsToAdd = array(
                'username' => null,
                'password' => null,
                'email' => null
            )
        ) {
            $SQL = "UPDATE ". self::$table ." SET";
            $count = count( $fieldsToAdd );
            $i = 1;
            foreach ( $fieldsToAdd as $key => $value ) {
                $SQL .= " ". $key ."='". $value ."'";
                if ( $i <= ( $count - 1 ) ) $SQL .= ", ";
                $i++;
            }
            $SQL .= " WHERE id=". $id ." LIMIT 1";
            return( parent::updates( $SQL, $this->link ) );
        }

        public function destroy( $id ) {
            $SQL = "DELETE FROM users WHERE id='$id' LIMIT 1";
            return( parent::delete( $SQL, $this->link ) );
        }

        public function __destruct() {
            $this->link->close();
        }
    }

?>