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
				<?php

          				  $crew = get_field('crew');
				


	if($crew)
{
	echo '<ul class="example-orbit" data-orbit data-options="animation:slide;
                  pause_on_hover:true;
                  animation_speed:500;
                  navigation_arrows:true;
                  bullets:false;">';

	foreach($crew as $crewmember)
	{
		echo <<<CrewList
<li>
    <img src="$crewmember[crew_member]" alt="slide 1" />
    <div class="orbit-caption">
      $crewmember[crew_member_description]
    </div>
  </li>
CrewList;
	}

	echo '</ul>';
}
 SlicknSlide("crew", "50", "50", "1");
// always good to see exactly what you are working with
// console_log($crew);
	
				 
				 ?>
  <!-- <li>
    <img src=<"../assets/img/examples/satelite-orbit.jpg" alt="slide 1" />
    <div class="orbit-caption">
      Caption One.
    </div>
  </li>
  <li class="active">
    <img src="../assets/img/examples/andromeda-orbit.jpg" alt="slide 2" />
    <div class="orbit-caption">
      Caption Two.
    </div>
  </li>
  <li>
    <img src="../assets/img/examples/launch-orbit.jpg" alt="slide 3" />
    <div class="orbit-caption">
      Caption Three.
    </div>
  </li> -->				
  <?php //Generating Lower Slick Slide SHow   ?>
  <?php  SlicknSlide("slick_slider", "50", "50");		?>			
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>