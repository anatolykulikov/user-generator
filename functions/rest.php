<?php
// Add routes for plugin 
add_action( 'rest_api_init', function() {
    
    // Get UI text
    register_rest_route( 'usergen', 'start', [
        'methods' => 'GET',
        'callback' => 'user_generator_get_ui',
        'permission_callback' => 'user_generator_permission_callback',
        'show_in_index' => false
    ]);
    
    // Create user
    register_rest_route( 'usergen', 'create', [
        'methods' => 'POST',
        'callback' => 'user_generator_create_user',
        'permission_callback' => 'user_generator_permission_callback',
        'show_in_index' => false,
        'args' => [
            'role' => [
                'default'  => null,
                'required' => true,
                'type' => 'string',
                'enum' => [
                    'subscriber',
                    'contributor',
                    'author',
                    'editor'
                ]
            ]
        ]
    ]);
});

// Function for permission
function user_generator_permission_callback( WP_REST_Request $request ) {
    
    // Check the availability of the token in HTTP_X_API_KEY
    if( isset( $_SERVER['HTTP_X_API_KEY'] ) ) {

        // Let's read the received token and find the saved token for this user
        $received_token = json_decode( hex2bin( $_SERVER['HTTP_X_API_KEY'] ) );
        $saved_token = json_decode( hex2bin( get_user_meta( $received_token->id, 'usergenerator_token', true ) ) );

        // Keys and user ID must match, and this token must not expire
        if( $saved_token->expires > time() && $received_token->id === $saved_token->id && $received_token->key === $saved_token->key ) {
            return true;
        }
    }

    // In other cases deny access
    return false;
}