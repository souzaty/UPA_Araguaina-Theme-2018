<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>

	<?php $upload_documento_transparencia = get_post_meta($post->ID, 'upload_documento_transparencia', true); ?>

    <li class="doc-transparencia">
    	<i class="fa fa-clock-o" aria-hidden="true"></i> <i class="data"><?php the_time('d/m/Y'); ?></i> 
        <a href="<?php echo $upload_documento_transparencia; ?>" target="_blank" style="max-width: 400px; text-align: left;"> 
           <i class="fa fa-arrow-circle-o-down" aria-hidden="true"></i> <?php the_title(); ?>
        </a>
    </li>
<?php endwhile; endif; wp_reset_query(); ?>