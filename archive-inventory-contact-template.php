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

$currentTaxo = 	get_queried_object()->name;

$args = array(
    'numberposts' => -1,
    'post_type'   => $currentTaxo ,
    'order' => 'ASC',
);
    
$contacts = get_posts( $args );

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
			CONTACTS
			</h1>

		
			<section class="post-wrapper sedoo_blocks_listearticle">

				<?php foreach($contacts as $contact) {?>

					<article id="post-<?php echo $contact->ID; ?>" <?php post_class('post'); ?>>
						<a href="<?php echo get_permalink($contact->ID); ?>"></a>
						<header class="entry-header">
							<figure>
								<?php 
								if (get_the_post_thumbnail_url($contact->ID)) {
									?>
									<figure>
										<img src="<?php echo get_the_post_thumbnail_url($contact->ID); ?>" alt="">  
									</figure>
									<?php 
								} else {
									labs_by_sedoo_catch_that_image();                
								}?>            
							</figure>
						</header><!-- .entry-header -->
						<div class="group-content">
							<div class="entry-content">
								<h3><?php echo get_the_title($contact->ID); ?></h3>
					
								<?php 
									echo get_the_excerpt($contact->ID); 								
								?>
							</div><!-- .entry-content -->
							<footer class="entry-footer">
							
							</footer><!-- .entry-footer -->
						</div>
					</article><!-- #post-->
					<?php 
					}
				?>
			</section>
		</main><!-- #main -->
		<aside>
		</aside>
	</div><!-- #primary -->

<?php
get_footer();