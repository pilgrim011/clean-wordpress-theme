<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package clean
 */

get_header(); ?>

	<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>
	
	<div class="col-md-8">
	

		<header>
			<h2 class="page-title"><?php _e( 'Oops! Something went wrong here.', 'clean' ); ?></h2>
		</header><!-- .page-header -->

		<div class="page-content">

			<p><?php _e( 'Nothing could be found at this location. Maybe try a search?', 'clean' ); ?></p>

			<?php get_search_form(); ?>
			</div>
		</div><!-- .page-content -->

	
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>