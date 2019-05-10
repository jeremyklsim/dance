<?php
if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e('Blog Sidebar', 'dance'); ?>">
    <ul>
        <?php dynamic_sidebar('sidebar-1'); ?>
    </ul>
</aside><!-- #secondary -->