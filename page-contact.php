<?php get_header(); ?>
<h1>Contact</h1>
<!-- <p>This is the contact page</p> -->
<?php
$blurb = get_theme_mod('dance_contact_blurb');
if($blurb || is_customize_preview()):
    // echo wpautop($blurb);
    echo $blurb;
endif;

get_template_part('template-parts/content');
get_footer(); ?>