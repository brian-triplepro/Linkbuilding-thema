 <footer>
    <div class="container grid md:grid-cols-4 gap-20">
        <div class="md:col-span-2">
                Over ons

                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    
        </div>
        <?php wp_nav_menu(['theme_location' => 'footer-menu']); ?>
        <div>
            Bedrijfsnaam hier
            Saffierstoep 7
            9741 KP Groningen
            info@bedrijf.com
        </div>
    </div>
</footer>
<?php wp_footer(); ?>