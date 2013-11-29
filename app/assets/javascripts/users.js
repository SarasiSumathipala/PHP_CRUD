$checkUserOrEmail = false;

jQuery( function( $ ) {

    var $formNewUser = $( "form#formNewUser" );
    var $formEditUser = $( "form#formEditUser" );
    var $formNewUserSubmit = $( "form#formNewUser input[ type='submit' ]" );
    var $formEditUserSubmit = $( "form#formEditUser input[ type='submit' ]" );
    var $inputUsername = $formNewUser.find( "input#username" );
    var $inputEmail = $formNewUser.find( "input#email" );
    var $inputPassword = $formNewUser.find( "input#password" );
    var $inputRePassword = $formNewUser.find( "input#re-password" );

    $( "span.tooltip-form" ).hide();

    $formNewUserSubmit.click( function( event ) {
        event.preventDefault();

        if ( $inputPassword.val() == $inputRePassword.val() ) {
            var $src = $formNewUser.serialize();

            if ( $checkUserOrEmail ) {
                $checkUserOrEmail = false;

                $.ajax( {
                    cache : false,
                    type : 'POST',
                    dataType : 'json',
                    data : $src,
                    url : 'app/models/user/new.ajax.php',
                    success : function( response ) {
                        if ( response.statement == 'valid' ) {
                            alert( response.msg );
                            window.location.href = "index.php";
                        } else if ( response.statement == 'void' ) {
                            alert( response.msg );
                        }
                    }
                } );
            } else {
                return( false );
            }
        } else {
            $inputRePassword.parent().find( 'span.tooltip-form' ).html( 'Passwords are not the same').show( 'fast' );
        }
    });

    $inputRePassword.change( function() {
        if ( $inputPassword.val() != $inputRePassword.val() ) {
            $inputRePassword.parent().find( 'span.tooltip-form' ).html( 'Passwords are not the same').show( 'fast' );
        } else {
            $inputRePassword.parent().find( 'span.tooltip-form' ).hide( 'fast' );
        }
    });

    $formEditUser.find( 'input#re-password' ).change( function() {
        if ( $formEditUser.find( 'input#password' ).val() != $( this ).val() ) {
            $( this ).parent().find( 'span.tooltip-form' ).html( 'Passwords are not the same').show( 'fast' );
        } else {
            $( this ).parent().find( 'span.tooltip-form' ).hide( 'fast' );
            $checkUserOrEmail = true;
        }
    });

    $formEditUserSubmit.click( function( event ) {
        event.preventDefault();

        var $src = $formEditUser.serialize();

        if ( $checkUserOrEmail ) {
            $checkUserOrEmail = false;

            $.ajax( {
                cache : false,
                type : 'POST',
                dataType : 'json',
                data : $src +'&action='+ $formEditUser.data( 'action' ),
                url : 'app/models/user/edit.ajax.php',
                success : function( response ) {
                    if ( response.statement == 'valid' ) {
                        alert( response.msg );
                        window.location.href = "index.php";
                    } else if ( response.statement == 'void' ) {
                        alert( response.msg );
                    }
                }
            } );
        } else {
            return( false );
        }
    } );

} );

function checkUserOrEmail( that ) {
    var type = that.attr( 'id' );
    var q = that.val();

    $.ajax( {
        cache : false,
        type : 'POST',
        dataType : 'json',
        data : 'type='+ type +'&q='+ q,
        url : 'app/models/user/checkNew.ajax.php',
        success : function( response ) {
            if ( response.statement == 'valid' ) {
                $checkUserOrEmail = true;
                that.parent().find( 'span.tooltip-form' ).empty().hide( 'fast' );
            } else if ( response.statement == 'void' ) {
                $checkUserOrEmail = true;
                that.parent().find( 'span.tooltip-form' ).empty().html( response.msg ).show( 'fast' );
            }
        }
    } );
}

function destroyUser( that ) {
    var r = confirm( "Are you sure to want delete this user?" );

    if ( r ) {
        var id = that.data( 'id' );

        $.ajax( {
            cache : false,
            type : 'POST',
            dataType : 'json',
            data : 'id='+ id,
            url : 'app/models/user/destroy.ajax.php',
            success : function( response ) {
                if ( response.statement == 'valid' ) {
                    alert( response.msg );
                    window.location.href = "index.php";
                } else if ( response.statement == 'void' ) {
                    alert( response.msg );
                }
            }
        } );
    } else {
        return( false );
    }
}