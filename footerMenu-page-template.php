<?php
/* Template Name: Footer Menu Page Template */
 //the comment above is to register this template to WP, let Wp knows there is
 // a footer menu page template

get_header(); // get theme header

if (have_posts()): // WP loop all posts

  while (have_posts()) : the_post();

?>

  <article class="post page">
    <?php
    //check if the page has children, if not this code will not be executed.
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

    <h2><?php the_title(); ?></h2>

    <div class="info-box">
        <h4>Disclairmer Title</h4>
        <p>
          Every browser that supports the double
          colon (::) CSS3 syntax also supports just
          the (:) syntax, but IE 8 only supports the
          single-colon, so for now, it's recommended
          to just use the single-colon for best
          browser support.
        </p>
    </div>


    <?php the_content(); ?>
  </article>

  <?php endwhile;

else:
  echo '<p>No content found</p>';
endif;

get_footer(); // get theme footer
 ?>
