<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		
		<!-- <div class="three columns"></div>
		<div id='left-callout shaun' class='transparent-blue'>
    
			<?php //get_sidebar(); ?>
        
        </div>-->
        <div class="twelve columns">
        	
        	<div id='' class='people-header transparent-blue'>
            
            	<h1>Attorneys</h1>
    
        	</div><!-- end interior header -->
        
    		<div class='attorneys-list'>
			<?php 
				$args = array(
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

                  $the_query = new WP_Query( $args );
			?>
			<?php if ( $the_query->have_posts() ) : 
					$a_ctr=0;
			?>
				<div class="row">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
				
					$custom_fields = get_post_custom( $post->ID );
					$a_ctr++
				?>
					
					<!-- Start Attorneys loop -->
						
						<?php 
								//var_dump(get_the_post_thumbnail_url());
								if ( has_post_thumbnail() ) {
										$people_img = get_the_post_thumbnail_url('' ,'full', '' ); 
								}else{
										$people_img = '';
								}
						?>
						
						<div class='our-people-list three columns custom' style="background-image:url('<?php echo $people_img; ?>');" >
				
							<a href='<?php the_permalink(); ?>'>
						
								<?php
									/**
									 * If the thumbnail is as big as the header image
									 * make it a large featured post, otherwise render it small
									 */
									// if ( has_post_thumbnail() ) {
									// 	the_post_thumbnail( array(210,220) ); 
									// }
								?>
								
								<div class='our-people-name transparent-blue'>
								
									<span><?php  the_title(); ?></span>
								
								</div>
								
								<div class='our-people-name-hover transparent-blue'>
									<div class="content">
										<?php the_title(); ?><br />
										
										<p class='person-title'><?php echo $custom_fields['jtitle'][0] ?><br /><br />
	                                    <?php echo $custom_fields['email'][0] ?><br />
										<?php echo $custom_fields['direct'][0] ?></p>
									</div>
								</div>
								
							</a>
				
						</div>
						
					<!-- ******************** -->
					<?php if ($a_ctr % 4 == 0) { ?>
                </div><div class="row">
                <?php } ?>
				<?php endwhile; ?>
				
			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->
		
            <!--</div>-->
			<?php endif; wp_reset_postdata(); ?>
			<?php if ($a_ctr % 4 != 0){ ?>
                </div>
            <?php } ?>
			</div><!-- end interior-content -->
			<div id='' class='people-header transparent-blue'>
            
            	<h1>Paralegals</h1>
    
        	</div><!-- end interior header -->
			<div class="paralegals-list">
				
			<?php 
				$args = array(
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

                  $the_query = new WP_Query( $args );
			?>
			<?php if ( $the_query->have_posts() ) : 
					$p_ctr=0;
			?>
			<div class="row">
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
						$p_ctr++
				?>
					
					<!-- Start Paralegal loop -->
						
						<?php 
								//var_dump(get_the_post_thumbnail_url());
								if ( has_post_thumbnail() ) {
										$people_img = get_the_post_thumbnail_url('' ,'full', '' ); 
								}else{
										$people_img = '';
								}
						?>
						
						<div class='our-people-list three columns custom' style="background-image:url('<?php echo $people_img; ?>');">
				
							<a href='<?php the_permalink(); ?>'>
						
								<?php
									/**
									 * If the thumbnail is as big as the header image
									 * make it a large featured post, otherwise render it small
									 */
									//if //( has_post_thumbnail() ) {
										//the_post_thumbnail( array(210,220) ); 
									//}
								?>
								
								<span class='our-people-name transparent-blue'>
								
									<?php  the_title(); ?>
								
								</span>
								
								<span class='our-people-name-hover transparent-blue'>
									<div class="content">
								
										<?php the_title(); ?><br />
										
										<span class='person-title'><?=$custom_fields['jtitle'][0] ?></span><br /><br />
	                                    <span class='person-title'><?=$custom_fields['email'][0] ?></span><br />
										<span class='person-title'><?=$custom_fields['direct'][0] ?></span>
									</div>
								</span>
								
							</a>
				
						</div>
						
					<!-- ******************** -->
					<?php if ($p_ctr % 4 == 0) { ?>
                		</div><div class="row">
                	<?php } ?>
				<?php endwhile; ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; wp_reset_postdata(); ?>
				<?php if ($p_ctr % 4 != 0){ ?>
                </div>
            <?php } ?>
		</div><!-- end interior-content -->
		</div><!-- end twelve columns
<?php get_footer(); ?>