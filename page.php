<?php
/**
* @package WordPress
* @subpackage UPA 24hrs
* @since UPA 24hrs 1.0 Beta
*/
?>
<div id="pagina-interna-heelj">
   <?php get_header(); ?>
</div>
<?php
	while ( have_posts() ) : the_post();
	the_content();
	endwhile; // End of the loop.
?>
</div>

<?php get_footer(); ?>
