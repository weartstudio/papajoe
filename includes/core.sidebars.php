<?php

// wp optimizations
Class Sidebars extends Singleton
{

    public function __construct()
    {
			$this->disableBlockWidgets();
			$this->registerSidebars();
    }

    public function disableBlockWidgets()
    {
			// wp security
			add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
			add_filter( 'use_widgets_block_editor', '__return_false' );
    }

		public function registerSidebars()
    {
			register_sidebar( array(
				'name'          => 'Lábléc',
				'id'            => 'footer',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
    }

}
Sidebars::getInstance();