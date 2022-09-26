<?php

/* 	AssociationX Theme's Header
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
	<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to Content', 'associationx' ); ?></a>
	<div id="resmwdt"></div>
     	<div id="site-container">
     		<div id="sitetoppart">
     			<?php do_action('associationx_before_header'); ?>
      			<div id ="header">
      				<?php get_template_part( 'fpcontents/topmenubar' ); ?>      
      				<div id ="header-content" class="box90">
						<!-- Site Titele and Description Goes Here -->
       					<?php
						$logoimg = '';
						if ( function_exists( 'the_custom_logo' ) ) {
							if ( has_custom_logo() ):
								$logoimg = esc_url(wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' )[0]);
							endif;
						}
		  				$stitleclass = 'site-title'; if($logoimg): $stitleclass = 'site-title-hidden'; endif;
						$sitettloneline = associationx_get_option('sitettloneline', '');
						$sttlolcls = ''; if($sitettloneline) $sttlolcls = 'stitle-oneline';
						
						?>  
       					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logotitle" class="logoandtitle <?php echo $sttlolcls; ?>"><?php if ( $logoimg ): ?><img class="site-logo" src="<?php echo $logoimg; ?>" alt="<?php esc_attr(bloginfo('name')); ?>" /><?php endif; ?><h1 class="<?php echo $stitleclass; ?>"><?php esc_html(bloginfo('name')); ?><h2 class="site-title-hidden"><?php esc_html(bloginfo('description')); ?></h2></a>
        				<!-- Site Main Menu Goes Here -->
        				<a id="mobile-menu" class="mmenucon" href="#"></a>
        				<nav id="main-menu-con" class="mmenucon mmenumobile">
							<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_id' => 'main-menu-items-con', 'menu_class' => 'main-menu-items', 'container_class' => 'mainmenu-parent', 'fallback_cb' => 'associationx_page_menu' )); ?>
        				</nav>      
      				</div><!-- #header-content -->      
      			</div><!-- #header -->      
      			<div id="topadjust"></div>
      			<div class="clear"></div>
      			<?php do_action('associationx_after_header'); ?>  
      			<?php  get_template_part( 'fpcontents/fp', 'slide' ); ?>
      			<div id="site-con">	  