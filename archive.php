<!-- index php control the output on screen -->
<?php

get_header(); // get theme header

if (have_posts()): // WP loop all posts
?>

    <h2><?php // Archives ;
      if (is_category()) {
          single_cat_title();
      } elseif (is_tag()) {
          single_tag_title();
      } elseif (is_author()) {
          the_post();
          echo 'Author Archives: '.get_the_author();
          rewind_posts();
      } elseif (is_day()) {
          echo 'Daily Archives: '.get_the_day();
      } elseif (is_month()) {
          echo 'Month Archives: '.get_the_day('F Y');
      } elseif (is_year()) {
          echo 'Year Archives: '.get_the_day('Y');
      } else {
          echo 'Archives: ';
      }
       ?></h2>
  <?php
  while (have_posts()) : the_post();
    get_template_part('content', get_post_format());
  endwhile;

else:
  echo '<p>No content found</p>';
endif; ?>

<?php get_footer(); ?>
