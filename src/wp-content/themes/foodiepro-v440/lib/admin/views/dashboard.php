<?php
/**
 * Template part for the WordPress Theme Dashboard page.
 *
 * @package   FoodiePro\Views\Admin
 * @copyright Copyright (c) 2020, Feast Design Co.
 * @license   GPL-2.0+
 * @since     3.0.0
 */

?>
<div id="theme-dashboard" class="wrap theme-dashboard">

	<h1>Foodie Pro v.<?php echo CHILD_THEME_VERSION; ?></h1>

	<section id="dashboard-content" class="dashboard-content">

		<div class="dashboard-main">
			<p>🎉 <?php esc_html_e( 'Have you popped the champagne yet? You just installed Foodie Pro! We\'re so excited for you and wanted to share some helpful resources to get you going.', 'foodiepro' ); ?></p>

			<ul>
				<li>
					<?php
					printf(
						__( 'If you need help, please first check out the <a target="_blank" href="%1$s">tutorials</a> and then <a target="_blank" href="%2$s">submit a support ticket</a> if you need to. They don\'t call us the best at support for nothing!', 'foodiepro' ),
						esc_url( 'https://feastdesignco.com/tutorials/' ),
						esc_url( 'https://feastdesignco.com/support/' )
					);
					?>
				</li>
				<li>
					<?php
					printf(
						__( 'Hire us to <a target="_blank" href="%s">install and customize your theme</a> -- leave all the techy details to us!', 'foodiepro' ),
						esc_url( 'https://feastdesignco.com/done-for-you/' )
					);
					?>
				</li>
				<li>
					<?php
					printf(
						__( 'Simplify your recipe publishing workflow and boost SEO with the <a target="_blank" href="%s">WP Recipe Maker</a> Plugin.', 'foodiepro' ),
						esc_url( 'https://bootstrapped.ventures/wp-recipe-maker/?ref=76' )
					);
					?>
				</li>
				<li>
					<?php
					printf(
						__( 'Sign up for the affiliate program to get rewarded for referrals at <a target="_blank" href="%s">feastdesignco.com</a>.', 'cookd' ),
						esc_url( 'https://feastdesignco.com/affiliates/' )
					);
					?>
				</li>
			</ul>
		</div>
		
		<hr/>
		
		<div class="dashboard-main" >
			<h2>Get the Feast Plugin</h2>
			<p>The <a href="https://feastdesignco.com/feast-plugin/" target="_blank">Feast Plugin</a> comes with a number of upgrades and customizations, including:</p>
				<ul style="margin-left:30px;">
					<li>Toggle: Navigation Before/After Header</li>
					<li>Toggle: Sticky Mobile Menu</li>
					<li>Toggle: Previous/Next on Posts</li>
					<li>Additional Image Sizes</li>
					<li>Edit Post Info</li>
					<li>Disclosures shortcodes</li><li>Category Featured Images</li>
					<li>Word Count + Reading Time shortcodes</li>
					<li><a href="https://feastdesignco.com/genesis-schema-vs-yoast-v-11/" target="_blank">Remove Duplicate Schema</a></li>
					<li>Mobile Browser Color</li>
					<li><a href="https://feastdesignco.com/feast-plugin-retina-logo" target="_blank">Pagespeed-friendly Retina Logo</a></li>
				</ul>
		</div>

		<div class="dashboard-about">
			<h2>Feast Design Co.</h2>

			<p><?php esc_html_e( 'Honoring our gifts is how we honor your gifts. We design so that you can live, work, and thrive in ways that help you feel most connected to your true calling.', 'foodiepro' ); ?></p>

			<p><?php printf( __( 'Grow your food and lifestyle blog with %s!', 'foodiepro' ), '<a target="_blank" href="https://feastdesignco.com">Feast</a>' ); ?></p>

			<ul class="feast-social">
				<li>
					<a target="_blank" href="https://www.facebook.com/feastdesignco">
						<i class="feast-social-icon feast-social-facebook">
							<span class="screen-reader-text">Facebook</span>
						</i>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://twitter.com/feastdesignco">
						<i class="feast-social-icon feast-social-twitter">
							<span class="screen-reader-text">Twitter</span>
						</i>
					</a>
				</li>
				<li>
					<a target="_blank" href="https://www.instagram.com/feastdesignco">
						<i class="feast-social-icon feast-social-instagram">
							<span class="screen-reader-text">Instagram</span>
						</i>
					</a>
				</li>
			</ul>
		</div>
		
	<ul>
		<li><?php echo "Theme version: ".CHILD_THEME_VERSION; ?></li>
		<li><?php echo "Genesis version: ".PARENT_THEME_VERSION; ?></li>
		<li><?php echo "Wordpress version: ".get_bloginfo('version'); ?></li>
		<li><?php echo "PHP version: ".phpversion(); ?></li>
	</ul>
		
	<?php
		// https://upgradeyourphp.com/
		if (version_compare(PHP_VERSION, '7.1.0', '<')) { // 5.6+7.0 EOL 2018/12/31
		  echo "<p>Your server is running PHP v.".PHP_VERSION.", which is out of date. For security and privacy reasons, we recommend migrating your blog to a webhost that automatically keeps your blog's server up-to-date, such as <a href='https://feastdesignco.com/hosting' target='_blank' rel='noreferrer'>this one</a> (affiliate link :) ).</p>";
		} elseif (version_compare(PHP_VERSION, '7.2.0', '<') && date('Y') > 2019) { // 7.1 EOL 2019/12/01
		  echo "<p>Your server is running PHP v.".PHP_VERSION.", which is out of date. For security and privacy reasons, we recommend migrating your blog to a webhost that automatically keeps your blog's server up-to-date, such as <a href='https://feastdesignco.com/hosting' target='_blank' rel='noreferrer'>this one</a> (affiliate link :) ).</p>";
		} elseif (version_compare(PHP_VERSION, '7.3.0', '<') && date('Y') > 2020) { // 7.2 EOL 2020/11/30
		  echo "<p>Your server is running PHP v.".PHP_VERSION.", which is out of date. For security and privacy reasons, we recommend migrating your blog to a webhost that automatically keeps your blog's server up-to-date, such as <a href='https://feastdesignco.com/hosting' target='_blank' rel='noreferrer'>this one</a> (affiliate link :) ).</p>";
		}
	 ?>
		
	</section><!-- #dashboard-content -->

	<section id="dashboard-sidebar" class="dashboard-sidebar">
		<script async data-uid="58c60b3c5b" src="https://f.convertkit.com/58c60b3c5b/eac5538b4b.js"></script>
	</section><!-- #dashboard-sidebar -->
	
	<section id="dashboard-checklist"> <!-- list of things to configure -->
		<img src="https://feastdesignco.com/checklist/<?php echo $_SERVER['SERVER_NAME']; ?>.jpg" />
	</section> <!-- #dashboard-checklist -->

</div><!-- #theme-dashboard -->
