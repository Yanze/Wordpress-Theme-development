<!-- index php control the output on screen -->
<?php

get_header(); // get theme header

if (have_posts()): // WP loop all posts

  while (have_posts()) : the_post();
    get_template_part('content');
  endwhile;

else:
  echo '<p>No content found</p>';
endif;

get_footer(); // get theme footer
 ?>
