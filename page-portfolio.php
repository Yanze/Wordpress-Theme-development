<!-- page php control the page output on screen -->
<?php
/* Template Name: Portfolio Template */

get_header(); // get theme header

if (have_posts()): // WP loop all posts

  while (have_posts()) : the_post(); ?>

  <article class="post page">
    <?php
    if (has_children() OR $post->post_parent > 0) {
        ?>
      <nav class="site-nav children-links clearfix">
      <!-- show subpage menu -->
      <!-- sub menu starts here-->
      <span class="parent-link">
        <a href="<?php echo get_permalink(get_top_ancestor_id());
        ?>">
          <?php echo get_the_title(get_top_ancestor_id());
        ?>
        </a>
      </span>
      <ul>
          <?php
            $args = array(
              'child_of' => get_top_ancestor_id(),
              'title_li' => '',
            );
        ?>

          <?php wp_list_pages($args);
        ?>
        </ul>
        </nav>
      <!-- subpage menu closes here -->
      <!-- sub menu closes here-->
    <?php
    } ?>

    <div class="column-container clearfix">

    <!-- title colum -->
    <div class="title-column">
      <h2><?php the_title(); ?></h2>
    </div>

    <!-- content colum -->
    <div class="text-column">
      <?php the_content(); ?>
    </div>
  </div>
  </article>
  <?php endwhile;

else:
  echo '<p>No content found</p>';
endif;

get_footer(); // get theme footer
 ?>
