<?php
/**
 * Template Name: Practice Areas Template
 * Description: A Page Template that showcases Practice Areas covered by H & L 
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

				<div class="twelve columns">
					<div class="practic-areas">
				<?php
					// Let's roll.
					//while ( $featured->have_posts() ) : $featured->the_post();
					
						$custom_fields = get_post_custom( $post->ID );
						
						//if( $custom_fields['category'][0] == 'Attorney' ):
	
						// Increase the counter.
						$counter_slider++;
	
						/**
						 * We're going to add a class to our featured post for featured images
						 * by default it'll have the feature-text class.
						 */
						$feature_class = 'feature-text';
	
						// if ( has_post_thumbnail() ) {
						// 	// ... but if it has a featured image let's add some class
						// 	$feature_class = 'feature-image small';
	
						// 	// Hang on. Let's check this here image out.
						// 	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) );
	
						// 	// Is it bigger than or equal to our header?
						// 	if ( $image[1] >= $header_image_width ) {
						// 		// If bigger, let's add a BIGGER class. It's EXTRA classy now.
						// 		$feature_class = 'feature-image large';
						// 	}
						// }
						?>
						
						<?php 
							if (have_rows('practice_area_boxes')) :
								
								$pa_ctr=0;?>
								
							<div class="row">
						<?php while(have_rows('practice_area_boxes')) : the_row();
								
								$pa_label = get_sub_field('pa_label');
								//var_dump($pa_label);
								$pa_leadin = get_sub_field('pa_leadin');
								//var_dump($pa_leadin);
								$cta_text = get_sub_field('cta_text');
								//var_dump($cta_text);
								$pa_link = get_sub_field('pa_link');
								//var_dump($pa_link);
								$pa_ctr++
						?>		
						
						<div class='practice-area-box three columns custom'><!-- our-people-list -->
				
							<a href='<?php echo $pa_link; ?>'>
						
							
								<div class="practice-area-container">
									<p class="practice-area-title"><?php echo $pa_label; ?></p>
									<p class="practice-area-text"><?php echo $pa_leadin; ?></p>
								</div>
								
								<span class='practice-area transparent-blue'><!-- our-people-name -->
								
									Read more &rsaquo; <?php //echo $pa_label; //the_title_attribute( 'echo=0' ) ?>
								
								</span>
								
								<div class='practice-area-hover transparent-blue'><!--our-people-name-hover-->
									<div class="content">
								
										<span class="pa-readmore">Read more &rsaquo;</span><br />
										
										<span class='pa-cta'><?php echo $cta_text;  //$custom_fields['jtitle'][0] ?></span><br /><br />
	                                    
										
									</div>
								</div>
								
							</a>
				
						</div>
                        
						 <?php //endif; ?>
					<?php if ($pa_ctr % 4 == 0) { ?>
            			</div><div class="row">
            		<?php } ?>
            		
					<?php endwhile;	?>
					
					<?php endif; ?>
					
                    <?php if ($pa_ctr % 4 != 0){ ?>
                		</div>
            		<?php } ?>
            		
                    <?php //rewind_posts(); ?>
                    
                    <!--<div class='people-header transparent-blue'>-->
                    	
                    <!--    <h1>Paralegals</h1>-->
                        
                    <!--</div>-->
                    
                    <?php
					// Let's roll.
					// while ( $featured->have_posts() ) : $featured->the_post();
					
					// 	$custom_fields = get_post_custom( $post->ID );
						
					// 	if( $custom_fields['category'][0] != 'Attorney' ):
	
					// 	// Increase the counter.
					// 	$counter_slider++;
	
					// 	/**
					// 	 * We're going to add a class to our featured post for featured images
					// 	 * by default it'll have the feature-text class.
					// 	 */
					// 	$feature_class = 'feature-text';
	
					// 	if ( has_post_thumbnail() ) {
					// 		// ... but if it has a featured image let's add some class
					// 		$feature_class = 'feature-image small';
	
					// 		// Hang on. Let's check this here image out.
					// 		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( $header_image_width, $header_image_width ) );
	
					// 		// Is it bigger than or equal to our header?
					// 		if ( $image[1] >= $header_image_width ) {
					// 			// If bigger, let's add a BIGGER class. It's EXTRA classy now.
					// 			$feature_class = 'feature-image large';
					// 		}
					// 	}
						?>
						
						<!--<div class='our-people-list'>-->
				
						<!--	<a href='<?php //the_permalink(); ?>'>-->
						
								<?php
									/**
									 * If the thumbnail is as big as the header image
									 * make it a large featured post, otherwise render it small
									 */
									// if ( has_post_thumbnail() ) {
									// 	the_post_thumbnail( array(210,220) ); 
									// }
								?>
								
								<!--<span class='our-people-name transparent-blue'>-->
								
								<!--	<?php //the_title_attribute( 'echo=0' ) ?>-->
								
								<!--</span>-->
								
								<!--<span class='our-people-name-hover transparent-blue'>-->
								
									<?php //the_title_attribute( 'echo=0' ) ?><br />
									
									<!--<span class='person-title'><?=$custom_fields['jtitle'][0] ?></span>-->
								
								<!--</span>-->
								
							<!--</a>-->
				
						<!--</div>-->
                        
						 <?php //endif; ?>
	
					<?php //endwhile;	?>

				<?php //endif; // End check for published posts. ?>
	</div>
</div>
<?php get_footer(); ?>