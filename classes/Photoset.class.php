<?php

class Photoset extends FlickreeApi {

  // required: photoset_id
  protected $method = 'flickr.photosets.getPhotos';
  protected $extras = 'description,license,date_upload,date_taken,owner_name,icon_server,original_format,last_update,geo,tags,machine_tags,o_dims,views,media,path_alias,url_sq,url_t,url_s,url_m,url_o';

  public function getPhotos() {

    $results = $this->callAPI();
    
    if ($results['status']==='failure'){
      return array('status'=>'failure', 'msg'=>(isset($results['msg'])) ? $results['msg'] : 'Could not connect to Flickr');
    }
    return array('status'=>'success', 'data'=>$this->getFlickreePhotoArray($results['data']));
  }

}