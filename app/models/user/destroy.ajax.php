<?php

    include './../User.php';
    $User = new User;

    $id = $_POST[ 'id' ];

    if ( $User->destroy( $id ) ) {
        $json = array(
            'statement' => 'valid',
            'msg' => 'User destroy successfully'
        );
    } else {
        $json = array(
            'statement' => 'void',
            'msg' => 'Error destroying user'
        );
    }

    echo json_encode( $json );

?>