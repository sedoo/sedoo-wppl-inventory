<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

global $taxo_names_typologie;
global $taxo_names_thematiques;
global $taxo_names_offre_services;

$app_url = get_field('sedoo_inventory_url_app');
$app_url_backoff = get_field('sedoo_inventory_url_backoff');
$app_contact = get_field('sedoo_inventory_contact_app');
$app_ldap_connect = get_field('sedoo_inventory_ldap_connect');
$app_date = get_field('sedoo_inventory_date_app');
$app_password = get_field('sedoo_inventory_password_app');
$app_image = get_field('sedoo_inventory_image_app');

$contact_name = get_field('inventory_contact_name');
$contact_first_name = get_field('inventory_contact_first_name');
$contact_mail = get_field('inventory_contact_mail');
$contact_phone = get_field('inventory_contact_phone');
$contact_structure = get_field('inventory_contact_structure');
$contact_img = the_post_thumbnail();


?>

<div id="primary" class="content-area project-content-page">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
						<?php
						// get all of the terms for this post, with the taxonomy of categories-projets.
						$app_taxo_instance = get_the_terms( $post->ID, 'instance' ); 
						$app_taxo_structure = get_the_terms( $post->ID, 'structure' ); 
						$app_taxo_type_de_site = get_the_terms( $post->ID, 'type_de_site' ); 
						$app_taxo_server = get_the_terms( $post->ID, 'server' ); 
						?>
						<h1><?php the_title(); ?></h1>
						<!-- Application -->
						<?php if($app_url) { ?>
						<p class="infoApptext"><b>URL: </b><span class="colorGrey"><a href="<?php echo $app_url; ?>" title="lien vers <?php echo $app_url; ?> "><?php echo $app_url; ?></a></span></p>
						<?php } ?>
						
						<?php if($app_url_backoff) { ?>
						<p class="infoApptext"><b>BACKOFFICE: </b><span class="colorGrey"><a href="<?php echo $app_url_backoff; ?>" title="lien vers <?php echo $app_url_backoff; ?>" ><?php echo $app_url_backoff; ?></a></span></p>
						<?php } ?>
						
						<?php if($app_contact) { ?>
						<p class="infoApptext"><b>CONTACT: </b><span class="colorGrey"><?php echo $app_contact; ?></span></p>
						<?php } ?>

						<?php if($app_date) { ?>
						<p class="infoApptext"><b>DATE: </b><span class="colorGrey"><?php echo $app_date; ?></span></p>
						<?php } ?>
						
						<?php if($app_password) { ?>
						<p class="infoApptext"><b>MOT DE PASSE: </b><span class="colorGrey"><?php echo $app_password; ?></span></p>
						<?php } ?>
						
						<?php if($app_taxo_instance) { ?>
						<p class="infoApptext"><b>INSTANCE : </b><span class="colorGrey"><?php  foreach ( $app_taxo_instance as $term ) {echo $term->name;}?>
</span></p>
						<?php } ?>
						
						<?php if($app_taxo_structure) { ?>
						<p class="infoApptext"><b>STRUCTURE : </b><span class="colorGrey"><?php  foreach ( $app_taxo_structure as $term ) {echo $term->name;}?></span></p>
						<?php } ?>

						<?php if($app_taxo_type_de_site) { ?>
						<p class="infoApptext"><b>TYPE DE SITE : </b><span class="colorGrey"><?php  foreach ( $app_taxo_type_de_site as $term ) {echo $term->name;}?></span></p>
						<?php } ?>
						
						<?php if($app_taxo_server) { ?>
						<p class="infoApptext"><b>SERVEUR : </b><span class="colorGrey"><?php  foreach ( $app_taxo_server as $term ) {echo $term->name;}?></span></p>
						<?php } ?>
                       	

						<?php if($app_image) { ?>
							<figure class="imgApp">
								<img src="<?php echo $app_image; ?>">
							</figure>
						<?php } ?>
						<!-- contact -->
						<?php if($contact_name) { ?>
						<p class="infoApptext"><b>Nom: </b><span class="colorGrey"><?php echo $contact_name; ?>	</span></p>
						<?php } ?>
						<?php if($contact_first_name) { ?>
						<p class="infoApptext"><b>Prénom: </b><span class="colorGrey"><?php echo $contact_first_name; ?>	</span></p>
						<?php } ?>
						<?php if($contact_mail) { ?>
						<p class="infoApptext"><b>Mail: </b><span class="colorGrey"><?php echo $contact_mail; ?></span></p>
						<?php } ?>
						<?php if($contact_phone) { ?>
						<p class="infoApptext"><b>Phone: </b><span class="colorGrey"><?php echo $contact_phone; ?></span></p>
						<?php } ?>
						<?php if($contact_structure) { ?>
						<p class="infoApptext"><b>Structure: </b><span class="colorGrey"><?php echo $contact_structure; ?></span></p>
						<?php } ?>

						<?php if($contact_img) { ?>
							<figure class="imgApp">
							<?php the_post_thumbnail(); ?>
							</figure>
						<?php } ?>
	                </header>
                    <section>
                        <?php the_content(); ?>
                    </section>
              
                    <footer class="">
                        
                    </footer>
					
				</article>
            
			</main><!-- #main -->

				<aside class="contextual-sidebar project-sidebar">
					<section class="sedoo-project-section-date">
					
					</section>
					<?php 
						// if($app_contact || $app_ldap_connect) {
						// 	echo '<section class="sedoo-project-section-urls">';
						// 	echo '<h2> URL </h2>';
						// }
						// if($app_contact) {
						// 	echo '<a href="'.$app_contact.'">'.__( 'Data access', 'sedoo-wppl-projects' ). '</a>';
						// }
						// if($app_ldap_connect) {
						// 	echo '<a href="'.$app_ldap_connect.'">'.__( 'Official website', 'sedoo-wppl-projects' ). '</a>';	
						// }

						// if($app_contact || $app_ldap_connect) {	
						// 	echo '</section>';
						// }
					?>
					<?php 
						// if($thematiques) {
						// 	echo '<section class="sedoo-project-section-themes">';
						// 	echo '<h2> '.__( 'Project themes', 'sedoo-wppl-projects' ). ' </h2>';
						// 	echo '<div class="tag">';
						// 	foreach($thematiques as $thematique) {
						// 		echo '<a href="'.get_term_link($thematique->term_id).'">'.esc_html($thematique->name).'</a>';   
						// 	}
						// 	echo '</div></section>';
						// }
					?>
					<?php 
						// if($liste_offres) {
						// 	echo '<section class="sedoo-project-section-services">';
						// 	echo '<h2> '.__( 'Project services', 'sedoo-wppl-projects' ). '</h2>';
						// 	echo '<div class="tag">';
						// 	foreach($liste_offres as $offre) {
						// 		echo '<a href="'.get_term_link($offre->term_id).'">'.esc_html($offre->name).'</a>';   
						// 	}
						// 	echo '</div></section>';
						// }
					?>
					<?php 
						// if($liste_typologies) {
						// 	echo '<section class="sedoo-project-section-typologies">';
						// 	echo '<h2> '.__( 'Project typology', 'sedoo-wppl-projects' ). ' </h2>';
						// 	echo '<div class="tag">';
						// 	foreach($liste_typologies as $typlogies) {
						// 		echo '<a href="'.get_term_link($typlogies->term_id).'">'.esc_html($typlogies->name).'</a>';   
						// 	}
						// 	echo '</div></section>';
						// }
					?>
				
					<?php 
						// $linked_project = get_field('sedoo_projects_projets_en_relation');
						// if($linked_project) {
						// 	echo '<section class="sedoo-project-section-related-projects">';
						// 	echo '<h2> '.__( 'Related project', 'sedoo-wppl-projects' ). '</h2>';
						// 	echo '<ul>';
						// 	foreach($linked_project as $project) {
						// 		echo '<li><a href="'.get_permalink($project->ID).'">'.$project->post_title.'</a></li>';
						// 	}
						// 	echo '</ul></section>';
						// }
					?>
				</aside>
			<?php
		?>
		</div>
	
	</div>
	<style>
		.colorGrey{
			color:#999999!important;
		}
		.infoApptext{
			font-size:15px;
		}
		.infoApptext a:hover{
			color:#0000!important!important;
			text-decoration:none!important;
		}
		.imgApp{
			-webkit-box-shadow: 5px 5px 15px 5px rgba(0,0,0,0.19); 
box-shadow: 5px 5px 15px 5px rgba(0,0,0,0.19);
		}
	</style>
	