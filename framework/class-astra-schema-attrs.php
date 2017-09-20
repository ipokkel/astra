<?php
/**
 * Astra Attrs
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2017, Astra
 * @link        http://wpastra.com/
 * @since       Astra 1.0.20
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Schema_Attrs' ) ) {

	/**
	 * Astra Attrs
	 */
	class Astra_Schema_Attrs {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		public function __construct() {
			$this->init();
		}

		public function init() {
			$astra_schema = apply_filters( 'astra_schema_enabled', true );
			if ( $astra_schema ) {
				add_filter( 'astra_attr_article', array( $this, 'article_attrs' ) );
				add_filter( 'astra_attr_entry-content', array( $this, 'entry_content_attrs' ) );
				add_filter( 'astra_attr_sidebar', array( $this, 'sidebar_attrs' ) );
				add_filter( 'astra_attr_footer', array( $this, 'footer_attrs' ) );
				add_filter( 'astra_attr_header', array( $this, 'header_attrs' ) );
				add_filter( 'astra_attr_post-author', array( $this, 'post_author_attrs' ) );
				add_filter( 'astra_attr_post-author-url', array( $this, 'post_author_url_attrs' ) );
				add_filter( 'astra_attr_post-author-name', array( $this, 'post_author_name_attrs' ) );
				add_filter( 'astra_attr_post-meta-comment-statistic', array( $this, 'post_meta_comment_statistic_attrs' ) );
				add_filter( 'astra_attr_post-meta-comment-type', array( $this, 'post_meta_comment_type_attrs' ) );
				add_filter( 'astra_attr_post-meta-comment-count', array( $this, 'post_meta_comment_count_attrs' ) );
				add_filter( 'astra_attr_site-identity', array( $this, 'site_identity_attrs' ) );
				add_filter( 'astra_attr_site-identity-name', array( $this, 'site_identity_name_attrs' ) );
				add_filter( 'astra_attr_site-identity-url', array( $this, 'site_identity_url_attrs' ) );
				add_filter( 'astra_attr_site-navigation', array( $this, 'site_navigation_attrs' ) );
				add_filter( 'astra_attr_body', array( $this, 'body_attrs' ) );
			}
		}

		public function article_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/CreativeWork';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function entry_content_attrs( $attrs ) {

			$attrs['itemprop'] = 'text';
			return $attrs;
		}

		public function sidebar_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/WPSideBar';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function footer_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/WPFooter';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function header_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/WPHeader';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function post_author_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/Person';
			$attrs['itemscope'] = 'itemscope';
			$attrs['itemprop']  = 'author';
			return $attrs;
		}

		public function post_author_url_attrs( $attrs ) {

			$attrs['itemprop']  = 'url';
			return $attrs;
		}

		public function post_author_name_attrs( $attrs ) {

			$attrs['itemprop']  = 'name';
			return $attrs;
		}

		public function post_meta_comment_statistic_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/InteractionCounter';
			$attrs['itemprop']  = 'interactionStatistic';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function post_meta_comment_type_attrs( $attrs ) {

			$attrs['content']  = 'http://schema.org/CommentAction';
			$attrs['itemprop']  = 'interactionType';
			return $attrs;
		}

		public function post_meta_comment_count_attrs( $attrs ) {

			$attrs['content']  = absint( wp_count_comments( get_the_ID() )->approved );
			$attrs['itemprop']  = 'userInteractionCount';
			return $attrs;
		}

		public function site_identity_attrs( $attrs ) {

			$attrs['itemtype']  = 'http://schema.org/Organization';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function site_identity_name_attrs( $attrs ) {

			$attrs['itemprop'] = 'name';
			return $attrs;
		}

		public function site_identity_url_attrs( $attrs ) {

			$attrs['itemprop'] = 'url';
			return $attrs;
		}

		public function site_identity_description_attrs( $attrs ) {

			$attrs['itemprop'] = 'description';
			return $attrs;
		}

		public function site_navigation_attrs( $attrs ) {

			$attrs['itemtype'] = 'http://schema.org/SiteNavigationElement';
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}

		public function body_attrs( $attrs ) {

			// Check conditions.
			$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

			// Set up default itemtype.
			$itemtype = 'WebPage';

			// Get itemtype for the blog.
			$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

			// Get itemtype for search results.
			$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
			// Get the result.
			$result = apply_filters( 'astra_schema_body_itemtype', $itemtype );

			$attrs['itemtype'] = 'http://schema.org/'. $result;
			$attrs['itemscope'] = 'itemscope';
			return $attrs;
		}
	}

	Astra_Schema_Attrs::get_instance();

}// End if().
