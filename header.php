<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package clean
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header" role="banner">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
<div class="container-fluid">
		<div class="row">
			<div class="site-header-inner col-sm-12">

				<?php $header_image = get_header_image();
				if ( ! empty( $header_image ) ) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
					</a>
				<?php } // end if ( ! empty( $header_image ) ) ?>

			</div>
		</div>
	</div><!-- .container -->
</header><!-- #masthead -->


<?php // substitute the class "container-fluid" below if you want a wider content area ?>
<nav class="site-navigation">
	<div id = "remove-cont-margin" class="container">
	<div class="row">
	<div class="site-navigation-inner">
		<div id = "remove-margin" class="navbar navbar-default">
					<div class="navbar-header col-md-6 ">
					<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
							<span class="sr-only"><?php _e('Toggle navigation','clean') ?> </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
	
				<!-- Your site title as branding in the menu -->
				<a class="navbar-brand transform pull-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php the_custom_logo();?></a>
<!-- No Custom Logo, just display the site's name -->
<?php if (!has_custom_logo()) {?>
    ?>
    <a class="navbar-brand transform pull-left" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
    <?php
}?>
</div>
<div class="col-md-6"
					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location' 	=> 'primary',
							'depth'             => 2,
							'container'         => 'nav',
							'container_id'      => 'navbar-collapse',
							'container_class'   => 'collapse navbar-collapse',
							'menu_class' 		=> 'nav navbar-nav',
							'fallback_cb' 		=> 'wp_bootstrap_navwalker::fallback',
							'menu_id'			=> 'main-menu',
							'walker' 			=> new wp_bootstrap_navwalker()
						)
					); ?>
</div>
				</div><!-- .navbar -->
		</div>
		</div>
	</div><!-- .container -->
	</nav><!-- .site-navigation -->

<div class="main-content">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">

