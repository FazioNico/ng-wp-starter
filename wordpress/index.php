<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   07-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 09-11-2017

get_header();?>

      <main id="main" class="site-main" role="main">

      		<?php
      		if ( have_posts() ) :
      			if ( is_home() && ! is_front_page() ) : ?>
      				<header>
      					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
      				</header>

      			<?php
      			endif;
      			/* Start the Loop */
      			while ( have_posts() ) : the_post();
      				get_template_part( 'template-parts/content', get_post_format() );
      			endwhile;
      			the_posts_navigation();
      		else :
      			get_template_part( 'template-parts/content', 'none' );
      		endif; ?>
      </main><!-- #main -->

<?php get_footer();
