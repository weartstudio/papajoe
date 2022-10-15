<?php

Class AssetsHandler extends Singleton
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array( $this, 'addScriptsStyles' ) );
    }

    public function addScriptsStyles(){
        if(!is_admin()) {

            // STYLES
            wp_enqueue_style('weart-normalize','https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
            wp_enqueue_style('weart-fontawesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css');
            wp_enqueue_style('weart-style',	THEME_URI . '/assets/css/style.min.css' );

            // SCRIPTS
            wp_enqueue_script('weart-weart', THEME_URI . '/assets/js/weart.js',	array('jquery'), null, true	);
            wp_enqueue_script('weart-weart', THEME_URI . '/assets/js/hour_limit.js',	array('jquery'), null, true	);

        }
    }

}

AssetsHandler::getInstance();