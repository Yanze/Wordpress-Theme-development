<!-- index php control the output on screen -->
<?php

get_header(); // get theme header

// WP loop all posts
if (have_posts()): ?>

  <!-- search result output here -->
  <h2>Search result for: <?php the_search_query(); ?></h2>

  <?php
  while (have_posts()) : the_post();
    get_template_part('content');
  endwhile;

else:
  echo '<p>No content found</p>';
endif;

get_footer(); // get theme footer
 ?>
