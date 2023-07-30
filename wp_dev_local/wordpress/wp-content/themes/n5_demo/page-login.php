<?php /* Template Name: Login */ ?>

<?php
get_header(); 
?>

<div class=" h-full w-full flex items-center">
    <div class=" mx-auto p-5 border-2 border-emerald-500 rounded-md ">
        <?php
            if(is_user_logged_in()) {
                # Logout
            } else {
                echo get_home_url();
                echo home_url();
                # Login
                $args = array(
                    'redirect' => home_url() . "/",
                    'form_id' => 'loginform-custom',
                );

                wp_login_form($args);
            }
        ?>
    </div>
</div>

<?php
get_footer(); 
?>