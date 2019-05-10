<?php
/* Fire our meta box setup function on the post editor screen. */
add_action( 'load-post.php', 'dance_post_meta_boxes_setup' );
add_action( 'load-post-new.php', 'dance_post_meta_boxes_setup' );

/* Meta box setup function. */
function dance_post_meta_boxes_setup() {

    /* Add meta boxes on the 'add_meta_boxes' hook. */
    add_action( 'add_meta_boxes', 'dance_add_post_meta_boxes' );
    /* Save post meta on the 'save_post' hook. */
    add_action( 'save_post', 'dance_save_post_class_meta', 10, 2 );
  }

  /* Create one or more meta boxes to be displayed on the post editor screen. */
function dance_add_post_meta_boxes() {

    add_meta_box(
      'dance-post-class',      // Unique ID
      esc_html__( 'Post Class', 'example' ),    // Title
      'dance_post_class_meta_box',   // Callback function
      'dance_lesson',         // Admin page (or post type)
      'side',         // Context
      'default'         // Priority
    );
  }

  /* Display the post meta box. */
function dance_post_class_meta_box( $post ) { ?>

    <?php wp_nonce_field( basename( __FILE__ ), 'dance_post_class_nonce' ); ?>
  
    <p>
      <label for="dance-post-class"><?php _e( "Add a custom CSS class, which will be applied to WordPress' post class.", 'example' ); ?></label>
      <br />
      <input class="widefat" type="text" name="dance-post-class" id="dance-post-class" value="<?php echo esc_attr( get_post_meta( $post->ID, 'dance_post_class', true ) ); ?>" size="30" />
    </p>
  <?php }

  /* Save the meta box's post metadata. */
function dance_save_post_class_meta( $post_id, $post ) {

    /* Verify the nonce before proceeding. */
    if ( !isset( $_POST['dance_post_class_nonce'] ) || !wp_verify_nonce( $_POST['dance_post_class_nonce'], basename( __FILE__ ) ) )
      return $post_id;
  
    /* Get the post type object. */
    $post_type = get_post_type_object( $post->post_type );
  
    /* Check if the current user has permission to edit the post. */
    if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
      return $post_id;
  
    /* Get the posted data and sanitize it for use as an HTML class. */
    $new_meta_value = ( isset( $_POST['dance-post-class'] ) ? sanitize_html_class( $_POST['dance-post-class'] ) : ’ );
  
    /* Get the meta key. */
    $meta_key = 'dance_post_class';
  
    /* Get the meta value of the custom field key. */
    $meta_value = get_post_meta( $post_id, $meta_key, true );
  
    /* If a new meta value was added and there was no previous value, add it. */
    if ( $new_meta_value && ’ == $meta_value )
      add_post_meta( $post_id, $meta_key, $new_meta_value, true );
  
    /* If the new meta value does not match the old value, update it. */
    elseif ( $new_meta_value && $new_meta_value != $meta_value )
      update_post_meta( $post_id, $meta_key, $new_meta_value );
  
    /* If there is no new meta value but an old value exists, delete it. */
    elseif ( ’ == $new_meta_value && $meta_value )
      delete_post_meta( $post_id, $meta_key, $meta_value );
  }

  /* Filter the post class hook with our custom post class function. */
add_filter( 'post_class', 'dance_post_class' );

function dance_post_class( $classes ) {

  /* Get the current post ID. */
  $post_id = get_the_ID();

  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {

    /* Get the custom post class. */
    $post_class = get_post_meta( $post_id, 'dance_post_class', true );

    /* If a post class was input, sanitize it and add it to the post class array. */
    if ( !empty( $post_class ) )
      $classes[] = sanitize_html_class( $post_class );
  }

  return $classes;
}