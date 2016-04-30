/*
* jQuery Slider Plugin
* Version : Am2_SimpleSlider.js
* author  :amit & amar
* website :
* Date    :06-2-2014
 
* NOTE : "jQuery v1.8.2 used while developing"
*/

(function ($) {
    
   
    jQuery.fn.Am2_SimpleSlider = function () {
        //popup div
 //$div = $('<div class="product-gallery-popup"> <div class="popup-overlay"></div> <div class="product-popup-content"> <div class="product-image "> <img style="width:95%;margin-top:3%;"  id="gallery-img" src="" alt="" /> <div class="gallery-nav-btns"> <a id="nav-btn-next" class="nav-btn next" ></a> <a id="nav-btn-prev" class="nav-btn prev" ></a></div> </div><div class="product-information"> <p class="product-desc"></p></div> <div class="clear"></div><a href="#" class="cross">X</a></div></div>').appendTo('body');
       
	   $div = $('<div class="product-gallery-popup"> '+
					'<div class="popup-overlay"></div>'+
				' 	<div class="product-popup-content"> '+
						'<div class="product-image">'
							+'<div style="display:none;" class="html5gallery" data-skin="horizontal" data-width="400" data-height="400">'
							+' <a href="data:image/jpeg;base64,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"><img src="data:image/jpeg;base64,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" alt="Ford Logo"></a>'
							+'<a href="http://assets.forddirect.fordvehicles.com/assets/2016_Ford_Mustang_J1/NGBS/Model_Image3/Model_Image3_136B520A-C3FD-6818-DA32-1D68DA321D68.jpg"><img src="http://assets.forddirect.fordvehicles.com/assets/2016_Ford_Mustang_J1/NGBS/Model_Image3/Model_Image3_136B520A-C3FD-6818-DA32-1D68DA321D68.jpg" alt="Tulips"></a>'
							
							+ '<a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>'
							+'</div>'+
							'<div class = "options">'+
								'<div onclick="shareBtnClick();" class="ui tiny item primary button share-btn">Share</div>'+
								'<div onclick="copyUrl(this.id)" class="ui tiny item primary button copy-url">Copy URL</div>'+
								'<div onclick="window.open(this.id)" class="ui tiny item primary button org-url">Original URL</div>'+
							'</div>'+
						'</div>'+
						
					'<div class="product-information"> ' + 
                                            '<h2  data-title></h2><p class="product-desc" style = "overflow-y:scroll;height: 90%;"></p>'+
                                             '<div class = "ad_img_div"></div>' +
                                        '</div>' +
					'<div class="clear"></div>'+
					'<a href="#" class="cross">X</a>'+
					'</div>'+
				'</div>').appendTo('body');

        //on image click   
        $(this).click(function () {
            $('.product-gallery-popup').fadeIn(500);
            $('body').css({ 'overflow': 'hidden' });
           // $('.product-popup-content .product-image img').attr('src', $(this).find('img').attr('src'));
		    $('.product-popup-content .product-information h2').text($(this).find('h2').attr('data-title'));
            $('.product-popup-content .product-information p').text($(this).find('div').attr('data-desc'));
            $Current = $(this);
            $PreviousElm = $(this).prev();
            $nextElm = $(this).next();
            if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
            else { $('.nav-btn.prev').css({ 'display': 'block' }); }
            if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
            else { $('.nav-btn.next').css({ 'display': 'block' }); }
        });
        //on Next click
        $('.next').click(function () {
            $NewCurrent = $nextElm;
            $PreviousElm = $NewCurrent.prev();
            $nextElm = $NewCurrent.next();
            $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
          
          
            
            $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
            if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
            else { $('.nav-btn.prev').css({ 'display': 'block' }); }
            if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
            else { $('.nav-btn.next').css({ 'display': 'block' }); }
        });
        //on Prev click
        $('.prev').click(function () {
            $NewCurrent = $PreviousElm;
            $PreviousElm = $NewCurrent.prev();
            $nextElm = $NewCurrent.next();
            $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
            
            $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
            if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
            else { $('.nav-btn.prev').css({ 'display': 'block' }); }
            if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
            else { $('.nav-btn.next').css({ 'display': 'block' }); }
        });
        //Close Popup
        $('.cross,.popup-overlay').click(function () {
            $('.product-gallery-popup').fadeOut(500);
            $('body').css({ 'overflow': 'initial' });
        });

        //Key Events
        $(document).on('keyup', function (e) {
            e.preventDefault();
            //Close popup on esc
            if (e.keyCode === 27) { $('.product-gallery-popup').fadeOut(500); $('body').css({ 'overflow': 'initial' }); }
            //Next Img On Right Arrow Click
            if (e.keyCode === 39) { NextProduct(); }
            //Prev Img on Left Arrow Click
            if (e.keyCode === 37) { PrevProduct(); }
        });

        function NextProduct() {
            if ($nextElm.length === 1) {
                $NewCurrent = $nextElm;
                $PreviousElm = $NewCurrent.prev();
                $nextElm = $NewCurrent.next();
                $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
                
                $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
                if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
                else { $('.nav-btn.prev').css({ 'display': 'block' }); }
                if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
                else { $('.nav-btn.next').css({ 'display': 'block' }); }
            }

        }

        function PrevProduct() {
            if ($PreviousElm.length === 1) {
                $NewCurrent = $PreviousElm;
                $PreviousElm = $NewCurrent.prev();
                $nextElm = $NewCurrent.next();
                $('.product-popup-content .product-image img').clearQueue().animate({ opacity: '0' }, 0).attr('src', $NewCurrent.find('img').attr('src')).animate({ opacity: '1' }, 500);
        
                $('.product-popup-content .product-information p').text($NewCurrent.find('div').attr('data-desc'));
                if ($PreviousElm.length === 0) { $('.nav-btn.prev').css({ 'display': 'none' }); }
                else { $('.nav-btn.prev').css({ 'display': 'block' }); }
                if ($nextElm.length === 0) { $('.nav-btn.next').css({ 'display': 'none' }); }
                else { $('.nav-btn.next').css({ 'display': 'block' }); }
            }

        }
        
        
        
    };

} (jQuery));