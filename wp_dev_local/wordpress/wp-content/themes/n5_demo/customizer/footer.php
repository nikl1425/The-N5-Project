<?php

// For a section to be displayed i need to atleast provide 1 setting with 1 control.

class FooterConfig {
    public $socials = array(
        'github',
        'twitch',
        'youtube',
        'facebook',
        'discord'
    );

    function get_social_by_index($index) {
        return $this->socials[$index];
    }

    function get_path_social_icon($root_path, $name_of_social) {
        if(in_array($name_of_social, $this->socials)){
            $path = $root_path . "/assets/" . $name_of_social . ".svg";
            return $path;
        }
    }

    // We only have 3 icons for now with uri settings.
    function get_uri_social($name) {

        $setting_to_get = '/';

        switch($name) {
            case 0:
                $setting_to_get = 'icon_first_uri';
                break;
            case 1:
                $setting_to_get = 'icon_second_uri';
                break;
            case 2:
                $setting_to_get = 'icon_third_uri';
                break;
            default: 
                break;
        }

        if($setting_to_get == '/') {
            return $setting_to_get;
        }

        $setting_val = get_theme_mod($setting_to_get);

        return esc_url($setting_val);
    }
}




function setupFooter($wp_customize)
{
    $cnf = new FooterConfig();


    $wp_customize->add_section(
        'n5_footer_section',
        array(
            'title' => __('Footer'),
            'priority' => 105,
            // Before Widgets.
        )
    );

    // Add a setting for footer text
    $wp_customize->add_setting(
        'footer_text_setting',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    // Add a control for the footer text setting
    $wp_customize->add_control(
        'footer_text_setting',
        array(
            'label' => __('Footer Text', 'themename'),
            'section' => 'n5_footer_section',
            'type' => 'text',
        )
    );


    $wp_customize->add_setting(
        'footer_social_setting',
        array(
            'default' => '',
            'type' => 'image',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_setting('socials_icon_first', array(
        'default' => '',
        'sanitize_callback' => '',
    )
    );

    $wp_customize->add_control('icon_first', array(
        'settings' => 'socials_icon_first',
        'label' => 'icon 1',
        'choices' => $cnf->socials,
        'type' => 'select',
        'section' => 'n5_footer_section'
    )
    );

    $wp_customize->add_setting('icon_first_uri', array(
        'default' => '',
        'sanitize_callback' => ''
    )
    );

    $wp_customize->add_control('icon_first_uri', array(
        'settings' => 'icon_first_uri',
        'section' => 'n5_footer_section'
    )
    );

    $wp_customize->add_setting('socials_icon_second', array(
        'default' => '',
        'sanitize_callback' => ''
    )
    );


    $wp_customize->add_control('icon_second', array(
        'settings' => 'socials_icon_second',
        'label' => 'icon 2',
        'choices' => $cnf->socials,
        'type' => 'select',
        'section' => 'n5_footer_section'
    )
    );

    $wp_customize->add_setting('icon_second_uri', array(
        'default' => '',
        'sanitize_callback' => ''
    )
    );

    $wp_customize->add_control('icon_second_uri', array(
        'settings' => 'icon_second_uri',
        'section' => 'n5_footer_section'
    )
    );

    $wp_customize->add_setting('socials_icon_third', array(
        'default' => '',
        'sanitize_callback' => ''
    )
    );

    $wp_customize->add_control('icon_third', array(
        'settings' => 'socials_icon_third',
        'label' => 'icon 3',
        'choices' => $cnf->socials,
        'type' => 'select',
        'section' => 'n5_footer_section'
    )
    );

    $wp_customize->add_setting('icon_third_uri', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_url'
    )
    );

    $wp_customize->add_control('icon_third_uri', array(
        'settings' => 'icon_third_uri',
        'section' => 'n5_footer_section',
        'type' => 'url'
    )
    );


}

return [
    'setup_footer' => function ($wp_customize) {
        return setupFooter($wp_customize);
    }
];