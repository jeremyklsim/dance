<?php
//the loop
if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <div class="entry-content">
                <?php the_content(); ?>
        </div>
    <?php endwhile;

else : ?>
    <p>Sorry, no posts</p>
<?php endif;
