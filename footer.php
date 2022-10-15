<footer id="site-footer">
	<div class="wrap">
		<div class="left">
			<img src="<?= esc_url(THEME_URI. '/assets/img/main-logo.png')?>" alt="PapaJoe Pizza logo">
			<div>
				<?php
				esc_html_e('&copy; ' . date('Y'));
				esc_html_e(' Berze és Berze Kft.');
				?>
				<div class="small">
					<?php esc_html_e('Készítette: ') ?>
					<a href="<?= esc_url('https://weart.hu') ?> "><?php esc_html_e('weart.hu') ?> </a>
				</div>
			</div>
		</div>
		<div class="right">
		<?php dynamic_sidebar( 'footer' ); ?>
		</div>
	</div>
</footer>

<?php wp_footer() ?>
</body>
</html>