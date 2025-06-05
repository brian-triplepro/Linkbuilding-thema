<?php get_header(); ?>

<section class="featured-blogs">
  <div class="container md:grid grid-cols-3 md:gap-4">
    <?php
    $featured_query = new WP_Query(array(
      'posts_per_page' => -1, 
      'post_type'      => 'post',
      'orderby'        => 'date',
      'order'          => 'DESC',
    ));

    if ( $featured_query->have_posts() ) :
      while ( $featured_query->have_posts() ) : $featured_query->the_post();
        get_template_part('template-parts/blogs', 'featured');
      endwhile;
      wp_reset_postdata(); 
    endif;
    ?>
  </div>
</section>
<?php get_footer(); ?>