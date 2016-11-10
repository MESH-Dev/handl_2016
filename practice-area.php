<?php
/**
 /**
 * Template Name: Practice Area Single Template
 * Description: A Page Template that showcases single Practice Areas covered by H & L 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
    
    	<?php $custom_fields = get_post_custom( $post->ID );  ?>
        <!--<div class="three columns">-->
        	<div id='left-callout' class='transparent-blue three columns'>
        
        	
        	<h3>Practice Areas</h3>
        	<ul>
        		
       <?php 
       
    		$pa_id = get_the_id();
    		
    		$pa_args = array(
						'post_parent' => 12,
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => -1,
						'no_found_rows' => true,
						'orderby' => 'menu_order', 
						'order' => 'asc'
				);
				
			// $pa_args = array(
			// 			'child_of'=>12,
			// 			'depth' => 0,
			// 			'sort_column' => 'menu_order',
			// 			'walker'=>'',
			// 	):
				
		// The people posts query.
			$practice_areas = new WP_Query( $pa_args );
			
			// Proceed only if published posts exist
				if ( $practice_areas->have_posts() ) : 
				while ( $practice_areas->have_posts() ) : $practice_areas->the_post(); 
					$pa_single_id = get_the_id();
				?>
			<li <?php if($pa_id == $pa_single_id){ echo 'class="current_page_item"'; } ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; endif; wp_reset_postdata();?>
			
        	</ul>
			
                
        </div>
        
        <div class="nine columns">
        <div id='interior-header' class='transparent-blue'>
        
        	<h1><?php the_title(); ?></h1>

        </div>
        
        <div id='interior-content' class='transparent-gray page-contents'>
        	<div id="page_content">
			

                <?php get_template_part( 'content', 'page' ); ?>

                <?php comments_template( '', true ); ?>
                <div class="clear"></div>
			</div>
		</div>
        
   <?php endwhile; wp_reset_postdata();// end of the loop. ?>
   
    <div class='people-header transparent-blue'>
                
                	<h1>Attorneys Practicing</h1>
                    
</div>

	<div class="related-attorneys-list">
   	<?php 
   	        
   	$practice_area = get_field('practice_type');
   	$area = $practice_area->slug;
   
   	
	$args = array(
          'post_type' => 'our-people',
          'orderby' => 'menu_order',
          'tax_query' => array(
          				'relation'=>'AND',
                                array(
  				        		'taxonomy' => 'employee_status',
  								'field' => 'slug',
  								'terms' => 'attorney',
  			        		),
			  			        array(
			  			                'taxonomy'=> 'practice_areas',
			  			                'field' => 'slug',
			  			                'terms' => $area,
			  		                ),
          	),
          'order' => 'ASC',
          'posts_per_page' => -1,
          'post_status' => 'publish',
          );

                  $the_query = new WP_Query( $args );
			?>
			<?php if ( $the_query->have_posts() ) : 
			        
			        $ra_ctr=0;
			        
		        ?>
		        <div class="row">
		        <?php  while ( $the_query->have_posts() ) : $the_query->the_post(); 
		                $ra_ctr++;
		                
		                $custom_fields = get_post_custom( $post->ID );
		                
	                	if ( has_post_thumbnail() ) {
							$people_img = get_the_post_thumbnail_url($post->ID, 'full' ); 
						}else{
							$people_img = '';
						}
		                
		        ?>

<!-- Start Attorneys loop -->
					
			<div class='our-people-list four columns custom' style="background-image:url('<?php echo $people_img; ?>');">
	
				<a href='<?php the_permalink(); ?>'>
			
					<?php
						
					
					?>
					
					<div class='our-people-name transparent-blue'>
					
						<?php  the_title(); ?>
					
					</div>
					
					<div class='our-people-name-hover transparent-blue'>
						
						<div class="content">
							<?php the_title(); ?><br />
							
							<span class='person-title'><?=$custom_fields['jtitle'][0] ?></span><br /><br />
	            			<span class='person-title'><?=$custom_fields['email'][0] ?></span><br />
							<span class='person-title'><?=$custom_fields['direct'][0] ?></span>
						</div>
					</div>
					
				</a>
	
			</div>
			
		<!-- ******************** -->	
		<?php if ($ra_ctr % 3 == 0) { ?>
            </div><div class="row">
        <?php } ?>
        <?php endwhile; ?> 
    	<?php if ($ra_ctr % 3 != 0){ ?>
            </div>
        <?php } ?>
        <?php endif; wp_reset_postdata();?>
        </div>
        </div>
<?php get_footer(); ?>