=== Plugin Name ===
Contributors: global_1981
Donate link: http://bcooling.com.au
Tags: flickr, api, images, gallery, photo, yahoo, flickree
Requires at least: 2.9.1
Tested up to: 3.3.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easily get photos from flickr based on a photo, photoset or group ID, a gallery URL or a search text or tag.

== Description ==

Fickree provides an editor button for simple flickr queries, but feel free to manually add short code attributes for more complex requirements (All flickr API method-specific arguments are available)

Control your own markup with mustache-based templating (Comes with 4 templates out of the box - attributed, caption, default and thick box).

Standardises:
a) The properties available for each photo regardless of method used
b) The arguments available for each query (including convenience arguments "size" and "display")


Templates can include all of the data flickr returns for photos including:

id, owner, server, title, ispublic, description, dateupload, lastupdate, latitude, tags and many many more!


Queries can include any of flickr method attributes as arguments, (all extras are included by default) such as:

'privacy_filter', 'text', 'min_upload_date','sort', 'safe_search', 'place_id', 'geo_context' and many many more!


== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload `flickree` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Navigate to Settings > flickree and add your Flickr api key
1. Use the flickree editor button or manually add a shortcode to your pages [flickree type="search" tags="starfish"]

== Frequently Asked Questions ==

= Why another flickr plugin? =

Most flickr plugins are only good for specific use cases. This plugin provides a more sophisticated 
approach: it can be as simple or as complex as you like.  

Flickree steers away from elaborate markup, dependencies and full-featured galleries. Instead Flickree
empowers you to easily integrate flickr with your gallery of choice - orbit, fancybox, lightbox etc.
Having said that, flickree is pretty gentle on newcomers, providing a thickbox template out of the box.

Flickree also comes with three other templates: default (minimal layout), attributed (for creative 
commons attribution) and caption (Wordpress caption markup).

= My thickbox template isn't working =

As flickree keeps the markup separate from any dependent style and script, we just need to paste 
the following code into your functions.php file:

`add_action('wp_enqueue_scripts', 'my_enqueue_scripts');
function my_enqueue_scripts(){
  wp_enqueue_style('thickbox'); //include thickbox .css
  wp_enqueue_script('jquery');  //include jQuery
  wp_enqueue_script('thickbox'); //include Thickbox jQuery plugin
}`

= Where can I get my flickr api key? =
http://www.youtube.com/watch?v=r8XmXuMdLWE

= How do I get my Flickr photoset_id? =
http://www.flickr.com/help/forum/74809/?search=photoset

= How do I get my Flickr group id? =
http://idgettr.com/

== Screenshots ==

1. The flickree editor button
2. The editor dialog for inserting a single photo
3. The editor dialog for inserting photos from a photoset
4. The editor dialog for inserting photos from a gallery
5. The editor dialog for inserting photos from a group
6. The editor dialog for inserting photos based on a text and or tag search

== Changelog ==

= 0.1 =
* Initial release

= 0.2 =
* Added readme.txt file adn fixed bug in index.php

= 0.3 =
* Added banner and corrected some issues with plugin presentation
