<?php

class Search extends FlickreeApi {
  
  // required: none
  protected $method = 'flickr.photos.search';
  protected $extras = 'description,license,date_upload,date_taken,owner_name,icon_server,original_format,last_update,geo,tags,machine_tags,o_dims,views,media,path_alias,url_sq,url_t,url_s,url_m,url_z,url_l,url_o';
  
  public function getPhotos() {
    
    $results = $this->callAPI();
    
    if ($results['status']==='failure'){
      return array('status'=>'failure', 'msg'=>(isset($results['msg'])) ? $results['msg'] : 'Could not connect to Flickr');
    }
    return array('status'=>'success', 'data'=>$this->getFlickreePhotoArray($results['data']['photos']['photo']));
  }

}