<article class="site-content clearfix">
  <h2><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  <!-- post thumbnail -->
  <div class=" <?php if(has_post_thumbnail()){ ?> front-page-thumbnail <?php } ?>">
  <a href=" <?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail') ?></a>
  </div>
  <div class="front-page-excerpt">
    <p><?php echo get_the_excerpt(); ?></p>
  </div>
</article>
