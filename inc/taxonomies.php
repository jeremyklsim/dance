<?php
//create a custom taxonomy name it topics for your posts

if (!function_exists('dance_create_taxonomies')) :
    function dance_create_taxonomies() {
     
    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI
     
      $labels = array(
        'name' => _x( 'Genres', 'taxonomy general name' ),
        'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Genres' ),
        'all_items' => __( 'All Genres' ),
        'parent_item' => __( 'Parent Genre' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item' => __( 'Edit Genre' ), 
        'update_item' => __( 'Update Genre' ),
        'add_new_item' => __( 'Add New Genre' ),
        'new_item_name' => __( 'New Genre Name' ),
        'menu_name' => __( 'Genres' ),
      );    
     
    // Now register the taxonomy
     
      register_taxonomy('genres',array('post'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'genre' ),
      ));
    }
    
    endif;
      add_action( 'init', 'dance_create_taxonomies', 0 );
    
    
    
    /* Meta box setup function. */
    function dance_post_meta_boxes_setup() {
    
        /* Add meta boxes on the 'add_meta_boxes' hook. */
        add_action( 'add_meta_boxes', 'dance_add_post_meta_boxes' );
      }
    
      /* Fire our meta box setup function on the post editor screen. */
    add_action( 'load-post.php', 'dance_post_meta_boxes_setup' );
    add_action( 'load-post-new.php', 'dance_post_meta_boxes_setup' );
    