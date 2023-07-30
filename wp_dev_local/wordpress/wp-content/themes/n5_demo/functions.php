<?php 
   # Import Files
   $footerConfig = require_once get_template_directory() . '/customizer/footer.php';
?>
<?php

# Setup theme:
function SetupTheme()
{
   wp_enqueue_style('style', get_stylesheet_uri());
   wp_enqueue_style('custom', get_template_directory_uri() . "/custom.css");

   #remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('wp_enqueue_scripts', 'SetupTheme');


# Configuration
function n5_custom_logo_setup()
{
   $defaults = array(
      'flex-height' => true,
      'flex-width' => true,
      'header-text' => array('site-title', 'site-description'),
      'unlink-homepage-logo' => true,
   );
   add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'n5_custom_logo_setup');

function n5_customizer_register($wp_customize)
{
   global $footerConfig;
   $setupFooterFunc = $footerConfig['setup_footer'];
   $setupFooterFunc($wp_customize);
}
add_action( 'customize_register', 'n5_customizer_register' );

function n5_register_my_menus()
{
   register_nav_menus(
      array(
         'header-menu' => __('Header Menu'),
      )
   );
}
add_action('init', 'n5_register_my_menus');

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

add_filter( 'learn-press/override-templates', function(){ return true; } );