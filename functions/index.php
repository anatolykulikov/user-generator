<?php
// Get UI text for application
function user_generator_get_ui( WP_REST_Request $request ) {
    return [
        'status' => 'success',
        'data'   => [
            'controlTitle'     => __( 'How many users do you need?', 'usergenerator' ),
            'controlButton'    => __( 'Generate', 'usergenerator' ),
            'userslistTitle'   => __( 'List of users', 'usergenerator' ),
            'roleTitle'        => __( 'User roles', 'usergenerator' ),
            'roleAdministator' => __( 'Administator', 'usergenerator' ),
            'roleEditor'       => __( 'Editor', 'usergenerator' ),
            'roleAuthor'       => __( 'Author', 'usergenerator' ),
            'roleContributor'  => __( 'Contributor', 'usergenerator' ),
            'roleSubscriber'   => __( 'Subscriber', 'usergenerator' )            
        ]
    ];
}

// Generate new random user
function user_generator_create_user( WP_REST_Request $request ) {
    
    $user = new User();

    $create_user = [
        'user_pass'  => $user->user_pass,
        'user_login' => $user->user_login,
        'user_email' => $user->user_email,
        'user_url'   => $user->user_url,
        'first_name' => $user->first_name,
        'last_name'  => $user->last_name,
        'role'       => $request['role']
    ];

    return $create_user;

    $user_id = wp_insert_user( [
        'user_pass'  => $user->user_pass,
        'user_login' => $user->user_login,
        'user_email' => $user->user_email,
        'user_url'   => $user->user_url,
        'first_name' => $user->first_name,
        'last_name'  => $user->last_name,
        'role'       => $request['role']
    ] );

    // Return error for app
    if( is_wp_error( $user_id ) ) {
        return [
            'status' => 'error'
        ]; 
    } 

    // Return created user data for app
    return [
        'status' => 'success',
        'data'   => [
            'user_login' => $user->user_login,
            'user_email' => $user->user_email,
            'user_url'   => $user->user_url,
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name,
            'role'       => $request['role']
        ]
    ];
}