<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<?php
		get_template_part( 'template-parts/footer/footer', 'widgets' );

		$bg_image = get_field( 'truther_footer_bg_image', 'option' );
		if ( $bg_image ) {
			$bg_class = ' has-background';
		} else {
			$bg_class = ' no-background';
		}
		?>

		<footer id="colophon" class="site-footer<?php echo $bg_class; ?>" role="contentinfo">
			<div class="wrap">
				<?php
				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php _e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;
				global $current_user;
				get_currentuserinfo();
				get_template_part( 'template-parts/footer/site', 'info' );
				?>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
	<?php if ( is_active_sidebar( 'sidebar-1' ) && is_home() || is_active_sidebar( 'sidebar-1' ) && is_single() || is_active_sidebar( 'sidebar-1' ) && is_archive() ) {
		echo '<button class="to-top">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '<span class="screen-reader-text">' . __( 'Top', 'truther-twentyseventeen' ) . '</span></button>';
	} ?>
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
