<?php get_header(); ?>


<?php get_template_part('template-parts/front-page', 'items'); ?>


<section class="featured-blogs">
  <div class="container md:grid grid-cols-3 md:gap-4">
    <?php
    $featured_query = new WP_Query(array(
      'posts_per_page' => 6, // Aantal berichten
      'post_type'      => 'post', // Standaard berichten, pas aan indien nodig
      'orderby'        => 'date',
      'order'          => 'DESC',
    ));

    if ( $featured_query->have_posts() ) :
      while ( $featured_query->have_posts() ) : $featured_query->the_post();
        get_template_part('template-parts/blogs', 'featured');
      endwhile;
      wp_reset_postdata(); // Reset global $post object
    endif;
    ?>
  </div>
</section>
<?php get_footer(); ?>