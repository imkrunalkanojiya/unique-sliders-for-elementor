<?php
/**
 * Plugin Name:       Unique Sliders For Elementor
 * Plugin URI:        https://github.com/imkrunalkanojiya/unique-sliders-for-elementor
 * Description:       Multiple unqiue sliders for your elementor powered website.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Krunal Kanojiya
 * Author URI:        https://krunalkanojiya.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       unique-sliders-for-elementor
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registering Widget
 */

function unique_sliders_for_elementor($widgets_manager)
{

    require_once(__DIR__ . '/widgets/expandable-card-slider.php');

    $widgets_manager->register(new \Elementor_Expandable_Card_Slider());

}
add_action('elementor/widgets/register', 'unique_sliders_for_elementor');


/**
 * 
 * Adding Style and Scrips
 */

function unique_sliders_for_elementor_dependencies()
{

    // Expandable_Card_Slider

    // wp_register_script( 'expandable-card-slider-script-3', plugins_url( 'assets/js/jquery.min.js', __FILE__ ), array() );
    wp_register_script('expandable-card-slider-script-1', plugins_url('assets/js/owl.carousel.min.js', __FILE__), array());
    // wp_register_script('expandable-card-slider-script-2', plugins_url('assets/js/expandable-card-slider-common.js', __FILE__), array());

    /* Styles */
    wp_register_style('expandable-card-slider-style-1', plugins_url('assets/css/owl.carousel.min.css', __FILE__), array());
    wp_register_style('expandable-card-slider-style-2', plugins_url('assets/css/owl.theme.default.min.css', __FILE__), array());
    wp_register_style('expandable-card-slider-style-3', plugins_url('assets/css/bootstrap.min.css', __FILE__), array());
    wp_register_style('expandable-card-slider-style-4', plugins_url('assets/css/expandable_card_slider_common.css', __FILE__), array());
}

add_action('wp_enqueue_scripts', 'unique_sliders_for_elementor_dependencies');