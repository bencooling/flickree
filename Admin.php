<?php

/**
 * 
 * Contains all the administration hooks and their functions
 * 
 * @package Plugin_Flickree
 * @subpackage Admin
 * @author Ben Cooling <office@bcooling.com.au>
 */
class FlcAdmin {
  
  public function __construct(){
    
    register_deactivation_hook( FLICKREE_FILE, array($this, 'my_register_deactivation_hook'));
    
    add_action('admin_init', array($this, 'my_admin_init'));
    add_action('admin_enqueue_scripts', array($this, 'my_admin_enqueue_scripts'));
    add_action('admin_menu', array($this, 'my_admin_menu'));
    
  }
  
  public function my_admin_init(){
    
    if ( current_user_can(FlcUser::CAPABILITY_EDIT_POSTS) && current_user_can(FlcUser::CAPABILITY_EDIT_PAGES) ){
      // Part of the settings API $id, $database_options_key, $validation callback
      // register_setting( 'flickreeForms', 'flickreeForms' );

      // Add only in Rich Editor mode
      if ( get_user_option('rich_editing') == 'true') {
        add_filter('tiny_mce_version', array(&$this, 'my_mce_version') ); // prevent caching
        add_filter('mce_external_plugins', array($this, 'my_mce_external_plugins'));
        add_filter('mce_buttons', array($this, 'my_mce_buttons'));
      }
    }

    // register_setting( $option_group, $option_name, $sanitize_callback )
    register_setting('flickree_options', 'flickree_options');
    
  }
  
  public function my_mce_external_plugins($plugins){
   $plugins['flickree'] =  plugins_url('tinymce.js', FLICKREE_FILE); 
   return $plugins;
  }
  public function my_mce_buttons($buttons){
    array_push($buttons, "separator", "flickree");
    return $buttons;
  }
  function my_mce_version($version) {
    return ++$version;
  }
    
  public function my_admin_enqueue_scripts(){
    // Javascript global variables 
    wp_localize_script( FLICKREE_PLUGIN_NAME, FLICKREE_PLUGIN_NAME, array(
    	'isUserLoggedIn' => is_user_logged_in(),
    	'ajaxurl'        => admin_url('admin-ajax.php')
    ));
    wp_enqueue_style( FLICKREE_PLUGIN_NAME, plugins_url('tinymce.css', FLICKREE_FILE), array(), time() );
  }
    
  /**
   * 
   * This action is used to add extra submenus and menu options to the admin panel's menu structure.
   * It runs after the basic admin panel menu structure is in place.
   * 
   * @see http://codex.wordpress.org/Adding_Administration_Menus
   */
  public function my_admin_menu(){
    add_options_page(FLICKREE_PLUGIN_NAME, FLICKREE_PLUGIN_NAME, 'administrator', FLICKREE_FILE, 
      array($this, 'options_page_callback'));
  }
  
  public function flickree_api_key_callback(){
      print_f('<input name="%1$s" id="%1$s" type="text" value="%2$s" />', 
              'flickree_api_key',
              get_option('flickree_api_key'));
  }
  
  public function options_page_callback(){
    ?>
    <div class="wrap">
      <div class="icon32" id="icon-tools"><br /></div>
      <h2>Flickree</h2>
      <div class="metabox-holder" style="width:50%">
        <div class="postbox">
          <h3 class="hndle" style="cursor:inherit"><span>API Key</span></h3>
          <div class="inside">
            <form method="post" action="options.php">
              <?php 
              settings_fields('flickree_options');
              $default_options = array('api_key'=>'Please insert an API Key');
              $flickree_options = get_option('flickree_options', $default_options);
              ?>
              <label>Enter key here:</label>
              <input name="flickree_options[apikey]" id="flickree_options[apikey]" type="text" 
                     value="<?php echo ($flickree_options['apikey']) ? $flickree_options['apikey'] : ''; ?>" size="48" style="margin:10px 0" />
              <br />
              <input name="submit" type="submit" class="button-primary" value="<?php _e('Save') ?>" />
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
    
  // @TODO: Remove option from db for api key
  public function my_register_deactivation_hook(){}  
  
}