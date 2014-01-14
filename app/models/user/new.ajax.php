<?php

    include './../User.php';
    $User = new User;

    $username = $_POST[ 'username' ];
    $password = $_POST[ 'password' ];
    $email = $_POST[ 'email' ];

    $fieldsToAdd = array(
        'username' => $username,
        'password' => $password,
        'email' => $email
    );

    if ( $User->create( $fieldsToAdd ) ) {
        $json = array(
            'info' => 'valid',
            'msg' => 'User added successfully'
        );
    } else {
        $json = array(
            'info' => 'void',
            'msg' => 'Error creating user'
        );
    }

    echo json_encode( $json );

?>