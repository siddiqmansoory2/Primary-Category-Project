<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!class_exists('CmsMinds_Shortcode'))
{
	/**
	 * Class CmsMinds_Shortcode
	 */
	class CmsMinds_Shortcode
	{

		/**
		 * Init actions
		 */
		public function init()
		{
			add_shortcode( 'primarycategory_posts', array( __CLASS__, 'posts_shortcode' ) );
		}

		/**
		 * @param $atts
		 *
		 * @return mixed|string
		 *
		 * Generate shortcode with attributes
		 */
		public function posts_shortcode($atts)
		{
			$atts = shortcode_atts( array(
				'post_type' => 'post',
				'taxonomy'  => 'category',
				'primary_taxonomy_id'    => '',
				'per_page'    => '6',
			), $atts, 'primarycategory_posts' );			
			

			$load_settings = CmsMinds_Admin::load_settings();

			if(!isset($load_settings[$atts['post_type']]) || (!in_array($atts['taxonomy'], $load_settings[$atts['post_type']])))
			{
				return '';
			}

			$atts['per_page'] = $atts['per_page'] ? $atts['per_page'] : 6;
			$args = array(
				'post_type' => $atts['post_type'],
				'posts_per_page' => $atts['per_page'],
				'meta_query' => array(
					array(
						'key'     => 'primary_'.$atts['taxonomy'],
						'value'   => $atts['primary_taxonomy_id'],
						'compare' => '=',
					)
				)
			);

			$the_query = new WP_Query( $args );
			return include WPC_PATH . 'templates/frontend/posts-html.php';

		}
	}
}
