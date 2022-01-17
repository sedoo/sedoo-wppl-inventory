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
    'post_type'   => $cpt_names_application,
    'tax_query' => array(
        array(
            'taxonomy' => get_queried_object()->taxonomy,
            'field' => 'id',
            'terms' => get_queried_object()->term_id 
        )
        )
);

		
get_header();
?>

<?php 

// THIS FUNCTION IS USED TO DISPLAY PROJECTS IN TAXO PAGES
function sedoo_project_display_list_of_projects($applications, $term) { ?>

    <!-- YOU ARE ON TAXONOMIE-INVENTORY-TEMPLATE.PHP -->
    <section class="post-wrapper sedoo_blocks_listearticle">

    <?php 
        foreach($applications as $application) {
        ?>
        <article id="post-<?php echo $application->ID; ?>" <?php post_class('post'); ?>>
            <a href="<?php echo get_the_permalink($application->ID); ?>"></a>
            <header class="entry-header">
                <figure>
                    <?php 
                    if (has_post_thumbnail($application->ID)) {
                        echo get_the_post_thumbnail($application->ID);
                    } else {
                        labs_by_sedoo_catch_that_image();                
                    }
                    ?>          
                </figure>
            </header><!-- .entry-header -->
            <div class="group-content">
                <div class="entry-content">
                    <h3><?php echo get_the_title($application->ID); ?></h3>
                    <p>
                    <?php 
                        echo get_the_excerpt($application->ID); 								
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

            <!-- DISPLAY THE TAXONOMY LISTE -->
            <?php
            $applicationFilter = get_posts( $args );
            sedoo_project_display_list_of_projects($applicationFilter, get_queried_object());
            ?>

		</main><!-- #main -->
      

        <?php ?>

    


	</div><!-- #primary -->

<?php
get_footer();