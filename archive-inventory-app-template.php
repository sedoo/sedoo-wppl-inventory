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
   
$applications = get_posts( $args );

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

			<section class="post-wrapper sedoo_blocks_listearticle">
				<?php 
					foreach($applications as $application) {
						
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
								<?php   // Get terms for post
								$instances = get_the_terms( $application->ID , $taxo_names_instance );
								// Loop over each item since it's an array
								if ( $instances != null ){?>
							
								<?php foreach( $instances as $instance ) {
								// Print the name method from $term which is an OBJECT? ?>
								<li><strong>Instances :</strong> <a href="<?php echo $instance->slug ?>"><?php echo $instance->name ;?></li>
								<?php // Get rid of the other data stored in the object, since it's not needed
								unset($instance);
								} } ?>
								
								<!-- STRUCTURES -->
								<?php   // Get terms for post
								$structures = get_the_terms( $application->ID , $taxo_names_structure );
								// Loop over each item since it's an array
								if ( $structures != null ){?>
								<?php foreach( $structures as $structure ) {
								// Print the name method from $term which is an OBJECT? ?>
								<li><strong>Structures :</strong> <a href="<?php print $structure->slug ?>"><?php echo $structure->name ;?></li>
								<?php // Get rid of the other data stored in the object, since it's not needed
								unset($structure);
								} } ?>
								
							
								<!-- SERVER -->
								<?php   // Get terms for post
								$servers = get_the_terms( $application->ID , $taxo_names_server );
								// Loop over each item since it's an array
								if ( $servers != null ){
								foreach( $servers as $server ) {
								// Print the name method from $term which is an OBJECT? ?>
								<li><strong>Server :</strong> <a href="<?php print $server->slug ?>"><?php echo $server->name ;?></li>
								<?php // Get rid of the other data stored in the object, since it's not needed
								unset($server);
								} } ?>

								<!-- TYPE DE SITE -->
								<?php   // Get terms for post
								$typedapps = get_the_terms( $application->ID , $taxo_names_type_de_site );
								// Loop over each item since it's an array
								if ( $typedapps != null ){
								foreach( $typedapps as $typedapp ) {
								// Print the name method from $term which is an OBJECT? ?>
								<li><strong>Type de site :</strong> <a href="<?php print $typedapp->slug ?>"><?php echo $typedapp->name ;?></li>
								<?php // Get rid of the other data stored in the object, since it's not needed
								unset($typedapp);
								} } ?>
								</ul>
								<p><?php echo get_the_excerpt($application->ID); ?></p>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
								<a href="<?php echo get_permalink($application->ID); ?>"><?php echo __('Read more', 'sedoo-wpth-labs'); ?> →</a>
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