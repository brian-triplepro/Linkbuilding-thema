<footer>
<?php

$footerblokken = get_field('footerblokken', 'option');

if ($footerblokken) {
    $footer_links = $footerblokken['footerblok_links'] ?? '';
    $footer_rechts = $footerblokken['footerblok_rechts'] ?? '';
?>
    
     <div class="container grid md:grid-cols-4 gap-20">
       <div class="md:col-span-2">
            <?php echo $footer_links; ?>
        </div>
        <?php wp_nav_menu(['theme_location' => 'footer-menu', 'container_class' => 'footer-menu']); ?>
        <div>
            <?php echo $footer_rechts; ?>
        </div>
    </div>

    <?php
}
?>
</footer>
<?php wp_footer(); ?>