<?php
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    show_admin_bar(false);
}

register_nav_menus(array('primary-menu' => 'Header Menu'));

add_theme_support('post-thumbnails');

function sunset_add_admin_page() {
  add_menu_page(
  'Sunset Theme Options', 
  'Sunset', 
  'manage_options', 
  'slug-sunset', 
  'sunset_theme_create_page',
  '', 
  110);
}

add_action('admin_menu', 'sunset_add_admin_page');

function sunset_theme_create_page() {
  echo "<h1>Hello world</h1>";
}
