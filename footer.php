<footer class="site-footer">

  <div class="footer-widgets clearfix">
    <?php if (is_active_sidebar('footer-area-1')): ?>
      <div class="footer-widget-area">
          <?php dynamic_sidebar('footer-area-1'); ?>
      </div>
  <?php endif; ?>

  <?php if (is_active_sidebar('footer-area-2')): ?>
    <div class="footer-widget-area">
        <?php dynamic_sidebar('footer-area-2'); ?>
    </div>
<?php endif; ?>

<?php if (is_active_sidebar('footer-area-3')): ?>
  <div class="footer-widget-area">
      <?php dynamic_sidebar('footer-area-3'); ?>
  </div>
<?php endif; ?>

<?php if (is_active_sidebar('footer-area-4')): ?>
  <div class="footer-widget-area">
      <?php dynamic_sidebar('footer-area-4'); ?>
  </div>
<?php endif; ?>
  </div>


  <nav class="site-nav">
    <?php
      $args = array(
        'theme_location' => 'footer',
      );
     ?>

    <?php wp_nav_menu($args); ?>
  </nav>

  <p>
    <?php bloginfo('name') ?> - &copy; <?php echo date('Y'); ?>
  </p>
</footer>

</div>
<!-- class container close here -->

<?php wp_footer(); ?>
</body>
</html>
