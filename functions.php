<?php
/**
 * clean functions and definitions
 *
 * @package clean
 */
 
 /**
  * Store the theme's directory path and uri in constants
  */
 define('THEME_DIR_PATH', get_template_directory());
 define('THEME_DIR_URI', get_template_directory_uri());

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 750; /* pixels */

if ( ! function_exists( 'clean_setup' ) ) :
/**
 * Set up theme defaults and register support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function clean_setup() {
	global $cap, $content_width;

	// Add html5 behavior for some theme elements
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    // This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/**
	 * Add default posts and comments RSS feed links to head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for Post Formats
	*/
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	*/
	add_theme_support( 'custom-background', apply_filters( 'clean_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		) ) );
		/** 
		 * Enable title tag support
		*/
	add_theme_support( 'title-tag' );
	
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on clean, use a find and replace
	 * to change 'clean' to the name of your theme in all the template files
	*/


	
		$defaults = array(
			'height'      => 60,
			'width'       => 150,
			'flex-height' => false,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	

	load_theme_textdomain( 'clean', THEME_DIR_PATH . '/languages' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	*/
	register_nav_menus( array(
		'primary'  => __( 'Header bottom menu', 'clean' ),
		) );

}
endif; // clean_setup
add_action( 'after_setup_theme', 'clean_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function clean_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'clean' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
		) );
}
add_action( 'widgets_init', 'clean_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function clean_scripts() {

	// Import the necessary clean Bootstrap WP CSS additions
	wp_enqueue_style( 'clean-bootstrap-wp', THEME_DIR_URI . '/includes/css/bootstrap-wp.css' );

	// load bootstrap css
	wp_enqueue_style( 'clean-bootstrap', THEME_DIR_URI . '/includes/resources/bootstrap/css/bootstrap.min.css' );

	// load Font Awesome css
	wp_enqueue_style( 'clean-font-awesome', THEME_DIR_URI . '/includes/css/font-awesome.min.css', false, '4.1.0' );

	// load clean styles
	wp_enqueue_style( 'clean-style', get_stylesheet_uri() );
   // Modify our styles registration:
	$custom_css = clean_get_customizer_css();
	wp_add_inline_style( 'clean-style', $custom_css );

	// load bootstrap js
	wp_enqueue_script('clean-bootstrapjs', THEME_DIR_URI . '/includes/resources/bootstrap/js/bootstrap.min.js', array('jquery') );

	// load bootstrap wp js
	wp_enqueue_script( 'clean-bootstrapwp', THEME_DIR_URI . '/includes/js/bootstrap-wp.js', array('jquery') );

	wp_enqueue_script( 'clean-skip-link-focus-fix', THEME_DIR_URI . '/includes/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'clean-keyboard-image-navigation', THEME_DIR_URI . '/includes/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}

}
add_action( 'wp_enqueue_scripts', 'clean_scripts' );

/**
 * Implement the Custom Header feature.
 */
require THEME_DIR_PATH . '/includes/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require THEME_DIR_PATH . '/includes/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require THEME_DIR_PATH . '/includes/extras.php';

/**
 * Customizer additions.
 */
require THEME_DIR_PATH . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require THEME_DIR_PATH . '/includes/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require THEME_DIR_PATH . '/includes/bootstrap-wp-navwalker.php';

/**
 * Adds WooCommerce support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
/**
 * Remove parts of the Options menu we don't use.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function de_register( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_control('header_textcolor');
}
add_action( 'customize_register', 'de_register', 11 );

function clean_get_customizer_css() {
    ob_start();

    $text_color = get_theme_mod( 'text_color', '' );
    if ( ! empty( $text_color ) ) {
      ?>
      body {
        color: <?php echo $text_color; ?>;
      }
      <?php
    }


    $link_color = get_theme_mod( 'link_color', '' );
    if ( ! empty( $link_color ) ) {
      ?>
      a {
        color: <?php echo $link_color; ?>;
        border-bottom-color: <?php echo $link_color; ?>;
      }
      <?php
    }

    
    $border_color = get_theme_mod( 'border_color', '' );
    if ( ! empty( $border_color ) ) {
      ?>
      input,
      textarea {
        border-color: <?php echo $border_color; ?>;
      }
      <?php
    }

    
    $accent_color = get_theme_mod( 'accent_color', '' );
    if ( ! empty( $accent_color ) ) {
      ?>
      a:hover {
        color: <?php echo $accent_color; ?>;
        border-bottom-color: <?php echo $accent_color; ?>;
      }

      button,
      input[type="submit"] {
        background-color: <?php echo $accent_color; ?>;
      }
      <?php
    }

    
    $sidebar_background = get_theme_mod( 'sidebar_background', '' );
    if ( ! empty( $sidebar_background ) ) {
      ?>
      .sidebar {
        background-color: <?php echo $sidebar_background; ?>;
      }
      <?php
    }


    $css = ob_get_clean();
    return $css;
  }

  function clean_customizer_css() {
	if ( ! get_theme_mod( 'header_background_color_setting' ) && ! get_theme_mod( 'header_text_color_setting' )) {
		return;
	}
?>
	<style type="text/css">
		.site-navigation, .site-footer {
			<?php if ( get_theme_mod( 'header_background_color_setting' ) ) { ?>
			background-color: <?php echo get_theme_mod( 'header_background_color_setting' ); ?>;
			<?php } ?>
		}
	</style>
<?php
} // end clean_customizer_css
add_action( 'wp_head', 'clean_customizer_css');
add_action( 'wp_footer', 'clean_customizer_css');

function clean_customizer_text_css() {
	if ( ! get_theme_mod( 'header_text_color_setting' )) {
		return;
	}
?>
	<style type="text/css">

			.container #navbar-collapse a, .container .site-info a, .container .site-info span, a.navbar-brand.transform.pull-left {
			<?php if ( get_theme_mod( 'header_text_color_setting' ) ) { ?>
			color: <?php echo get_theme_mod( 'header_text_color_setting' ); ?>;
			<?php } ?>
		}
	</style>
<?php
} // end clean_customizer_css
add_action( 'wp_head', 'clean_customizer_text_css');
add_action( 'wp_footer', 'clean_customizer_text_css');

//REQUIRED PLUGIN - include the TGM_Plugin_Activation class.

require_once get_template_directory() . ('/includes/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'clean_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 */
function clean_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Page Builder by SiteOrigin',
			'slug'      => 'siteorigin-panels',
			'required'  => false,
		),
		array(
			'name'      => 'SiteOrigin Widgets Bundle',
			'slug'      => 'so-widgets-bundle',
			'required'  => false,
		),
		);

		tgmpa( $plugins );
}
