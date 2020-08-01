<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'SlickSlider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor']; 
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'Slicknslide';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
   <?php SlicknSlide('slick_slider', 50,50); ?>
</div>