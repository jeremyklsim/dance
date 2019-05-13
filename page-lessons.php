<?php get_header(); ?>
<div class="hero">
<h1 class="hero-text">DANCE LESSONS</h1>
</div>
<!-- <h1>Lessons</h1>
<p>This is the lessons page</p> -->
<?php
$args = array(
    'post_type' => 'dance_lesson',
    'posts_per_page' => 5
);
$loop = new WP_Query($args);
if ($loop->have_posts()) : $count = 0;
    while ($loop->have_posts()) :
        $loop->the_post(); ?>
        <div class="lessons">
        <div class="lessons-image">
        <img src="<?php the_post_thumbnail_url(); ?>" 
        alt="<?php echo $post->post_name; ?>" />
        </div>
        <div class="lessons-info">
        <h2><a href="<?php echo site_url(); ?>/dance_lesson/<?php echo $post->post_name; ?>"><?php echo the_title(); ?></a>
        </h2>
        <p>
            <?php $post->post_name; ?><?php echo the_content(); ?>
        </p>
        </div>
        </div>
    <?php endwhile;
endif;
get_footer(); ?>