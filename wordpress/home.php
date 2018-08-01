<?php
# @Author: Nicolas Fazio <webmaster-fazio>
# @Date:   16-11-2017
# @Email:  contact@nicolasfazio.ch
# @Last modified by:   webmaster-fazio
# @Last modified time: 16-11-2017

/**
 * WordPress BlogPage index entry point
 */

 get_header();?>

      <main id="main" class="site-main" role="main">
      		<?php
      		if ( have_posts() ) :?>
      			<?php
      			/* Start the Loop */
      			while ( have_posts() ) : the_post();
              // echo '<div class="content">';
              // the_content();
              // echo '</div>';
      				get_template_part( 'template-parts/content', get_post_format() );
      			endwhile;
          else:
            get_template_part( 'template-parts/content', 'none' );
      		endif; ?>
      </main><!-- #main -->
<?php get_footer();?>
