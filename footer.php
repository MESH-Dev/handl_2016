	</div><!--end #content.content-->
  </main> 
    <footer id='footer' class="transparent-blue" ><!--style="top:20px"-->
    
    	<div  class="container"> <!-- footer_bg id="container" -->
          <div class="row">
          <?php 
            
            //Edtiable via Options page//
            $company_phone = get_field('phone_number', 'options');
            $company_fax = get_field('fax', 'options');
            $company_email = get_field('company_email', 'options');
            $company_address = get_field('address','options');
          ?>
          
          <div class="six columns">
            <p class="disclaimer">This may be considered AN ADVERTISEMENT or Advertising Material under the Rules of Professional Conduct governing lawyers in West Virginia.This web site is designed for general information only. The information presented at this site should not be construed to be formal legal advice nor the formation of a lawyer/client relationship.</p>
            <p>&copy; <?php echo date('Y'); ?> Hendrickson & Long, PLLC. All rights reserved. This site made by: <a href='http://www.meshfresh.com/' target='_blank'>MESH DESIGN</a></p>
          </div>
          <div class="three columns">
            <div class="company-info">
              <div class="table-row">
                <span class="table-cell first">Call: </span><span class="table-cell info"><?php echo $company_phone; ?></span>
              </div>
              <div class="table-row">
                <span class="table-cell first">Fax: </span><span class="table-cell info"><?php echo $company_fax; ?></span><br />
              </div>
              <div class="table-row">
                <span class="table-cell first">Email: </span><span class="table-cell info"><a href="mailto:<?php echo $company_email; ?>" ><?php echo $company_email; ?></a></span>
              </div>
            </div>
            
            <p style='font-style: italic;'>
            	<?php echo $company_address; ?>
            </p>
          </div>
           <div class="three columns">
            <ul class='social-media'>
                        <li><span class="st_email_custom st" ><img src="<?php bloginfo( 'template_directory' ); ?>/images/sharethis-email.png"></span></li>
                        <li><span class="st_sharethis_custom st" ><img src="<?php bloginfo( 'template_directory' ); ?>/images/sharethis-sharethis.png"></span></li>
                        <li><a href='https://twitter.com/HendricksonLong' class='twitter'><img src='<?php bloginfo( 'template_directory' ); ?>/images/sharethis-twitter.png' border='0'/></a></li>
                        <li><a href='https://www.facebook.com/HendricksonLongPLLC ' class='facebook'><img src='<?php bloginfo( 'template_directory' ); ?>/images/sharethis-facebook.png' border='0'/></a></li>
                        <!--<li><a href='http://www.linkedin.com' class='linkedin'><img src='<?php bloginfo( 'template_directory' ); ?>/images/sharethis-linkedin.png' border='0'/></a></li>-->
                    </ul>
          </div>
          
          <p><?php //the_field( 'footer_images',5); ?></p>
      
          <!--<div id="accolades">
            <div id="logo_topL" class="footer_accolades"><a href="" target="_blank"></a></div>
            <div id="logo_chambers" class="footer_accolades"><a href="http://www.chambersandpartners.com/USA/Firms/22395828-70555" target="_blank"></a></div>
            <div id="logo_us" class="footer_accolades"><a href="http://www.chambersandpartners.com/USA/Firms/22395828-70555" target="_blank"></a></div>
            <div id="logo_bestL" class="footer_accolades"><a href="http://www.bestlawyers.com/Search/ShowProfile.aspx?rec_type=L&rec_id=44151" target="_blank"></a></div>
          <div id="logo_superL" class="footer_accolades"><a href="http://www.superlawyers.com/search?q=hendrickson&l=west-virginia" target="_blank"></a></div>
          <div id="logo_cawv" class="footer_accolades"><a href="" target="_blank"></a></div>
          <div id="logo_agc" class="footer_accolades"><!--<a href="" target="_blank"></a></div>
          </div>-->
       
          
          <style>
          #accolades {
            width: 960px;
            height: 61px;
            background: transparent url('http://www.handl.com/wp-content/themes/twentyeleven/images/footer_acc.png') no-repeat;
            margin: 0px auto;
            position: relative;
            z-index: 9999;
            margin-left: 10px;
            margin-bottom: 5px;
          }

          .footer_accolades {
            display: block;
            float: left;
            background: transparent;
            border: 0px solid #ccc;
            height: 60px;
            margin: 0px 13px 0px 0px;
          }
           .footer_accolades a {
              display: block;
              width: 100%;
              height: 100%;
           }
          
          #logo_topL{width: 61px;}

          #logo_us{width: 61px;}
          
          #logo_chambers{width: 118px;}
          
          #logo_bestL{width: 146px;}
          
          #logo_superL{width: 130px;}
          
          #logo_cawv{width: 165px;}
          
          #logo_agc{width:179px;}
          
          
                    
          
          </style>
          
          
          
            
        </div>
        </div>
    </footer>
    
    <?php wp_footer(); ?>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39749842-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>       
</body>
</html>
