<?php
/**
* Template Name: Accolades Template
 * Description: A Page Template that provides the ability to add accolades, otherwise works just like the Default Template covered by H & L
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
        
	<div id='left-callout' class='three columns alpha transparent-blue'><!--three columns alpha-->
        
        	<?=wp_get_attachment_image( $custom_fields['image'][0], 'thumbnail' ); ?>
        
        	<p><?=$custom_fields['description'][0] ?></p>

        </div>
        <div class="nine columns"><!---->
                <div id='interior-header' class=' transparent-blue'>
                
                	<h1><?=the_title_attribute( 'echo=0' ) ?></h1>
        
                </div>
        
                <div id='interior-content' class=' transparent-gray page-contents'><!--nine columns-->
        	<div id="page_content">
	        
	        <?php if (have_rows('accolades')):
	                $ctr = 0;
	                 ?>
	        <div class="accolades">
	                <div class="row">
	                <?php while (have_rows('accolades')) : the_row();
	                
	                $has_image = get_sub_field('has_image');
	                $acc_image = get_sub_field('accolade_image');
	                //var_dump($acc_image);
	                $acc_image_url = $acc_image['sizes']['large'];
	                $acc_link = get_sub_field('accolade_link');
	                $is_external = get_sub_field('is_external');
	                $code = get_sub_field('accolade_code');
	                
	                $ctr++;
	                
	                if($is_external == 'true'){
	                        $external = 'target="_blank"';
	                }else{
	                        $external = '';
	                }
	                
                ?>
                <?php if($ctr % 3 == 0) { ?>
                
                <?php } ?>
                <div class="four columns accolade <?php echo $ctr; ?>">
                        <?php if ($has_image == 'true') { ?>
                                <?php if ($acc_link) { ?>
                                <a href="<?php echo $acc_link; ?>" <?php echo $external; ?> >
                                <?php } ?>
                                        <img src='<?php echo $acc_image_url; ?>'>
                                <?php if ($acc_link) { ?>
                                </a>
                                <?php } ?>
                        <?php }else{ ?>
                        <?php echo $code; ?>
                        <?php } ?>
                </div>
                <?php if ($ctr % 3 == 0) { ?>
                </div><div class="row">
                <?php } ?>
                <?php endwhile; ?>
                <?php if ($ctr % 3 != 0){ ?>
                </div>
                <?php } ?>
                </div>
                <?php endif; ?>

                <?php get_template_part( 'content', 'page' ); ?>

                <?php comments_template( '', true ); ?>
                <div class="clear"></div>
			</div>
		</div>
	</div>
        
   <?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>