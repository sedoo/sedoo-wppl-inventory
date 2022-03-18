<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package labs_by_Sedoo
 */

// custom taxonomy varaibles
$taxo_names_instance = 'sedoo_inventory_instance_app';
$taxo_names_structure = 'sedoo_inventory_structure_app';
$taxo_names_server = 'sedoo_inventory_server_app';
$taxo_names_type_dapp = 'sedoo_inventory_type_app';
$taxo_names_type_site = 'sedoo_inventory_type_site';

//  custom post typ variables
$cpt_names_application = 'sedoo_inventory_app';
$cpt_names_contact = 'sedoo_invent_contact';

//Les fields ACF Sigle application

// ACF fields information
$app_url = get_field('sedoo_inventory_url_app');
$app_url_backoff = get_field('sedoo_inventory_url_backoff');
$app_proxy = get_field('app_proxy');
$app_contacts = get_field('sedoo_inventory_bidirectionnal_relation');
$app_date = get_field('sedoo_inventory_date_app');

// ACF fields connectivité
$app_password = get_field('sedoo_inventory_password_app');
$app_ldap_connect = get_field('sedoo_inventory_ldap_connect');

// ACF fields backup
$app_backup_src = get_field('app_backup_sources_path');
$app_backup_data = get_field('app_backup_data_path');
$app_backup_local = get_field('app_backup_repertoire_local');
$app_backup_script = get_field('app_backup_script');
$app_backup_destination = get_field('app_backup_destination');
$app_backup_frequence = get_field('app_backup_frequence');
$app_backup_volume = get_field('app_backup_volume');

// ACF fields documentation
$app_documentation_url = get_field('app_doc_url');
$app_documentation_fichier = get_field('app_doc_fichier');

// ACF fields Sigle contact
$contact_name = get_field('inventory_contact_name');
$contact_first_name = get_field('inventory_contact_first_name');
$contact_mail = get_field('inventory_contact_mail');
$contact_phone = get_field('inventory_contact_phone');
$contact_img = get_the_post_thumbnail_url();

// Taxonomy terms for application
$instances = get_the_terms( get_the_ID(), $taxo_names_instance );
$servers = get_the_terms( get_the_ID(), $taxo_names_server );
$structures = get_the_terms( get_the_ID(), $taxo_names_structure );
$typedapps = get_the_terms( get_the_ID(), $taxo_names_type_dapp );
$typedesites = get_the_terms( get_the_ID(), $taxo_names_type_site );

// Bidirectionnel field
$teams = get_field( 'field_61d72296b3bea' );
?>
 
<div id="primary" class="content-area inventory-single-content-page">
        <div class="wrapper-layout">    
            <main id="main" class="site-main">
                <article id="post-<?php the_ID();?>">	
                    <header>
					<!-- Display title  -->
   					<h1>
						<?php 
						$title = get_the_title();
						$title = mb_strimwidth($title, 0, 60, '...');
						echo $title;
						?>
					</h1>

                    <section>
                        <?php the_content(); ?>
                    </section>

					<section class="inventoryInfoContener">
						
						<!-- CPT CONTACT -->

						<?php if ( get_post_type( get_the_ID() ) == 'sedoo_invent_contact' ) : ?>

							<!-- CONTACT -->
							<?php if($contact_img) { ?>
							<img class="contactImg" src="<?php echo $contact_img; ?>"/>
							<?php }?>
							<?php if($contact_name) { ?>
							<p><strong>NOM : </strong><span><?php echo $contact_name; ?>	</span></p>
							<?php } ?>
							<?php if($contact_first_name) { ?>
							<p><strong>PRÉNOM : </strong><span><?php echo $contact_first_name; ?>	</span></p>
							<?php } ?>
							<?php if($contact_mail) { ?>
							<p><strong>MAIL : </strong>
								<span>
								<?php 
								$userMail = explode("@", $contact_mail); 
								echo $userMail[0]."<span class=\"hideEmail\">Dear bot, you won't get my mail address</span>@<span class=\"hideEmail\">and my domain...</span>".$userMail[1];
								?>
								</span>
							</p>
							<?php } ?>
							<?php if($contact_phone) { ?>
							<p><strong>TÉLÉPHONE : </strong><span><?php echo $contact_phone; ?></span></p>
							<?php } ?>

						<?php endif; ?>
						<!-- end cpt contact -->	
						<!-- CPT APPLICATION -->
						<?php if ( get_post_type( get_the_ID() ) == 'sedoo_inventory_app' ) : ?>
							<?php if($app_url || $app_url_backoff || $app_contacts || $app_date || $app_password || $app_ldap_connect || $instances || $structures || $typedapps || $typedesites || $servers ) : ?>
								<?php
								/******************************************************************************************* */
								if( is_user_logged_in() ) {
									
								?>
								<section data-role="private">
									<h3>INFORMATION</h3>
									<!---->
									<?php if($app_url) { ?>
									<p><b>URL : </b><span><a href="<?php echo $app_url; ?>" title="lien vers <?php echo $app_url; ?> "><?php echo $app_url; ?></a></span></p>
									<?php } ?>
									<!---->
									<?php if($app_url_backoff) { ?>
									<p><b>BACKOFFICE : </b><span><a href="<?php echo $app_url_backoff; ?>" title="lien vers <?php echo $app_url_backoff; ?>" ><?php echo $app_url_backoff; ?></a></span></p>
									<?php } ?>

									<!---->
									<?php if($app_proxy) { ?>
									<p><b>PROXY : </b><span><?php echo $app_proxy; ?></span></p>
									<?php } ?>

									<!---->
									<?php if($structures) {?>
									<p>
									<strong>STRUCTURE :</strong>
										<?php foreach( $structures as $structure ){ ?>
										<a href="<?php echo get_term_link($structure->term_id);?>">
										<?php echo esc_html($structure->name); ?>
										</a> &nbsp;
										<?php } ?>
									</p>
									<?php } ?>

									<?php if($app_contacts || $app_url_backoff ) :?>
									<p>
									<strong>CONTACT :</strong>
										<?php foreach( $app_contacts as $app_contact ): ?>
										<a href="<?php echo get_permalink($app_contact->ID);?>">
										<?php echo get_the_title($app_contact->ID); ?>
										</a> &nbsp;<?php endforeach; ?>								
									</p>
									<?php endif; ?>
									<?php if($app_date) : ?>
									<p><b>DATE DE PREMIERE MISE EN LIGNE : </b><span><?php echo $app_date; ?></span></p>
									<?php endif; ?>
									
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
									<?php if($app_ldap_connect || $app_password) : ?>
									<div class="accordion">
										<h3>CONNECTIVITÉ</h3>
									</div>
									<!---->
									<div class="panel">
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
									</div>
								<?php endif; ?>

								<!-- BACKUP -->
								<?php if($app_backup_src || $app_backup_src || $app_backup_data || $app_backup_local || $app_backup_script || $app_backup_destination || $app_backup_frequence || $app_backup_volume ) : ?>
									
									<div class="accordion ">
										<h3>BACKUP</h3>
									</div>

									<div class="panel">

										<?php if($app_backup_src) : ?>
										<p><b>BACKUP SOURCE : </b><span><a href="<?php echo $app_backup_src; ?>" title="lien vers <?php echo $app_backup_src; ?>" ><?php echo $app_backup_src; ?></a></span></p>
										<?php endif; ?>

										<?php if($app_backup_data) : ?>
										<p><b>BACKUP DATA : </b><span><a href="<?php echo $app_backup_data; ?>" title="lien vers <?php echo $app_backup_data; ?>" ><?php echo $app_backup_data; ?></a></span></p>
										<?php endif; ?>

										<?php if($app_backup_local) : ?>
										<p><b>BACKUP LOCAL : </b><span><a href="<?php echo $app_backup_local; ?>" title="lien vers <?php echo $app_backup_local; ?>" ><?php echo $app_backup_local; ?></a></span></p>
										<?php endif; ?>

										<?php if($app_backup_script) : ?>
										<p><b>BACKUP SCRIPT : </b><span><?php echo $app_backup_script; ?></span></p>
										<?php endif; ?>

										<?php if($app_backup_destination) : ?>
										<p><b>BACKUP DESTINATION : </b><span><a href="<?php echo $app_backup_destination; ?>" title="lien vers <?php echo $app_backup_destination; ?>" ><?php echo $app_backup_destination; ?></a></span></p>
										<?php endif; ?>

										<?php if($app_backup_frequence) : ?>
										<p><b>BACKUP FRÉQUENCE : </b><span><?php echo $app_backup_frequence; ?></span></p>
										<?php endif; ?>

										<?php if($app_backup_volume) : ?>
										<p><b>BACKUP VOLUME : </b><span><?php echo $app_backup_volume; ?></span></p>
										<?php endif; ?>
										
									</div>

								<?php endif; ?>
								<?php if($app_documentation_url || $app_documentation_fichier) : ?>

									<div class="accordion">
									<h3>DOCUMENTATION</h3>
									</div>

									<div class="panel">
									<?php if($app_documentation_url) : ?>
									<p><b>DOCUMENTATION URL : </b><span><a href="<?php echo $app_documentation_url; ?>" title="lien vers <?php echo $app_documentation_url; ?>" ><?php echo $app_documentation_url; ?></a></span></p>
									<?php endif; ?>

									<?php if($app_documentation_fichier) : ?>
									<p><b>DOCUMENTATION FICHIER : </b><span><a href="<?php echo $app_documentation_fichier; ?>" title="lien vers <?php echo $app_documentation_fichier; ?>" ><?php echo $app_documentation_fichier; ?></a></span></p>
									<?php endif; ?>
									</div>
								<?php endif; ?>


								</section>

								<?php
								}
								/******************************************************************************************* */
								?>


							<?php endif; ?>
							

						<?php endif; ?>
						
					</section>					
				</article>
            
			</main><!-- #main -->

				<aside class="contextual-sidebar project-sidebar contextual-inventory-sidebar">
					<!-- ASIDE FOR CPT APPLICATION -->			
					<?php if ( get_post_type( get_the_ID() ) == 'sedoo_inventory_app' ) : ?>
						<?php if($app_url || $app_url_backoff) {?>
						<section>
							<h2>URL :</h2>
							<p><strong>Site web :</strong><a href="<?php echo $app_url; ?>" title="lien vers <?php echo $app_url; ?> "><?php echo $app_url; ?></a></p>
							<p><strong>Administration :</strong> <a href="<?php echo $app_url_backoff; ?>" title="lien vers <?php echo $app_url_backoff; ?>" ><?php echo $app_url_backoff; ?></a></p>
							</p>
						</section>
						<?php } ?>
						<?php if($app_contacts) { ?>
						<section>
							<h2> CONTACT(S)</h2>
							<ul>
								<?php foreach( $app_contacts as $app_contact ){ ?>
								<li>
									<a href="<?php echo get_permalink($app_contact->ID);?>"><?php echo get_the_title($app_contact->ID); ?></a> 
								</li>
								<?php } ?>
							</p>
						</section>
						<?php }

						if($app_date) : ?>
						<section>
							<h2> DATE DE MISE EN LIGNE</h2>
							<p><?php echo $app_date; ?></p>
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

						
						<?php endif; ?>
						<!-- end aside cpt application -->

						<!-- ASIDE FOR CPT CONTACT -->			
						<?php if ( get_post_type( get_the_ID() ) == 'sedoo_invent_contact' ) : ?>
						
						<h2>LES APPLICATIONS GÉRÉE PAR <?php $title = get_the_title(); $title = mb_strimwidth($title, 0, 60, '...'); echo $title; ?></h2>
						<ul>
						<?php 
						foreach ( $teams as $team) {
						?>
							<li>
								<a href="<?php echo esc_url( get_permalink($team -> ID) );?>" title="<?php echo $team -> post_title;?>">
								<?php echo $team -> post_title;?></a>
							</li>
						<?php
						}
						?>	
						</ul>
						<?php endif; ?>
				</aside>
			<?php
		?>
		</div>
	</div>
	