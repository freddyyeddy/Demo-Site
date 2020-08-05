<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'Hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor']; 
}

// Create class attribute allowing for custom "className" and "align" values.
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<div style="background-image: url(<?php echo get_field('background') ?>)" id="<?php echo esc_attr($id); ?>" class="hero-section Overlay-Container <?php echo esc_attr($className); ?>">
  <div class="hero-section-text">
    <h1><?php echo get_field("herotitle"); ?></h1>
    <h5><?php echo get_field('herotext'); ?></h5>
  </div>
</div>
