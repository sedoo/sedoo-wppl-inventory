<?php get_header(); ?>

<?php 
query_posts( 'posts_per_page=5' );

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

<main class="flexRow"> 
  
  <div class="inventory flexRow flexWrap padding100 bgColorDarkModeMain">
    <?php if (have_posts()) : ?>
  
      <?php while (have_posts()) : the_post(); ?>
  
        <article class="projet flip-card alignCenter w400px margin10 borderSolid3px">
       
        <div class="flip-card-inner">
          <!-- front -->
          <div class="flip-card-front  alignLeft padding20 borderBox">
            <?php the_post_thumbnail( 'thumbnail' ); ?>
    
            <h1 class="title">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h1>
            <!-- Affichage des Custom Taxonomy -->

            <!-- Affichage des Custom fields -->
            <?php if($app_image) { ?>
            <img class="w100 inlineBlockMid" src="<?php echo $app_image; ?>" />
            <?php } ?>
            <?php if($app_url) { ?> 
            <span class="inlineBlockMid"><b>URL:</b> <?php echo $app_url; ?></span>
            <?php } ?>
            <?php if($app_url_backoff) { ?>
            <span class="inlineBlockMid"><b>BACKOFF:</b> <?php echo $app_url_backoff; ?></span>
            <?php } ?>
            <?php if($app_contact) { ?>
            <span class="inlineBlockMid"><b>CONTACT:</b><?php echo $app_contact; ?></span>
            <?php } ?>
            <?php if($app_ldap_connect) { ?>
            <span class="inlineBlockMid"><b>LDAP:</b><?php if ($app_ldap_connect == 1) : ?> Connecté au LDAP <?php else : ?> Non Connecté au LDAP <?php endif; ?>
            <?php } ?>

            <!-- resume -->
            <p><?php the_field('resume'); ?></p>
            </div>
          <!-- back -->
          <div class="flip-card-back  padding20 borderBox"> 
            <!-- contenu loop  -->
            <div class="content">
            <?php echo excerpt(10); ?>
            </div>

            <div class="btnStand relative top10px bgColorWhite colorBlack"> <a class="bgColorWhite colorBlack" href="<?php the_permalink(); ?>">Voir le projet</a></div>
          </div>
        </div>
        </article> 
  
      <?php endwhile;
      
      wp_reset_query();

      ?>
    <?php endif; ?>
  </div><!--
      --><div class="sidebar w30 sideBarOff">
  
          <?php get_sidebar(); ?>
  
      </div>
</main>
<style>
  .sideBarOff{
    display:none;
  }
  .sideBarOn{
    display:block;
  }
</style>
<?php get_footer(); ?>