<?php

/**
 * 
 * Wordpress user class
 * 
 * @package Plugin_Flickree
 * @subpackage Plugin_Helpers
 * @author Ben Cooling <office@bcooling.com.au>
 */
class FlcUser {

  /**
   * User capabilities constants
   * @see http://codex.wordpress.org/Roles_and_Capabilities
   */
  const CAPABILITY_MANAGE_NETWORK = 'manage_network';				
  const CAPABILITY_MANAGE_SITES = 'manage_sites';
  const CAPABILITY_MANAGE_NETWORK_USERS = 'manage_network_users';
  const CAPABILITY_MANAGE_NETWORK_THEMES = 'manage_network_themes';
  const CAPABILITY_MANAGE_NETWORK_OPTIONS = 'manage_network_options';
  const CAPABILITY_ACTIVATE_PLUGINS = 'activate_plugins';
  const CAPABILITY_ADD_USERS = 'add_users';
  const CAPABILITY_CREATE_USERS = 'create_users';
  const CAPABILITY_DELETE_PLUGINS = 'delete_plugins';
  const CAPABILITY_DELETE_THEMES = 'delete_themes';
  const CAPABILITY_DELETE_USERS = 'delete_users';
  const CAPABILITY_EDIT_FILES = 'edit_files';
  const CAPABILITY_EDIT_PLUGINS = 'edit_plugins';
  const CAPABILITY_EDIT_THEME_OPTIONS = 'edit_theme_options';
  const CAPABILITY_EDIT_THEMES = 'edit_themes';
  const CAPABILITY_EDIT_USERS = 'edit_users';
  const CAPABILITY_EXPORT = 'export';
  const CAPABILITY_IMPORT = 'import';
  const CAPABILITY_INSTALL_PLUGINS = 'install_plugins';
  const CAPABILITY_INSTALL_THEMES = 'install_themes';
  const CAPABILITY_LIST_USERS = 'list_users';
  const CAPABILITY_MANAGE_OPTIONS = 'manage_options';
  const CAPABILITY_PROMOTE_USERS = 'promote_users';
  const CAPABILITY_REMOVE_USERS = 'remove_users';
  const CAPABILITY_SWITCH_THEMES = 'switch_themes';
  const CAPABILITY_UNFILTERED_UPLOAD = 'unfiltered_upload';
  const CAPABILITY_UPDATE_CORE = 'update_core';
  const CAPABILITY_UPDATE_PLUGINS = 'update_plugins';
  const CAPABILITY_UPDATE_THEMES = 'update_themes';
  const CAPABILITY_EDIT_DASHBOARD = 'edit_dashboard';
  const CAPABILITY_MODERATE_COMMENTS = 'moderate_comments';
  const CAPABILITY_MANAGE_CATEGORIES = 'manage_categories';
  const CAPABILITY_MANAGE_LINKS = 'manage_links';
  const CAPABILITY_UNFILTERED_HTML = 'unfiltered_html';
  const CAPABILITY_EDIT_OTHERS_POSTS = 'edit_others_posts';
  const CAPABILITY_EDIT_PAGES = 'edit_pages';
  const CAPABILITY_EDIT_OTHERS_PAGES = 'edit_others_pages';
  const CAPABILITY_EDIT_PUBLISHED_PAGES = 'edit_published_pages';
  const CAPABILITY_PUBLISH_PAGES = 'publish_pages';
  const CAPABILITY_DELETE_PAGES = 'delete_pages';
  const CAPABILITY_DELETE_OTHERS_PAGES = 'delete_others_pages';
  const CAPABILITY_DELETE_PUBLISHED_PAGES = 'delete_published_pages';
  const CAPABILITY_DELETE_OTHERS_POSTS = 'delete_others_posts';
  const CAPABILITY_DELETE_PRIVATE_POSTS = 'delete_private_posts';
  const CAPABILITY_EDIT_PRIVATE_POSTS = 'edit_private_posts';
  const CAPABILITY_READ_PRIVATE_POSTS = 'read_private_posts';
  const CAPABILITY_DELETE_PRIVATE_PAGES = 'delete_private_pages';
  const CAPABILITY_EDIT_PRIVATE_PAGES = 'edit_private_pages';
  const CAPABILITY_READ_PRIVATE_PAGES = 'read_private_pages';
  const CAPABILITY_EDIT_PUBLISHED_POSTS = 'edit_published_posts';
  const CAPABILITY_UPLOAD_FILES = 'upload_files';
  const CAPABILITY_PUBLISH_POSTS = 'publish_posts';
  const CAPABILITY_DELETE_PUBLISHED_POSTS = 'delete_published_posts';
  const CAPABILITY_EDIT_POSTS = 'edit_posts';
  const CAPABILITY_DELETE_POSTS	= 'delete_posts';
  const CAPABILITY_READ = 'read';
  
}