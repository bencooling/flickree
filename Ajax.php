<?php

/**
 * 
 * Contains all the ajax handlers
 * 
 * @package Plugin_Flickree
 * @subpackage Ajax
 * @author Ben Cooling <office@bcooling.com.au>
 */
class FlcAjax {

  public function __construct(){
    // form submits to ajaxurl with POST variable {action:foo}
    add_action('wp_ajax_foo', array($this, 'fooAction'));
    add_action('wp_ajax_nopriv_foo', array($this, 'fooNoPrivAction'));

  }

  public function fooAction(){}
  public function fooNoPrivAction(){}
  
}