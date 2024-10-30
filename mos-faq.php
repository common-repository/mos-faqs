<?php
/*
Plugin Name: Mos FAQs
Plugin URI: http://mdmostakshahid.com/plugins/mos-faq/
Description: Mos FAQs plugin that lets you easily create, order and publicize FAQs using shortcodes.
Version: 2.0.3
Author: Md. Mostak Shahid
Author URI: http://mdmostakshahid.com/
License: GPL2
*/
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define MOS_FAQ_FILE.
if ( ! defined( 'MOS_FAQ_FILE' ) ) {
	define( 'MOS_FAQ_FILE', __FILE__ );
}
// Define MOS_FAQ_SETTINGS.
if ( ! defined( 'MOS_FAQ_SETTINGS' ) ) {
  define( 'MOS_FAQ_SETTINGS', admin_url('/edit.php?post_type=qa&page=faq_settings') );
  //define( 'MOS_FAQ_SETTINGS', admin_url('/options-general.php?page=mos_faq_settings') );
}
$plugin = plugin_basename(MOS_FAQ_FILE); 
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-array.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-functions.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-settings.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-post-types.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-taxonomy.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-vc-element.php' );
require_once ( plugin_dir_path( __FILE__ ) . 'mos-faq-widgets.php' );



register_activation_hook(MOS_FAQ_FILE, 'mos_faq_activate');
add_action('admin_init', 'mos_faq_redirect');
 
function mos_faq_activate() {
    $mos_faq_option = get_option( 'mos_faq_option' );
	if (!$mos_faq_option) {
		$mos_faq_option = array(
			'mos_faq_body_pbg' => 'rgba(0, 0, 0, 0.1)',
			'mos_faq_body_measurements_padding' => '2px',
			'mos_faq_body_measurements_margin' => '0 0 5px 0',
			'mos_faq_body_border_width' => '1',
			'mos_faq_body_border_style' => 'solid',
			'mos_faq_body_border_color' => 'rgba(0, 0, 0, 0.2)',
			'mos_faq_body_border_radius' => '5',
			'mos_faq_heading_pbg' => 'rgba(0, 0, 0, 0.3)',
			'mos_faq_heading_measurements_padding' => '10px 15px',
			'mos_faq_heading_border_width' => '1',
			'mos_faq_heading_border_style' => 'solid',
			'mos_faq_heading_border_color' => 'rgba(0, 0, 0, 0.4)',
			'mos_faq_heading_border_radius' => '3',
			'mos_faq_icon_border_style' => 'solid',
			'mos_faq_content_pbg' => 'rgba(0, 0, 0, 0.2)',
			'mos_faq_content_measurements_padding' => '10px 15px',
			'mos_faq_content_measurements_margin' => '2px 0 0',
			'mos_faq_content_border_width' => '1',
			'mos_faq_content_border_style' => 'solid',
			'mos_faq_content_border_color' => 'rgba(0, 0, 0, 0.3)',
			'mos_faq_content_border_radius' => '3',
		);		
		update_option( 'mos_faq_option', $mos_faq_option, false );
	}
    add_option('mos_faq_do_activation_redirect', true);
}
 
function mos_faq_redirect() {
    if (get_option('mos_faq_do_activation_redirect', false)) {
        delete_option('mos_faq_do_activation_redirect');
        if(!isset($_GET['activate-multi'])){
            wp_safe_redirect(MOS_FAQ_SETTINGS);
        }
    }
}

// Add settings link on plugin page
function mos_faq_settings_link($links) { 
  $settings_link = '<a href="'.MOS_FAQ_SETTINGS.'">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
} 
add_filter("plugin_action_links_$plugin", 'mos_faq_settings_link' );
