<?php
// Add routes for plugin 
add_action( 'rest_api_init', function() {
    
    // Get UI text
    register_rest_route( 'usergen', 'ui', [
        'methods' => 'GET',
        'callback' => 'user_generator_get_ui',
        'permission_callback' => 'usergen_permission_callback',
        'show_in_index' => false
    ]);
    
    // Create user
    register_rest_route( 'usergen', 'create', [
        'methods' => 'POST',
        'callback' => 'user_generator_create_user',
        'permission_callback' => 'usergen_permission_callback',
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
                    'editor',
                    'administator'
                ]
            ]
        ]
    ]);
});

// Function for permission
function usergen_permission_callback( WP_REST_Request $request ) {
	return true;
}