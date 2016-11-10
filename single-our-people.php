<?php
/**
 * Template Name: Person Template
 * Description: A Page Template for the employees.
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

	<div id='left-callout' class='transparent-blue personside three columns'>
	    <h3 class="side3">ATTORNEYS</h3>
    	<ul>
    	<?php 
		
// 			$people_args = array(
// 						'post_parent' => 10,
// 						'post_type' => 'page',
// 						'post_status' => 'publish',
// 						'posts_per_page' => 30,
// 						'no_found_rows' => true,'orderby' => 'menu_order', 'order' => 'asc'
// 					);
			$attorney_id = get_the_ID();
					
			$attorney_args = array(
                          'post_type' => 'our-people',
                          'orderby' => 'menu_order',
                          'tax_query' => array(
                          					array(
                          						'taxonomy' => 'employee_status',
                          						'field' => 'slug',
                          						'terms' => 'attorney',
          						),
                          	),
                          'order' => 'ASC',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                  );
					
			// The people posts query.
			$attorneys = new WP_Query( $attorney_args );
			
			// Proceed only if published posts exist
			if ( $attorneys->have_posts() ) : ?>
                
                
                
				
<?php				while ( $attorneys->have_posts() ) : $attorneys->the_post(); 
                    $attorney_single_id = get_the_ID();
?>
					<?php //if( get_field('category') == 'Attorney' ): ?>
					<li <?php if ($attorney_id == $attorney_single_id){ echo 'class="current_page_item"'; } ?> ><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
				    <?php //endif;?>
<?php				endwhile; ?>

				
			
<?php			endif;
			wp_reset_postdata();
					
	    ?>
        
        <h3 class="side3 para">PARALEGALS</h3>
        <ul>
        	<?php 
		
// 			$people_args = array(
// 						'post_parent' => 10,
// 						'post_type' => 'page',
// 						'post_status' => 'publish',
// 						'posts_per_page' => 30,
// 						'no_found_rows' => true
// 					);
			
			$paralegal_id = get_the_ID();
			
			$paralegal_args = array(
                          'post_type' => 'our-people',
                          'orderby' => 'menu_order',
                          'tax_query' => array(
                          					array(
                          						'taxonomy' => 'employee_status',
                          						'field' => 'slug',
                          						'terms' => 'paralegal',
          						),
                          	),
                          'order' => 'ASC',
                          'posts_per_page' => -1,
                          'post_status' => 'publish',
                  );
					
			// The people posts query.
			$paralegal = new WP_Query( $paralegal_args );
			
			// Proceed only if published posts exist
			if ( $paralegal->have_posts() ) : ?>
            
                
				
<?php				while ( $paralegal->have_posts() ) : $paralegal->the_post(); 
                    $paralegal_single_id = get_the_ID();
?>
					<?php //if( get_field('category') != 'Attorney' ): ?>
					<li<?php if ($paralegal_id == $paralegal_single_id){ echo 'class="current_page_item"'; } ?>><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></li>
				    <?php //endif;?>
<?php				endwhile; ?>

				
			
<?php			endif;
			wp_reset_postdata();
					
	    ?>
        
        </ul>
    </div>
    
    <div class="nine columns">
    <div id='interior-header' class='transparent-blue'>
        
        <h1>our people</h1>

    </div>
    
    <div id='interior-content' class='transparent-gray'>
        
        	<h2><?php wp_title("",true); ?></h2>
        
	<?php while ( have_posts() ) : the_post(); ?>
    
    		<?php $custom_fields = get_post_custom( $post->ID ); ?>
            
            <div class="row">
        		<div id='person-contact-info' class="person_info three columns" ><!---->
                    <div class="pci">
    				<?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( array(210,220) ); 
                        }
                    ?>
                    
                    <div class='social-media'>
                    
                    	<?php if( $custom_fields['email'][0] ): ?>
                        
                        	<a href='mailto:<?php echo $custom_fields['email'][0] ?>' class='email' target="_blank"><img src='<?php echo get_template_directory_uri('/');?>/images/sharethis-email.png' border='0'/></a>
                            
                        <?php endif; ?>
                        
                        <?php if( $custom_fields['facebook'][0] ): ?>
                        
                        	<a href='<?php echo $custom_fields['facebook'][0] ?>' class='facebook' target="_blank"><img src='<?php echo get_template_directory_uri('/');?>/images/sharethis-facebook.png' border='0'/></a>
                            
                        <?phpendif; ?>
                            
                        <?phpif( $custom_fields['linkedin'][0] ): ?>
                        
                        	<a href='<?php echo $custom_fields['linkedin'][0] ?>' class='linkedin' target="_blank"><img src='<?php echo get_template_directory_uri('/');?>/images/sharethis-linkedin.png' border='0'/></a>
                            
                        <?php endif; ?>
                    </div>
                    
                    <p>
                        214 Capitol St.<br>
                        Charleston, WV 25301            
                    </p>
                    
                    
                    <p>
                    	<?php if( $custom_fields['phone'][0] ): ?>
                    
                		<span class="lablel">Tel: </span><span class="info"><strong><?php echo $custom_fields['phone'][0] ?></strong></span><br />
                    
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['direct'][0] ): ?>
                    
                		<span class="lablel">Direct: </span><span class="info"><strong><?php echo $custom_fields['direct'][0] ?></strong></span><br />
                    
                    <?php endif; ?>
                    
                     <?php if( $custom_fields['mobile'][0] ): ?>
                    
                		<span class="lablel">Mobile: </span><span class="info"><strong><?php echo $custom_fields['mobile'][0] ?></strong></span><br />
                    
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['fax'][0] ): ?>
                    
                    	<span class="lablel">Fax: </span><span class="info"><strong><?php echo $custom_fields['fax'][0] ?></strong></span><br />
                        
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['email'][0] ): ?>
                    
                    	<span class="lablel">Email: </span><span class="info"><strong><a href='mailto:<?php echo $custom_fields['email'][0] ?>' style='color: #000;'><?php echo $custom_fields['email'][0] ?></a></strong></span>
                        
                    <?php endif; ?>
                    
                    
                     <?php 
					 $other = get_field('other');
					 if( $other !=''): ?>
                    
                    	<?php the_field('other'); ?>
                        
                    <?php endif; ?>
                    </p>
                    </div>
                    
                    <div class="pci">
                         <?php 
    					 $other = get_field('other');
    					 if( $other !=''): ?>
                        
                        	<?php the_field('other'); ?>
                            
                        <?php endif; ?>
                        
                    </div>
                    
                    <!--<p>&nbsp;</p>-->
                
                </div>
            
                <div id='person-bio' class="person_info nine columns " ><!---->
    
    				<?php get_template_part( 'content', 'page' ); ?>
            
                    <?php comments_template( '', true ); ?>
            
            	</div>
            </div>
    <?php endwhile; // end of the loop. ?>
    
    </div>
    </div>
<?php get_footer(); ?>