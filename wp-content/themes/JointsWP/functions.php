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

// Adding (Read Making) custom AFC block for gutenberg

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // registering the block.
        acf_register_block_type(array(
            'name'              => 'AFC Slider',
            'title'             => __('SlickSLider'),
            'description'       => __('A custom slider field'),
            'render_template'   => 'parts/blocks/SlickSLide/SlicknSlide.php',
            'category'          => 'widgets',
            'align'             => 'full',
            'icon'              => 'dashicons-align-center',
            'keywords'          => array( 'Picture', 'slide' ),
            'enqueue_assets' 	=> function(){
	wp_enqueue_script( 'slickjs-init', get_stylesheet_directory_uri(). '/assets/scripts/slick-init.js', array( 'slickjs' ), '1.6.0', true );
  wp_enqueue_style( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'slick-theme', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
	wp_enqueue_script( 'slick', 'http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
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



// Function to generate the needed slick Slide Code Based on AFC Variables.

function SlicknSlide($field, $VW = 100, $VH = 100, $inception = "top") {

// Startdiv code
$startdiv = <<<StartDiv
<div style="width: {$VW}vw; Height: {$VH}vh;" class="slick-slide-zzz" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "autoplaySpeed": 1500,}'>
StartDiv;

$field = get_field($field);
console_log($field);
if( $field){
  echo $startdiv;
	switch ($inception) {
		case '1':

  foreach ($field as $fieldchild) {
    if(is_array($fieldchild)){

$fieldchild = array_values($fieldchild);
echo <<<ImageForSlick
<div><img data-lazy="$fieldchild[0]"/></div>
<h2>$fieldchild[1]</h2>
ImageForSlick;
    }else{
      echo <<<ImageforSlick
	  <div><img data-lazy="$fieldchild"/></div>
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
<div><img data-lazy="$fieldchild[0]"/></div>
<h2>$fieldchild[1]</h2>
<h1>$fieldchild[2]</h1>
ImageForSlick;
    }else{
      echo <<<ImageforSlick
	  <div><img data-lazy="$fieldchild"/></div>
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
<div><img data-lazy="$fieldchild[0]"/></div>
ImageForSlick;
    }else{
      echo <<<ImageforSlick
      <div><img data-lazy="$fieldchild"/></div>
ImageforSlick;
// console_log($fieldchild);
    }
  }

			break;
  }
  // Closing Div
    echo "</div>";
}

// console_log($field);
};