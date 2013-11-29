<?php

    include './../User.php';
    $User = new User;

    $id = $_POST[ 'id' ];
    if ( isset( $_POST[ 'action'] ) ) {
        if( $_POST[ 'action' ] == 'edit' ) {
            $username = $_POST[ 'username' ];
            $email = $_POST[ 'email' ];

            $fieldsToAdd = array(
                'username' => $username,
                'email' => $email
            );
        } else if ( $_POST[ 'action'] == 'edit-password' ) {
            $password = md5( $_POST[ 'password' ] );

            $fieldsToAdd = array(
                'password' => $password
            );
        }
    }

    if ( $User->update( $id, $fieldsToAdd ) ) {
        $json = array(
            'statement' => 'valid',
            'msg' => 'User edited successfully'
        );
    } else {
        $json = array(
            'statement' => 'void',
            'msg' => 'Error edited user'
        );
    }

    echo json_encode( $json );

?>