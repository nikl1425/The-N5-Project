</main>

<?php
$social_cnf = new FooterConfig();

$icon_one = $social_cnf->get_social_by_index(get_theme_mod('socials_icon_first'));
$icon_two = $social_cnf->get_social_by_index(get_theme_mod('socials_icon_second'));
$icon_three = $social_cnf->get_social_by_index(get_theme_mod('socials_icon_third'));


$icon_config = array(
    $icon_one => $social_cnf->get_path_social_icon(get_stylesheet_directory_uri(), $icon_one),
    $icon_two => $social_cnf->get_path_social_icon(get_stylesheet_directory_uri(), $icon_two),
    $icon_three => $social_cnf->get_path_social_icon(get_stylesheet_directory_uri(), $icon_three),
);

?>



<footer class="max-w-screen-xl mx-auto flex flex-row justify-between py-5 w-full">

    <!-- Left -->
    <div>
        footer
    </div>

    <!-- Center -->
    <div class="">
        <?php


        foreach ($icon_config as $i => $p) {
            echo $p;
            echo esc_url($p);
            
            echo '<img src="' . esc_url($p) . '" />';
        }

        ?>

    </div>


    <!-- Right -->
    <div></div>
</footer>
<?php wp_footer(); ?>
</body>

</html>