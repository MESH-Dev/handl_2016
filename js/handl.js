jQuery(document).ready(function($){
    
    console.log('New theme loaded!');
    
    //Hover animation for Our People archive page
    $(".our-people-list").hover(
	  function () {
		$(this).find('.our-people-name').slideToggle();
		//$(this).find('span.our-people-name-hover').slideDown()
		$(this).find('.our-people-name-hover').slideToggle();
	  }, 
	  function () {
		$(this).find('.our-people-name-hover').slideToggle();
		$(this).find('.our-people-name').slideToggle();
	  }
	);
	
	//Hover animation for Practice Areas page		
	$(".practice-area-box").hover(
	  function () {
		$(this).find('.practice-area').slideToggle();
		//$(this).find('span.our-people-name-hover').slideDown()
		$(this).find('.practice-area-hover').slideToggle();
	  }, 
	  function () {
		$(this).find('.practice-area-hover').slideToggle();
		$(this).find('.practice-area').slideToggle();
	  }
	);
			
	resize_columns();
			
	$(window).resize(function() {
	
		if( $('#container').width() == 969 ) {
			
			resize_columns();
			
		} else {
			
			$('#left-callout').css('height', 'auto' );
			
		}
		
	
	});
					
		//});
		
		function resize_columns() {
			
			if( $('#container').width() == 969 ) {
				
				if( $('#left-callout').height() < ( $('#interior-content').height() + 46 + 29 ) ) {
					
					$('#left-callout').css('height', ( $('#interior-content').height() + 46 + 29 ) );
					
				} else {
					
					$('#interior-content').height( $('#left-callout').height() - ( 46 + 29 ) );
					
				}
			
			}
		}
		
		
	//Sidr functionality
	$('.mobile-trigger').sidr({
		name: 'sidr-main',
		source: '.main_navigation',
		displace:false,
		renaming: false,
		side: 'left' // By default
	});
	
//If sidr menu item has a .sub-menu (children), append the open button
 $('.sidr ul.main-nav > li').has('.sub-menu').append('<div class="open"><i class="fa fa-fw fa-caret-down fa-2x"></i></div>');
 $('.sidr ul.main-nav li ul li').has('.sub-menu').append('<div class="open"><i class="fa fa-fw fa-plus fa-1x"></i></div>');

$('.sidr .open').toggle(function(){
	$(this).closest('li').find('ul.sub-menu:eq(0)').slideDown('slow');
	if($(this).find('i').hasClass('fa-caret-down')){
		console.log('clicked!')
		$(this).find('i').removeClass('fa-caret-down').addClass('fa-caret-up');
	}else{
		$(this).find('i').removeClass('fa-plus').addClass('fa-minus');
	}
},function(){
	$(this).closest('li').find('ul.sub-menu:eq(0)').slideUp('slow');
	if($(this).find('i').hasClass('fa-caret-up')){
		$(this).find('i').removeClass('fa-caret-up').addClass('fa-caret-down');
	}else{
		$(this).find('i').removeClass('fa-minus').addClass('fa-plus');
	}

});	
	
	$('.sidr-close').click(
	function(){
      $.sidr('close', 'sidr-main');
       //console.log("Sidr should be closed");
	});
	
}); //end doc ready
