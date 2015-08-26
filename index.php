<!-- index php control the output on screen -->
<?php get_header(); ?>

<div class="site-content clearfix">
  <div class="main-column">
    <?php if (have_posts()): // WP loop all posts

      while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
      endwhile;

    else:
      echo '<p>No content found</p>';
    endif; ?>
  </div>
<?php get_sidebar(); ?>
</div>


<?php get_footer(); ?>
