<!-- control single post -->
<?php

get_header(); // get theme header

if (have_posts()): // WP loop all posts

  while (have_posts()) : the_post(); ?>

  <article class="post">
    <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
    <p class="post-info">
      <!-- wordpress fonction to output the date and author -->
      <?php the_time('F jS, Y'); ?> at <?php the_time('g:i a'); ?>  | by <a href="<?php get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> | Posted in
      <?php
        $categories = get_the_category();
        $separator = ", ";
        $output = '';

        if ($categories) { // output post categories;
          foreach($categories as $category){
            $output .= '<a href="'. get_category_link($category->term_id) .'">' .$category->cat_name .'</a>' .$separator;
          }
          echo trim($output, $separator); // trim removes the separator at the end;
        }
       ?>
    </p>


    <!-- show feature image -->
    <?php the_post_thumbnail('banner-image'); ?>

    <p><?php the_content(); ?></p>

  </article>

  <?php endwhile;

else:
  echo '<p>No content found</p>';
endif;

get_footer(); // get theme footer
 ?>
