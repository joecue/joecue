<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package joecue
 */

?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
		<link rel="apple-touch-icon" sizes="57x57" href="/wp-content/themes/joecue/images/icon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/wp-content/themes/joecue/images/icon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/wp-content/themes/joecue/images/icon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/wp-content/themes/joecue/images/icon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/wp-content/themes/joecue/images/icon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/wp-content/themes/joecue/images/icon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/wp-content/themes/joecue/images/icon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/wp-content/themes/joecue/images/icon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/joecue/images/icon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="/wp-content/themes/joecue/images/icon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/joecue/images/icon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/wp-content/themes/joecue/images/icon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/joecue/images/icon/favicon-16x16.png">
		<link rel="manifest" href="/wp-content/themes/joecue/images/icon/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="/wp-content/themes/joecue/images/icon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
		</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text show-on-focus" href="#content">
				<?php esc_html_e( 'Skip to content', 'joecue' ); ?>
			</a>

			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding">
					<div class="row top-menu-wrapper">
				<div class="small-12 top-menu-inner-wrapper">
						<div class="top-bar-title show-for-small-only text-right">
							<span data-responsive-toggle="responsive-menu" data-hide-for="medium">
			<button class="menu-icon light" type="button" data-toggle></button>
	</span>
						</div>
						<div id="responsive-menu">
							<div class="top-bar-right">
								<nav id="site-navigation" class="main-navigation" role="navigation">
									<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
								</nav>
								<!-- #site-navigation -->
						</div>
					</div>
				</div>
			</div>
					<?php
			if ( is_front_page() && is_home() ) : ?>
	
						<div class="row home-header-panel">
							<div class="small-12 large-9 columns">
								<div class="row medium-collapse">
									<div class="small-12 medium-3 columns">
										<span class="home-title-intro">Hello! I'm,</span>
									</div>
									<div class="small-12 medium-9 columns">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><h1 class="site-title"><?php bloginfo( 'name' ); ?></h1></a>
									</div>
								</div>
								<div class="row">
									<?php
				$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
										<p class="site-description">
											<?php echo $description; /* WPCS: xss ok. */ ?>
										</p>
										<?php
			endif; ?>
								</div>
								<?php get_template_part( 'template-parts/content', 'featured' ); ?>
							</div>
							<div class="large-3 show-for-large columns">
								<div id="jq-hero-panel">
									<div class="jq-hero-image stacktwo">
										<img src="/wp-content/themes/joecue/images/Joe-Querin-Lake.jpg" class="">
									</div>
								</div>
							</div>
						</div>
						</div>
						<?php else : ?>
							<div class="row">
								<div class="small-12 medium-4 columns">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<p class="site-title">
											<?php bloginfo( 'name' ); ?>
										</p>
									</a>
								</div>
								<div class="small-12 medium-8 columns">
									<?php
				$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
										<p class="subpage site-description">
											<?php echo $description; /* WPCS: xss ok. */ ?>
										</p>
										<?php
			endif; ?>
								</div>
							</div>
							<div class="content-edge">&nbsp;</div>
							<?php
			endif;?>


				</div>
				<!-- .site-branding -->


			</header>
			<!-- #masthead -->

			<div id="content" class="site-content">
