
<article class="post <?php if(has_post_thumbnail()){ ?> has-thumbnail <?php } ?>">
  <!-- post thumbnail -->
  <div class="post-thumbnail">
    <a href=" <?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail') ?></a>
  </div>

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

<!-- excerption -->
      <p>
        <?php echo get_the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>">Continue Reading &raquo;</a>
      </p>


</article>
