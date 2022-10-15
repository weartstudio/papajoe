<?php

if(isset($_GET['debug'])){
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}

define('THEME_DIR', get_template_directory());
define('THEME_URI', get_template_directory_uri());

load_theme_textdomain( 'weart', THEME_DIR . '/languages' );

$includes = glob(get_template_directory()."/includes/*.php");
if(is_array($includes)){
    foreach($includes as $include){
        require_once($include);
    }
}



add_filter('woocommerce_is_purchasable', 'my_woocommerce_is_purchasable', 10, 2);
function my_woocommerce_is_purchasable($is_purchasable, $product) {
    $catID = get_field('timeRangeCat', 'option');
    $timeRange = get_field('timeRange', 'option');

    $day = current_time('l');
    $current = intval(current_time('Hi'));
    $result = false;

    if( in_array($catID, $product->category_ids) ){
        foreach ($timeRange as $value) {
            if( $day == $value['nap'] ){
                $from = intval($value['nyitas']) ;
                $to = intval($value['zaras']);
                if($from<$current && $to>$current) {
                    $result = $is_purchasable;
                }

            }
        }
    }else{
        $result = $is_purchasable;
    }

    return $result;
}