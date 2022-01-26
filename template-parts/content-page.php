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
global $taxo_names_type_site;

//Les fields ACF Sigle application
$app_url = get_field('sedoo_inventory_url_app');
$app_url_backoff = get_field('sedoo_inventory_url_backoff');
$app_contacts = get_field('inventory_contact_bidirectional_acf_update_value');
$app_ldap_connect = get_field('sedoo_inventory_ldap_connect');
$app_date = get_field('sedoo_inventory_date_app');
$app_password = get_field('sedoo_inventory_password_app');
$app_image = get_field('sedoo_inventory_image_app');

//Les fields ACF Sigle contact
$contact_name = get_field('inventory_contact_name');
$contact_first_name = get_field('inventory_contact_first_name');
$contact_mail = get_field('inventory_contact_mail');
$contact_phone = get_field('inventory_contact_phone');
$contact_img = get_the_post_thumbnail_url();

//Les taxonomy pour filtrer les applications
$instances = get_the_terms( get_the_ID(), $taxo_names_instance );
$servers = get_the_terms( get_the_ID(), $taxo_names_server );
$structures = get_the_terms( get_the_ID(), $taxo_names_structure );
$typedapps = get_the_terms( get_the_ID(), $taxo_names_type_dapp );
$typedesites = get_the_terms( get_the_ID(), $taxo_names_type_site );
?>

<div id="primary" class="content-area inventory-single-content-page">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>

					<!-- Display title for Application only -->
					
					<h1>
						<?php 
						$title = get_the_title();
						$title = mb_strimwidth($title, 0, 60, '...');
						echo $title;
						?>
					</h1> 
					<!-- Display title for contact only -->

					<section class="inventoryInfoContener">
						<!-- CONTACT -->
						<?php if($contact_img) { ?>
						<img class="contactImg" src="<?php echo $contact_img; ?>"/>
						<?php }?>
						<?php if($contact_name) { ?>
						<p><b>NOM : </b><span><?php echo $contact_name; ?>	</span></p>
						<?php } ?>
						<?php if($contact_first_name) { ?>
						<p><b>PRÉNOM : </b><span><?php echo $contact_first_name; ?>	</span></p>
						<?php } ?>
						<?php if($contact_mail) { ?>
						<p><b>MAIL : </b><span><?php echo $contact_mail; ?></span></p>
						<?php } ?>
						<?php if($contact_phone) { ?>
						<p><b>TÉLÉPHONE : </b><span><?php echo $contact_phone; ?></span></p>
						<?php } ?>

						<!-- APPLICATION (structure pour contact aussi)-->
						<!---->
						<?php if($app_url) : ?>
						<p><b>URL : </b><span><a href="<?php echo $app_url; ?>" title="lien vers <?php echo $app_url; ?> "><?php echo $app_url; ?></a></span></p>
						<?php endif; ?>
						<!---->
						<?php if($app_url_backoff) : ?>
						<p><b>BACKOFFICE : </b><span><a href="<?php echo $app_url_backoff; ?>" title="lien vers <?php echo $app_url_backoff; ?>" ><?php echo $app_url_backoff; ?></a></span></p>
						<?php endif; ?>
						<!---->
						<?php if($app_contacts) :?>
						<p>
						<strong>CONTACT :</strong>
							<?php foreach( $app_contacts as $app_contact ): ?>
							<a href="<?php echo get_permalink($app_contact->ID);?>">
							<?php echo get_the_title($app_contact->ID); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						<!---->
						<?php if($app_date) : ?>
						<p><b>DATE DE PREMIERE MISE EN LIGNE : </b><span><?php echo $app_date; ?></span></p>
						<?php endif; ?>
						<!---->
						<?php if($app_password) : ?>
						<p><b>MOT DE PASSE : </b><span><?php echo $app_password; ?></span></p>
						<?php endif; ?>
						<!---->
						<?php if($app_ldap_connect) : ?>
           				 <p><b>LDAP :</b>
						<?php if ($app_ldap_connect == 1) : ?> 
						Connecté au LDAP <?php else : ?> Non Connecté au LDAP <?php endif; ?>
						<?php endif; ?>
						</p>
						<!---->
						<?php if($instances) :?>
						<p>
						<strong>INSTANCE :</strong>
							<?php foreach( $instances as $instance ): ?>
							<a href="<?php echo get_term_link($instance->term_id);?>">
							<?php echo esc_html($instance->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						<!---->
						<?php if($structures) :?>
						<p>
						<strong>STRUCTURE :</strong>
							<?php foreach( $structures as $structure ): ?>
							<a href="<?php echo get_term_link($structure->term_id);?>">
							<?php echo esc_html($structure->name); ?>
							</a> &nbsp;<?php endforeach; ?>
							</p>
						<?php endif; ?>
						
						<!---->
						<?php if($typedapps) :?>
						<p>
						<strong>TYPE D'APPLICATION :</strong>
							<?php foreach( $typedapps as $typedapp ): ?>
							<a href="<?php echo get_term_link($typedapp->term_id);?>">
							<?php echo esc_html($typedapp->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						<!---->
						<?php if($typedesites) :?>
						<p>
						<strong>TYPE DE SITE :</strong>
							<?php foreach( $typedesites as $typedesite ): ?>
							<a href="<?php echo get_term_link($typedesite->term_id);?>">
							<?php echo esc_html($typedesite->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>
						<!---->
						<?php if($servers) :?>
						<p>
						<strong>SERVEUR :</strong>
							<?php foreach( $servers as $server ): ?>
							<a href="<?php echo get_term_link($server->term_id);?>">
							<?php echo esc_html($server->name); ?>
							</a> &nbsp;<?php endforeach; ?>
						<?php endif; ?>
						</p>


					</section>
                    <section>
                        <?php the_content(); ?>
                    </section>
              
                    <footer class="">
                        
                    </footer>
					
				</article>
            
			</main><!-- #main -->

				<aside class="contextual-sidebar project-sidebar contextual-inventory-sidebar">
				
							
					<section class="sedoo-project-section-date">
					
					</section>
					<?php 
						if($app_contacts) : ?>
						<section>
							<h2> CONTACT(S)</h2>
							<p>
								<?php foreach( $app_contacts as $app_contact ): ?>
								<a href="<?php echo get_permalink($app_contact->ID);?>">
								<?php echo get_the_title($app_contact->ID); ?>
								</a> &nbsp;<?php endforeach; ?>
							</p>
						</section>
						<?php endif;

						if($app_date) : ?>
						<section>
							<h2> DATE DE MISE EN LIGNE</h2>
							<p><?php echo $app_date; ?></p>
						</section>
						<?php endif; ?>
						
						<?php if($typedapps) :?>
							<section>
						<h2>TYPE DE SITE :</h2>
						<p>
							<?php foreach( $typedapps as $typedapp ): ?>
							<a href="<?php echo get_term_link($typedapp->term_id);?>">
							<?php echo esc_html($typedapp->name); ?>
							
							</a> &nbsp;<?php endforeach; ?>
						</p>
							</section>
						<?php endif; ?>
						</p>

						<?php if($structures) :?>
						<section>
							<h2>STRUCTURE :</h2>
							<p><?php foreach( $structures as $structure ): ?>
								<a href="<?php echo get_term_link($structure->term_id);?>">
								<?php echo esc_html($structure->name); ?>
								</a> &nbsp;<?php endforeach; ?>
							</p>
						</section>
						<?php endif; ?>

						<?php if($app_url || $app_url_backoff) :?>
						<section>
							<h2>URL :</h2>
								<p>Site internet :<span><a href="<?php echo $app_url; ?>" title="lien vers <?php echo $app_url; ?> "><?php echo $app_url; ?></a></span><br/>
								Back-Office :<span><a href="<?php echo $app_url_backoff; ?>" title="lien vers <?php echo $app_url_backoff; ?>" ><?php echo $app_url_backoff; ?></a></span></p>
							</p>
						</section>
						<?php endif; ?>
				
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
	