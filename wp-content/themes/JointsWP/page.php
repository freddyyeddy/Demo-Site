<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content grid-x grid-margin-x grid-padding-x">
	
		    <main class="main small-12 large-8 medium-8 cell" role="main">
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    	<?php get_template_part( 'parts/loop', 'page' ); ?>
			    
			    <?php endwhile; endif; ?>							
			    					
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>


<!-- slider_image = Gallery Field -->

<?php


// slider_image = subfield

function agero_slider() {

if( have_rows('slick_slider') ):
echo '<div class="slider-for">';
 	// loop through the rows of data
    while ( have_rows('slick_slider') ) : the_row();
    // display a sub field value
    //vars
    $image = get_sub_field('slider_image'); 
    // var_dump($image);
    ?>
	<div><img data-lazy="<?php echo $image; ?>"/></div>
  <?php      
    endwhile;
echo '</div>
      <div class="slider-nav">';
 	// loop through the rows of data
    while ( have_rows('slick_slider') ) : the_row();
    // display a sub field value
    //vars
    $image = get_sub_field('slider_image'); 
    // var_dump($image);
    ?>
	<div><img data-lazy="<?php echo $image; ?>"/></div>
  <?php      
    endwhile;
echo '</div>';

else :

    // no rows found

endif;

}
agero_slider();
$images = get_field('crew');
var_dump($images);
?>