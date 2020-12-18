<?php
// Get UI text for application
function user_generator_get_ui( WP_REST_Request $request ) {
    return [
        'status' => 'success',
        'data'   => [
            'roles' => [
                'subscriber'   => __('Subscriber', 'usergenerator'),
                'contributor'  => __('Contributor', 'usergenerator'),
                'author'       => __('Author', 'usergenerator'),
                'editor'       => __('Editor', 'usergenerator'),
                'administator' => __('Administator', 'usergenerator'),
            ],
            'control' => [
                'title'  => __('How many users do you need?', 'usergenerator'),
                'button' => __('Generate', 'usergenerator')
            ],
            'userslist' => [
                'title' => __('List of users', 'usergenerator')
            ]
        ]
    ];
}

// Generate new random user
function user_generator_create_user( WP_REST_Request $request ) {

    $user = new User();

    $user_id = wp_insert_user([
        'user_pass'  => $user->user_pass,
        'user_login' => $user->user_login,
        'user_email' => $user->user_email,
        'first_name' => $user->first_name,
        'last_name'  => $user->last_name,
        'role'       => $request['role']
    ]);

    // Return error for app
    if(is_wp_error($user_id)) {
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
            'first_name' => $user->first_name,
            'last_name'  => $user->last_name
        ]
    ];
}