<?php

// Add styles to <head>
function truther_settings_styles() {

// Footer
$bg_image      = get_field( 'truther_footer_bg_image', 'option' );
$bg_position_x = get_field( 'truther_footer_bg_x_position', 'option' );
$bg_position_y = get_field( 'truther_footer_bg_y_position', 'option' );
$bg_repeat     = get_field( 'truther_footer_bg_repeat', 'option' );
$bg_size       = get_field( 'truther_footer_bg_size', 'option' );
$bg_attachment = get_field( 'truther_footer_bg_attachment', 'option' );

?>

<style>

.site-footer {
	background-image: url(<?php echo $bg_image; ?>);
	background-position: <?php echo $bg_position_x . ' ' . $bg_position_y; ?>;
	background-repeat: <?php echo $bg_repeat; ?>;
	background-size: <?php echo $bg_size; ?>;
	background-attachment: <?php echo $bg_attachment; ?>;
}

</style>

<?php
}
add_action( 'wp_head', 'truther_settings_styles' );
?>