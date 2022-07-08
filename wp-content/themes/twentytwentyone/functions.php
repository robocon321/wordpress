<?php
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    show_admin_bar(false);
}

register_nav_menus(array('primary-menu' => 'Header Menu'));

add_theme_support('post-thumbnails');

// manage employee
function employee_add_admin_page() {
  add_menu_page(
  'Employee Theme Options', 
  'Employees', 
  'manage_options', 
  'employees', 
  'custom_theme_create_page',
  get_template_directory_uri().'/icons/employee.png', 
  110);
}

add_action('admin_menu', 'employee_add_admin_page');

// manage service
function service_add_admin_page() {
  add_menu_page(
  'Service Theme Options', 
  'Services', 
  'manage_options', 
  'services', 
  'custom_theme_create_page',
  get_template_directory_uri().'/icons/service.png', 
  111);
}

add_action('admin_menu', 'service_add_admin_page');

// manage customer
function customer_add_admin_page() {
  add_menu_page(
  'Customer Theme Options', 
  'Customer', 
  'manage_options', 
  'customers', 
  'custom_theme_create_page',
  get_template_directory_uri().'/icons/customer.png', 
  112);
}

add_action('admin_menu', 'customer_add_admin_page');


// manage feedback
function feedback_add_admin_page() {
  add_menu_page(
  'Feedback Theme Options', 
  'Feedbacks', 
  'manage_options', 
  'feedbacks', 
  'custom_theme_create_page',
  get_template_directory_uri().'/icons/feedback.png', 
  113);
}

add_action('admin_menu', 'feedback_add_admin_page');

// manage forum
function forum_add_admin_page() {
  add_menu_page(
  'Forum Theme Options', 
  'Forums', 
  'manage_options', 
  'forums', 
  'custom_theme_create_page',
  get_template_directory_uri().'/icons/forum.png', 
  114);
}

add_action('admin_menu', 'forum_add_admin_page');

// manage task
function task_add_admin_page() {
  add_menu_page(
  'Service Theme Options', 
  'Tasks', 
  'manage_options', 
  'tasks', 
  'custom_theme_create_page',
  get_template_directory_uri().'/icons/task.png', 
  113);
}

add_action('admin_menu', 'task_add_admin_page');


function custom_theme_create_page() {
  require_once("mvc/Bridge.php");
  new App();
}
