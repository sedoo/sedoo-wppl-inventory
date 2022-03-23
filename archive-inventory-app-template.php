<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$application_args = array(
	'post_type' => 'sedoo_inventory_app',
	'posts_per_page'=> 10, //the same as the parse_query filter in our sedoo-wppl-functions.php file - in order to prevent default pagination of wordpress used for classical post
	'order' => 'ASC',
	'paged' => $paged,
);
$query_all_applications = new WP_Query($application_args);

get_header();

?>
	 <div class="archive-template">
	<div id="content-area" class="wrapper-layout application-archive-template  archives">
		<main id="main" class="site-main">
		<?php
		if ( !empty($cover)) {
				$coverStyle = "background-image:url(".$cover['url'].")";
			?>
			
			<header id="cover" class="page-header" style="<?php echo $coverStyle;?>">
				
			</header><!-- .page-header -->
			<?php
			}
			?>	
			
			<h1 class="page-title">
				Sites web 
			</h1>
			<section class="post-wrapper sedoo_blocks_listearticle">
			<?php if ($query_all_applications -> have_posts() ) : ?>
			
			<!-- the loop -->
			<?php while ( $query_all_applications->have_posts() ) : $query_all_applications->the_post();?>
				
				<?php $post_id = get_the_ID(); ?>

				<article id="post-<?php echo $post_id; ?>" <?php post_class('post'); ?>>
				<header class="entry-header">
					<a href="<?php the_permalink(); ?>">
				<figure>	
					<?php the_post_thumbnail();?>
				</figure>
				</a>
				</header><!-- .entry-header -->
				<div class="group-content">
					<div class="entry-content">
						<h3><?php the_title(); ?></h3>
					</div>
					<ul>
					<!-- STRUCTURES -->
					<?php
					$structures = get_the_terms( $post_id, 'sedoo_inventory_structure_app' );
					if ( $structures) :?>
					<li><strong>Structures :</strong>
					<?php foreach( $structures as $structure ) :?>
						<a href="<?php print $structure->slug ?>"><?php echo $structure->name ;?></a>&nbsp;
					<?php endforeach; ?></li>
					<?php endif; ?>
						<!-- TYPE DE SITE -->
					<?php
					$typedesites = get_the_terms( $post_id, 'sedoo_inventory_type_site' );
					if ($typedesites) : ?>
					<li><strong>Type de site :</strong> 
					<?php foreach( $typedesites as $typedesite ) :?>
						<a href="<?php print $typedesite->slug ?>"><?php echo $typedesite->name ;?></a>&nbsp;
					<?php endforeach; ?>
					</li>
					<?php endif; ?>
					</ul>
					<?php the_excerpt(); ?>
					</div>
				<footer class="entry-footer">
					<a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'sedoo-wpth-labs'); ?> →</a>
				</footer>
				</article>
				
				<?php endwhile;?>
				<!-- end of the loop -->
				</section>
				<div>
				<!-- pagination here -->
				<?php
				if (function_exists( 'custom_pagination' )) :
					custom_pagination( $query_all_applications->max_num_pages,"",$paged );
				endif;
				?>
				<?php else:  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
			
				</div>
			
		</main><!-- #main -->
		<aside class="contextual-sidebar"> 
			<?php
			// Get the taxonomy's terms
			$terms_Typedapp = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_type_app',
					'hide_empty' => false,
				)
			);
			$terms_structures = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_structure_app',
					'hide_empty' => false,
				)
			);
			$terms_instances = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_instance_app',
					'hide_empty' => false,
				)
			);
			$terms_servers = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_server_app',
					'hide_empty' => false,
				)
			);
			$terms_type_de_sites = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_type_site',
					'hide_empty' => false,
				)
			);?>

			<section>
			<h2>Tous les types d'application</h2>
			<?php // Check if any term exists
			if ( ! empty( $terms_Typedapp ) && is_array( $terms_Typedapp ) ) {
				// Run a loop and print them all ?>
				<ul>
				<?php foreach ( $terms_Typedapp as $term_Typedapp ) { ?>
				<li> <a href="<?php echo esc_url( get_term_link( $term_Typedapp ) ) ?>">
						<?php echo $term_Typedapp->name; ?>
					</a></li><?php
				}?>
				</ul>
			<?php } ?>
			</section>
			<section>
				<h2>Toutes les structures</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_structures ) && is_array( $terms_structures ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_structures as $term_structure ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $term_structure ) ) ?>">
							<?php echo $term_structure->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
			<section>
				<h2>Toutes les instances</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_instances ) && is_array( $terms_instances ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_instances as $terms_instance ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $terms_instance ) ) ?>">
							<?php echo $terms_instance->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
			<section>
				<h2>Tous les servers</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_servers ) && is_array( $terms_servers ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_servers as $terms_server ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $terms_server ) ) ?>">
							<?php echo $terms_server->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
			<section>
				<h2>Tous les types de sites</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_type_de_sites ) && is_array( $terms_type_de_sites ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_type_de_sites as $terms_type_de_site ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $terms_type_de_site ) ) ?>">
							<?php echo $terms_type_de_site->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
		</aside>
		</div><!-- #primary -->
		
		<?php wp_reset_postdata(); ?>		
		<?php get_footer();