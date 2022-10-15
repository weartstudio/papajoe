<?php get_header() ?>

<?php if(is_shop() ): ?>
<div id="site-header" style="background-image: url(<?php header_image(); ?>)">
	<div class="center">
		<img src="<?= esc_url(THEME_URI. '/assets/img/main-logo.png')?>" alt="PapaJoe Pizza logo">
		<span class="firs"><?php esc_html_e('A környék legjobb pizzája') ?></span>
	</div>
</div>
<?php endif; ?>

<div class="wrap">
	<?php woocommerce_content() ?>
</div>
<?php get_footer() ?>