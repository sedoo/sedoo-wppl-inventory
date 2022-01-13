<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

global $taxo_names_instance;
global $taxo_names_server;
global $taxo_names_structure;
global $taxo_names_type_de_site;

get_header();

?>
	<div id="content-area" class="wrapper application-archive-template  archives">
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

		<?php
			$args = array(
				'numberposts' => -1,
				'post_type'   => 'sedoo_inventory_app',
				'order' => 'ASC',
			);
			   
			$applications = get_posts( $args );

			?>
			<section class="post-wrapper sedoo_blocks_listearticle">
				<?php 
					foreach($applications as $projet) {
						
					?>
					<article id="post-<?php echo $projet->ID; ?>" <?php post_class('post'); ?>>
						<a href="<?php echo get_the_permalink($projet->ID); ?>"></a>
						<header class="entry-header">
							<figure>
								<?php 
								if (get_the_post_thumbnail_url($projet->ID)) {
									?>
									<figure>
										<img src="<?php echo get_the_post_thumbnail_url($projet->ID); ?>" alt="">  
									</figure>
									<?php 
								} else {
									labs_by_sedoo_catch_that_image();                
								}?>            
							</figure>
						</header><!-- .entry-header -->
						<div class="group-content">
							<div class="entry-content">
								<h3><?php echo get_the_title($projet->ID); ?></h3>
								<div class="tag <?php echo $taxo_names_thematiques; ?>">
									<?php 
										$thematiques = get_the_terms( $projet->ID, $taxo_names_thematiques );
										foreach($thematiques as $thematique) {
											echo '<a class="them_link" href="'.get_term_link($thematique->term_id).'">'.esc_html($thematique->name).'</a>';   
										}
									?>
								</div>
								<?php 
									echo get_the_excerpt($projet->ID); 								
								?>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
								<?php
								if ( 'post' === get_post_type() ) :
									?>
									<p><?php the_date('M / d / Y') ?></p>
								<?php endif; 
								if ( 'tribe_events' === get_post_type() ) :
									?>
									<p><?php echo tribe_get_start_date(get_the_ID(), false, 'd M Y - g:i'); ?></p>
								<?php endif; ?>
								<a href="<?php the_permalink(); ?>"><?php echo __('Read more', 'sedoo-wpth-labs'); ?> →</a>
							</footer><!-- .entry-footer -->
						</div>
					</article><!-- #post-->
					<?php 
					}
				?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();