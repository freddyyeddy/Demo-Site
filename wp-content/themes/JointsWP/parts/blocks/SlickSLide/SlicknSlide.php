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
<style>
.overlay {
  position: fixed;
  top: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.4);
}
.content {
  position: absolute;
  top: 200px;
  width: 100%;
  text-align: center;
}
.content p {
  width: 200px;
  margin: 20px auto;
}
</style>
<div style="overflow: hidden;" id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <?php //SlicknSlide Usage Field Name, VW, VH, Lazy Loading Boolean ?>
   <?php SlicknSlide('slick_slider', 50, 50); ?>
</div>