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

$nom_long = get_field('sedoo_project_nom_long');
$site_web = get_field('sedoo_project_site_du_projet');
$url_data_access = get_field('sedoo_project_url_data_access');
$url_project_mission = get_field('sedoo_project_url_project_mission');
$logo_url = get_field('sedoo_project_logo');
?>

<div id="primary" class="content-area project-content-page">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
						<div>
							<h1><?php the_title(); ?></h1>
							<span>  <?php echo $nom_long; ?></span>
							<div>
								<a title="<?php echo __( 'Project website', 'sedoo-wppl-projects' ); ?>" target="_blank" href=" <?php echo $site_web; ?>"> <?php echo $site_web; ?> </a>
							</div>
						</div>

						<?php if($logo_url) { ?>
							<figure>
								<img src="<?php echo $logo_url; ?>">
							</figure>
						<?php } ?>
	                </header>
                    <section>
                        <?php the_content(); ?>
                    </section>
                    <?php if (get_field("sources")){ ?>
                    <footer class="sources">
                        <h2><?php echo __('Sources', 'sedoo-wpth-labs'); ?> :</h2>
                        <p><?php the_field("sources") ?></p>
                    </footer>
                    <?php } ?>
                </article>
            </main><!-- #main -->
			
			<?php 
				$thematiques = get_the_terms( get_the_ID(), $taxo_names_thematiques );
				$liste_offres = get_the_terms( get_the_ID(), $taxo_names_offre_services);
				$liste_typologies = get_the_terms( get_the_ID(), $taxo_names_typologie );
			if(($thematiques == NULL) && ($liste_offres == NULL) && ($liste_typologies == NULL)) {}
			else {
			?>

				<aside class="contextual-sidebar project-sidebar">
					<section class="sedoo-project-section-date">
					<?php 
						$start_date = get_field('date_de_debut');
						$end_date = get_field('date_de_fin');

						if($start_date > date('d/m/Y') || !$start_date) { 
							// if project no started yed
							echo '<p class="proj_status com_up"> '.__( 'Upcoming', 'sedoo-wppl-projects' ). '</p>'; 
						}
						elseif(!$end_date || $end_date > date('d/m/Y')) { 
							// if project has no end date or if project is not finished yet
							echo '<p class="proj_status ongoing"> '.__( 'On going', 'sedoo-wppl-projects' ). '</p>'; 
						}
						elseif($end_date < date('d/m/Y')) {
							// if en date is passed
							echo '<p class="proj_status finish"> '.__( 'Finish', 'sedoo-wppl-projects' ). '</p>';
						}

						if($start_date) {
							echo '<h2> '.__( 'Project dates', 'sedoo-wppl-projects' ). '</h2>';
							echo '<div>';
							if($end_date) { // in french : de
								echo '<p> '.__( 'From', 'sedoo-wppl-projects' ). ' '.$start_date;
							} 
							else { // in french : depuis
								echo '<p> '.__( 'Since', 'sedoo-wppl-projects' ). ' '.$start_date;
							} 
							if($end_date) {
								echo ' '.__( 'to', 'sedoo-wppl-projects' ). ' '.$end_date;
							} 
							echo '</p></div>';
						}
					?>
				</section>
					<?php 
						if($url_data_access || $url_project_mission) {
							echo '<section class="sedoo-project-section-urls">';
							echo '<h2> URL </h2>';
						}
						if($url_data_access) {
							echo '<a href="'.$url_data_access.'">'.__( 'Data access', 'sedoo-wppl-projects' ). '</a>';
						}
						if($url_project_mission) {
							echo '<a href="'.$url_project_mission.'">'.__( 'Official website', 'sedoo-wppl-projects' ). '</a>';	
						}

						if($url_data_access || $url_project_mission) {	
							echo '</section>';
						}
					?>
					<?php 
						if($thematiques) {
							echo '<section class="sedoo-project-section-themes">';
							echo '<h2> '.__( 'Project themes', 'sedoo-wppl-projects' ). ' </h2>';
							echo '<div class="tag">';
							foreach($thematiques as $thematique) {
								echo '<a href="'.get_term_link($thematique->term_id).'">'.esc_html($thematique->name).'</a>';   
							}
							echo '</div></section>';
						}
					?>
					<?php 
						if($liste_offres) {
							echo '<section class="sedoo-project-section-services">';
							echo '<h2> '.__( 'Project services', 'sedoo-wppl-projects' ). '</h2>';
							echo '<div class="tag">';
							foreach($liste_offres as $offre) {
								echo '<a href="'.get_term_link($offre->term_id).'">'.esc_html($offre->name).'</a>';   
							}
							echo '</div></section>';
						}
					?>
					<?php 
						if($liste_typologies) {
							echo '<section class="sedoo-project-section-typologies">';
							echo '<h2> '.__( 'Project typology', 'sedoo-wppl-projects' ). ' </h2>';
							echo '<div class="tag">';
							foreach($liste_typologies as $typlogies) {
								echo '<a href="'.get_term_link($typlogies->term_id).'">'.esc_html($typlogies->name).'</a>';   
							}
							echo '</div></section>';
						}
					?>
				
					<?php 
						$linked_project = get_field('sedoo_projects_projets_en_relation');
						if($linked_project) {
							echo '<section class="sedoo-project-section-related-projects">';
							echo '<h2> '.__( 'Related project', 'sedoo-wppl-projects' ). '</h2>';
							echo '<ul>';
							foreach($linked_project as $project) {
								echo '<li><a href="'.get_permalink($project->ID).'">'.$project->post_title.'</a></li>';
							}
							echo '</ul></section>';
						}
					?>
				</aside>
			<?php
			}
		?>
		</div>
	</div>
	