   
<?php
/**
 * theme support
 */
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( "custom-background", $args );
		add_theme_support( "custom-header", $args );

/**
 * Title output
 */
function wpbeg_title( $title ) {
	if ( is_front_page() && is_home() ) {
		$title = get_bloginfo( 'name', 'display' );
	} elseif ( is_singular() ) {
		$title = single_post_title( '', false );
	}
	return $title;
}
add_filter( 'pre_get_document_title', 'wpbeg_title' );

/**
 * Read stylesheet, script
 */
function wpbeg_script() {
	wp_enqueue_style( 'mplus1p', '//fonts.googleapis.com/earlyaccess/mplus1p.css', array() );
	wp_enqueue_style( 'Sacramento', '//fonts.googleapis.com/css?family=Sacramento&amp;amp;subset=latin-ext', array() );
	wp_enqueue_style( 'wpbeg', get_template_directory_uri() . '/css/wpbeg.css', array(), '1.0.0' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'wpbeg_script' );

/**
 * Read editor-style
 */
function wpbeg_theme_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . "/css/editor-style.css" );
}
add_action( 'admin_init', 'wpbeg_theme_add_editor_styles' );

function wpbeg_widgets_init() {
	register_sidebar (
		array (
			'name'          => esc_html__( 'Category widget', 'wpbeg' ),
			'id'            => 'category_widget',
			'description'   => esc_html__( 'It is widget for categories', 'wpbeg' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2><i class="fa fa-folder-open" aria-hidden="true"></i>',
			'after_title'   => "</h2>\n",
		)
	);
	register_sidebar (
		array (
			'name'          => esc_html__( 'Tag widget', 'wpbeg' ),
			'id'            => 'tag_widget',
			'description'   => esc_html__( 'It is widget for tags', 'wpbeg' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2><i class="fa fa-tags" aria-hidden="true"></i>',
			'after_title'   => "</h2>\n",
		)
	);
	register_sidebar (
	  array (
			'name'          => esc_html__( 'Archive widget', 'wpbeg' ),
			'id'            => 'archive_widget',
			'description'   => esc_html__( 'It is widget for archives', 'wpbeg' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2><i class="fa fa-archive" aria-hidden="true"></i>',
			'after_title'   => "</h2>\n",
	  )
	);
	register_sidebar (
	  array (
			'name'          => esc_html__( 'freedom widget', 'wpbeg' ),
			'id'            => 'freedom_widget',
			'description'   => esc_html__( 'It is widget for freedom', 'wpbeg' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2>',
			'after_title'   => "</h2>\n",
	  )
	);
}
add_action( 'widgets_init', 'wpbeg_widgets_init' );
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
			do_action( 'wp_body_open' );
	}
}
function register_my_menus() { 
  register_nav_menus( array( //???????????????????????????????????????????????????????????????
  //'???????????????????????????????????????' => '?????????????????????????????????',
    'main-menu' => 'Main Menu',
    'footer-menu'  => 'Footer Menu',
  ) );
}
add_shortcode( 'gallery', 'gallery_shortcode' );