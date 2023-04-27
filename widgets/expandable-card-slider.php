<?php

/**
 * Material Cards Widget Class
 *
 * @package           Expandable Card Slider
 * @author            Krunal Kanojiya
 * @copyright         2023 Krunal Kanojiya
 * @license           GPL-2.0-or-later
 */

if (!defined('ABSPATH')) {
	exit;
}

class Elementor_Expandable_Card_Slider extends \Elementor\Widget_Base
{

	public function get_script_depends()
	{
		return ['expandable-card-slider-script-1',];
	}

	public function get_style_depends()
	{
		return ['expandable-card-slider-style-1', 'expandable-card-slider-style-2', 'expandable-card-slider-style-3'];
	}

	public function get_name()
	{
		return 'unique_sliders_for_elementor';
	}

	public function get_title()
	{
		return esc_html__('Expandable Card Slider', 'expandable-card-slider');
	}

	public function get_icon()
	{
		// return 'eicon-code';
		return 'eicon-slider-push';
	}

	public function get_categories()
	{
		return ['general'];
	}

	public function get_keywords()
	{
		return ['slider', 'carousel'];

	}

	protected function register_controls()
	{
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__('Content', 'expandable-card-slider'),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_image',
			[
				'label' => esc_html__('Choose Image', 'textdomain'),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__('Title', 'expandable-card-slider'),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('List Title', 'expandable-card-slider'),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__('Description', 'expandable-card-slider'),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__('Default description', 'expandable-card-slider'),
			]
		);

		$this->add_control(
			'card_slider',
			[
				'label' => esc_html__( 'Image Cards', 'expandable-card-slider' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Title #1', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #2', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #3', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #4', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #5', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #6', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
					[
						'list_title' => esc_html__( 'Title #7', 'expandable-card-slider' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'expandable-card-slider' ),
					],
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Card Style', 'easy-slider-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
	}

	protected function render()
	{

		$settings = $this->get_settings_for_display();

		if ($settings['card_slider']) {
			echo '<section class="game-section">';
			echo '<div class="owl-carousel custom-carousel owl-theme">';
	
			foreach ($settings['card_slider'] as $item) {
				echo '<div class="item" style="background-image: url(' . esc_url( $item['list_image']['url'] ) . ');">';
				echo '<div class="item-desc">';
				echo '<h3>' . esc_html($item['list_title']) . '</h3>';
				echo '<p>' . esc_html($item['list_content']) . '</p>';
				echo '</div>'; 
				echo '</div>'; 
			}
	
			echo '</div>'; 
			echo '</section>'; 
		}
		?>
		<style>
			.game-section .owl-stage {
				margin: 15px 0;
				display: flex;
				display: -webkit-flex;
			}

			.game-section .item {
				margin: 0 15px 30px;
				width: 320px;
				height: 400px;
				display: flex;
				display: -webkit-flex;
				align-items: flex-end;
				-webkit-align-items: flex-end;
				background: #343434 no-repeat center center / cover;
				border-radius: 16px;
				overflow: hidden;
				position: relative;
				transition: all 0.4s ease-in-out;
				-webkit-transition: all 0.4s ease-in-out;
				cursor: pointer;
			}

			.game-section .item.active {
				width: 500px;
			}

			.game-section .item:after {
				content: "";
				display: block;
				position: absolute;
				height: 100%;
				width: 100%;
				left: 0;
				top: 0;
				background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 1));
			}

			.game-section .item-desc {
				padding: 0 24px 12px;
				color: #fff;
				position: relative;
				z-index: 1;
				overflow: hidden;
				transform: translateY(calc(100% - 54px));
				-webkit-transform: translateY(calc(100% - 54px));
				transition: all 0.4s ease-in-out;
				-webkit-transition: all 0.4s ease-in-out;
			}

			.game-section .item.active .item-desc {
				transform: none;
				-webkit-transform: none;
			}

			.game-section .item-desc p {
				opacity: 0;
				-webkit-transform: translateY(32px);
				transform: translateY(32px);
				transition: all 0.4s ease-in-out 0.2s;
				-webkit-transition: all 0.4s ease-in-out 0.2s;
			}

			.game-section .item.active .item-desc p {
				opacity: 1;
				-webkit-transform: translateY(0);
				transform: translateY(0);
			}

			.game-section .owl-theme.custom-carousel .owl-dots {
				margin-top: -20px;
				position: relative;
				z-index: 5;
			}

			/******** Middle section CSS End *******/

			/***** responsive css Start ******/

			@media (min-width: 992px) and (max-width: 1199px) {
				h2 {
					margin-bottom: 32px;
				}

				h3 {
					margin: 0 0 8px;
					font-size: 24px;
					line-height: 32px;
				}

				/* -------- Landing page ------- */

				.game-section .item {
					margin: 0 12px 60px;
					width: 260px;
					height: 360px;
				}

				.game-section .item.active {
					width: 400px;
				}

				.game-section .item-desc {
					transform: translateY(calc(100% - 46px));
					-webkit-transform: translateY(calc(100% - 46px));
				}
			}

			@media (min-width: 768px) and (max-width: 991px) {
				h2 {
					margin-bottom: 32px;
				}

				h3 {
					margin: 0 0 8px;
					font-size: 24px;
					line-height: 32px;
				}

				.line-title {
					width: 330px;
				}

				/* -------- Landing page ------- */

				.game-section .item {
					margin: 0 12px 60px;
					width: 240px;
					height: 330px;
				}

				.game-section .item.active {
					width: 360px;
				}

				.game-section .item-desc {
					transform: translateY(calc(100% - 42px));
					-webkit-transform: translateY(calc(100% - 42px));
				}
			}

			@media (max-width: 767px) {
				body {
					font-size: 14px;
				}

				h2 {
					margin-bottom: 20px;
				}

				h3 {
					margin: 0 0 8px;
					font-size: 19px;
					line-height: 24px;
				}

				.line-title {
					width: 250px;
				}

				/* -------- Landing page ------- */

				.game-section .item {
					margin: 0 10px 40px;
					width: 200px;
					height: 280px;
				}

				.game-section .item.active {
					width: 270px;
					box-shadow: 6px 10px 10px rgba(0, 0, 0, 0.25);
					-webkit-box-shadow: 6px 10px 10px rgba(0, 0, 0, 0.25);
				}

				.game-section .item-desc {
					padding: 0 14px 5px;
					transform: translateY(calc(100% - 42px));
					-webkit-transform: translateY(calc(100% - 42px));
				}
			}
		</style>
		<script>
			jQuery(document).ready(function () {
				jQuery(".custom-carousel").owlCarousel({
					autoWidth: true,
					dots:false
				});
				jQuery(".custom-carousel .item").click(function () {
					jQuery(".custom-carousel .item").not(jQuery(this)).removeClass("active");
					jQuery(this).toggleClass("active");
				});
			});

		</script>

		<?php
	}
}