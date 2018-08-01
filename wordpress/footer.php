<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   08-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 14-11-2017

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NG_WP_STARTER
 */

?>

			<footer id="colophon" class="site-footer">
				<div class="site-info">
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'ng-wp-starter' ) ); ?>"><?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'ng-wp-starter' ), 'WordPress' );
					?></a>
					<span class="sep"> | </span>
					<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'ng-wp-starter' ), 'ng-wp-starter', '<a href="http://underscores.me/">Underscores.me</a>' );
					?>
				</div><!-- .site-info -->
			</footer><!-- footer#colophon -->
		</div><!-- .server_reading -->
	</app-root>
	<?php wp_footer();?>
</body>
</html>
