<!-- page php control the page output on screen -->
<?php

get_header(); // get theme header

if (have_posts()): // WP loop all posts

  while (have_posts()) : the_post(); ?>

  <article class="post page">

    <h2><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </article>

  <?php endwhile;

else:
  echo '<p>No content found</p>';
endif;

get_footer(); // get theme footer
 ?>
