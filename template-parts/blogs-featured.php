
<div class="featured-blog-item">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
        <div class="blog-featured-image"><?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?></div>
        <h3 class="blogtitel"><?php the_title(); ?></h3>
        <div class="flex items-center gap-2">
            <div class="read-more">Lees meer</div>
            <div> 
                <svg xmlns="http://www.w3.org/2000/svg" width="16.999" height="9" viewBox="0 0 16.999 9">
                <path id="arrow-right-small" d="M3136.353,2592.354l-4,4a.5.5,0,0,1-.708-.708l3.147-3.146H3120a.5.5,0,0,1,0-1h14.793l-3.147-3.146a.5.5,0,0,1,.708-.708l4,4a.5.5,0,0,1,0,.708Z" transform="translate(-3119.5 -2587.5)" fill="#262b26"></path>
                </svg>
            </div>
        </div>
    </a>
</div>


