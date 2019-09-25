<?php 
class Awe_Admin {

// Widgets keys

     public $awe_elements_keys = [
        'widget-notifications',
        'widget-glow-text-effects',
        'widget-cards',
        'widget-text-animation',
        'widget-quote',
        'widget-caldera-forms',
        'widget-cf7',
        'widget-gravity-forms',
        'widget-mailchimp-wp',
        'widget-ninjaform',
        'widget-wpform',
        'widget-weform',
        
        
    ];

	// Default settings
	private $awe_default_settings;
	// Switch settings
	private $awe_settings;
    // Switch get settings
    private $awe_get_settings;

/**
 * Register construct
 */
	public function __construct() {
        //$this->includes();
        $this->init_hooks();

    }

/**
 * Register a custom opitons.
 */
	function awe_for_elementor_admin_options(){
	    add_menu_page( 
	        'Admin Menu',
	        __( 'Advanced Widgets', ' aw_elementor' ),
	        'manage_options',
	        'awe-settings',
	        array($this, 'display_settings_pages'),
	        'dashicons-admin-generic', 100
        ); 
        
	}
/**
 * Register all hooks
 */
    public function init_hooks() {

        // Build admin main menu
        add_action('admin_menu', array($this, 'awe_for_elementor_admin_options'));
        // Build admin notice
        //add_action('admin_notices', array($this, 'switch_lite_welcome_admin_notice'));
        // Build admin script
        add_action('init', array( $this, 'awe_for_elementor_admin_page_scripts' ) );

        // Param check
        add_action('admin_init', array( $this, 'awe_for_elementor_admin_get_param_check' ) );
        // Build admin view and save
        add_action( 'wp_ajax_awe_save_admin_addons_settings', array( $this, 'awe_for_elementor_sections_with_ajax') );

        // font-awesome
       wp_enqueue_style(
         'font-awesome',
         AWE_DIR_ASSETS . 'vendor/css/font-awesome.min.css',
         null,
         AWE_VERSION
     );

        add_action('admin_enqueue_scripts', array( $this, 'awe_for_elementor_admin_script'));
    }


/**
 * Register scripts
 */
    public function awe_for_elementor_admin_page_scripts () {
    	// admin css
        wp_enqueue_style( 'awe-admin',  plugins_url('/assets/css/admin.css', __FILE__  ));


        // sweetalart css
        wp_enqueue_style( 'awe-sweetalert2-css', plugins_url('/assets/css/sweetalert2.min.css', __FILE__ ));

        // Admin script
        wp_enqueue_script('awe-elementor-admin-js', plugins_url('/assets/js/admin.js', __FILE__) , array('jquery','jquery-ui-tabs'), '1.0' , true );

        // Core script
        wp_enqueue_script( 'awe-sweet-js',  plugins_url('/assets/js/core.js', __FILE__), array( 'jquery' ), '1.0', true );

        // Sweetalert2 script
		wp_enqueue_script( 'awe-sweetalert2-js', plugins_url('/assets/js/sweetalert2.min.js', __FILE__), array( 'jquery', 'awe-sweet-js' ), '1.0', true );
       
    }

function awe_for_elementor_admin_script(){

    wp_enqueue_script( 'admin-notice-js', plugins_url('/assets/js/admin-notice.js', __FILE__), array( 'jquery' ), '1.0', true );
}

function awe_for_elementor_admin_get_param_check(){

    if (isset($_GET['dismissed']) && $_GET['dismissed'] == 1) {
        update_option("notice_dissmissed", 1);
    }

   
}

    /**
 * Register display view
 */

    public function display_settings_pages() {

        $js_info = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		);
		wp_localize_script( 'awe-elementor-admin-js', 'settings', $js_info );
       
	   $this->awe_default_settings = array_fill_keys( $this->awe_elements_keys, true );
       
	   $this->awe_get_settings = get_option( 'awe_save_settings', $this->awe_default_settings );
       
	   $awe_new_settings = array_diff_key( $this->awe_default_settings, $this->awe_get_settings );
       
	   if( ! empty( $awe_new_settings ) ) {
	   	$awe_updated_settings = array_merge( $this->awe_get_settings, $awe_new_settings );
	   	update_option( 'awe_save_settings', $awe_updated_settings );
	   }
	   $this->awe_get_settings = get_option( 'awe_save_settings', $this->awe_default_settings );

?>


    <div class="wrap awe-wrap ">
        <div class="response-wrap"></div>
        <form action="" method="POST" id="awe-settings" name="awe-settings">

            <div class="awe-settings-tabs">
                <div class="awe-settings-tabs-head">
                    <ul class="awe-settings-tabs-list">
                        <li><a class="awe-tab-list-item" href="#awe-elements">
                            <span class="dashicons dashicons-admin-tools"></span>
                        Free Elements
                    </a></li>
                        <li><a class="awe-tab-list-item" href="#pro-elements">
                            <span class="dashicons dashicons-admin-appearance"></span>
                        Extentions
                    </a></li>
                        <li><a class="awe-tab-list-item" href="#api">
                            <span class="dashicons dashicons-admin-plugins"></span>
                        API Settings
                    </a></li>
                        <li><a class="awe-tab-list-item" href="#go-pro">
                           <span class="dashicons dashicons-upload"></span>
                        Go Pro
                    </a></li>
                        <li><a class="awe-tab-list-item" href="#support">
                            <span class="dashicons dashicons-groups"></span>
                        Support</a></li>
                    </ul>
                    <div class="awe-settings-tab-head-right">
                        <img src="assets/images/icon-aae.png" alt="">
                    </div>
                </div>
            
                <div id="awe-elements" class="awe-settings-tab">

                <div class="awe-elements-table">
                    
                        <div class="row">
                           
                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Notifications', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-notifications" name="widget-notifications" <?php checked(1, $this->awe_get_settings['widget-notifications'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Text Effects', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-glow-text-effects" name="widget-glow-text-effects" <?php checked(1, $this->awe_get_settings['widget-glow-text-effects'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!--  -->

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Cards', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-cards" name="widget-cards" <?php checked(1, $this->awe_get_settings['widget-cards'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Text Animations', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-text-animation" name="widget-text-animation" <?php checked(1, $this->awe_get_settings['widget-text-animation'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Quote', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-quote" name="widget-quote" <?php checked(1, $this->awe_get_settings['widget-quote'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Caldera Forms', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-caldera-forms" name="widget-caldera-forms" <?php checked(1, $this->awe_get_settings['widget-caldera-forms'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Contact From 7', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-cf7" name="widget-cf7" <?php checked(1, $this->awe_get_settings['widget-cf7'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="awe-widget-box">
                                    <div class="awe-widget-box-title">
                                        <?php echo esc_html__('Gravity Forms', ' aw_elementor'); ?>
                                       <a href="#" class="awe-settings-preview" title="Preview">
                                            <span class="dashicons dashicons-visibility"></span>
                                        </a>
                                    </div>
                                   <div class="awe-widget-box-content">
                                        <label class="switch">
                                            <input type="checkbox" id="widget-gravity-forms" name="widget-gravity-forms" <?php checked(1, $this->awe_get_settings['widget-gravity-forms'], true) ?>>
                                            <span class="rectangle round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                           
                            
                            
                        </div>
                        <!-- row -->
                        <div class="row">

                            <div class="col">
                                    <div class="awe-widget-box">
                                        <div class="awe-widget-box-title">
                                            <?php echo esc_html__('Mailchimp WP', ' aw_elementor'); ?>
                                        <a href="#" class="awe-settings-preview" title="Preview">
                                                <span class="dashicons dashicons-visibility"></span>
                                            </a>
                                        </div>
                                    <div class="awe-widget-box-content">
                                            <label class="switch">
                                                <input type="checkbox" id="widget-mailchimp-wp" name="widget-mailchimp-wp" <?php checked(1, $this->awe_get_settings['widget-mailchimp-wp'], true) ?>>
                                                <span class="rectangle round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="awe-widget-box">
                                        <div class="awe-widget-box-title">
                                            <?php echo esc_html__('Ninjaform', ' aw_elementor'); ?>
                                            <a href="#" class="awe-settings-preview" title="Preview">
                                                <span class="dashicons dashicons-visibility"></span>
                                            </a>
                                        </div>
                                    <div class="awe-widget-box-content">
                                            <label class="switch">
                                                <input type="checkbox" id="widget-ninjaform" name="widget-ninjaform" <?php checked(1, $this->awe_get_settings['widget-ninjaform'], true) ?>>
                                                <span class="rectangle round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="awe-widget-box">
                                        <div class="awe-widget-box-title">
                                            <?php echo esc_html__('WeForm', ' aw_elementor'); ?>
                                            <a href="#" class="awe-settings-preview" title="Preview">
                                                <span class="dashicons dashicons-visibility"></span>
                                            </a>
                                        </div>
                                    <div class="awe-widget-box-content">
                                            <label class="switch">
                                                <input type="checkbox" id="widget-weform" name="widget-weform" <?php checked(1, $this->awe_get_settings['widget-weform'], true) ?>>
                                                <span class="rectangle round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="awe-widget-box">
                                        <div class="awe-widget-box-title">
                                            <?php echo esc_html__('WpForm', ' aw_elementor'); ?>
                                            <a href="#" class="awe-settings-preview" title="Preview">
                                                <span class="dashicons dashicons-visibility"></span>
                                            </a>
                                        </div>
                                    <div class="awe-widget-box-content">
                                            <label class="switch">
                                                <input type="checkbox" id="widget-wpform" name="widget-wpform" <?php checked(1, $this->awe_get_settings['widget-wpform'], true) ?>>
                                                <span class="rectangle round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>
                        
            </div>
                <button  class="button awe-btn awe-save-button" type="submit">
                    Save Settings
                </button>
                    
            </div>

            <div id="pro-elements" class="awe-settings-tab">
                
                    <h2>  
                        <?php 
                        echo  __( 'Why upgrade to Pro Version of the plugin?', ' aw_elementor' ) ;
                        ?> 
                     </h2>
                    
                             
            </div>

            <div id="api" class="awe-settings-api">
                
                    <h2>  
                        <?php 
                        echo  __( 'Api Setting :', ' aw_elementor' ) ;
                        ?> 
                     </h2>

                    <table>
                        <tr>
                            <td> <label for=""> Maps Api</label></td>
                            <td> <input type="text" placeholder="Maps Key" id="maps-api" name="maps-api" value="<?php echo $this->awe_get_settings['maps-api'] ?>"> <br/></td>
                        </tr>

                        <tr>
                            <td> <label for="">Facebook App</label></td>
                            <td> <input type="text" placeholder="Facebook App Id" id="facebook_app_id" name="facebook_app_id" value="<?php echo $this->awe_get_settings['facebook_app_id'] ?>"> <br/></td>
                        </tr>


                        <tr>
                            <td></td>
                                <td>
                                    <button  class="button awe-btn awe-save-button" type="submit">
                                        Save Settings
                                    </button>
                                </td>
                        </tr>
                    </table>
                       
                       
                        
                 
                             
            </div>

            <div id="go-pro" class="awe-settings-api">
                <label>
                    <h2>  
                        <?php 
                        echo  __( 'Go Pro', ' aw_elementor' ) ;
                        ?> 
                     </h2>
                    
                </label>
                <div class="awe-activation-key-area">
                    <form action="#">
                        <input type="text" placeholder="Activation Key">
                        <span class="dashicons dashicons-unlock"></span>
                        <button class="btn" type="submit">
                            Activate
                        </button>
                    </form>
                </div>           
            </div>

            <div id="supports" class="awe-settings-api">
               
                    <h2>  
                        <?php 
                        echo  __( 'Supports', ' aw_elementor' ) ;
                        ?> 
                     </h2>
                    
                       
                       
            </div>

            <div class="ade-footer">
                <p><?php echo  __( 'Did you like Our plugin? Please');?><a href="https://wordpress.org/plugins/advanced-addons-for-elementor/ target="_blank"> <?php echo  __( 'Click Here to Rate it ★★★★★');?></a></p>
            </div>
        </form>
    </div>
<?php

    }
/**
 * Register sections
 */
    public function awe_for_elementor_sections_with_ajax() {

        if( isset( $_POST['fields'] ) ) {
            parse_str( $_POST['fields'], $settings );
        }else {
            return;
        }

        $this->awe_settings = array(
            'widget-notifications'                 => intval( $settings['widget-notifications'] ? 1 : 0 ),
            'widget-glow-text-effects'             => intval( $settings['widget-glow-text-effects'] ? 1 : 0 ),
            'widget-text-animation'                => intval( $settings['widget-text-animation'] ? 1 : 0 ),
            'widget-cards'                         => intval( $settings['widget-cards'] ? 1 : 0 ),
            'widget-quote'                         => intval( $settings['widget-quote'] ? 1 : 0 ),
            'widget-caldera-forms'                 => intval( $settings['widget-caldera-forms'] ? 1 : 0 ),
            'widget-cf7'                           => intval( $settings['widget-cf7'] ? 1 : 0 ),
            'widget-gravity-forms'                 => intval( $settings['widget-gravity-forms'] ? 1 : 0 ),
            'widget-mailchimp-wp'                  => intval( $settings['widget-mailchimp-wp'] ? 1 : 0 ),
            'widget-ninjaform'                     => intval( $settings['widget-ninjaform'] ? 1 : 0 ),
            'widget-weform'                        => intval( $settings['widget-weform'] ? 1 : 0 ),
            'widget-wpform'                        => intval( $settings['widget-wpform'] ? 1 : 0 ),
            
            'maps-api'               =>  $settings['maps-api'] ? $settings['maps-api'] : 0 ,
            'facebook_app_id'        =>  $settings['facebook_app_id'] ? $settings['facebook_app_id'] : 0 ,
        );
        update_option( 'awe_save_settings', $this->awe_settings );
        
        return true;
        die();


    }

}


new Awe_Admin;