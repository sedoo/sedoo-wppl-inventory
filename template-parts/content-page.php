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

$url_app = get_field('sedoo_inventory_url_app');
$url_backoff = get_field('sedoo_inventory_url_backoff');
$contact_app = get_field('sedoo_inventory_contact_app');
$ldap_connect = get_field('sedoo_inventory_ldap_connect');
$date_app = get_field('sedoo_inventory_date_app');
$password_app = get_field('sedoo_inventory_password_app');
$image_app = get_field('sedoo_inventory_image_app');
?>

<div id="primary" class="content-area project-content-page">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
						
						<h1><?php the_title(); ?></h1>
					
						<?php if($url_app) { ?>
						<p class="infoApptext"><b>URL: </b><span class="colorGrey"><a href="<?php echo $url_app; ?>" title="lien vers <?php echo $url_app; ?> "><?php echo $url_app; ?></a></span></p>
						<?php } ?>
						
						<?php if($url_backoff) { ?>
						<p class="infoApptext"><b>BACKOFFICE: </b><span class="colorGrey"><a href="<?php echo $url_backoff; ?>" title="lien vers <?php echo $url_backoff; ?>" ><?php echo $url_backoff; ?></a></span></p>
						<?php } ?>
						
						<?php if($contact_app) { ?>
						<p class="infoApptext"><b>CONTACT: </b><span class="colorGrey"><?php echo $contact_app; ?></span></p>
						<?php } ?>

						<?php if($date_app) { ?>
						<p class="infoApptext"><b>DATE: </b><span class="colorGrey"><?php echo $date_app; ?></span></p>
						<?php } ?>
						
						<?php if($password_app) { ?>
						<p class="infoApptext"><b>MOT DE PASSE: </b><span class="colorGrey"><?php echo $password_app; ?></span></p>
						<?php } ?>

						<?php if($image_app) { ?>
							<figure class="imgApp">
								<img src="<?php echo $image_app; ?>">
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
						// if($contact_app || $ldap_connect) {
						// 	echo '<section class="sedoo-project-section-urls">';
						// 	echo '<h2> URL </h2>';
						// }
						// if($contact_app) {
						// 	echo '<a href="'.$contact_app.'">'.__( 'Data access', 'sedoo-wppl-projects' ). '</a>';
						// }
						// if($ldap_connect) {
						// 	echo '<a href="'.$ldap_connect.'">'.__( 'Official website', 'sedoo-wppl-projects' ). '</a>';	
						// }

						// if($contact_app || $ldap_connect) {	
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
	