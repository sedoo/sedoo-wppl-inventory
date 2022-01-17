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
    <!-- YOU ARE ON TAXONOMIE-INVENTORY-TEMPLATE.PHP -->
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
                'tax_query' => array(
                    array(
                      'taxonomy' => get_queried_object()->taxonomy,
                      'field' => 'id',
                      'terms' => get_queried_object()->term_id // Where term_id of Term 1 is "1".
                    )
                ),
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
            if($sideprojects) :
                ?>
           <?php endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();