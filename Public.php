<?php

/**
 *
 * Contains all the functionality associated with the public area of Wordpress
 * 
 * @package Plugin_Flickree
 * @subpackage Public
 * @author Ben Cooling <office@bcooling.com.au>
 */
class FlcPublic {
  
  public function __construct(){
    add_action('init', array($this, 'my_init'));
    add_action('wp_enqueue_scripts', array($this, 'my_wp_enqueue_scripts'));
    add_action('wp_head', array($this, 'my_wp_head'));
    add_action('wp_footer', array($this, 'my_wp_footer'));
  }

  public function my_init(){
    // Add some shortcode magic
    add_filter('widget_text', 'do_shortcode');
      function widgetTextFilter($content){
      return do_shortcode($content);
    }
    // [flickree type=search tags=bull]
    add_shortcode( 'flickree', array('FlcPublic', 'flickree_shortcode') );
  }
  
  
  /**
   * 
   * flickree_shortcode function
   * translate shortcode into output
   * 
   */
  public function flickree_shortcode($atts, $content=null, $code="") {
    
    $flickree_options = get_option('flickree_options');
    $api_key = $flickree_options['apikey'];
    $tpl = (isset($atts['template'])) ? $atts['template'] : 'default';
    
    // type is required
    if (! isset($atts['type']) ) return 'Requires an API type';
    
    // instantiate relevant class photoset.class.php, photo.class.php, search.class.php to retrieve photos....	
    $classType = ucfirst($atts['type']);
    require_once('classes/' . $classType . '.class.php');
    $myAPI = new $classType();    
    $myAPI->api_key = $api_key;
    foreach($atts as $name => $value){
      $myAPI->$name = $value;
    }
    $photos = $myAPI->getPhotos();
    
    // return the failure message, and don't proceed with buildig and outputting the template
    if ($photos['status']==='failure') return $photos['msg'];
    
    $output = '';
    
    $i=1; foreach ($photos['data'] as $photo) {
      // Cast tags (space sperated list) as array
      $photo['tags'] = explode(' ', $photo['tags']);
      $photo['index'] = $i; // Add counter variable for template
      $m = new Mustache;
      $output.= $m->render(file_get_contents(FLICKREE_DIR_PATH . '/templates/' . $tpl . '.mustache'), $photo);
      $i++;
    }
    
    // cache output for future use
    $_SESSION[$tpl] = $output;
    return $output;
  }
  
  
  public function my_wp_enqueue_scripts(){
    // Load Public.js depends on jQuery. Send required server values (i.e. ajaxurl) to client 
    wp_enqueue_script( FLICKREE_PLUGIN_NAME, plugins_url('public.js', FLICKREE_FILE), array('jquery'), uniqid() );
    wp_localize_script( FLICKREE_PLUGIN_NAME, FLICKREE_PLUGIN_NAME, array(
    	'isUserLoggedIn' => is_user_logged_in(),
    	'ajaxurl'        => admin_url('admin-ajax.php')
    ));
    // Load Public.css
    wp_register_style( FLICKREE_PLUGIN_NAME, plugins_url('public.css', FLICKREE_FILE));
    wp_enqueue_style( FLICKREE_PLUGIN_NAME );
  }
  
  public function my_wp_head(){}
  public function my_wp_footer(){}
  
}