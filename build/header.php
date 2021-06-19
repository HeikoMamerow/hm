<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body id="body" <?php body_class( ( ( has_block( 'code' ) ) ? 'line-numbers' : '' ) . ' prose prose-xl sm:prose-lg max-w-none font-sans bg-gray-100 text-gray-900' ); ?>>

<header id="site-header" class="" role="banner">

	<div class="relative z-20 sm:flex sm:justify-between max-w-xl md:max-w-2xl lg:max-w-3xl mx-auto my-10 sm:my-20">

		<a href="<?php echo get_home_url(); ?>" class="flex items-center place-content-center my-2 auto-cols-max leading-none !no-underline">

			<div class="flex-none object-center object-contain">
				<object class="mt-0 sm:mt-0.5 h-8 sm:h-9 w-auto mr-1.5 sm:mr-2.5" type="image/svg+xml"
						data="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg">
					Logo
				</object>
			</div>

			<div class="flex-none">
				<div class="flex justify-between space-x-1 font-bold uppercase text-2xl tracking-wide sm:tracking-wider leading-none">
					<span>Heiko</span> <span>Mamerow</span>
				</div>

				<div class="flex justify-between space-x-1 text-sm leading-none sm:text-sm tracking-wide sm:tracking-wider sm:leading-none">
					<span>Webentwicklung</span> <span>mit</span> <span>WordPress</span>
				</div>
			</div>

		</a>

		<button id="menu-button" class="menu-button hamburger hamburger--spin-r mx-auto sm:mx-0 block mt-10 sm:mt-0 focus:outline-none" type="button"
				aria-haspopup="true" aria-controls="menu">
					<span class="hamburger-box w-4 h-4 mr-1.5 sm:mr-2.5">
						<span class="hamburger-inner w-4"></span>
					</span>
			<span class="hamburger-label">Menü</span>
			<span class="hamburger-label-close"></span>
		</button>

	</div>

		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'header-menu',
				'walker'          => new HM_Walker_Nav_Menu(),
				'container'       => 'nav',
				'container_class' => 'menu-container absolute z-20 w-0 right-0 overflow-x-hidden transition-width transition-colors duration-500 bg-hm-red bg-opacity-10 uppercase tracking-wide',
				'items_wrap'      => '<ul id="menu" class="menu">%3$s</ul>',
				'item_spacing'    => 'discard',
			)
		);
		?>


</header><!-- #site-header -->
