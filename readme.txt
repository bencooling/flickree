=== Plugin Name ===
Contributors: global_1981
Donate link: http://bcooling.com.au
Tags: flickr, api, images, gallery, photo, yahoo, flickree
Requires at least: 3.3.1
Tested up to: 3.3.1
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Dynamically pull in photos from flickr based on the photoset, group or gallery, a search or a single photo id.

== Description ==

Dynamically pull in photos from flickr based on the photoset, group or gallery, a search or a single photo id.

Wordpress editor button provided for simple queries or manually add short code attributes for more complex requirements (All flickr API method-specific arguments are available)

Control your own markup with mustache-based templating (Comes with 4 templates out of the box - attributed, caption, default and thick box).

Standardises:
a) The properties available for each photo regardless of method used
b) The arguments available for each query (including convenance arguments "size" and "display")


Templates can include the following properties:

id, owner, secret, server, farm, title, ispublic, isfriend, isfamily, stat, description, license, dateupload, datetaken, datetakengranularity, ownername, iconserver, iconfarm, lastupdate, latitude, longitude, accuracy, tags, machine_tags, views, media, pathalias, url_sq, width_sq,  height_sq, url_t, width_t,  height_t, url_s, width_s, height_s, url_m, width_m, height_m, url_z, width_z,  height_z, url_l, width_l, height_l, url_o, width_o,  height_o, photourl, authorurl


Queries can include the following arguments:

'size', 'per_page', 'privacy_filter', 'photo_id', 'photoset_id','extras', 'user_id', 'tags', 'tag_mode', 'text', 'min_upload_date','max_upload_date', 'min_taken_date', 'max_taken_date', 'sort', 'bbox','accuracy', 'safe_search', 'content_type', 'machine_tags', 'machine_tag_mode','group_id', 'contacts', 'woe_id', 'place_id', 'media', 'has_geo', 'geo_context','lat', 'lon', 'radius', 'radius_units', 'is_commons', 'in_gallery', 'is_getty','format', 'nojsoncallback', 'api_key', 'method', 'url', 'gallery_id', 'group_id'


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `flickree` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the flickree editor button or manually add a shortcode to your pages [flickree type="search" tags="starfish"]

== Frequently Asked Questions ==

= Why another flickr plugin? =

Most flickr plugins are only good for specific use cases. This plugin provides a more sophisticated 
approach: it can be as simple or as complex as you like.  

Flickree steers away from elaborate markup, dependencies and full-featured galleries. Instead Flickree
empowers you to easily integrate flickr with your gallery of choice - orbit, fancybox, lightbox etc.
Having said that, Flickree is pretty gentle on newcomers, providing a thickbox template out of the box.

Flickree also comes with three other templates: default (minimal layout), attributed (for creative 
commons attribution) and caption (Wordpress caption markup).

= My thickbox template isn't working =

As thickbox keeps the markup separate from any dependent style and script, we just need to paste 
the following code into your functions.php file:

`add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
function my_enqueue_scripts(){
  wp_enqueue_style('thickbox'); //include thickbox .css
  wp_enqueue_script('jquery');  //include jQuery
  wp_enqueue_script('thickbox'); //include Thickbox jQuery plugin
}`


== Screenshots ==

== Changelog ==

= 0.1 =
* Initial release

= 0.2 =
* Added readme.txt file adn fixed bug in index.php