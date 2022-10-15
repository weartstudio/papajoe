<?php

Class ThemeSupport extends Singleton
{

    public $themeSupport = array(
        // 'automatic-feed-links',
        'title-tag',
		'menus',
		'custom-logo',
		'custom-header',
		'automatic-feed-links',
		'html5',
		'woocommerce',
		// 'wc-product-gallery-zoom',
		'wc-product-gallery-slider',
		'wc-product-gallery-lightbox',
    );

    public function __construct()
    {
        foreach($this -> themeSupport as $item)
        {
            add_theme_support( $item );
        }
    }

}

ThemeSupport::getInstance();