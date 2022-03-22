<?php 
/**
 * BIDIRECTIONNAL RELATIONSHIP
 * source : https://www.advancedcustomfields.com/resources/bidirectional-relationships/
 * 
 * 
 */

function inventory_contact_bidirectional_acf_update_value( $value, $post_id, $field  ) {
	
	// vars
	$field_name = $field['name'];
	$field_key = $field['key'];
	$global_name = 'is_updating_' . $field_name;
		
	// bail early if this filter was triggered from the update_field() function called within the loop below
	// - this prevents an inifinte loop
	if( !empty($GLOBALS[ $global_name ]) ) return $value;	
	
	// set global variable to avoid inifite loop
	// - could also remove_filter() then add_filter() again, but this is simpler
	$GLOBALS[ $global_name ] = 1;	
	
	// loop over selected posts and add this $post_id
	if( is_array($value) ) {
	
		foreach( $value as $post_id2 ) {
			
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			
			// allow for selected posts to not contain a value
			if( empty($value2) ) {				
				$value2 = array();				
			}
			
			// bail early if the current $post_id is already found in selected post's $value2
			if( in_array($post_id, $value2) ) continue;			
			
			// append the current $post_id to the selected post's 'related_posts' value
			$value2[] = $post_id;			
			
			// update the selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);			
		}
	}
	
	// find posts which have been removed
	$old_value = get_field($field_name, $post_id, false);
	
	if( is_array($old_value) ) {
		
		foreach( $old_value as $post_id2 ) {
			
			// bail early if this value has not been removed
			if( is_array($value) && in_array($post_id2, $value) ) continue;
			
			// load existing related posts
			$value2 = get_field($field_name, $post_id2, false);			
			
			// bail early if no value
			if( empty($value2) ) continue;			
			
			// find the position of $post_id within $value2 so we can remove it
			$pos = array_search($post_id, $value2);			
			
			// remove
			unset( $value2[ $pos] );			
			
			// update the un-selected post's value (use field's key for performance)
			update_field($field_key, $value2, $post_id2);			
		}		
	}
	// reset global varibale to allow this filter to function as per normal
	$GLOBALS[ $global_name ] = 0;
	
	// return
    return $value;
    
}
// name : id 
add_filter('acf/update_value/name=sedoo_inventory_bidirectionnal_relation', 'inventory_contact_bidirectional_acf_update_value', 10, 3);


/**
 * AUTO ADD & UPDATE TITLE POST WITH ACF FIELD
 * changer le title du post par le champ "lastname" pour les membres
 * 
 * source : https://support.advancedcustomfields.com/forums/topic/use-acf-field-to-create-post-title/
 */

//Auto add and update Title field:
function inventory_contact_title_updater( $post_id ) {

    $my_post = array();
    $my_post['ID'] = $post_id;

    if ( get_post_type() == 'sedoo_invent_contact' ) {
      $my_post['post_title'] = get_field('inventory_contact_first_name')." ".get_field('inventory_contact_name');
      $my_post['post_name'] = get_field('inventory_contact_name');
    } 

    // Update the post into the database
    wp_update_post( $my_post );

  }
   
  // run after ACF saves the $_POST['fields'] data
  add_action('acf/save_post', 'inventory_contact_title_updater', 20);
//END Auto add and update Title field:



?>