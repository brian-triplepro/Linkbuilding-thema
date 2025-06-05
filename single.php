<?php get_header(); ?>


<div class="single-banner"><?php the_post_thumbnail(); ?></div>
<section>
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>