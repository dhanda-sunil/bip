function _dir(o, str){
	console.log(str);
	console.dir(o);
}
function showSubQuest(id){
    jQuery('#'+id).slideToggle();
    jQuery('#arrow_'+id).toggleClass('arrowTop');
}

function showSubResponse(id){
    jQuery('#'+id).slideToggle();
    jQuery('#arrow_'+id).toggleClass('arrowWhiteTop');
}

jQuery(document).ready(function($){
	var screenH 	= $(window).height(),
		screenW		= $(window).width(),
		wpadminbarH	= 0,
		scrollH		= $(window).scrollTop();
		
	if($('#wpadminbar').length>0){
		var wpadminbarH = $('#wpadminbar').height();
		screenH			= screenH-wpadminbarH;
	}
	
/* ----- Main Menu ----- */
	if($().mobileMenu) {
		$('#header nav').mobileMenu();
	}
	
	$(".select-menu option").click(function(event){
		event.preventDefault();
		target_item = $(this).attr("value");
		$('#header nav a').each(function(){
			check_href = $(this).attr("href");
			if( ~target_item.indexOf(check_href) ){
				$(this).click();
			}
		});
	});

	
	/*Control menu Current item
	if($('#header nav>ul.primary-nav>li.current-menu-item').length>0){
		var currentNavItem	= $('#header nav>ul.primary-nav>li.current-menu-item');
		var thisOffset 		= currentNavItem.offset();
		var thisChilds 		= currentNavItem.children('ul');
		var thisChildsWidth = thisChilds.outerWidth(true);
		thisChilds.css('left',(thisOffset.left + (currentNavItem.outerWidth()/2)-thisChildsWidth/2));
	}
	Control menu on hover
	$('#header ul>li').hover(function(e){
		$(this).children('ul').show();
	},function(){
		$(this).children('ul').hide();
	});*/
	/*var hover 		= true;
	var navActive 	= false;
	$('#header nav>ul.primary-nav>li').hover(function(e){
		var $this = this;
		if(!hover){
			$('#header nav>ul.primary-nav>li').each(function(index, element){
				if($this!=element){
					if(!$(element).hasClass('current-menu-item')){
						$(element).children('ul').hide(300);
					}
				}else{
					hover = true;
				}
			});
		}
		if(hover && navActive!=$this){
			hover = false;
			navActive = $this;
			var thisChilds = $(this).children('ul');
			var thisChildsWidth = thisChilds.outerWidth(true);
			if(thisChilds.length>0){
				thisChilds.show(500);
				thisChilds.css('left',(e.pageX- e.offsetX + ($(this).outerWidth(true)/2)-thisChildsWidth/2));				
				thisChilds.bind('mouseleave', thisChilds,function(){
					if(!$($this).hasClass('current-menu-item')){
						thisChilds.hide(300);navActive=false;
					}
				});
			}
		}
	},function(){
		
	});*/
	
/* ----- Carousels & Sliders ----- */
	if($().flexslider){
		$('.flexslider').each(function(){
			var options = $.extend({}, {
				controlNav: true,
				directionalNav: true,
				slideshow: false
			}, $(this).data());
			$(this).flexslider(options);
		});
	}
/*----- Toggle Tables -----*/
	$(".handlediv").click(function () {
		if($(this).hasClass('open')){
			$(this).removeClass('open');
		}else{
			$(this).addClass('open');
		}
		_dir($(this).parents('.tablebox').children(".inside"))
      	$(this).parents('.tablebox').children(".inside").slideToggle("slow", function(){
			
		});
    });

/* ----- Navigation Scroll ----- */
	if( $(window).width() < 768 ){
		top_offset = -163;
	} else {
		top_offset = -99;
	}
	/*$('#header nav, .page-title, #copyright').localScroll({
		offset: {left: 0, top: top_offset}
	});*/
	//Detecting user's scroll
	/*$(window).scroll(function() {
		offsetTolerance = 50;
		headerWrapper = parseInt($('#header').outerHeight());
		//Check scroll position
		scrollPosition	= parseInt($(this).scrollTop());
		//Move trough each menu and check its position with scroll position then add current class
		$('#header nav a').each(function() {
			thisHref = $(this).attr('href');
			thisTruePosition = parseInt($(thisHref).offset().top);
			thisPosition = thisTruePosition - headerWrapper - offsetTolerance;
			if(scrollPosition >= thisPosition) {
				$('.current-menu-item').removeClass('current-menu-item');
				$('#header nav a[href='+ thisHref +']').parent('li').addClass('current-menu-item');
			}
		});
		//If we're at the bottom of the page, move pointer to the last section
		bottomPage	= parseInt($(document).height()) - parseInt($(window).height());
		if(scrollPosition == bottomPage || scrollPosition >= bottomPage) {
			$('.current-menu-item').removeClass('current-menu-item');
			$('#header nav a:last').parent('li').addClass('current-menu-item');
		}
	});*/
	// Fix scroll position set by browser when page loads first
	var url = window.location.hash;
	$('#header nav a[href="' + window.location.hash + '"]').click();
/* ----- Forms ----- */
	if (!Modernizr.input.placeholder){
		$("input, textarea").each(function(){
			if($(this).val()=="" && $(this).attr("placeholder")!=""){
				$(this).val($(this).attr("placeholder"));
				$(this).focus(function(){
					if($(this).val()==$(this).attr("placeholder")) $(this).val("");
				});
				$(this).blur(function(){
					if($(this).val()=="") $(this).val($(this).attr("placeholder"));
				});
			}
		});
	}
/* ----- Close alerts ----- */
	$(".alert .close").click(function(event){
		event.preventDefault();
		$(this).parent(".alert").slideUp("fast");
	});
});
