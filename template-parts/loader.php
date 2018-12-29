<?php
$loader_img  = get_field( 'truther_loader_bg_image', 'option' );
$default_img = get_stylesheet_directory_uri() . '/assets/images/tv-static-tile-blue.jpg';
if ( $loader_img ) {
	$img_src = $loader_img;
} else {
	$img_src = $default_img;
} ?>

<style>
	.loader {
		background-image: url(<?php echo $img_src; ?>);
	}
</style>

<div class="loader">
	<div style="display: flex;">
		<p class='loader-text'>Stay Tuned</p>
		<div class="loader-animation">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div>