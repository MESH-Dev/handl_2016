<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<meta name="viewport" content="width=device-width">
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script charset="utf-8" type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">
        stLight.options({
                publisherGA:"UA-35334878-1"
        });
	</script>
    
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800,600' rel='stylesheet' type='text/css'>
	
    <script type="text/javascript">
    
    //Google analytics

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-35334878-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	
	<!--//Bugherd-->
	<script type='text/javascript'>
	(function (d, t) {
	  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	  bh.type = 'text/javascript';
	  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=j9v0hxwnvxy6jabgquebpw';
	  s.parentNode.insertBefore(bh, s);
	  })(document, 'script');
	</script>
	
	<script src="https://use.typekit.net/emj2zkv.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
    
</head>

<?php 
            
            //Edtiable via Options page//
            $company_phone = get_field('phone_number', 'options');
            $company_fax = get_field('fax', 'options');
            $company_email = get_field('company_email', 'options');
            $company_address = get_field('address','options');
?>

<body <?php body_class(); ?>>

<header class="transparent-blue">
	<!--<div id='menu-background' class='transparent-blue'></div>-->
	<div  class="container"><!--id='header-wrap'-->
        <div id='header'>
                
                <div id='header-content'>
                	
                	<div class="two columns return-home">
                    	<a href='/' id='home-link'><img src='<?php echo get_template_directory_uri('/'); ?>/images/logo-hi-res.png'> </a>
                    </div>
                    
                    
                    <nav class='main_navigation seven columns'>
                    	<div class="sidr-close">
                    		<span>Close</span><i class="fa fa-fw fa-2x fa-close"></i>
                    	</div>
                    	
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class'=>'main-nav') ); ?>
                    </nav>
                    <div class="company-phone three columns">
                    	<?php echo $company_phone; ?>
                    </div>
                    <div class="mobile-trigger mobile-show">
                		<i class="fa fa-fw fa-2x fa-bars"></i>
                	</div>
                    <!--<div class='social-media'>
                       <span class="st_email_custom" ></span>
                      <span class="st_sharethis_custom" ></span>
                    <a href='https://twitter.com/HendricksonLong' class='twitter'><img src='/images/sharethis-twitter.png' border='0'/></a>
                    <a href='https://www.facebook.com/HendricksonLongPLLC ' class='facebook'><img src='/images/sharethis-facebook.png' border='0'/></a>
                    <a href='http://www.linkedin.com' class='linkedin'><img src='/images/sharethis-linkedin.png' border='0'/></a>
                    </div>-->
                    
                    
                    
                </div>
            </div>
</div>
</header>
       <main class="main-content">
        <div id='container' class="container">
        	