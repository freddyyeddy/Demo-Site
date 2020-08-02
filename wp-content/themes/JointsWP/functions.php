<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

// Adding (Read->Making) custom AFC block for gutenberg

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // registering the block.
        acf_register_block_type(array(
            'name'              => 'AFC Slider',
            'title'             => 'SlickSLider',
            'description'       => 'A custom slider field',
            'render_template'   => 'parts/blocks/SlickSLide/SlicknSlide.php',
            'category'          => 'widgets',
            'align'             => 'full',
            'icon'              => 'align-center',
            'keywords'          => array( 'Picture', 'slide' ),
            'enqueue_assets' 	=> function(){
  wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
  wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
    wp_enqueue_script( 'block-slider', get_template_directory_uri() . '/assets/scripts/slick-init.js', array(), '0.0.1', true );

},
        ));
        }}

// Simple Function to Inject Var-Dump Into Console

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

// Simple array search for fuzzy field grabing

function array_find($needle, array $haystack)
{
    foreach ($haystack as $key => $value) {
        if (false !== stripos($value, $needle)) {
            return $value;
        }
    }
    return false;
}



// Function to generate the needed slick Slide Code Based on AFC Variables

function SlicknSlide($field, $VW = 100, $VH = 100, $inception = "top", $lz = true, $over =false) {
  $fieldarry = get_fields();
$lzld = '';
$lzsrc = "src";
// Startdiv code
if ($lz){
  $lzld = '"lazyLoad": "ondemand",';
  $lzsrc = 'data-lazy';
}
if($over){
  $container = "<div class Overlay-Container>";
}
$startdiv = <<<StartDiv
<div class="Overlay-Container"><div style="width: {$VW}vw; Height: {$VH}vh;" class="slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplaySpeed": 1500, $lzld}'>
StartDiv;

$field = get_field($field);
// console_log($field);
if( $field){
  echo $startdiv;
	switch ($inception) {
		case '1':

  foreach ($field as $fieldchild) {
    if(is_array($fieldchild)){

$fieldchild = array_values($fieldchild);
echo <<<ImageForSlick
<div><img $lzsrc="$fieldchild[0]"/></div>
<div class="overlay dark"></div>
      <div class="content">
       <h2>$fieldchild[1]</h2>
        </div>

ImageForSlick;

    }else{
      echo <<<ImageforSlick
	  <div><img $lzsrc="$fieldchild"/></div>
ImageforSlick;
// console_log($fieldchild);
    }
  }
  echo "</div>";
break;
		case '2':
  foreach ($field as $fieldchild) {
    if(is_array($fieldchild)){

$fieldchild = array_values($fieldchild);
echo <<<ImageForSlick
<div><img $lzsrc="$fieldchild[0]"/></div>
     <div class="overlay dark"></div>
      
      
      <div class="content">
        <h2>$fieldchild[1]</h2
        <p>$fieldchild[2]</p>
      </div>
ImageForSlick;
    }else{
      echo <<<ImageforSlick
	  <div><img $lzsrczy="$fieldchild"/></div>
ImageforSlick;
// console_log($fieldchild);
    }
  }
  echo "</div>";
			break;
    default:
  foreach ($field as $fieldchild) {
    if(is_array($fieldchild)){

$fieldchild = array_values($fieldchild);
echo <<<ImageForSlick
<img $lzsrc="$fieldchild[0]"/>
ImageForSlick;
    }else{
      echo <<<ImageforSlick
      <img $lzsrc="$fieldchild"/>
ImageforSlick;
// console_log($fieldchild);
    }
  }
$field = array_values($field);
$title = $fieldarry[array_find("title", array_keys(get_fields()))];
$description = $fieldarry[array_find("descrip", array_keys(get_fields()))];
// console_log($field);
// var_dump(get_fields($field));
  echo <<<Titleandstuff
  </div>
     <div class="overlay">
        <h2>$title</h2>
         <p>$description</p>
      </div>
      </div>
Titleandstuff;
			break;
  }
  // Closing Div
    echo "</div>";
}

// console_log($field); 
};