<?php

/*
 * Styles & Scripts
 */

function truther_twentyseventeen_remove_scripts() {
    wp_dequeue_style( 'twentyseventeen-colors-dark' );
    wp_deregister_style( 'twentyseventeen-colors-dark' );
    wp_dequeue_script( 'twentyseventeen-global' );
}
add_action( 'wp_print_styles', 'truther_twentyseventeen_remove_scripts', 20 );
add_action( 'wp_print_scripts', 'truther_twentyseventeen_remove_scripts', 100 );

function truther_twentyseventeen_styles() {

    $parent_style = 'twentyseventeen-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get( 'Version' )
    );
    wp_enqueue_style( 'open-sans',     '//fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800', '', null, 'all' );
    wp_enqueue_style( 'bitter',        '//fonts.googleapis.com/css?family=Bitter:400,700', '', null, 'all' );
    wp_enqueue_script( 'typekit',      'https://use.typekit.net/idi3mnl.js' );
	wp_add_inline_script( 'typekit',   'try{Typekit.load({ async: false });}catch(e){}' );
    wp_enqueue_style( 'truther-adminbar', get_theme_file_uri( '/assets/css/truther-adminbar.css' ) );
}
add_action( 'wp_enqueue_scripts', 'truther_twentyseventeen_styles' );
add_editor_style( array( 'assets/css/editor-style.css', get_template_directory_uri() ) );

function truther_twentyseventeen_admin_styles() {
    wp_enqueue_style( 'truther-adminbar', get_theme_file_uri( '/assets/css/truther-adminbar.css' ) );
    wp_enqueue_style( 'truther-admin',    get_theme_file_uri( '/assets/css/truther-admin.css' ) );
}
add_action( 'admin_enqueue_scripts', 'truther_twentyseventeen_admin_styles' );

function truther_twentyseventeen_login_stylesheet() {
    wp_enqueue_style( 'open-sans',     'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700,700i,800', '', null, 'all' );
    wp_enqueue_style( 'bitter',        'https://fonts.googleapis.com/css?family=Bitter:400,700', '', null, 'all' );
    wp_enqueue_script( 'typekit',      'https://use.typekit.net/idi3mnl.js' );
    wp_add_inline_script( 'typekit',   'try{Typekit.load({ async: false });}catch(e){}' );
    wp_enqueue_style( 'truther-login', get_theme_file_uri( '/assets/css/truther-login.css' ) );
}
add_action( 'login_enqueue_scripts', 'truther_twentyseventeen_login_stylesheet' );

function truther_twentyseventeen_scripts() {
    wp_enqueue_script( 'truther-global',    get_theme_file_uri( '/assets/js/truther-global.js' ), array(), '1.0', true );
    wp_enqueue_script( 'truther-functions', get_theme_file_uri( '/assets/js/jquery.truther-functions.js' ), array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'truther_twentyseventeen_scripts' );

function truther_related_posts_headline( $headline ) {
$headline = sprintf(
            '<h3 class="jp-relatedposts-headline"><em>%s</em></h3>',
            esc_html( 'Related Posts:' )
            );
return $headline;
}
add_filter( 'jetpack_relatedposts_filter_headline', 'truther_related_posts_headline' );


function truther_excerpt_length( $length ) {
    return 65;
}
add_filter( 'excerpt_length', 'truther_excerpt_length', 999 );


/**
 * Image stuff
 */

 // Add image sizes
add_image_size( 'sharing-image', 1200, 630, true );
add_image_size( 'large-thumb', 240, 240, true );
add_image_size( 'apple-touch-icon', 144, 144, true );
add_image_size( 'icon-57', 57, 57, true );
add_image_size( 'icon-60', 60, 60, true );
add_image_size( 'icon-72', 72, 72, true );
add_image_size( 'icon-76', 76, 76, true );
add_image_size( 'icon-114', 114, 114, true );
add_image_size( 'icon-120', 120, 120, true );
add_image_size( 'icon-144', 144, 144, true );
add_image_size( 'icon-152', 152, 152, true );
add_image_size( 'icon-180', 180, 180, true );
add_image_size( 'msapplication-square', 270, 270, true );

// Image crop settings
update_option( 'thumbnail_size_w', 160 );
update_option( 'thumbnail_size_h', 160 );
update_option( 'thumbnail_crop', 1 );
update_option( 'medium_size_w', 320 );
update_option( 'medium_size_h', 240 );
update_option( 'medium_crop', 1 );
update_option( 'large_size_w', 960 );
update_option( 'large_size_h', 720 );
update_option( 'large_crop', 1 );

// Image insert list
function truther_twentyseventeen_image_display_names( $editor_sizes ) {
    global $_wp_additional_image_sizes;

    $editor_sizes = array(
        'thumbnail'   => __( 'Thumbnail' ),
        'large-thumb' => __( 'Large Thumb' ),
        'medium'      => __( 'Medium' ),
        'large'       => __( 'Large' ),
        'full'        => __( 'Full Size' )
    );

    return $editor_sizes;
}
add_filter( 'image_size_names_choose', 'truther_twentyseventeen_image_display_names' );

// Remove parent theme header
function truther_twentyseventeen_custom_header_setup( $headers ) {
    unregister_default_headers( $headers );
}
add_action( 'after_setup_theme', 'truther_twentyseventeen_custom_header_setup', 999 );


/**
 * Change the default more link
 */

function truther_twentyseventeen_excerpt_more( $link ) {
    remove_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Read More<span class="screen-reader-text"> "%s"</span>', 'truther_twentyseventeen' ), get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'truther_twentyseventeen_excerpt_more', 999 );

// Remove ellipse in excerpt
function truther_twentyseventeen_replace_excerpt( $content ) {
   return str_replace( '&hellip;',
        '',
        $content
   );
}
add_filter( 'the_excerpt', 'truther_twentyseventeen_replace_excerpt' );


/*
 * ACF Options Page
 */

if ( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_page( array(
        'page_title' => 'Truther Theme Settings',
        'menu_title' => 'Truther Theme',
        'position'   => 3,
        'icon_url'   => 'dashicons-admin-settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}


/**
 * Custom template tags for this theme.
 */
require get_theme_file_path( '/inc/template-tags.php' );
require get_theme_file_path( '/inc/settings-styles.php' );


// Remove "Protected:" & "Private:"
function truther_twentyseventeen_title_trim( $title ) {

    $prepended_title = esc_attr( $title );
    $findthese = array(
        '#Protected:#',
        '#Private:#'
    );
    $replacewith = array(
        '<small>Protected:</small><br />',
        '<small>Private:</small><br />'
    );
    $title = preg_replace( $findthese, $replacewith, $prepended_title );

    return $title;
}
add_filter( 'the_title', 'truther_twentyseventeen_title_trim' );


/*
 * Replace Howdy greeting
 */
function truther_change_howdy( $translated, $text, $domain ) {

    if ( false !== strpos( $translated, 'Howdy,' ) )
        return str_replace( 'Howdy,', 'Code Name: ', $translated );

    return $translated;
}
add_filter( 'gettext', 'truther_change_howdy', 9999, 3 );


/*
 * Disable admin bar by user role
 */
function truther_hide_admin_bar() {
        if ( ! current_user_can( 'edit_posts' ) ) {
        show_admin_bar( false );
    }
}
add_action( 'set_current_user', 'truther_hide_admin_bar' );


/*
 * Login page stuff
 */
function truther_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'truther_login_logo_url' );

function truther_login_logo_url_title( $title ) {
	return 'Proud Truther';
}
add_filter( 'login_headertitle', 'truther_login_logo_url_title' );

function truther_login_message( $message ) {
    if ( empty( $message ) ){
        return '<p class="login-message">Think Critically!</p>';
    } else {
        return $message;
    }
}
add_filter( 'login_message', 'truther_login_message' );

?>