<!-- page php control the page output on screen -->
<?php get_header(); ?>

<div class="site-content clearfix">
  <h3>Custom HTML here</h3>

  <?php if (have_posts()): // WP loop all posts
    while (have_posts()) : the_post();
      the_content();
    endwhile;

    else:
      echo '<p>No content found</p>';
    endif; ?>

    <!-- home columns -->
    <div class="home-columns clearfix">
        <div class="one-half">

          <div class="post-thumbnail">
            <a href=" <?php the_permalink(); ?>"><?php the_post_thumbnail('small-thumbnail') ?></a>
          </div>

          <!-- News Posts Custom Loop WP_Query -->
           <?php $newsPosts = new WP_Query('cat=1&posts_per_page=2&order=ASC');
          // 1 is category id number and only show 2 posts;
              if ($newsPosts->have_posts()):
                while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <p><?php echo get_the_excerpt(); ?></p>
                <?php endwhile;

                else:

              endif;
              wp_reset_postdata();
              //each time after a custom loop, run wp_reset_postdata()function;
              //this function prevents the customize loop from distrupting the main natural URL based loop.
              ?>
        </div>

        <div class="one-half last">
          <!-- Learning Posts Custom Loop WP_Query -->
           <?php $learningPosts = new WP_Query('cat=4&posts_per_page=2&order=ASC');
          // 1 is category id number and set only show 2 posts;
              if ($learningPosts->have_posts()):
                while ($learningPosts->have_posts()) : $learningPosts->the_post(); ?>
                      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                      <p><?php echo get_the_excerpt(); ?></p>
                <?php endwhile;

                else:

              endif;
              wp_reset_postdata();
              ?>
      </div>
        </div>
    </div>

<?php get_footer(); ?>
