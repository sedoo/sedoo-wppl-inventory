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


//Les fields ACF Sigle application
$app_url = get_field('sedoo_inventory_url_app');
$app_url_backoff = get_field('sedoo_inventory_url_backoff');
$app_contacts = get_field('sedoo_inventory_contact_app');
$app_ldap_connect = get_field('sedoo_inventory_ldap_connect');
$app_date = get_field('sedoo_inventory_date_app');
$app_password = get_field('sedoo_inventory_password_app');
$app_image = get_field('sedoo_inventory_image_app');
$app_structures = get_field('sedoo_inventory_structure_app');

//Les fields ACF Sigle contact
$contact_name = get_field('inventory_contact_name');
$contact_first_name = get_field('inventory_contact_first_name');
$contact_mail = get_field('inventory_contact_mail');
$contact_phone = get_field('inventory_contact_phone');
$contact_structures = get_field('inventory_contact_structure');
$contact_img = get_the_post_thumbnail_url();

//Les taxonomy pour filtrer les applications
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
						
						<?php if($app_structures) :?>
						<p>
						<strong>STRUCTURE :</strong>
							<?php foreach( $app_structures as $app_structure ): ?>
							<a href="<?php echo get_permalink($app_structure->ID);?>">
							<?php echo get_the_title($app_structure->ID); ?>
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
						
						<?php if($app_taxo_server) : ?>
						<p><b>SERVEUR : </b><span><?php  foreach ( $app_taxo_server as $term ) {echo $term->name;}?></span></p>
						<?php endif ; ?>
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
						<?php if($contact_structures) :?>
						<p>
						<strong>STRUCTURE :</strong>
							<?php foreach( $contact_structures as $contact_structure ): ?>
							<a href="<?php echo get_permalink($contact_structure->ID);?>">
							<?php echo get_the_title($contact_structure->ID); ?>
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
	