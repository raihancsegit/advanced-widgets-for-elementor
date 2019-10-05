<?php
/**
 * Plugin Name: Advanced Widgets for Elementor
 * Plugin URI: https://advancedwidgets.com/elementor
 * Description: The most advanced collection of Elementor page builder widgets.
 * Version: 1.0.0
 * Author: Dracula
 * Author URI: https://advancedwidgets.com/
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: aw_elementor
 * Domain Path: /languages/
 *
 * @package Advanced_widgets
 */

    if( !function_exists('add_action') ) {
        die('Elementor not Installed'); // if Elementor not installed kill the page.
    }

    // Define absoulote path
    if( !defined( 'ABSPATH' ) ) exit; // No access of directly access

    define( 'AWE_VERSION', '1.0.0' );
    // Define file
    define('AWE_FILE', __FILE__);
    // Define url
    define('AWE_URL', plugins_url('/', __FILE__ ) );
    // Define path
    define('AWE_PATH', plugin_dir_path( __FILE__ ) );
    // Assets
    define( 'AWE_DIR_ASSETS', trailingslashit( AWE_URL . 'assets' ) );
     // Admin
     define( 'AWE_DIR_Admin', trailingslashit( AWE_URL . 'admin' ) );
    
    require AWE_PATH . 'base/base.php';

    // Class Register
    if (class_exists('Advanced_Widgets_For_Elementor')) {
        # code...
        $awe_for_elementor = new Advanced_Widgets_For_Elementor();
        $awe_for_elementor->awe_for_elementor_register();
        $awe_for_elementor->awe_for_elementor_widget_bundle();

    }
    
    // Activation
    register_activation_hook( __FILE__, array($awe_for_elementor, 'activate' ));

    // Deactivation
    register_deactivation_hook( __FILE__, array($awe_for_elementor, 'deactivate' ));
