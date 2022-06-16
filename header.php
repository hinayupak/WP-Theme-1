<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
 */
$options = get_option( 'theme_settings' );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="bg-orange">
			<div class="top-narrow-menu main-width">
				<div class="top-narrow-menu-left align-sm-center">
					<p><span class="color-dark-orange">CALL US NOW</span> <a class="tel color-white" href="tel:<?php echo $options['theme-phone-number']; ?>"><?php echo $options['theme-phone-number']; ?></a></p>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-narrow-top',
					'menu_id'        => 'menu-narrow-top',
					'fallback_cb'       => false
				) );
				?>
			</div>
		</div>
		<div class="bg-teal-1">
			<div class="top-main-menu main-width">
				<div class="site-branding">
					<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
						<?php
							$custom_logo_id = get_theme_mod( 'custom_logo' );
							$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
							
							if ( $options['theme-logo'] ) {
								echo '<img src="' . esc_url( $options['theme-logo'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
							} else {
								echo get_bloginfo('name');
							}
						?>
					</a>
				</div><!-- .site-branding -->
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'ct-custom' ); ?></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'li_class'		 => 'parent-li'
					) );
					?>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="main-width">
			<?php
				if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
				}
			?>