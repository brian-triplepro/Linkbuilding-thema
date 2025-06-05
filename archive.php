<?php get_header(); ?>

<section class="blog-archive">
  <div class="container">
    <h1 class="mb-5" itemprop="name"><?php single_term_title(); ?></h1>
    <div class="archive-meta" itemprop="description"><?php if ( '' != get_the_archive_description() ) { echo esc_html( get_the_archive_description() ); } ?></div>
      <div class="container md:grid grid-cols-3 md:gap-4">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part('template-parts/blogs', 'featured'); ?>
        <?php endwhile; endif; ?>
      </div>
  </div>
</section>

<?php get_footer(); ?>
