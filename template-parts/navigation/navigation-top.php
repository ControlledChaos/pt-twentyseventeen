<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage PT_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Top Menu', 'pt-twentyseventeen' ); ?>">
	<a href="#top-menu" class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) ); echo twentyseventeen_get_svg( array( 'icon' => 'close' ) ); _e( 'Menu', 'pt-twentyseventeen' ); ?></a>
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>

	<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text"><?php _e( 'Scroll down to content', 'pt-twentyseventeen' ); ?></span></a>
	<?php endif; ?>
		<a class="open-search"><?php echo twentyseventeen_get_svg( array( 'icon' => 'search' ) ); ?><span class="screen-reader-text"><?php _e( 'Search this website', 'pt-twentyseventeen' ); ?></span></a>

</nav><!-- #site-navigation -->

<div class="modal-search">
	<?php //dynamic_sidebar( 'modal-search' ); ?>

	<section id="search-3" class="widget widget_search">
		<a class="close-search">✖&nbsp;Close</a>
		
		<h2 class="widget-title">Search this website…</h2>
		<form role="search" method="get" class="search-form" action="http://proudtruther.com/">
			<label for="search-form-58824ba2acb77">
				<span class="screen-reader-text">Search for:</span>
			</label>
			<input id="search-form-58824ba2acb77" class="search-field" value="" name="s" type="search">
			<button type="submit" class="search-submit"><svg class="icon icon-search" aria-hidden="true" role="img"> <use href="#icon-search" xlink:href="#icon-search"></use> </svg><span class="screen-reader-text">Search</span></button>
		</form>
	</section>
	
</div>
