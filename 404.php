<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package simplybusiness
 */

get_header(); ?>

	<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>
	<div class="col-md8">
	<section class="content-padder error-404 not-found">

		<header>
			<h2 class="page-title"><?php _e( 'Oops! Something went wrong here.', 'simplybusiness' ); ?></h2>
		</header><!-- .page-header -->

		<div class="page-content text-center">

			<p><?php _e( 'Nothing could be found at this location. Maybe try a search?', 'simplybusiness' ); ?></p>

			<?php get_search_form(); ?>

		</div><!-- .page-content -->

	</section><!-- .content-padder -->
</div>
<div class="col-md-4">
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>