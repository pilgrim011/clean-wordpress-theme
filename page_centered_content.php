<?php
/* Template Name: Centered content area */

get_header(); ?>
<div id="placeholder-one" class="main-content-inner col-sm-12 col-md-3"></div>
<div id="content" class="main-content-inner col-sm-12 col-md-6">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', 'page' ); ?>

		<?php
			// If comments are open or we have at least one comment, load up the comment template
			if ( comments_open() || '0' != get_comments_number() )
				comments_template();
		?>

	<?php endwhile; // end of the loop. ?>
    <div id="placeholder-two" class="main-content-inner col-sm-12 col-md-3"></div>
<?php get_footer(); ?>
