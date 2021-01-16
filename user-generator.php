<?php
/**
 * Plugin Name: User Generator
 * Text Domain: usergenerator
 * Description: Generates random users for your WordPress site with completed profiles
 * Version:     1.0.0
 * Plugin URI:  https://github.com/anatolykulikov/user-generator
 * 
 * Author URI:  https://vk.com/anatolykulikov
 * Author:      Anatoly Kulikov
 * 
 * Requires PHP: 7.0
 * 
 * License:     GPL3
 * 
 */

// Add plugin textdomain
add_action( 'plugins_loaded', 'user_generator_plugin_textdomain' );
function user_generator_plugin_textdomain(){
	load_plugin_textdomain( 'usergenerator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Include javascript and styles for application
add_action( 'admin_enqueue_scripts', function () {
    
    // Javascript
    wp_register_script( 'user_generator_javascript', plugin_dir_url(__FILE__) .'dist/bundle.js', array(), null, true );
    wp_enqueue_script( 'user_generator_javascript' );

    // Styles
    wp_register_style( 'user_generator_styles', plugin_dir_url(__FILE__) .'dist/style.css', array(), null );
    wp_enqueue_style( 'user_generator_styles' );
});

// Add subpage for generator
add_action( 'admin_menu', 'register_user_generator_page' );
function register_user_generator_page() {
    
    // Page
	add_submenu_page( 'users.php', __( 'User Generator', 'usergenerator' ), __( 'User Generator', 'usergenerator' ), 'activate_plugins', 'user-generator', function () {
        
        // Get current user ID
        $current_user_id = wp_get_current_user()->ID;


        // Expires time
        $expires = time() + 3600;

        // Create token for current user
        $current_user_token = bin2hex(
            json_encode (
                [
                    'id' => $current_user_id,
                    'key' => wp_generate_password( 32, true ),
                    'expires' => $expires
                ]
            )
        );

        // Save token
        update_user_meta( $current_user_id, 'usergenerator_token', $current_user_token );

        // Render app
        echo('<div class="wrap">
            <h1>'. __( 'User Generator', 'usergenerator' ) .'</h1>
            <div id="usergenerator" data-api="'. home_url( 'wp-json/usergen' ) .'" data-token="'. $current_user_token .'"></div>
        </div>');
    } ); 
}

// Connecting the plugin files
require_once('functions/class_User.php');
require_once('functions/index.php');
require_once('functions/rest.php');
require_once('functions/random_values.php');