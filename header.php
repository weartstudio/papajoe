<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>" >
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
<?php wp_body_open() ?>

<nav id="main-nav">
	<?php
	the_custom_logo();
	?>
	<button id="menuicon" onclick="open_close_mobile()"><i class="fa-solid fa-bars"></i></button>
	<?php
	if(has_nav_menu('primary')){
		wp_nav_menu( array(
			'theme_location'    => 'primary',
			'depth'             => 2,
			'container'         => false,
			'menu_class'        => 'navbar',
			'menu_id'        		=> 'main-nav-ul',
		));
	}
	?>
	<ul class="icons">
		<li>
			<a href="<?php the_permalink( wc_get_page_id( 'myaccount' ) ) ?>">
				<i class="fa-solid fa-user"></i>
			</a>
		</li>
		<li class="uk-position-relative uk-margin-small-right">
				<a href="<?php echo esc_url( wc_get_cart_url() ) ?>">
					<i class="fa-solid fa-basket-shopping"></i>
					<span id="cart-counter"><?php esc_attr_e( WC()->cart->get_cart_contents_count() ); ?></span>
				</a>
		</li>
	</ul>
</nav>