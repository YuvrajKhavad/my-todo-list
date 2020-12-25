<?php
/**
 * Plugin Name: My Todo List
 * Description: A simple todo list plugin
 * Version: 1.0
 * Author: Yuvraj Khavad
 *
 **/
// Exit if accessed directly
if(!defined('ABSPATH'))
{
    exit;
}

/**
 * Define Constants
 */
define('MTL_PLUGIN_PATH', plugin_dir_path(__FILE__).'/');
define('MTL_INCLUDES', MTL_PLUGIN_PATH .'includes/');

define('MTL_PLUGIN_URL', plugins_url().'/my-todo-list/');
define('MTL_URL_INCLUDES', MTL_PLUGIN_URL.'includes/');
define('MTL_PLUGIN_JS', MTL_PLUGIN_URL.'js/');
define('MTL_PLUGIN_CSS', MTL_PLUGIN_URL.'css/');

// Load scripts
require_once(MTL_INCLUDES. 'my-todo-list-script.php');

// Load shortcodes
require_once(MTL_INCLUDES. 'my-todo-list-shortcodes.php');

//check if admin
if(is_admin())
{
    // Load custome post type
    require_once(MTL_INCLUDES. 'my-todo-list-cpt.php');

    // Load custome filed
    require_once(MTL_INCLUDES. 'my-todo-list-field.php');
}
?>