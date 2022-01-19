<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

global $cpt_names_application;
global $cpt_names_contact;
global $taxo_names_instance;
global $taxo_names_server;
global $taxo_names_structure;
global $taxo_names_type_de_site;

$args = array(
	'numberposts' => -1,
	'post_type'   => 'sedoo_inventory_app',
	'order' => 'ASC',
);
$args2 = array(
	'post_type' => 'sedoo_inventory_app',
);
$query2 = new WP_Query($args2);

   
$applications = get_posts( $args );

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
				APPLICATION 
			</h1>
			<section class="post-wrapper sedoo_blocks_listearticle">
				<?php 
					foreach($applications as $application) :
						
					?>
					<article id="post-<?php echo $application->ID; ?>" <?php post_class('post'); ?>>
						<a href="<?php echo get_permalink($application->ID); ?>"></a>
						<header class="entry-header">
							<figure>
								<?php 
								if (get_the_post_thumbnail_url($application->ID)) {
									?>
									<figure>
										<img src="<?php echo get_the_post_thumbnail_url($application->ID); ?>" alt="">  
									</figure>
									<?php 
								} else {
									labs_by_sedoo_catch_that_image();                
								}?>            
							</figure>
						</header><!-- .entry-header -->
						<div class="group-content">
							<div class="entry-content">
								<h3><?php echo get_the_title($application->ID); ?></h3>
								<ul>
								<!-- INSTANCES -->
								<?php 
								$instances = get_the_terms( $application->ID , $taxo_names_instance );
								if ( $instances) : ?>
								<li><strong>Instances :</strong>
								<?php foreach( $instances as $instance ) : ?> 
									<a href="<?php echo $instance->slug ?>"><?php echo $instance->name ;?> </a>&nbsp;
								<?php endforeach; ?></li>
								<?php endif; ?>
								
								<!-- STRUCTURES -->
								<?php
								$structures = get_the_terms( $application->ID , $taxo_names_structure );
								if ( $structures) :?>
								<li><strong>Structures :</strong>
								<?php foreach( $structures as $structure ) :?>
									<a href="<?php print $structure->slug ?>"><?php echo $structure->name ;?></a>&nbsp;
								<?php endforeach; ?></li>
								<?php endif; ?>
							
								<!-- SERVER -->
								<?php
								$servers = get_the_terms( $application->ID , $taxo_names_server );
								if ( $servers) : ?>
								<li><strong>Server :</strong> 
								<?php foreach( $servers as $server ) : ?>
									<a href="<?php print $server->slug ?>"><?php echo $server->name ;?></a>&nbsp; 
								<?php endforeach; ?></li>
								<?php endif; ?>

								<!-- TYPE DE SITE -->
								<?php
								$typedapps = get_the_terms( $application->ID , $taxo_names_type_de_site );
								if ($typedapps) : ?>
								<li><strong>Type de site :</strong> 
								<?php foreach( $typedapps as $typedapp ) :?>
									<a href="<?php print $typedapp->slug ?>"><?php echo $typedapp->name ;?></a>&nbsp;
								<?php endforeach; ?>
								</li>
								<?php endif; ?>
								
								</ul>
								<p><?php echo get_the_excerpt($application->ID); ?></p>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
								<a href="<?php echo get_permalink($application->ID); ?>"><?php echo __('Read more', 'sedoo-wpth-labs'); ?> →</a>
							</footer><!-- .entry-footer -->
						</div>
					</article><!-- #post-->
					<?php 
					endforeach;
				?>
			</section>
		</main><!-- #main -->
		<aside class="contextual-sidebar"> 
			<h2>ASIDE</h2>
			<section>
            <?php
		$queried_object = get_queried_object();
		$taxonomy = $queried_object->taxonomy;
		$term_id = $queried_object->term_id;
		$taxonomy_name = 'sedoo_inventory_app';
		$term_children = get_term_children($term_id, $taxonomy_name);

		echo '<ul class="nav nav-pills">';
			foreach ($term_children as $child) {
				$term = get_term_by('id', $child, $taxonomy_name);
				echo '<li><a class="btn btn-default" href="' . get_term_link($child, $taxonomy_name) . '">' . $term->name . '</a></li>';
			}
		echo '</ul>';
	?>
			</section>
		</aside>
	</div><!-- #primary -->
	</div>
<?php
get_footer();