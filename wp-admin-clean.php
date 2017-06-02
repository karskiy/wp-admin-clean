<?php
/**
 * Plugin Name: Removes Dashboard Widgets
 * Plugin URI: http://www.karskiy.com
 * Description: Плагин удаляет в админке виджеты на странице консоли и чистит типы постов (post, page) от ненужностей некоторых.
 * Version: 1.0.0
 * Author: Karskiy
 * Author URI: http://www.karskiy.com
 * License: GPLv2
*/

// Bail if called directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Удаляем метабоксы с информацией на страничке Консоль
function krs_remove_dashboard_meta() {
        remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
}
add_action( 'admin_init', 'krs_remove_dashboard_meta' );

// Удаляем в разделе Виджеты виджеты по умолчанию, чтоб глаза не мазолили ))
function krs_remove_calendar_widget() {
	unregister_widget('WP_Widget_Pages'); // Pages Widget
	unregister_widget('WP_Widget_Calendar'); // Calendar Widget
	unregister_widget('WP_Widget_Archives'); // Archives Widget
	unregister_widget('WP_Widget_Links'); // Links Widget
	unregister_widget('WP_Widget_Meta'); // Meta Widget
	unregister_widget('WP_Widget_Search'); // Search Widget
	//unregister_widget('WP_Widget_Text'); // Text Widget
	unregister_widget('WP_Widget_Categories'); // Categories Widget
	unregister_widget('WP_Widget_Recent_Posts'); // Recent Posts Widget
	unregister_widget('WP_Widget_Recent_Comments'); // Recent Comments Widget
	unregister_widget('WP_Widget_RSS'); // RSS Widget
	unregister_widget('WP_Widget_Tag_Cloud'); // Tag Cloud Widget
	//unregister_widget('WP_Nav_Menu_Widget'); // Menus Widget	
}
add_action( 'widgets_init', 'krs_remove_calendar_widget' );

// Удаляем бесполезные пункты меню из админки
function krs_remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'jetpack' );                    //Jetpack* 
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'upload.php' );                 //Media
  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'themes.php' );                 //Appearance
  remove_menu_page( 'plugins.php' );                //Plugins
  remove_menu_page( 'users.php' );                  //Users
  remove_menu_page( 'tools.php' );                  //Tools
  remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'krs_remove_menus' );
