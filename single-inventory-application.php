<?php
/**
 * template for Research Teams CPT (show post / platform associate by theme taxonomy)
*/

get_header(); ?>

<?php

while ( have_posts() ) : the_post();
?>

<!-- L'AFFICHAGE COMMENCE ICI - INVENTORY APP -->
<?php
if (function_exists('sedoo_wpth_labs_test_if_post_thumbnail_and_display')) {
sedoo_wpth_labs_test_if_post_thumbnail_and_display();
}
// Show title first on mobile
if ((get_field( 'table_content' )) && (function_exists('sedoo_wpth_labs_display_title_on_top_on_mobile'))) {
   sedoo_wpth_labs_display_title_on_top_on_mobile();
}
?>
<div class="single-post single-sedoo-wppl-project">
   <?php // table_content ( value ) 
   if ((get_field( 'table_content' )) && (function_exists('sedoo_wpth_labs_display_sommaire'))) {
      sedoo_wpth_labs_display_sommaire('Sommaire');
   } 

    // sedoo_labtools_show_categories($themes, $themeSlugRewrite);
   include( 'template-parts/content-page.php' );
?>
</div>
<?php 
endwhile; 
get_footer();
