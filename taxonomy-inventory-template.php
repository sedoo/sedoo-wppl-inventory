<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

$args = array(
    'numberposts' => -1,
    'post_type'   => 'sedoo_inventory_app',
    'tax_query' => array(
        array(
            'taxonomy' => get_queried_object()->taxonomy,
            'field' => 'id',
            'terms' => get_queried_object()->term_id 
        )
        )
);
// ACF fields backup
$app_backup_src = get_field('app_backup_sources_path');
$app_backup_data = get_field('app_backup_data_path');
$app_backup_local = get_field('app_backup_repertoire_local');
$app_backup_script = get_field('app_backup_script');
$app_backup_destination = get_field('app_backup_destination');
$app_backup_frequence = get_field('app_backup_frequence');
$app_backup_volume = get_field('app_backup_volume');

get_header();
?>

<?php 

// THIS FUNCTION IS USED TO DISPLAY PROJECTS IN TAXO PAGES
function sedoo_inventory_display_list_of_app($applications, $term) { ?>

    <!-- YOU ARE ON taxonomy-inventory-template.php -->
    <section class="post-wrapper sedoo_blocks_listearticle">

    <?php 
        foreach($applications as $application) {
        ?>
        <article id="post-<?php echo $application->ID; ?>" <?php post_class('post'); ?>>
            <a href="<?php echo get_the_permalink($application->ID); ?>"></a>
            <header class="entry-header">
                <figure>
					<?php
                    // if (has_post_thumbnail($application->ID)) {
                    //     echo get_the_post_thumbnail($application->ID);
                    // } else {
                    //     labs_by_sedoo_catch_that_image();                
                    // }
                    ?> 
					<img src="<?php echo get_field('app_feature_image_url', $application->ID);?>" alt="illustration">   
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
    <div class="taxonomy-template">

        <div id="content-area" class="wrapper-layout project-taxonomie-template archives">
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
				<!-- DISPLAY THE TAXONOMY LISTE -->

                <h1 class="page-title">
                    <?php echo get_queried_object()->name; ?>
                </h1>

                <!-- DISPLAY THE TAXONOMY LISTE -->
                <?php
                $applicationFilter = get_posts( $args );
                sedoo_inventory_display_list_of_app($applicationFilter, get_queried_object());
                ?>

            </main><!-- #main -->
            <aside class="contextual-sidebar project-sidebar contextual-inventory-sidebar">
                <?php
			// Get the taxonomy's terms
			$terms_Typedapp = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_type_app',
					'hide_empty' => false,
				)
			);
			$terms_structures = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_structure_app',
					'hide_empty' => false,
				)
			);
			$terms_instances = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_instance_app',
					'hide_empty' => false,
				)
			);
			$terms_servers = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_server_app',
					'hide_empty' => false,
				)
			);
			$terms_type_de_sites = get_terms(
				array(
					'taxonomy'   => 'sedoo_inventory_type_site',
					'hide_empty' => false,
				)
			);?>

			<section>
			<h2>Tous les types d'application</h2>
			<?php // Check if any term exists
			if ( ! empty( $terms_Typedapp ) && is_array( $terms_Typedapp ) ) {
				// Run a loop and print them all ?>
				<ul>
				<?php foreach ( $terms_Typedapp as $term_Typedapp ) { ?>
				<li> <a href="<?php echo esc_url( get_term_link( $term_Typedapp ) ) ?>">
						<?php echo $term_Typedapp->name; ?>
					</a></li><?php
				}?>
				</ul>
			<?php } ?>
			</section>
			<section>
				<h2>Toutes les structures</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_structures ) && is_array( $terms_structures ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_structures as $term_structure ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $term_structure ) ) ?>">
							<?php echo $term_structure->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
			<section>
				<h2>Toutes les instances</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_instances ) && is_array( $terms_instances ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_instances as $terms_instance ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $terms_instance ) ) ?>">
							<?php echo $terms_instance->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
			<section>
				<h2>Tous les servers</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_servers ) && is_array( $terms_servers ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_servers as $terms_server ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $terms_server ) ) ?>">
							<?php echo $terms_server->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
			<section>
				<h2>Tous les types de sites</h2>
				<?php // Check if any term exists
				if ( ! empty( $terms_type_de_sites ) && is_array( $terms_type_de_sites ) ) {
					// Run a loop and print them all ?>
					<ul>
					<?php foreach ( $terms_type_de_sites as $terms_type_de_site ) { ?>
					<li> <a href="<?php echo esc_url( get_term_link( $terms_type_de_site ) ) ?>">
							<?php echo $terms_type_de_site->name; ?>
						</a></li><?php
					}?>
					</ul>
				<?php } ?>
			</section>
            </aside>

        </div><!-- #primary -->

    </div>
<?php
get_footer();