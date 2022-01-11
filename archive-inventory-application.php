<?php if (! defined('ABSPATH')) die('Restricted Area'); ?>
<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<header class="page-header">
	<h1 class="container"><?php post_type_archive_title(); ?></h1>
	</header>
<?php endwhile; endif; ?>
<div class="content">
	<div class="container">
		<?php
			$taxonomy = 'structure';

			$term_args = array(
			 'orderby' => 'name',
			 'order' => 'ASC'
			 );

			$terms = get_terms($taxonomy,$term_args);

			if ($terms) { foreach($terms as $term) {
		?>

		<?php 
			$args = array(
			'post_type' => 'sedoo_inventory_app',
			'tax_query' => array(
			array(
				'taxonomy' => 'structure',
				'terms' => array($term->term_id),
				'include_children' => true,
				'operator' => 'IN'
				)
			)
		);
		$my_query = new WP_Query($args); if ($my_query->have_posts()) { ?>
			<div class="row">
				<h1 class="term-title"><?php echo $term->name; ?></h1>

				<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
					<div class="col-sm-2">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail('thumbnail', array('class' => 'img-responsive aligncenter')); ?>
						<?php endif; ?>
						
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to ', 'textdomain'); ?><?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</div>
				<?php endwhile; ?>
			</div>

		<?php } 
		 } } ?>
		<?php wp_reset_query(); ?>
	</div>
</div>
<?php get_footer(); ?>