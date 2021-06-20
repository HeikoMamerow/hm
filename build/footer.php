<footer id="site-footer" role="contentinfo"
        class="max-w-xl md:max-w-2xl lg:max-w-3xl mx-auto my-10 sm:my-20 text-center">

	<hr>

	<div class="site-inner-wrapper text-sm">

		<p>My blog is proudly powered by:</p>

		<div class="flex flex-wrap justify-center items-center space-x-2">

			<?php

			/**
			 * Set tech stack from array.
			 */

			$stack = [
				'_s',
				'Apache',
				'CSS',
				'Docker',
				'JavaScript',
				'MySQL',
				'nodejs',
				'PHP',
				'PostCSS',
				'Tailwind',
				'Ubuntu',
				'WordPress',
			];

			// TODO Better solution with haert. Need multiline with onliny hrats between items.
			$heart = '<span class="text-hm-red">&#9829;</span>';

			echo $heart;

			foreach ( $stack as $st ) {
				echo '<span>' . $st . '</span>' . $heart;
			}

			?>

		</div>

		<p>... and proudly powered for:</p>

		<p class="font-bold"><span class="text-hm-red">&#9829; &#9829; &#9829;</span> YOU <span
					class="text-hm-red">&#9829; &#9829; &#9829;</span></p>

	</div><!-- .site-inner-wrapper -->

</footer><!-- #site-footer -->

<!-- Overlay for off-canvas menu. -->
<div class="overlay z-10 fixed right-0 top-0 bottom-0 w-0 transition-width duration-700 bg-gray-200 bg-opacity-95">
</div>

<?php wp_footer(); ?>

</body>

</html>