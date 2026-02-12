<footer class="site-footer">
    <div class="container">
        <?php if (is_active_sidebar('footer-1')): ?>
            <div class="footer-widgets">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
        <?php endif; ?>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tüm hakları saklıdır.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>