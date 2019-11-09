<?php
/*
 * * Register MetaBox For Testimonial CPT
 */
// Meta Box

/*--------------------------------------------------------------
*			Member info
*-------------------------------------------------------------*/

function clt_testimonials_meta_box() {
	add_meta_box( 'testimonial_info_meta', esc_html__( 'Member Info', 'grassywp' ), 'clt_testimonials_meta_callback', 'clt_testimonials', 'advanced', 'high', 2 );
}
add_action( 'add_meta_boxes', 'clt_testimonials_meta_box');


// testimonial info callback
function clt_testimonials_meta_callback( $testimonial_info ) {

	wp_nonce_field( 'testimonial_social_metabox', 'testimonial_social_metabox_nonce' ); ?>

	<div style="margin: 10px 0;"><label for="designation" style="width:150px; display:inline-block;"><?php esc_html_e( 'Designation', 'cl-testimonial' ) ?></label>
	<?php $designation = get_post_meta( $testimonial_info->ID, 'designation', true ); ?>
	<input type="text" name="designation" id="designation" class="designation" value="<?php echo esc_html($designation); ?>" style="width:300px;"/>
	</div>   
    
     <div style="margin: 10px 0;">
    <label for="ratings" style="width:150px; display:inline-block;"><?php esc_html_e( 'Select Ratings', 'cl-testimonial') ?></label>
      <?php $ratings_cl = get_post_meta( $testimonial_info->ID, 'ratings', true ); 
	  if($ratings_cl!=''){
		  $rating_style=$ratings_cl;
	  }
	  else{
		   $rating_style='Select Ratings';
	  }
	  ?>          
      <select name="ratings">
             <option selected="selected" value="<?php echo  $rating_style;?>"><?php echo  $rating_style;?></option>
             <option value="Select Ratings">Select Ratings</option>
             <option value="1">1</option>
             <option value="1.5">1.5</option>
             <option value="2">2</option>
             <option value="2.5">2.5</option>
             <option value="3">3</option>
             <option value="3.5">3.5</option>
             <option value="4">4</option>
             <option value="4.5">4.5</option>
             <option value="5">5</option>
        </select>
       
   </div>
<?php }

/*--------------------------------------------------------------
 *			Save testimonial social meta
*-------------------------------------------------------------*/
function save_clt_testimonials_meta_social_meta( $post_id ) {
	if ( ! isset( $_POST['testimonial_social_metabox_nonce'] ) ) {
		return $post_id;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	if ( 'clt_testimonials' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}
	}

	 if( isset( $_POST[ 'designation' ] ) ) {
        update_post_meta( $post_id, 'designation', $_POST[ 'designation' ] );
    }
  	if( isset( $_POST[ 'ratings' ] ) ) {
        update_post_meta( $post_id, 'ratings', $_POST[ 'ratings' ] );
    }

}

add_action( 'save_post', 'save_clt_testimonials_meta_social_meta' );