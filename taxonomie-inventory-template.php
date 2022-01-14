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

get_header();
?>

<?php 

// THIS FUNCTION IS USED TO DISPLAY PROJECTS IN TAXO PAGES
function sedoo_project_display_list_of_projects($projects, $term) { ?>
    <section class="post-wrapper sedoo_blocks_listearticle">
    <?php 
        foreach($projects as $projet) {
        ?>
        <article id="post-<?php echo $projet->ID; ?>" <?php post_class('post'); ?>>
            <a href="<?php echo get_the_permalink($projet->ID); ?>"></a>
            <header class="entry-header">
                <figure>
                    <?php 
                    if (has_post_thumbnail($projet->ID)) {
                        echo get_the_post_thumbnail($projet->ID);
                    } else {
                        labs_by_sedoo_catch_that_image();                
                    }
                    ?>          
                </figure>
            </header><!-- .entry-header -->
            <div class="group-content">
                <div class="entry-content">
                    <h3><?php echo get_the_title($projet->ID); ?></h3>
                    <p>
                    <?php 
                        echo get_the_excerpt($projet->ID); 								
                    ?></p>
                </div><!-- .entry-content -->
            </div>
        </article><!-- #post-->
        <?php 
        }
    ?>
    </section>
<?php 
}
?>

	<div id="content-area" class="wrapper project-taxonomie-template archives">
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
                <?php echo get_queried_object()->name; ?>
			</h1>
            <?php 
            
            ///////
            /// START MAIN PROJECTS
            $args = array(
				'numberposts' => -1,
				'post_type'   => $cpt_names_application,
                'tax_query' => array(
                    array(
                      'taxonomy' => get_queried_object()->taxonomy,
                      'field' => 'id',
                      'terms' => get_queried_object()->term_id // Where term_id of Term 1 is "1".
                    )
                  )
			);
			$mainprojects = get_posts( $args );
            sedoo_project_display_list_of_projects($mainprojects, get_queried_object());
			?>

           
            <?php 
            $args = array(
				'numberposts' => -1,
				'post_type'   => $cpt_names_application,
                'meta_query' => array(
                    array(
                        'key' => 'sedoo_project_type_of_project',
                        'value' => 'secondaire',
                    )
                ),
                'tax_query' => array(
                    array(
                      'taxonomy' => get_queried_object()->taxonomy,
                      'field' => 'id',
                      'terms' => get_queried_object()->term_id // Where term_id of Term 1 is "1".
                    )
                ),
                'meta_key'			=> 'date_de_debut',
                'orderby' => array(
                    'meta_value' => 'DESC',
                    'title' => 'ASC',
                )
			);

            /// END MAIN PROJECTS
            ///////

            ///////
            /// SHOW SIDE PROJECTS
			$sideprojects = get_posts( $args );
            if($sideprojects) {
                ?>
                <h2> <?php echo get_field('label_others_projects', 'options'); ?> </h2>
                <table class="taxo_project_table">
                    <tbody>
                        <tr>
                            <th><?php echo __( 'Name', 'sedoo-wppl-projects' ); ?></th>
                            <th><?php echo __( 'Description', 'sedoo-wppl-projects' ); ?></th>
                            <th><?php echo __( 'Start date', 'sedoo-wppl-projects' ); ?></th>
                            <th><?php echo __( 'End date', 'sedoo-wppl-projects' ); ?></th>
                            <th><?php echo __( 'Data access', 'sedoo-wppl-projects' ); ?></th>
                        </tr>
                        <?php 
                            foreach($sideprojects as $projet) {
                        ?>
                        <tr>
                            <td>
                                <?php 
                                echo '<a class="tab_project_tooltip" href="'.get_permalink($projet->ID).'">'.$projet->post_title.'</a>'; 
                                if(get_field('sedoo_project_nom_long' , $projet->ID)) { 
                                ?>
                                    <span> <?php echo get_field('sedoo_project_nom_long' , $projet->ID); ?> </span>
                                <?php 
                                }  
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if(get_the_excerpt($projet->ID)) {
                                        echo get_the_excerpt($projet->ID);
                                    } else {
                                        if(get_field('sedoo_project_nom_long' , $projet->ID)) { 
                                            echo get_field('sedoo_project_nom_long' , $projet->ID); 
                                        } else { echo '-'; } 
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                if(get_field('date_de_debut' , $projet->ID)) { 
                                    echo get_field('date_de_debut' , $projet->ID); 
                                } else { echo '-'; } 
                                ?>
                            </td>
                            <td>
                                <?php 
                                if(get_field('date_de_fin' , $projet->ID)) { 
                                    echo get_field('date_de_fin' , $projet->ID);
                                } else {
                                    echo '-';
                                }
                                ?>
                            </td>
                            <td class="text-center"><?php if(get_field('sedoo_project_url_project_mission' , $projet->ID)) { echo '<a href="'.get_field('sedoo_project_url_project_mission' , $projet->ID).'"><span class="dashicons dashicons-admin-links"></span></a>'; } else { echo '-'; } ?></td>
                        </tr>
                        <?php 
                        }
                        ?>
                        
                    </tbody>
                </table>
            <?php } ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();