<?php get_header(); ?>
<div class="hero">
<h1 class="hero-text">Instructors</h1>
</div>
<div class="dance-container">

</div>
<?php
$args = array(
    'post_type' => 'dance_instructor',
    'posts_per_page' => 5,
    'order' => 'ASC'
);
$loop = new WP_Query($args);
if ($loop->have_posts()) : $count = 0;
    while ($loop->have_posts()) :
        $loop->the_post(); ?>
        <div class="dance-container">
        <div class="lessons">
        <div class="lessons-image">
        <img src="<?php the_post_thumbnail_url(); ?>" 
        alt="<?php echo $post->post_name; ?>" />
        </div>
        <div class="lessons-info">
        <h2><?php echo the_title(); ?>
        </h2>
        <p>
            <?php $post->post_name; ?><?php echo the_content(); ?>
        </p>
        </div>
        </div>
        </div>
    <?php endwhile;
endif;

get_footer(); ?>