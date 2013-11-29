<?php

    include './../User.php';
    $User = new User;

    $type = $_POST[ 'type' ];
    $q = $_POST[ 'q' ];

    switch ( $type ) {
        case 'username':
            $request = $User->find( $q, array( 'where' => 'username', 'many?' => false ) );

            if ( $request == NULL ) {
                $json = array(
                    'statement' => 'valid',
                    'msg' => ''
                );
            } else if ( is_array( $request ) ) {
                $json = array(
                    'statement' => 'void',
                    'msg' => 'Username is already in use'
                );
            } else if ( !$request ) {
                $json = array(
                    'statement' => 'void',
                    'msg' => 'Error checking username'
                );
            }
        break;
        
        case 'email':
            $request = $User->find( $q, array( 'where' => 'email', 'many?' => false ) );

            if ( $request == NULL ) {
                $json = array(
                    'statement' => 'valid',
                    'msg' => ''
                );
            } else if ( is_array( $request ) ) {
                $json = array(
                    'statement' => 'void',
                    'msg' => 'Email is already in use'
                );
            } else if ( !$request ) {
                $json = array(
                    'statement' => 'void',
                    'msg' => 'Error checking email'
                );
            }
        break;
    }

    echo json_encode( $json );

?>