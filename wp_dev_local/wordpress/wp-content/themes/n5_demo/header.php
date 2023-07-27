<!DOCTYPE html>
<html lang="en" class=" h-full font-sans">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <?php 
        if ( current_user_can( 'manage_options' ) ) {
            show_admin_bar( true );
        } else 
        {
            show_admin_bar( false );
        }
    ?>

</head>

<body class=" h-screen flex flex-col overflow-hidden">
    <header class="py-5 border-b-2 border-slate-300">
        <nav class=" max-w-screen-xl mx-auto flex flex-row justify-between">
            <div class="shrink-0">
                <a href="<?php echo get_home_url() ?>">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<img class="object-cover h-20 " src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
                ?>
                </a>
                
            </div>
            <div class="grow">
                <div class="flex justify-end h-full items-center">
                    <?php

                    wp_nav_menu(
                        array(
                            'theme_location' => 'header-menu',
                            'container_class' => 'n5-navigation'
                        )
                    );
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <main class="flex-grow max-w-screen-xl mx-auto px-4 sm:px-6 md:px-8 w-full">