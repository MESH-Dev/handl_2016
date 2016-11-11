<?php
/**
 * Template Name: Person Template
 * Description: A Post Template for the employees.
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

	<div id='left-callout' class='transparent-blue personside'>
    	<ul>
    	<?php 
		
			$people_args = array(
						'post_parent' => 10,
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => 30,
						'no_found_rows' => true,'orderby' => 'menu_order', 'order' => 'asc'
					);
					
			// The people posts query.
			$people = new WP_Query( $people_args );
			
			// Proceed only if published posts exist
			if ( $people->have_posts() ) : ?>
            
                
				<h3 class="side3">ATTORNEYS</h3>
<?php				while ( $people->have_posts() ) : $people->the_post(); ?>
					<?php if( get_field('category') == 'Attorney' ): ?>
					<li><a href='<?php the_permalink(); ?>'><?php the_title() ?></a></li>
				    <?php endif;?>
<?php				endwhile; ?>

				
			
<?php			endif;
			rewind_posts();
					
	    ?>
        
        
        	<?php 
		
			$people_args = array(
						'post_parent' => 10,
						'post_type' => 'page',
						'post_status' => 'publish',
						'posts_per_page' => 30,
						'no_found_rows' => true
					);
					
			// The people posts query.
			$people = new WP_Query( $people_args );
			
			// Proceed only if published posts exist
			if ( $people->have_posts() ) : ?>
            
                
				<h3 class="side3 para">PARALEGALS</h3>
<?php				while ( $people->have_posts() ) : $people->the_post(); ?>
					<?php if( get_field('category') != 'Attorney' ): ?>
					<li><a href='<?php the_permalink(); ?>'><?php the_title_attribute( 'echo=0' ) ?></a></li>
				    <?php endif;?>
<?php				endwhile; ?>

				
			
<?php			endif;
			rewind_posts();
					
	    ?>
        
        </ul>
    </div>
    
    <div id='interior-header' class='transparent-blue'>
        
        <h1>our people</h1>

    </div>
    
    <div id='interior-content' class='transparent-gray'>
        
        	<h2><?php wp_title("",true); ?></h2>
        
	<?php while ( have_posts() ) : the_post(); ?>
    
    		<?php $custom_fields = get_post_custom( $post->ID ); ?>
            
    		<div id='person-contact-info'>
    
				<?php
                    if ( has_post_thumbnail() ) {
                        the_post_thumbnail( array(210,220) ); 
                    }
                ?>
                
                <div class='social-media' style='width: 100%;'>
                
                	<?php if( $custom_fields['email'][0] ): ?>
                    
                    	<a href='mailto:<?php $custom_fields['email'][0] ?>' class='email' target="_blank"><img src='/images/sharethis-email.png' border='0'/></a>
                        
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['facebook'][0] ): ?>
                    
                    	<a href='<?php $custom_fields['facebook'][0] ?>' class='facebook' target="_blank"><img src='/images/sharethis-facebook.png' border='0'/></a>
                        
                    <?phpendif; ?>
                        
                    <?phpif( $custom_fields['linkedin'][0] ): ?>
                    
                    	<a href='<?php $custom_fields['linkedin'][0] ?>' class='linkedin' target="_blank"><img src='/images/sharethis-linkedin.png' border='0'/></a>
                        
                    <?php endif; ?>
                </div>
                
                <p>
                    214 Capitol St.<br>
                    Charleston, WV 25301            
                </p>
                
                <p>
                
                	<?php if( $custom_fields['phone'][0] ): ?>
                    
                		<span class="lablel">Tel: </span><span class="info"><strong><?php $custom_fields['phone'][0] ?></strong></span><br />
                    
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['direct'][0] ): ?>
                    
                		<span class="lablel">Direct: </span><span class="info"><strong><?php $custom_fields['direct'][0] ?></strong></span><br />
                    
                    <?php endif; ?>
                    
                     <?php if( $custom_fields['mobile'][0] ): ?>
                    
                		<span class="lablel">Mobile: </span><span class="info"><strong><?php$custom_fields['mobile'][0] ?></strong></span><br />
                    
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['fax'][0] ): ?>
                    
                    	<span class="lablel">Fax: </span><span class="info"><strong><?php$custom_fields['fax'][0] ?></strong></span><br />
                        
                    <?php endif; ?>
                    
                    <?php if( $custom_fields['email'][0] ): ?>
                    
                    	<span class="lablel">Email: </span><span class="info"><strong><a href='mailto:<?php$custom_fields['email'][0] ?>' style='color: #000;'><?php$custom_fields['email'][0] ?></a></strong></span>
                        
                    <?php endif; ?>
                    
                    
                     <?php 
					 $other = get_field('other');
					 if( $other !=''): ?>
                    
                    	<?php the_field('other'); ?>
                        
                    <?php endif; ?>
                    
                    
                </p>
                
            
            </div>
            
            <div id='person-bio'>

				<?php get_template_part( 'content', 'page' ); ?>
        
                <?php comments_template( '', true ); ?>
        
        	</div>
            
    <?php endwhile; // end of the loop. ?>
    
    </div>
            
<?php get_footer(); ?>