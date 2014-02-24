<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package moogs
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
	wp_head();
	add_custom_background();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<div class="row">
		<!-- Starting the box columns/rows -->
		<div class="large-12 columns">
			<header id="masthead" class="site-header" role="banner">
				<!-- Site Navigation -->
				<div class="top-bar-container">
					<nav class="top-bar" data-topbar>
						<ul class="title-area">
							<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
						</ul>
						<section class="top-bar-section">
							<?php foundation_top_bar_l(); ?>
							<?php foundation_top_bar_r(); ?>
						</section>
					</nav>
				</div>
				<!-- End Site Navigation -->
				<div class="site-branding">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				</div>		
			</header><!-- #masthead -->
			<div id="content" class="site-content">
