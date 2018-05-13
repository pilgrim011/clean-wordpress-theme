<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package simplybusiness
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="entry-content-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php the_content(); ?>
		<?php simplybusiness_link_pages(); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'simplybusiness' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
