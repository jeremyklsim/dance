<?php get_header(); ?>
<h1>Lessons</h1>
<p>This is the lessons page</p>
<?php
$args = array(
    'post_type' => 'dance_lesson',
    'posts_per_page' => 5
);
$loop = new WP_Query($args);
if ($loop->have_posts()) : $count = 0;
    while ($loop->have_posts()) :
        $loop->the_post(); ?>
        <h2><a href="<?php echo site_url(); ?>/dance_lesson/<?php echo $post->post_name; ?>"><?php echo the_title(); ?></a>
        </h2>
        <img src="<?php the_post_thumbnail_url(); ?>" 
        alt="<?php echo $post->post_name; ?>" />
    <?php endwhile;
endif;
get_footer(); ?>