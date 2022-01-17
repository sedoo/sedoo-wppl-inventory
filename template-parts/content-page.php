<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

global $taxo_names_instance;
global $taxo_names_server;
global $taxo_names_structure;
global $taxo_names_type_dapp;



$app_url = get_field('sedoo_inventory_url_app');
$app_url_backoff = get_field('sedoo_inventory_url_backoff');
$app_contacts = get_field('sedoo_inventory_contact_app');
$app_ldap_connect = get_field('sedoo_inventory_ldap_connect');
$app_date = get_field('sedoo_inventory_date_app');
$app_password = get_field('sedoo_inventory_password_app');
$app_image = get_field('sedoo_inventory_image_app');

$contact_name = get_field('inventory_contact_name');
$contact_first_name = get_field('inventory_contact_first_name');
$contact_mail = get_field('inventory_contact_mail');
$contact_phone = get_field('inventory_contact_phone');
$contact_structure = get_field('inventory_contact_structure');
$contact_img = get_the_post_thumbnail_url();


$instances = get_the_terms( get_the_ID(), $taxo_names_instance );
$servers = get_the_terms( get_the_ID(), $taxo_names_server );
$structures = get_the_terms( get_the_ID(), $taxo_names_structure );
$typedapps = get_the_terms( get_the_ID(), $taxo_names_type_dapp );

?>

<div id="primary" class="content-area inventory-single-content-page">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
					<!-- Application -->
					<section class="inventoryInfoContener">
						<?php if($app_url) : ?>
						<p><b>URL : </b><span><a href="<?php echo $app_url; ?>" title="lien vers <?php echo $app_url; ?> "><?php echo $app_url; ?></a></span></p>
						<?php endif; ?>
						
						<?php if($app_url_backoff) : ?>
						<p><b>BACKOFFICE : </b><span><a href="<?php echo $app_url_backoff; ?>" title="lien vers <?php echo $app_url_backoff; ?>" ><?php echo $app_url_backoff; ?></a></span></p>
						<?php endif; ?>
						
						<?php if($app_contacts) :?>
						<p>
						<strong>CONTACT :</strong>
							<?php foreach( $app_contacts as $app_contact ): ?>
							<a href="<?php echo get_permalink($app_contact->ID);?>">
							<?php echo get_the_title($app_contact->ID); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						
						</p>
						<?php if($app_date) : ?>
						<p><b>DATE DE PREMIERE MISE EN LIGNE : </b><span><?php echo $app_date; ?></span></p>
						<?php endif; ?>
						
						<?php if($app_password) : ?>
						<p><b>MOT DE PASSE : </b><span><?php echo $app_password; ?></span></p>
						<?php endif; ?>
						
						<?php if($app_ldap_connect) : ?>
           				 <p><b>LDAP :</b>
						<?php if ($app_ldap_connect == 1) : ?> 
						Connecté au LDAP <?php else : ?> Non Connecté au LDAP <?php endif; ?>
						<?php endif; ?>
						</p>

						<?php if($instances) :?>
						<p>
						<strong>INSTANCE :</strong>
							<?php foreach( $instances as $instance ): ?>
							<a href="<?php echo get_term_link($instance->term_id);?>">
							<?php echo esc_html($instance->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						
						<?php if($structures) :?>
						<p>
						<strong>STRUCTURE :</strong>
							<?php foreach( $structures as $structure ): ?>
							<a href="<?php echo get_term_link($structure->term_id);?>">
							<?php echo esc_html($structure->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						
						<?php if($typedapps) :?>
						<p>
						<strong>TYPE DE SITE :</strong>
							<?php foreach( $typedapps as $typedapp ): ?>
							<a href="<?php echo get_term_link($typedapp->term_id);?>">
							<?php echo esc_html($typedapp->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						
						<?php if($app_taxo_server) { ?>
						<p><b>SERVEUR : </b><span><?php  foreach ( $app_taxo_server as $term ) {echo $term->name;}?></span></p>
						<?php } ?>

						<?php if($servers) :?>
						<p>
						<strong>SERVEUR :</strong>
							<?php foreach( $servers as $server ): ?>
							<a href="<?php echo get_term_link($server->term_id);?>">
							<?php echo esc_html($server->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>

						<!-- contact -->
						<?php if($contact_name) { ?>
						<p><b>Nom: </b><span><?php echo $contact_name; ?>	</span></p>
						<?php } ?>
						<?php if($contact_first_name) { ?>
						<p><b>Prénom: </b><span><?php echo $contact_first_name; ?>	</span></p>
						<?php } ?>
						<?php if($contact_mail) { ?>
						<p><b>Mail: </b><span><?php echo $contact_mail; ?></span></p>
						<?php } ?>
						<?php if($contact_phone) { ?>
						<p><b>Phone: </b><span><?php echo $contact_phone; ?></span></p>
						<?php } ?>
						<?php if($contact_structure) { ?>
						<p><b>Structure: </b><span><?php echo $contact_structure; ?></span></p>
						<?php } ?>

						<?php if($contact_img) { ?>
							<figure class="imgApp">
							<?php the_post_thumbnail(); ?>
							</figure>
						<?php } ?>

					</section>
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
						// if($app_contacts || $app_ldap_connect) {
						// 	echo '<section class="sedoo-project-section-urls">';
						// 	echo '<h2> URL </h2>';
						// }
						// if($app_contacts) {
						// 	echo '<a href="'.$app_contacts.'">'.__( 'Data access', 'sedoo-wppl-projects' ). '</a>';
						// }
						// if($app_ldap_connect) {
						// 	echo '<a href="'.$app_ldap_connect.'">'.__( 'Official website', 'sedoo-wppl-projects' ). '</a>';	
						// }

						// if($app_contacts || $app_ldap_connect) {	
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
	