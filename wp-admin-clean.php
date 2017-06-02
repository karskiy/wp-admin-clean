<?php
/**
 * Plugin Name: Remove Dashboard Access
 * Plugin URI: http://www.werdswords.com
 * Description: Removes Dashboard Widgets and.
 * Version: 1.0.0
 * Author: Karskiy
 * Author URI: http://www.karskiy.com
 * License: GPLv2
*/

// Bail if called directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
