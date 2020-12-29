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
add_action( 'plugins_loaded', 'usergen_plugin_textdomain' );
function usergen_plugin_textdomain(){
	load_plugin_textdomain( 'usergenerator', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

// Add subpage for generator
add_action( 'admin_menu', 'register_user_generator_page' );
function register_user_generator_page() {

    // Include styles for application
    add_action( 'admin_print_styles', function () {
        echo('<link rel="stylesheet" href="'. plugin_dir_url(__FILE__) .'dist/style.css">');
    });
    
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
            <script>document.API = "'. home_url( 'wp-json/usergen' ) .'"; document.Token = "'. $current_user_token .'";</script>
            <script type="text/javascript" src="'. plugin_dir_url(__FILE__) .'dist/bundle.js"></script>
        </div>');
    } ); 
}

// Connecting the plugin files
require_once('functions/class_User.php');
require_once('functions/index.php');
require_once('functions/rest.php');
require_once('functions/random_values.php');