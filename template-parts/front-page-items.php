

<?php

    // Template part for displaying homepage content blocks

    if (have_rows('homepage_content_blokken')) :
        while (have_rows('homepage_content_blokken')) : the_row(); 
    ?>
    <section class="content-blokken">	
        <div class="container content-blok">
           
        <?php           
            $afbeelding = get_sub_field('content_blok_afbeelding');
            $afbeelding_url = $afbeelding ? $afbeelding['url'] : '';
            $afbeelding_alt = $afbeelding ? $afbeelding['alt'] : '';

            
            $tekst = get_sub_field('content_blok_tekst');

        
            $knop_data = get_sub_field('content_blok_link_knop');
            $toon_knop = $knop_data['knop_weergeven'] ?? false;
            $knop_tekst = $knop_data['knop_tekst'] ?? '';
            $knop_url = $knop_data['selecteer_een_pagina_of_bericht'] ?? '';

            ?>
            <div class="grid md:grid-cols-2 gap-20 items-center">
                <?php if ($afbeelding_url) : ?>
                    <div class="content-afbeelding">
                        <img src="<?php echo esc_url($afbeelding_url); ?>" alt="<?php echo esc_attr($afbeelding_alt); ?>" />
                    </div>
                <?php endif; ?>

                <?php if ($tekst) : ?>
                    <div class="content-tekst">
                        <div><?php echo $tekst; ?></div><br>
                        <?php if ($toon_knop && $knop_url) : ?>
                            <a href="<?php echo esc_url($knop_url); ?>" class="primary-button"><?php echo ($knop_tekst); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php

    endwhile;
endif;
?>