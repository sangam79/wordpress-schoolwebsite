<?php
/**
 * Writers Blogily functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package writers_blogily
 */

if ( ! function_exists( 'writers_blogily_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function writers_blogily_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Writers Blogily, use a find and replace
		 * to change 'writers-blogily' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'writers-blogily', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );



		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
	add_image_size( 'writers-blogily-related', 200, 125, true ); //related


		// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'writers-blogily' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'writers-blogily' ),
	) );

        /*
         * Add support for starter content
        */
        // Starter Content Begin
        $nav_items = array(
        	'home'                 => array(
        		'title'      => 'Home',
        		'url'    => '#',
        	),
        	'custom_blog'           => array(
        		'title'      => 'Blog',
        		'url'    => '#',
        	),
        	'custom_news'      => array(
        		'title'      => 'News',
        		'url'    => '#',
        	),
        	'custom_categories' => array(
        		'title'      => 'Categories',
        		'url'    => '#',
        	),
        	'custom_about'            => array(
        		'title'      => 'About',
        		'url'    => '#',
        	),
        	'custom_contact'            => array(
        		'title'      => 'Contact',
        		'url'    => '#',
        	),
        );
        
        $footer_widgets = array('custom' => array(
        	'custom_html',
        	array(
        		'title' => 'LOREM IPSUM',
        		'content' => '<p>Sed ut perspiciatis unde omnis iste natus voluptatem fringilla tempor dignissim at, pretium et arcu. Sed ut perspiciatis unde omnis iste tempor dignissim at, pretium et arcu natus voluptatem fringilla.</p>'
        	)
        ));

        $starter_content = array(
        	'nav_menus' => array(
        		'menu-1' => array(
        			'name' => 'Primary',
        			'items' => $nav_items,
        		),
        	),
        	'widgets' => array(
        		'footer-widget-one' => $footer_widgets,
        		'footer-widget-two' => $footer_widgets,
        		'footer-widget-three' => $footer_widgets,
        		'sidebar-1' => array(
        			'custom_banner' => array(
        				'custom_html',
        				array(
        					'content' => '<img src="'.get_template_directory_uri().'/inc/starter_content/img/banner.png"/>'
        				)
        			),
        		),
        	)
        );
        
        add_theme_support('starter-content', $starter_content);
        // Starter Content End




		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'writers_blogily_custom_background_args', array(
			'default-color' => 'fff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'writers_blogily_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function writers_blogily_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'writers_blogily_content_width', 640 );
}
add_action( 'after_setup_theme', 'writers_blogily_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function writers_blogily_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'writers-blogily' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (First)', 'writers-blogily' ),
		'id'            => 'footer-widget-one',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (Second)', 'writers-blogily' ),
		'id'            => 'footer-widget-two',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget (Third)', 'writers-blogily' ),
		'id'            => 'footer-widget-three',
		'description'   => esc_html__( 'Add widgets here.', 'writers-blogily' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'writers_blogily_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function writers_blogily_scripts() {
	wp_enqueue_style( 'writers-blogily-owl-slider-default', get_template_directory_uri() . '/css/owl.carousel.min.css' );
	wp_enqueue_style( 'writers-blogily-owl-slider-theme', get_template_directory_uri() . '/css/owl.theme.default.css' );

	wp_enqueue_script( 'writers-blogily-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_script( 'writers-blogily-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_style( 'writers-blogily-foundation', get_template_directory_uri() . '/css/foundation.css' );
	wp_enqueue_style( 'writers-blogily-font', '//fonts.googleapis.com/css?family=Saira+Semi+Condensed:400,700' );
	wp_enqueue_style( 'writers-blogily-dashicons', get_home_url() . '/wp-includes/css/dashicons.css' );

	wp_enqueue_script( 'foundation-js-jquery', get_template_directory_uri() . '/js/vendor/foundation.js', array('jquery'), '6', true );
	wp_enqueue_script( 'writers-blogily-custom-js-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'writers-blogily-owl-slider-js-jquery', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'writers-blogily-navigation-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), '20151215', true );

	wp_enqueue_style( 'writers-blogily-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'writers_blogily_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/** 
 * Writers Blogily Get Custom Fonts 
 */
function writers_blogily_load_google_fonts() {
	wp_enqueue_style( 'writers-blogily-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Merriweather:700,400,700i' ); 
}
add_action( 'wp_enqueue_scripts', 'writers_blogily_load_google_fonts' );





/**
 * Copyright and License for Upsell button by Justin Tadlock - 2016 © Justin Tadlock. Customizer button https://gitblogily.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );






// Theme page start

add_action('admin_menu', 'writers_blogily_themepage');
function writers_blogily_themepage()
{
	$option = get_option('writers_blogily_themepage_seen');
	$awaiting = !$option ? ' <span class="awaiting-mod">1</span>' : '';
	$theme_info = add_theme_page(__('Theme Settings', 'writers-blogily'), __('Theme Settings', 'writers-blogily').$awaiting, 'manage_options', 'writers-blogily-info.php', 'writers_blogily_info_page', 1);
}
function writers_blogily_info_page()
{
	$user = wp_get_current_user();
	$theme = wp_get_theme();
	$parent_name = is_child_theme() ? wp_get_theme($theme->Template) : '';
	$theme_name = is_child_theme() ? $theme." ".__("and", "writers-blogily")." ".$parent_name : $theme;
	$demo_text = is_child_theme() ? sprintf(__("Need inspiration? Take a moment to view our theme demo for the %s parent theme %s!", "writers-blogily"), $theme, $parent_name) : __("Need inspiration? Take a moment to view our theme demo!", "writers-blogily");
	$premium_text = is_child_theme() ? sprintf(__("Unlock all features by upgrading to the premium edition of %s and its parent theme %s.", "writers-blogily"), $theme, $parent_name) : sprintf(__("Unlock all features by upgrading to the premium edition of %s.", "writers-blogily"),$theme);
	$option_name = 'writers_blogily_themepage_seen';
	$option = get_option($option_name, null);
	if (is_null($option)) {
		add_option($option_name, true);
	} elseif (!$option) {
		update_option($option_name, true);
	} ?>
	<div class="wrap">

		<div class="spt-theme-settings-wrapper">
			<div class="spt-theme-settings-wrapper-main-content">
				<div class="spt-theme-settings-tabs">

					<div class="spt-theme-settings-tab">
						<input type="radio" id="tab-1" name="tab-group-1">



						<label class="spt-theme-settings-label" for="tab-1"><?php esc_html_e("Get started with", "writers-blogily"); ?> <?php echo esc_html($theme_name); ?></label>

						<div class="spt-theme-settings-content">

							<div class="spt-theme-settings-content-getting-started-wrapper">
								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Menus", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('nav-menus.php'))  ?>"><?php esc_html_e("Go to Menus", "writers-blogily"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Add Widgets", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('widgets.php'))  ?>"><?php esc_html_e("Go to Widgets", "writers-blogily"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Header Image", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Hide Featured Images On Blog Posts", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Hide Navigation Completely", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></a>
									</div>
								</div>


								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Custom Navigation Text Color", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Upload Logo", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></a>
									</div>
								</div>

								<div class="spt-theme-settings-content-item">
									<div class="spt-theme-settings-content-item-header">
										<?php esc_html_e("Change Background Color / Image", "writers-blogily"); ?>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<a href="<?php echo esc_url(admin_url('customize.php')) ?>"><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></a>
									</div>
								</div>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Fonts", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Customize All Colors", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Import Demo Content", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Demo Import", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Contact Premium Support", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Full SEO Optimization", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Header Content Slideshow", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Header Image Slideshow", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Only Show Slideshow On Front Page", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Show Slideshow Everywhere", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Unlock Elementor Compatibility", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Install Elementor", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Access All Child Themes", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("View Child Themes", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Add Recent Posts Widget", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Widgets", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Custom Slideshow Title, Tagline & Button", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Custom Copyright Text", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Tag' from tag page title", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Author' from author page title", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Remove 'Category' from author page title", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Custom Images In Slideshows", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide About The Author Section On Posts", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Sidebar On Posts", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>

								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Sidebar On Pages", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Hide Sidebar On Blog Feed", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Add Contact Forms", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>
								<a target="_blank" href="https://superbthemes.com/writers-blogily/" class="spt-theme-settings-content-item spt-theme-settings-content-item-unavailable">
									<div class="spt-theme-settings-content-item-header">
										<span><?php esc_html_e("Right/Next or Numbered Pagination", "writers-blogily"); ?></span> <span><?php esc_html_e("Premium", "writers-blogily"); ?></span>
									</div>
									<div class="spt-theme-settings-content-item-content">
										<span><?php esc_html_e("Go to Customizer", "writers-blogily"); ?></span>
									</div>
								</a>


							</div>
						</div> 
					</div>


				</div>      
			</div>

			<div class="spt-theme-settings-wrapper-sidebar">

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Additional Resources", "writers-blogily"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<ul>
							<li>
								<a target="_blank" href="https://wordpress.org/support/forums/"><span class="dashicons dashicons-wordpress"></span><?php esc_html_e("WordPress.org Support Forum", "writers-blogily"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.facebook.com/superbthemescom/"><span class="dashicons dashicons-facebook-alt"></span><?php esc_html_e("Find us on Facebook", "writers-blogily"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://twitter.com/superbthemescom"><span class="dashicons dashicons-twitter"></span><?php esc_html_e("Find us on Twitter", "writers-blogily"); ?></a>
							</li>
							<li>
								<a target="_blank" href="https://www.instagram.com/superbthemes/"><span class="dashicons dashicons-instagram"></span><?php esc_html_e("Find us on Instagram", "writers-blogily"); ?></a>
							</li>

						</ul>
					</div>
				</div>


				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("View Demo", "writers-blogily"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($demo_text); ?></p>
						<a href="https://superbthemes.com/demo/writers-blogily/" target="_blank" class="button button-primary"><?php esc_html_e("View Demo", "writers-blogily"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Upgrade to Premium", "writers-blogily"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php echo esc_html($premium_text); ?></p>
						<a href="https://superbthemes.com/writers-blogily/" target="_blank" class="button button-primary"><?php esc_html_e("View Premium Version", "writers-blogily"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Helpdesk", "writers-blogily"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("If you have issues with", "writers-blogily"); ?> <?php echo esc_html($theme); ?> <?php esc_html_e("then send us an email through our website!", "writers-blogily"); ?></p>
						<a href="https://superbthemes.com/customer-support/" target="_blank" class="button"><?php esc_html_e("Contact Support", "writers-blogily"); ?></a>
					</div>
				</div>

				<div class="spt-theme-settings-wrapper-sidebar-item">
					<div class="spt-theme-settings-wrapper-sidebar-item-header"><?php esc_html_e("Review the Theme", "writers-blogily"); ?></div>
					<div class="spt-theme-settings-wrapper-sidebar-item-content">
						<p><?php esc_html_e("Do you enjoy using", "writers-blogily"); ?> <?php echo esc_html($theme); ?><?php esc_html_e("? Support us by reviewing us on WordPress.org!", "writers-blogily"); ?></p>
						<a href="https://wordpress.org/support/theme/<?php echo esc_attr(get_stylesheet()); ?>/reviews/#new-post" target="_blank" class="button"><?php esc_html_e("Leave a Review", "writers-blogily"); ?></a>
					</div>
				</div>



			</div>

		</div>
	</div>


	<?php
}

function writers_blogily_comparepage_css($hook) {
	if ('appearance_page_writers-blogily-info' != $hook) {
		return;
	}
	wp_enqueue_style('writers-blogily-custom-style', get_template_directory_uri() . '/css/compare.css');
}
add_action('admin_enqueue_scripts', 'writers_blogily_comparepage_css');

// Theme page end



/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Writers Blogily for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_template_directory() . '/tgmpa/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'writers_blogily_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function writers_blogily_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(


		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Superb Helper',
			'slug'      => 'superb-helper',
			'required'  => false,
		),




	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'writers-blogily',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $plugins, $config );
}


add_action('admin_init', 'writers_blogily_spbThemesNotification', 8);

function writers_blogily_spbThemesNotification(){
	$notifications = include('inc/admin_notification/Autoload.php');
	$notifications->Add("writers_blogily_notification", "Unlock All Features with Writers Blogily Premium – Limited Time Offer", "
		
		Take advantage of the up to <span style='font-weight:bold;'>40% discount</span> and unlock all features with Writers Blogily Premium. 
		The discount is only available for a limited time.

		<div>
		<a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='https://superbthemes.com/writers-blogily/'>Read More</a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='https://superbthemes.com/writers-blogily/'>Upgrade Now</a>
		</div>

		", "info");

	$options_notification_start = array("delay"=> "-1 seconds", "wpautop" => false);
	$notifications->Add("writers_blogily_notification_start", "Let's get you started with Writers Blogily!", '
		<span class="st-notification-wrapper">
		<span class="st-notification-column-wrapper">
		<span class="st-notification-column">
		<img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/preview.png' ).'" width="150" height="177" />
		</span>

		<span class="st-notification-column">
		<h2>Why Writers Blogily</h2>
		<ul class="st-notification-column-list">
		<li>Easy to Use & Customize</li>
		<li>Search Engine Optimized</li>
		<li>Lightweight and Fast</li>
		<li>Top-notch Customer Support</li>
		</ul>
		<a href="https://superbthemes.com/demo/writers-blogily/" target="_blank" class="button">View Writers Blogily Demo <span aria-hidden="true" class="dashicons dashicons-external"></span></a> 

		</span>
		<span class="st-notification-column">
		<h2>Customize Writers Blogily</h2>
		<ul>
		<li><a href="'. esc_url( admin_url( 'customize.php' ) ) .'" class="button button-primary">Customize The Design</a></li>
		<li><a href="'. esc_url( admin_url( 'widgets.php' ) ) .'" class="button button-primary">Add/Edit Widgets</a></li>
		<li><a href="https://superbthemes.com/customer-support/" target="_blank" class="button">Contact Support <span aria-hidden="true" class="dashicons dashicons-external"></span></a> </li>
		</ul>
		</span>
		</span>
		<span class="st-notification-footer">
		Writers Blogily is created by SuperbThemes. We have 100.000+ users and are rated <strong>Excellent</strong> on Trustpilot <img src="'. esc_url( get_template_directory_uri() . '/inc/admin_notification/src/stars.svg' ).'" width="87" height="16" />
		</span>
		</span>

		<style>.st-notification-column-wrapper{width:100%;display:-webkit-box;display:-ms-flexbox;display:flex;border-top:1px solid #eee;padding-top:20px;margin-top:3px}.st-notification-column-wrapper h2{margin:0}.st-notification-footer img{margin-bottom:-3px;margin-left:10px}.st-notification-column-wrapper .button{min-width:180px;text-align:center;margin-top:10px}.st-notification-column{margin-right:10px;padding:0 10px;max-width:250px;width:100%}.st-notification-column img{border:1px solid #eee}.st-notification-footer{display:inline-block;width:100%;padding:15px 0;border-top:1px solid #eee;margin-top:10px}.st-notification-column:first-of-type{padding-left:0;max-width:160px}.st-notification-column-list li{list-style-type:circle;margin-left:15px;font-size:14px}@media only screen and (max-width:1000px){.st-notification-column{max-width:33%}}@media only screen and (max-width:800px){.st-notification-column{max-width:50%}.st-notification-column:first-of-type{display:none}}@media only screen and (max-width:600px){.st-notification-column-wrapper{display:block}.st-notification-column{width:100%;max-width:100%;display:inline-block;padding:0;margin:0}span.st-notification-column:last-of-type{margin-top:30px}}</style>

		', "info", $options_notification_start);
	$notifications->Boot();
}
