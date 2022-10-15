<?php

Class WooSettings extends Singleton
{

    public function __construct()
    {
			//add cart text
			add_filter( 'woocommerce_product_add_to_cart_text', array($this,'addCartText') );
			add_filter( 'gettext', array($this,'customizing_product_addons_message'), 10, 3 );


			// remove category from current posts
			add_action( 'woocommerce_product_query', array($this,'custom_pre_get_posts_query') );


			// remove product count from loop
			remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

			// loop columns
			add_filter('loop_shop_columns', array($this,'loopColumns'), 999);
			add_filter( 'woocommerce_output_related_products_args', array($this,'relatedProducts'), 20 );

			// remove downlad menu
			add_filter( 'woocommerce_account_menu_items', array($this,'custom_my_account_menu_items') );

			//subtotal text
			add_filter( 'gettext', array($this,'subtotal') );

			// no state
			add_filter('woocommerce_default_address_fields', array($this, 'wc_remove_state_field'));

			// add_filter( 'woocommerce_form_field_args', array($this,'w_custom_form_field_args'), 10, 3 );
			// add_filter( 'wc_city_select_cities', function ( $cities ) {
			// 		$cities['HU'] = array(
			// 			'Ecser',
			// 			'Maglód ',
			// 			'Gyömrő',
			// 			'Rákoskert',
			// 			'Rákoscsaba',
			// 		);
			// 		return $cities;
			// 	}
 			// );


		}

		function custom_pre_get_posts_query( $q ) {
			$tax_query = (array) $q->get( 'tax_query' );
			$tax_query[] = array(
					'taxonomy' => 'product_cat',
					'field' => 'slug',
					'terms' => array( 'uditok' ), // Don't display products in the clothing category on the shop page.
					'operator' => 'NOT IN'
			);
			if(is_shop()){
					$q->set( 'tax_query', $tax_query );
			}
		}

		public function customizing_product_addons_message( $translated_text, $untranslated_text, $domain ){
			if ($untranslated_text == 'Select an option...') {
					$translated_text = __( 'Válassz egy opciót', $domain );
			}
			if ($untranslated_text == 'Select options') {
					$translated_text = __( '', $domain );
			}
			return $translated_text;
		}

		public function subtotal($translated_text){
			if ( 'Subtotal' === $translated_text ) {
				$translated_text = 'Összeg: ';
			}
			return $translated_text;
		}

		public function wc_remove_state_field($fields) {

				unset($fields['state']);
				unset($fields['country']);
				// unset($fields['postcode']);
				return $fields;
		}

		public function custom_my_account_menu_items( $items ) {
			unset($items['downloads']);
			return $items;
		}

		public function relatedProducts($args){
			$args['posts_per_page'] = 3;
			$args['columns'] = 3;
			return $args;
		}

		public function addCartText(){
			return __( '', 'weart' );
		}

		public function loopColumns(){
			return 3;
		}

}

WooSettings::getInstance();