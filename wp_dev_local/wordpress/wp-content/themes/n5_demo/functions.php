<?php

# Setup theme:
function SetupTheme()
{
   wp_enqueue_style( 'style', get_stylesheet_uri() );

   remove_action('wp_head', '_admin_bar_bump_cb'); 
}

add_action( 'wp_enqueue_scripts', 'SetupTheme' );

# Block Registration


class BaseBlock
{
   private $name;

   function __construct($name)
   {
      $this->name = $name;
      add_action('init', [$this, 'onInit']);
   }

   function init()
   {
      wp_register_script($this->name, get_stylesheet_directory_uri() . "/");
   }

   function callback()
   {
      ob_start();
      require get_theme_file_path("/our-blocks/{$this->name}.php");
      return ob_get_clean();
   }
}