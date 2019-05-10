<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head <?php do_action('add_head_attributes'); ?>>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title() ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <header>
        <nav class="nav-collapse">
           
                <?php the_custom_logo(); ?>
           
            <?php wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
          
        </nav>
       
        <?php if (is_page('contact')) : ?>
            <h1>I am the contact page</h1>
        <?php endif; ?>
        <?php if (is_home()) : ?>
            <h1>I am the home (blog) page</h1>
        <?php endif; ?>
    </header>