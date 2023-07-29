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



<footer class=" border border-t-2">
    <div class="max-w-screen-xl mx-auto flex flex-row justify-between py-3 w-full">
        <!-- Left -->
        <div>
        
        </div>

        <!-- Center -->
        <div class=" flex flex-row">

            <?php
            $count = 0;

            foreach ($icon_config as $i => $p) {
                
                $uri = $social_cnf->get_uri_social($count);

                echo '<a class="mx-2" href="' . $uri . '">';
                echo '<div >';
                echo '<img src=" ' . esc_url($p) . '" />';
                echo "</div>";
                echo '</a>';

                $count++;
            }
            ?>

        </div>


        <!-- Right -->
        <div></div>
    </div>


</footer>
<?php wp_footer(); ?>
</body>

</html>