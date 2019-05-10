    <footer>
        Copyright <?php echo date('Y'); ?>
        <?php wp_nav_menu(array('theme_location' => 'footer-menu')); ?>
    </footer>
    <?php wp_footer(); ?>
    <script>
        var nav = responsiveNav(".nav-collapse");
    </script>
    </body>

    </html>