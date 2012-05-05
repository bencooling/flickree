<?php

/**
 *
 * Simple FlickrPhoto class by Ben Cooling June 2011
 * Provides a standard photo object for all api calls to populate
 * 
 */	

class FlickreePhoto {

  /**
   * Setters and getters 
   */
  public function __get($prop) {
    if (in_array($prop, $this->params)) return $this->$prop;
  }
  public function __set($prop, $val) {
      if ($prop==='authorurl'){ 
        $this->$prop = 'flickr.com/photos/' . $this->pathalias;
      }
      elseif ($prop==='photourl'){ 
        $this->$prop = 'flickr.com/photos/' . $this->pathalias . '/' . $this->id;
      }
      else {
        if (in_array($prop, $this->params)) $this->$prop = $val;
      }
  }
  
  // Utiility method Obj to Array
  public function _toArray() {
    return get_object_vars($this);
  }
  
  // possible photo attributes
  public $params = array('id','owner','secret','server','farm','title','ispublic','isfriend',
                          'isfamily','stat','description','license','dateupload','datetaken',
                          'datetakengranularity','ownername','iconserver','iconfarm',
                          'lastupdate','latitude','longitude','accuracy','tags','machine_tags',
                          'views','media','pathalias','url_sq','width_sq', 'height_sq','url_t',
                          'width_t', 'height_t','url_s','width_s','height_s','url_m','width_m',
                          'height_m','url_z','width_z', 'height_z','url_l','width_l','height_l',
                          'url_o','width_o', 'height_o','photourl','authorurl');
        
}