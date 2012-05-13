<?php

class Photo extends FlickreeApi {

  // required: photo_id    
  protected $method = 'flickr.photos.getInfo';
  
  public function getPhotos() {
    
    $results = $this->callAPI();
    
    if ($results['status']==='failure'){
      return array('status'=>'failure', 'msg'=>(isset($results['msg'])) ? $results['msg'] : 'Could not connect to Flickr');
    }

    $myFlickrPhoto = $this->getFlickrPhoto($results['data']['photo']);
    
    // Additional API call to retrieve sizes
    $this->method = 'flickr.photos.getSizes';
    $results = $this->callAPI();

    // set all sizes
    foreach ($results['data']['sizes']['size'] as $photo_sizes) {
      if (strtolower(substr($photo_sizes['label'], 0, 2)) === 'sq')
        $suffix = 'sq';
      else
        $suffix = strtolower(substr($photo_sizes['label'], 0, 1));
      $width = 'width_' . $suffix;
      $myFlickrPhoto->$width = $photo_sizes['width'];
      $height = 'height_' . $suffix;
      $myFlickrPhoto->$height = $photo_sizes['height'];
      $url = 'url_' . $suffix;
      $myFlickrPhoto->$url = $photo_sizes['source'];
    }
    
    return array('status'=>'success', 'data'=>array($myFlickrPhoto->_toArray()));
  }


}