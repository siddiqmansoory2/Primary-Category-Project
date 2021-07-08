<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if(!class_exists('CmsMinds'))
{
	class CmsMinds
	{

		/**
		 * @var null
		 */
		protected static $_instance = null;


		/**
		 * @return CmsMinds|null
		 */
		public static function instance()
		{
			if(is_null(self::$_instance))
			{
				self::$_instance = new self();
			}
			return self::$_instance;
		}

		/**
		 * CmsMinds constructor.
		 */
		public function __construct()
		{
			$this->includes();
			$this->hooks();
		}

		/**
		 * Plugin action hooks
		 */
		public function hooks()
		{
			add_action( 'wp_loaded', array( 'CmsMinds_Settings', 'init' ) );
			add_action( 'admin_init', array( 'CmsMinds_Admin', 'init' ) );
			add_action( 'init', array( 'CmsMinds_Shortcode', 'init' ) );
		}

		/**
		 * Include required files
		 */
		public function includes()
		{
			require_once WPC_PATH . 'includes/admin/class-primarycategory-settings.php';
			require_once WPC_PATH . 'includes/admin/class-primarycategory-admin.php';
			require_once WPC_PATH . 'includes/admin/class-primarycategory-shortcode.php';
			require_once WPC_PATH . 'includes/admin/ajax-calls.php';
		}

		/**
		 * Plugin scripts
		 */
		

		/**
		 * @param $links
		 *
		 * @return array
		 */
		function primarycategory_add_settings_link( $links )
		{
			$links[] = '<a href="' .admin_url( 'options-general.php?page=primarycategory-options' ) .'">Settings</a>';
			return $links;
		}

	}
}