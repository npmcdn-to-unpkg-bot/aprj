<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Loud Horn Marketing</title>
        <base href="http://localhost/aprj/">
        <script src=" js/jquery.min.js" language="JavaScript"></script>
        <script src="js/jquery-1.8.2.js" language="JavaScript"></script>
        <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
        <script src="https://unpkg.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.loadTemplate-1.4.4.js" type="text/javascript"></script>
        <script src="js/semantic.js" type="text/javascript"></script>
        <script src="js/jquery.slicknav.min.js" type="text/javascript"></script>
        <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
        <script src="js/date.js" type="text/javascript"></script>
        <link href="css/semantic.css" rel="stylesheet" type="text/css"/>
        <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <link href="css/SimpleSlider.css" rel="stylesheet" type="text/css">
        <link href="css/slicknav.css" rel="stylesheet" type="text/css">

        <script src="js/Am2_SimpleSlider.js" type="text/javascript"></script>

        <style type = "text/css">

            body {
                top: 6%;
                background-image: url("bgimages/tiledBg.png");
                overflow-y:scroll;
            }
            #login-content {
                display: none;
                position: fixed;
                top: 8%;
                right: 0;
                z-index: 999;    
                background: #fff;
                background-image: linear-gradient(top, #fff, #eee);  
                padding: 15px;
                box-shadow: 0 2px 2px -1px rgba(0,0,0,.9);
                border-radius: 3px 0 3px 3px;
            }
            #mobileMenu{
                display: none;
                width: 50%;
                font-size: '30px';
            }
            .slicknav_menu{
                background: #EFEDED;
                font-size: '30px';
            }


            #search-content {
                display: none;
                position: fixed;
                top: 8%;
                left: 25%;
                z-index: 999;    
                background: #fff;
                background-image: linear-gradient(top, #fff, #eee);  
                padding: 15px;
                box-shadow: 0 2px 2px -1px rgba(0,0,0,.9);
                border-radius: 3px 0 3px 3px;
                width: 50%;
            }

            .sizer{
                width: 12%;
            }
            #wrapper {
                width: 95%;
                margin: 20px auto;
                position: relative;
            }

            #columns {
                //background: #EEE;
               // object-position:  center;
               // max-width: 1200px;
                
              }

              /* clearfix */
              #columns:after {
                content: '';
                display: block;
                clear: both;
              }
                /*display: block;*/
                /*                -webkit-column-count: 3;
                                -webkit-column-gap: 8px;
                                -webkit-column-fill: auto;
                                -moz-column-count: 3;
                                -moz-column-gap: 8px;
                                -moz-column-fill: auto;
                                column-count: 3;
                                column-gap: 8px;
                                column-fill: auto;*/
            

            .pin {
                
/*                display: inline-block;

                background: #FEFEFE;
                //border: 2px solid #FAFAFA;
                box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
                margin: 0 2px 15px;
                -webkit-column-break-inside: avoid;
                -moz-column-break-inside: avoid;
                column-break-inside: avoid;
                //               padding: 15px;
                //                padding-bottom: 5px;
                background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
                opacity: 1;

                -webkit-transition: all .2s ease;
                -moz-transition: all .2s ease;
                -o-transition: all .2s ease;
                transition: all .2s ease;
                cursor: pointer; cursor: hand;*/
                background: #FEFEFE;
                margin-top: 10px;
                 -webkit-column-break-inside: avoid;
                -moz-column-break-inside: avoid;
                column-break-inside: avoid;
                //width: 15%;
                height: 500px;
                //height: auto;
                //overflow: visible;
                //float: left;
                background: #D00;
                border: 2px solid #333;
                border-color: hsla(0, 0%, 0%, 0.5);
                border-radius: 5px;
                
            }

            .pin img {
                //width: 250px;
                //height:120px;
                //width: 100%;
/*                border-bottom: 1px solid #ccc;
                padding-bottom: 1px;
                margin-bottom: 1px;*/
            }

            .pin p {
                font: 12px/18px Arial, sans-serif;
                color: grey;
                margin: 0;
                padding: 10px;
                padding-bottom: 15px;
                display:block;
                //width:250px;
            }

            .pin h3 {
                font: bold 22px/22px Calibri, sans-serif;
                color: grey;
                margin: 0;
                padding: 10px;
                padding-bottom: 5px;
                word-break: break-all;
                display:block;
                //width:250px;
            }

            .pinads {
                display: inline-block;
                background: transparent;
                //border: 2px solid #FAFAFA;
                box-shadow: 0 ;
                //margin: 0 2px 15px;
                -webkit-column-break-inside: avoid;
                -moz-column-break-inside: avoid;
                column-break-inside: avoid;
                //               padding: 15px;
                //                padding-bottom: 5px;
                background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
                opacity: 1;

                -webkit-transition: all .2s ease;
                -moz-transition: all .2s ease;
                -o-transition: all .2s ease;
                transition: all .2s ease;
                cursor: pointer; cursor: hand;
            }

            .pinads img {
                width: 100%;
            }

            .pin p {
                font: 12px/18px Arial, sans-serif;
                color: grey;
                margin: 0;
                padding: 10px;
                padding-bottom: 15px;
            }

            .pin h3 {
                font: bold 22px/22px Calibri, sans-serif;
                color: grey;
                margin: 0;
                padding: 10px;
                padding-bottom: 5px;
            }
            /*            @media (max-width: 460px) {
                             #menu is the original menu 
                            #mobileMenu {
                                display: block;
                            }
                            #menuControl {
                                display: none;
                            }
                        }*/
            @media (min-width : 260px) {
                /*#columns {
                    -webkit-column-count: 2;
                    -moz-column-count: 2;
                    column-count: 2;
                }*/
                .pin p {
                    display: none;
                }
                .pin h3 {
                    font: bold 40px/40px Calibri, sans-serif;
                }
                .article_content {
                    font: 34px/42px Arial, sans-serif;
                }
                .article_title{
                    font: bold 40px/40px Calibri, sans-serif;
                }
                .pin{
                    width: 45%;
                }
                .sizer{
                    width: 50%;
                }
            }

            @media (min-width: 560px) {
                /*#columns {
                    -webkit-column-count: 3;
                    -moz-column-count: 3;
                    column-count: 3;
                }*/
                .pin p {
                    font: 22px/28px Arial, sans-serif;
                    display: inherit; 
                }
                .pin h3 {
                    font: bold 30px/30px Calibri, sans-serif;
                }
                .article_content {
                    font: 28px/34px Arial, sans-serif;
                }
                .article_title{
                    font: bold 32px/32px Calibri, sans-serif;
                }
                .pin{
                    width: 30%;
                }
                .sizer{
                    width: 33.33%;
                }
            }

            @media (min-width: 960px) {
                /*#columns {
                    -webkit-column-count: 4;
                    -moz-column-count: 4;
                    column-count: 4;
                }*/
                .pin p {
                    font: 16px/22px Arial, sans-serif;
                    display: inherit;
                }
                .pin h3 {
                    font: bold 26px/26px Calibri, sans-serif;
                }
                .article_content {
                    font: 26px/32px Arial, sans-serif;
                }
                .article_title{
                    font: bold 28px/28px Calibri, sans-serif;
                }
                .pin{
                    width: 22%;
                }
                .sizer{
                    width: 25%;
                }
            }

            @media (min-width: 1100px) {
                /*#columns {
                    -webkit-column-count: 5;
                    -moz-column-count: 5;
                    column-count: 5;
                }*/
                .pin p {
                    font: 12px/18px Arial, sans-serif;
                    display: inherit;
                }
                .pin h3 {
                    font: bold 22px/22px Calibri, sans-serif;
                }

                .article_content {
                    font: 12px/18px Arial, sans-serif;
                }
                .article_title{
                    font: bold 22px/22px Calibri, sans-serif;
                }
                .pin{
                    width: 19%;
                }
                .sizer{
                    width: 20%;
                }
            }

            #columns:hover .pin:hover {
                opacity: 0.8;
            }
        </style>

        <script type="text/javascript">
            $('.pin').Am2_SimpleSlider();
            $('#wrapper').imagesLoaded()
                .always( function( instance ) {
                    console.log('all images loaded');
                })
                .done( function( instance ) {
                    console.log('all images successfully loaded');
                });

        </script>

        <script>
            var ads;
            var ad_count = 0;
            var isSearchResult = false;
            console.log("ADS");
            function getAds() {
                $.ajax({
                    url: "advertisement/getAllAds",
                    success: function (data) {
                        ads = jQuery.parseJSON(data);
                        console.log("getAllads");
                        console.log(data);
                        console.log("/getAllAds");
                        var allpins=$(".pin");

                        $.each( allpins, function( key, value ) {
                            //alert( key + ": " + value );
                            //     console.log(value);
                        });

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    },

                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });
            }

            function ValidateEmail() {
                var re = /[^\s@]+@[^\s@]+\.[^\s@]+/;
                if (re.test($('#emailNewsletter').val())) {
                    $('#subscribe_submit').removeClass('disabled');
                }
                else {
                    if (!$('#subscribe_submit').hasClass('disabled')) {
                        $('#subscribe_submit').addClass('disabled');
                    }
                }
            }
            function searchEnterPressed(e, text) {
                if (e.keyCode === 13) {
                    
                    searchArticles(text);
                }

                //return false;
            }


            var lastArticleId;
            var lastCategoryId;
            var is_loading = false; // initialize is_loading by false to accept new loading
            var limit = 10; // limit items per page
            $(document).scroll(function () {
                if(loadByScrolling){
                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    if ($(document).scrollTop() + $(window).height() <= $(document).height()) {
                        if (is_loading == false) { // stop loading many times for the same page
                            // set is_loading to true to refuse new loading
                            is_loading = true;
                            // display the waiting loader
                            $('#loader').show();
                            // execute ann ajax query to load more statments
                            if (limit == 0) {
                                limit = 10;
                            }
                            console.log("MORE ARTICLES");
                            $.ajax({
                                url: 'article/loadMoreArticles',
                                data: {
                                    id: lastCategoryId,
                                    type: 'CATEGORY',
                                    articleId: lastArticleId,
                                    limit: limit
                                },
                                success: function (data) {
                                    console.log("loadMoreArticles");
                                    console.log(data);
                                    console.log("/loadMoreArticles");
                                    // now we have the response, so hide the loader
                                    $('#loader').hide();
                                    // append: add the new statments to the existing data

                                    var data = jQuery.parseJSON(data);
                                    for (var i in data){
                                        /*$("#columns").loadTemplate($("#pin"),
                                                {
                                                    'article_id': data[i].article_id,
                                                    'articleImage': data[i].thumbnail,
                                                    'title': data[i].title,
                                                    'display_content': data[i].display_content,
                                                    'display_date': data[i].date
                                                }, {append: true});
                                                if (i % 5 === 0) {
                                                //add ad
                                                    $("#columns").loadTemplate($("#pinads"),
                                                            {
                                                                'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                                                'articleImage': ads[ad_count].main_ad_image,
                                                                'title': '',
                                                                'display_content': '',
                                                                'url_': ads[ad_count].ad_url
                                                            }, {append: true});
                                                    ad_count += 1;
                                                }*/
                                                
                                        if($.browser.mozilla){
                                            var x = data[i].thumbnail.toString();
                                            data[i].thumbnail = x.replace(/\\/g,"/");
                                            //alert(x +' | '+data[i].thumbnail);
                                        }
                                        console.log(data[i]);
                                        var $elems = $('<div/>').loadTemplate($("#pin"),
                                        {
                                            'article_id': data[i].article_id,
                                            'articleImage': data[i].thumbnail,
                                            'title': data[i].title,
                                            'display_content': data[i].display_content,
                                            'display_date': data[i].date
                                        });
                                        var $pin = $elems[0].children[0];
                                        fitImages($pin);
                                        $($pin).find('img').load(function (){
                                            $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                            $grid.masonry();
                                            $grid.masonry('layout');
                                            $grid.masonry('reloadItems');
                                            //alert('oadd');
                                        });
                                        //$grid.append( $pin ).masonry( 'appended', $pin );
                                        if (i % 5 === 0) {
                                        //add ad
                                             if($.browser.mozilla){
                                                var x = ads[ad_count].main_ad_image.toString();
                                                ads[ad_count].main_ad_image = x.replace(/\\/g,"/");
                                                //alert(x +' | '+data[i].thumbnail);
                                            }
                                            console.log(ads);
                                             var $elems = $('<div/>').loadTemplate($("#pinads"),
                                                    {
                                                        'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                                        'articleImage': ads[ad_count].main_ad_image,
                                                        'title': '',
                                                        'display_content': '',
                                                        'url_': ads[ad_count].ad_url
                                                    }, {append: true});
                                            ad_count += 1;
                                            var $ad = $elems[0].children[0];
                                            fitImages($ad);
                                            $($ad).find('img').load(function (){
                                                $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                                //alert('oadd');
                                                $grid.masonry('layout');
                                                $grid.masonry('reloadItems');
                                            });
                                            //$grid.append( $ad ).masonry( 'appended', $ad );
                                        }
                                    }

                                    ;


                                    // set is_loading to false to accept new loading
                                    is_loading = false;
                                    limit = limit + 10;
                                },
                                async: true,
                                type: 'GET'
                            });
                        }
                    }
                }
                else {
                    if ($(document).scrollTop() + $(window).height() == $(document).height()) {
                        if (is_loading == false) { // stop loading many times for the same page
                            // set is_loading to true to refuse new loading
                            is_loading = true;
                            // display the waiting loader
                            $('#loader').show();
                            // execute an ajax query to load more statments
                            if (limit == 0) {
                                limit = 10;
                            }
                            console.log("MORE ARTCICLES 2");
                            $.ajax({
                                url: 'article/loadMoreArticles',
                                data: {
                                    id: lastCategoryId,
                                    type: 'CATEGORY',
                                    articleId: lastArticleId,
                                    limit: limit
                                },
                                success: function (data) {
                                   // console.log("loadMoreArticles2");
                                   // console.log(data);
                                   // console.log("/loadMoreArticles2");
                                    // now we have the response, so hide the loader
                                    $('#loader').hide();
                                    // append: add the new statments to the existing data

                                    var data = jQuery.parseJSON(data);
                                    for (var i in data){
                                      /*  $("#columns").loadTemplate($("#pin"),
                                                {
                                                    'article_id': data[i].article_id,
                                                    'articleImage': data[i].thumbnail,
                                                    'title': data[i].title,
                                                    'display_content': data[i].display_content,
                                                    'display_date': data[i].date
                                                }, {append: true});
                                                if (i % 5 === 0) {
                                                //add ad
                                                    $("#columns").loadTemplate($("#pinads"),
                                                            {
                                                                'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                                                'articleImage': ads[ad_count].main_ad_image,
                                                                'title': '',
                                                                'display_content': '',
                                                                'url_': ads[ad_count].ad_url
                                                            }, {append: true});
                                                    ad_count += 1;
                                                }*/
                                                if($.browser.mozilla){
                                                    var x = data[i].thumbnail.toString();
                                                    data[i].thumbnail = x.replace(/\\/g,"/");
                                                    //alert(x +' | '+data[i].thumbnail);
                                                }
                                                var $elems = $('<div/>').loadTemplate($("#pin"),
                                                {
                                                    'article_id': data[i].article_id,
                                                    'articleImage': data[i].thumbnail,
                                                    'title': data[i].title,
                                                    'display_content': data[i].display_content,
                                                    'display_date': Date.parse(data[i].date).toString('MMMM dS, yyyy')
                                                });
                                                var $pin = $elems[0].children[0];
                                                fitImages($pin);
                                                $($pin).find('img').load(function (){
                                                    $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                                    //alert('oadd');
                                                    $grid.masonry('layout');
                                                    $grid.masonry('reloadItems');
                                                });
                                                //$grid.append( $pin ).masonry( 'appended', $pin );
                                                if (i % 5 === 0) {
                                                //add ad
                                                    if($.browser.mozilla){
                                                        var x = ads[ad_count].main_ad_image.toString();
                                                        ads[ad_count].main_ad_image = x.replace(/\\/g,"/");
                                                        //alert(x +' | '+data[i].thumbnail);
                                                    }
                                                     var $elems = $('<div/>').loadTemplate($("#pinads"),
                                                            {
                                                                'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                                                'articleImage': ads[ad_count].main_ad_image,
                                                                'title': '',
                                                                'display_content': '',
                                                                'url_': ads[ad_count].ad_url
                                                            }, {append: true});
                                                    ad_count += 1;
                                                    var $ad = $elems[0].children[0];
                                                    fitImages($ad);
                                                    $($ad).find('img').load(function (){
                                                        $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                                       // alert('oadd');
                                                        $grid.masonry('layout');
                                                        $grid.masonry('reloadItems');
                                                    });
                                                    //$grid.append( $ad ).masonry( 'appended', $ad );
                                                }
                                            }

                                    ;


                                    // set is_loading to false to accept new loading
                                    is_loading = false;
                                    limit = limit + 10;
                                },
                                async: true,
                                type: 'GET'
                            });
                        }
                    }
                }
            }
            });
            
            function fitImages($pin){
                //$( ".pin" ).each(function() {
                    /*width  = parseFloat($('#columns').css('width'))*0.18;
                    $($pin).find('img').css('width',width+'px');
                    $($pin).find('h3').css('width',width+'px');
                    $($pin).find('p').css('width',width+'px');*/
                    //for responsive
                    //$($pin).css('width','20%');
                    //$($pin).css('height','100%');
                    //(!$pin.hasClass('pinads')){
                      //  alert('fsd')
                        //$($pin).css('background','#FEFEFE');
                    //}
                    if($pin.classList.contains('pinads')){
                      //  alert('fsd')
                        $($pin).css('background','transparent');
                    }
                    else{
                        $($pin).css('background','#FEFEFE');
                    }
                    $($pin).css('margin-top','10px');
                    //$($pin).css('top','0px');
                    $($pin).find('img').css('width','100%');
                    $($pin).find('h3').css('width','100%');
                    $($pin).find('p').css('width','100%');
                    //$('.sizer').css('width',width/4 + 'px');
                    
                 // });
            }
            
            function  searchArticles(content) {
                loadByScrolling = false;
                ad_count = 0;
                //$grid.masonry('destroy');
                $('#columns').empty();
                $('#columns').append('<div class="sizer"></div>');
                //$('#wrapper').append('<>')
                $grid = $('#columns').masonry({
                    columnWidth: ('.sizer'),
                    itemSelector: '.pin',
                    percentPosition: true
                    //gutter : 5,
                     //initLayout: true
                  });
                //$grid.masonry( 'reloadItems' );
                //$grid.masonry();
                console.log("SEARCH ARTICLES");
                $.ajax({
                    url: 'article/searchArticlesBar',
                    data: {
                        search: content
                    },
                    success: function (data) {

                        console.log("searcharticles");
                        console.log(data);
                        console.log("/searcharticles");
                        var data = jQuery.parseJSON(data);
                        for (var i in data){
                           /* $("#columns").loadTemplate($("#pin"),
                                    {
                                        'article_id': data[i].article_id,
                                        'articleImage': data[i].thumbnail,
                                        'title': data[i].title,
                                        'display_content': data[i].display_content,
                                        'display_date': data[i].date
                                    }, {append: true});

                            if (i % 5 === 0) {
                                //add ad
                                $("#columns").loadTemplate($("#pinads"),
                                        {
                                            'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                            'articleImage': ads[ad_count].main_ad_image,
                                            'title': '',
                                            'display_content': '',
                                            'url_': ads[ad_count].ad_url
                                        }, {append: true});
                                ad_count += 1;
                            }*/
                            if($.browser.mozilla){
                                var x = data[i].thumbnail.toString();
                                data[i].thumbnail = x.replace(/\\/g,"/");
                                //alert(x +' | '+data[i].thumbnail);
                            }
                            var $elems = $('<div/>').loadTemplate($("#pin"),
                            {
                                'article_id': data[i].article_id,
                                'articleImage': data[i].thumbnail,
                                'title': data[i].title,
                                'display_content': data[i].display_content,
                                'display_date': data[i].date
                            });
                            var $pin = $elems[0].children[0];

                            fitImages($pin);
                            $($pin).find('img').load(function (){
                                $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                //alert('oadd');
                            });
                            //$grid.append( $pin ).masonry( 'appended', $pin );
                            if (i % 5 === 0) {
                            //add ad
                                if($.browser.mozilla){
                                    var x = ads[ad_count].main_ad_image.toString();
                                    ads[ad_count].main_ad_image = x.replace(/\\/g,"/");
                                    //alert(x +' | '+data[i].thumbnail);
                                }
                                 var $elems = $('<div/>').loadTemplate($("#pinads"),
                                        {
                                            'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                            'articleImage': ads[ad_count].main_ad_image,
                                            'title': '',
                                            'display_content': '',
                                            'url_': ads[ad_count].ad_url
                                        }, {append: true});
                                ad_count += 1;
                                var $ad = $elems[0].children[0];
                                fitImages($ad);
                                $($ad).find('img').load(function (){
                                    $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                   // alert('oadd');
                                });
                                //$grid.append( $ad ).masonry( 'appended', $ad );
                            }
                       // $grid.masonry('layout');
                    }
                    
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('answer add fails');
                    },
                    async: true,
                    type: 'GET'

                });

            }

            function  getArticles(categoryId) {

                var test=window.location.href;


                if (categoryId == '2|#ff7973') {

                    if (test.indexOf("welcome/hospitalityandmanagement") ==-1) {
                        document.body.scrollTop = document.documentElement.scrollTop = 0;
                        window.location = "welcome/hospitalityandmanagement";
                    }
                    else{
                        if($("#reldtimes").text()!="0"){
                            return;
                            location.reload();
                        }
                    }

                }
                if (categoryId == '1|#26dcc2') {

                    document.body.scrollTop = document.documentElement.scrollTop = 0;
                        window.location = "http://localhost/aprj/";


                }
                if (categoryId == '3|#ae4fff') {
                    if (test.indexOf("welcome/foodandresturant") ==-1) {

                        window.location = "welcome/foodandresturant";
                    }
                    else{
                        if($("#reldtimes").text()!="0"){
                            return;
                            location.reload();
                        }
                    }


                }
                if (categoryId == '4|#fb73dd') {
                    if (test.indexOf("welcome/csr") ==-1) {
                        document.body.scrollTop = document.documentElement.scrollTop = 0;
                        window.location = "welcome/csr";
                    }
                    else{
                        if($("#reldtimes").text()!="0"){
                            return;
                            location.reload();
                        }
                    }

                }
                if (categoryId == '5|#ffc24f') {
                    if (test.indexOf("welcome/other") ==-1) {
                        document.body.scrollTop = document.documentElement.scrollTop = 0;
                        window.location = "welcome/other";
                    }
                    else{
                        if($("#reldtimes").text()!="0"){
                            return;
                            location.reload();
                        }
                    }

                }
                $("#reldtimes").text(1);


                //{
                limit = 0;
                ad_count = 0;
                //}
                loadByScrolling  = true;
                lastCategoryId = "";
                lastCategoryId = categoryId;
                //$('#columns').empty();
                $('#columns').empty();
                $('#columns').append('<div class="sizer"></div>');
                //$('#wrapper').append('<>')
                $grid = $('#columns').masonry({
                    columnWidth: ('.sizer'),
                    itemSelector: '.pin',
                    percentPosition: true
                    //gutter : 5,
                     //initLayout: true
                  });
                console.log("categoryId:- ");
                console.log(categoryId);
                console.log("GET ARTICLES");
                $.ajax({
                    url: 'article/getArticles',
                    data: {
                        id: categoryId,
                        type: 'CATEGORY'
                    },
                    success: function (data) {

                        //console.log("getArticles");
                        //console.log(data);
                        //console.log("/getArticles");
                        var data = jQuery.parseJSON(data);
                        
                        for (var i in data) {
                            /*$("#columns").loadTemplate($("#pin"),
                                    {
                                        'article_id': data[i].article_id,
                                        'articleImage': data[i].thumbnail,
                                        'title': data[i].title,
                                        'display_content': data[i].display_content,
                                        'url_': '#',
                                        'display_date': data[i].date
                                    }, {append: true});
                            if (i % 5 === 0) {
                                //add ad
                                $("#columns").loadTemplate($("#pinads"),
                                        {
                                            'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                            'articleImage': ads[ad_count].main_ad_image,
                                            'title': '',
                                            'display_content': '',
                                            'url_': ads[ad_count].ad_url
                                        }, {append: true});
                                ad_count += 1;
                            }*/
                            if($.browser.mozilla){
                                var x = data[i].thumbnail.toString();
                                data[i].thumbnail = x.replace(/\\/g,"/");
                                //alert(x +' | '+data[i].thumbnail);
                            }    
                            var $elems = $('<div/>').loadTemplate($("#pin"),
                            {
                                'article_id': data[i].article_id,
                                'articleImage': data[i].thumbnail,
                                'title': data[i].title,
                                'display_content': data[i].display_content,
                                'display_date': Date.parse(data[i].date).toString('MMMM dS, yyyy')
                            });
                            $elems.css('top', 0);
                            var $pin = $elems[0].children[0];
                            fitImages($pin);
                            $($pin).find('img').load(function (){
                                $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                //alert('oadd');
                            });
                            //$grid.append($elems).masonry('appended', $elems);
                            
                            if (i % 5 === 0) {
                            //add ad
                                if($.browser.mozilla){
                                    if(typeof ads == 'undefined'){
                                        return;
                                    }
                                    var x = ads[ad_count].main_ad_image.toString();
                                    ads[ad_count].main_ad_image = x.replace(/\\/g,"/");
                                    //alert(x +' | '+data[i].thumbnail);
                                }
                                 var $elems = $('<div/>').loadTemplate($("#pinads"),
                                        {
                                            'article_id': ads[ad_count].ad_id + "|" + ads[ad_count].ad_url,
                                            'articleImage': ads[ad_count].main_ad_image,
                                            'title': '',
                                            'display_content': '',
                                            'url_': ads[ad_count].ad_url
                                        }, {append: true});
                                ad_count += 1;
                                var $ad = $elems[0].children[0];
                                fitImages($ad);
                                $($ad).find('img').load(function (){
                                    $grid.append(this.parentElement).masonry('appended', this.parentElement);
                                    //alert('oadd');
                                });
                                      
                                //$grid.append( $ad ).masonry( 'appended', $ad );
                            }
                        };
                        var allpins=$(".pinads");
                        console.log(allpins.length);
                        $.each( allpins, function( key, value ) {
                            //alert( key + ": " + value );
                       //     console.log(value);
                        });
                        console.log("The grid");
                        //console.log($grid.children('.pin').css('top',0));
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('answer add fails');
                    },
                    async: true,
                    type: 'GET'

                });
            }
            $.urlParam = function (name) {
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                console.log(results);
                if(results==null){
                    return null;
                }
                return results[1] || 0;
            }

            function subscribeNewsLetter()
            {
                if (document.cookie.indexOf('visited=true') == -1) {
                    var fifteenDays = 1000 * 60 * 60 * 24 * 1;
                    var expires = new Date((new Date()).valueOf() + fifteenDays);
                    document.cookie = "visited=true;expires=" + expires.toUTCString();
                    $('.ui.modal.newsletter')
                            .modal('show')
                            ;
                }

            }

            function getTokens() {
                var tokens = [];            // new array to hold result
                var query = location.search; // everything from the '?' onward 
                query = query.slice(1);     // remove the first character, which will be the '?' 
                query = query.split('&');   // split via each '&', leaving us an array of something=something strings

                // iterate through each something=something string
                $.each(query, function (i, value) {

                    // split the something=something string via '=', creating an array containing the token name and data
                    var token = value.split('=');

                    // assign the first array element (the token name) to the 'key' variable
                    var key = decodeURIComponent(token[0]);

                    // assign the second array element (the token data) to the 'data' variable
                    var data = decodeURIComponent(token[1]);

                    tokens[key] = data;     // add an associative key/data pair to our result array, with key names being the URI token names
                });

                return tokens;  // return the array
            }

             var $grid;
            $(document).ready(function () {
                /*$grid = $('#columns').masonry({
                    columnWidth: ('.sizer'),
                    itemSelector: '.pin',
                    percentPosition: true,
                   // gutter : 5,
                     //initLayout: true
                  });*/
                var userLogged = <?php
                if (isset($logged_username)) {
                    echo json_encode($logged_username);
                } else {
                    echo json_encode('');
                }
                ?>;
                if (userLogged === '@@invalid') {
                    $('#login-content').slideToggle();
                    $('#login-content').addClass('active');
                    $('#login_error_msg').show();
                }

                $('.ui.positive.right.labeled.icon.button').on('click', function () {
                    console.log("SUBSCRIBE");
                    $.ajax({
                        url: 'article/subscribeNewsletter',
                        data: {
                            email: $('#emailNewsletter').val()
                        },
                        success: function (data) {
                            console.log("subscnewsteller");
                            console.log(data);
                            console.log("/subscnewsteller");

                            $('.second.modal.newsletterthankyou')
                                    .modal('show')
                                    ;
                        },
                        async: true,
                        type: "POST"
                    });
                });
                
                $('body:not(#product-popup-content').click(function (){
                    //alert('clecked outt');
                });

                if (getTokens()['Key'] == 1)
                {
                    <?php
                        if ($this->session->userdata('username') == NULL) {
                            ?>
                    $('#login-content').slideToggle();
                    $('#login-content').addClass('active');
                    <?php
                        }
                            ?>
                }

                setTimeout(function () {
                    subscribeNewsLetter();
                }, 1000 * 60 * 5);

                /* var user ='<?php echo $this->session->userdata('username'); ?>';
                 if(user == ''){
                 $('#logged_in').hide();
                 $('#show_login_content').show();
                 }
                 else{
                 $('#logged_in').show();
                 $('#show_login_content').hide();
                 }*/
                $(document).mouseup(function (e) {
                    var container = $('#login-content');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.hide();
                    }
                });

                $(document).mouseup(function (e) {
                    var container = $('#search-content');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.hide();
                    }
                });

//                $('body:not(#show_login_content)').click(function () {
//                    if ($('#login-content').hasClass('active')) {
//                        $('#login-content').removeClass('active');
//                        $('#login-content').slideToggle();
//                    }
//                });


                $('.ui.grey.submit.button').on('click', function () {
                    submitForm();
                });

                $('#show_login_content').click(function () {
                    $('#login_error_msg').hide();
                    $('#login-content').slideToggle();
                    $('#login-content').addClass('active');

                });

                $('#search_article').click(function () {
                    $('#search-content').slideToggle();
                    $('#search-content').addClass('active');
                });

                $('#learn_more').click(function () {
                    location.href = "auth/learnMore";
                });

                $('#logged_in').click(function () {
                    location.href = "auth/authenticate";
//                    
                    /*  $.ajax({
                     url: "index.php/auth/authenticate",
                     success: function (data) {
                     //var logged_user = ;
                     // alert(data);
                     $("body").html(data);
                     },
                     error: function (jqXHR, textStatus, errorThrown) {
                     //alert('fail');
                     },
                     async: false,
                     type: "GET" // the type can be anything but hv to map it like in library line 27
                     });*/

                });

                $('.ui.modal')
                        .modal()
                        ;

                $('.ui.rating')
                        .rating()
                        ;

                $('.ui.dropdown')
                        .dropdown()
                        ;
                getAds();
                getArticles('ALL');
                console.log("GET CATEGORIES");
                $.ajax({
                    url: 'article/getCategories',
                    success: function (data) {
                        console.log("getCategories");
                        console.log(data);
                        console.log("/getCategories");
                        var data = jQuery.parseJSON(data);
                        var id = "";
                        for (var i in data) {
                            //
                            //id = 
                            $("#menuControl").loadTemplate($("#menuItems"),
                                    {
                                        'menuTitle': data[i].category_name.toString().toUpperCase(),
                                        'menuId': data[i].category_id + '|' + data[i].colour
                                    }, {append: true});

                        }
                        setMenuColour();
                        var allpins=$(".pin");
                        console.log(allpins.length);
                        $.each( allpins, function( key, value ) {
                            //alert( key + ": " + value );
                            //     console.log(value);
                        });
                        $('#menuControl').slicknav({
                            prependTo: '#mobileMenu',
                            closeOnClick: true
                        });
                        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                            $('#mobileMenu').show();
                            $('#menuControl').hide();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('answer add fails');
                    },
                    async: true,
                    type: 'GET'

                });

                if ($.urlParam('id') !== null)
                    moreInformation($.urlParam('id'));


            });

            function setMenuColour() {
                $('.itemBar').each(function (index) {
                    colour_ = ($(this).attr('value')).split("|")[1];
                    $(this).css('border-top', '3px solid ' + colour_);
                });
            }

            var currentRating;
            var currentArticleId;



            function fadeOut()
            {
                $('.product-gallery-popup').fadeOut(100);
                $('body').css({'overflow': 'initial'});
                $('iframe').attr('src', ''); // to pause the video 
            }
            function moreInformation(article_id) {

                if (article_id.split("|")[1] != null)
                {
                    //alert(article_id.split("|")[1]);
                    window.open(article_id.split("|")[1]);
                }
                $('#moreArticleInfoControl').empty();
                console.log("GET ARCTICKES");
                $.ajax({
                    url: 'article/getArticles',
                    data: {
                        id: article_id,
                        type: 'ARTICLE'
                    },
                    success: function (data) {
                        //alert('generateMock ' +data.questionTitle);

                        var data = jQuery.parseJSON(data);
                        console.log("getArticles--");
                        console.log(data);
                        console.log("/getArticles--");

                        for (var i in data)
                            var urlTitle = data['article'][0].title;
                        var urlContent = data['article'][0].display_content;
                        var pageUrl = "http://ajax.vivawebhost.comindex.php?id=" + data['article'][0].article_id;
                        var urlImage = "http://ajax.vivawebhost.com" + data['article'][0].thumbnail;
                        urlImage = urlImage.replace("%5C", "/");
                        urlImage = urlImage.replace(/\\/g, "/");
                        var shareUrl = "http://www.sharethis.com/share?url=" + pageUrl + "&title=" + urlTitle + "&summary=" + urlContent + "&img=" + urlImage;
                        var starRating = data['article'][0].rating;
                        currentRating = starRating;
                        currentArticleId = data['article'][0].article_id;
                        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                            $("#moreArticleInfoControl").loadTemplate($("#moreArticleInfo"),
                                    {
                                        'article_id': data['article'][0].article_id,
                                        'articleImage': data['article'][0].image,
                                        'title': data['article'][0].title,
                                        'content': data['article'][0].content,
                                        'original_url': data['article'][0].original_url,
                                        'copy_url': pageUrl,
                                        'hrefURL': encodeURI(shareUrl),
                                        'adImage': data['ads'][0].second_ad_image,
                                        'ad_url': data['ads'][0].ad_url
                                    }, {append: true});
                            showmodal(starRating);
                        }
                        else
                        {

                            $('.html5gallery').empty();


                            $('<div class="product-gallery-popup"> ' +
                                    '<div class="popup-overlay" onclick="fadeOut()"></div>' +
                                    ' 	<div class="product-popup-content"> ' +
                                    '<div class="product-image ">'
                                    + '<div style="display:none;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="450">'
                                    + '</div>' +
                                    '<div class = "options">' +
                                    '<div onclick="shareBtnClick();" class="ui tiny item primary button share-btn">Share</div> ' +
                                    '<div onclick="copyUrl(this.id)" class="ui tiny item primary button copy-url">Copy URL</div>' +
                                    '<div onclick="window.open(this.id)" class="ui tiny item primary button org-url">Original URL</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="product-information"> ' +
                                    '<h2  data-title></h2><p class="product-desc" style = "overflow-y:scroll;height: 87%; font: 14px Calibri;"></p>' +
                                    '<a target = "_blank"><img class = "ad_img_div"></a>' +
                                    '</div>' +
                                    '<div class="clear"></div>' +
                                    '<a href="#" class="cross" onclick="fadeOut()">X</a>' +
                                    '</div>' +
                                    '</div>').appendTo('body');


                            $('.product-gallery-popup').fadeIn(100);
                            $('body').css({'overflow': 'hidden'});
                            // $('.product-popup-content .product-image img').attr('src', $(this).find('img').attr('src'));
                            //$('.product-popup-content .product-information h2').text($(this).find('h2').attr('data-title'));
                            //$('.product-popup-content .product-information p').text($(this).find('div').attr('data-desc'));
                            $('.product-popup-content .product-information h2').text(data['article'][0].title);
                            $('.product-popup-content .product-information p').text(data['article'][0].content);
                            $('.product-popup-content .product-image .options .share-btn').attr('id', shareUrl);
                            $('.product-popup-content .product-image .options .copy-url').attr('id', pageUrl);
                            $('.product-popup-content .product-image .options .org-url').attr('id', data['article'][0].original_url);
                            $('.product-popup-content .product-information .ad_img_div').attr('src', data['ads'][0].second_ad_image);
                            $('.product-popup-content .product-information .ad_img_div').parent().attr('href', data['ads'][0].ad_url);
                            if (data['article'][0].image != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image + '">' +
                                        '<img src="' + data['article'][0].image + '" alt="Image 1">' +
                                        '</a>');
                            }
                            if (data['article'][0].image1 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image1 + '">' +
                                        '<img src="' + data['article'][0].image1 + '" alt="Image 2">' +
                                        '</a>');
                            }
                            if (data['article'][0].image2 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image2 + '">' +
                                        '<img src="' + data['article'][0].image2 + '" alt="Image 3">' +
                                        '</a>');
                            }
                            if (data['article'][0].image3 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image3 + '">' +
                                        '<img src="' + data['article'][0].image3 + '" alt="Image 4">' +
                                        '</a>');
                            }
                            if (data['article'][0].image4 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image4 + '">' +
                                        '<img src="' + data['article'][0].image4 + '" alt="Image 5">' +
                                        '</a>');
                            }
                            if (data['article'][0].video != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].video + '">' +
                                        '<img src="' + data['article'][0].image3 + '" alt="Youtube Video">' +
                                        '</a>');
                            }

//                        <a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>'
                            //html5gallery
                            $('.html5gallery').html5gallery();
                            $Current = $(this);
                            $PreviousElm = $(this).prev();
                            $nextElm = $(this).next();
                            if ($PreviousElm.length === 0) {
                                $('.nav-btn.prev').css({'display': 'none'});
                            }
                            else {
                                $('.nav-btn.prev').css({'display': 'block'});
                            }
                            if ($nextElm.length === 0) {
                                $('.nav-btn.next').css({'display': 'none'});
                            }
                            else {
                                $('.nav-btn.next').css({'display': 'block'});
                            }
                        }
                    },
                    async: true,
                    type: "GET"
                });


            }

            function shareBtnClick() {
                window.open($('.share-btn').attr('id'), '_blank', 'toolbar=yes, scrollbars=yes, resizable=yes, width=800, height=500');
            }

            function showmodal(starRating) {
//                $('.ui.modal')
//                        .modal('show');

                currentRating = starRating;

                $('.ui.modal.moreinfo')
//                    .modal({
//                      blurring: true
//                    })
                        //                       .modal('setting', 'transition', 'browse right')
                        .modal('show')
                        ;

                $('.ui.rating')
                        .rating({
                            initialRating: starRating,
                            maxRating: 5
                        })
                        ;
            }

            function copyUrl(url) {
                window.prompt("Copy to clipboard: Ctrl+C, Enter", url);
            }

            function mouseOver(item_)
            {
                // border-top:3px solid #ff0000;
                colour_ = ($(item_).attr('value')).split("|")[1];
                //alert(colour_);

                $(item_).css('background-color', colour_);
                $(item_).css('color', 'white');
            }

            function mouseOut(item_)
            {
                $(item_).css('background-color', '');
                $(item_).css('color', 'grey');
            }

            function changeStarRating(newRating)
            {

                var updatedRating;
                newRating = $(newRating).find('.selected').length;
                if (currentRating == 0)
                {
                    updatedRating = newRating;
                }
                else
                {
                    updatedRating = ((parseInt(newRating) + parseInt(currentRating)) / 2);
                    updatedRating = Math.round(updatedRating);
                }
                //alert(currentRating + ' ' + currentArticleId);
                //alert(rating.initialRating);

                console.log("SET RATINGS");
                $.ajax({
                    url: 'article/setRating',
                    data: {
                        id: currentArticleId,
                        rating: updatedRating
                    },
                    success: function (data) {

                        //alert('generateMock ' +data.questionTitle);
                        var data = jQuery.parseJSON(data);

                        console.log("setRating");
                        console.log(data);
                        console.log("/setRating");

                    },
                    async: true,
                    type: "POST"
                });
            }

//            function submitForm() {
//                var formData = $('.ui.form.segment input').serializeArray(); //or .serialize();
//                $.ajax({
//                  type: 'POST',
//                  url: 'index.php/auth/authenticate',
//                  data: formData
//                });
//              }

        </script>
    </head>
    <body>
    <div id="reldtimes" hidden>0</div>
    <!--
<br>
<br>
<br>
<br>
<form action="auth/register" method="post">
<input type="text" name="uname">
<input type="text" name="pword">
    <input type="text" name="re_pword">
    <input type="text" name="user_type">
    <input type="text" name="name">
    <input type="text" name="subCat">
    <input type="submit">
</form>

-->
    <style type="text/css">
        @-moz-document url-prefix() {
            .menuheight { height: 7.5%; }
        }
        @media screen and (-webkit-min-device-pixel-ratio:0) {
            .menuheight { height: 7.5%; }
        }
    </style>

        <div class="ui grid" >
            <div class="computer tablet row" >
                <!--<div class="ui fixed borderless menu navbar page grid" style="height: 7%;">-->
                <div class="ui fixed borderless menu menuheight" >
                    <div class="item" style="margin-left: 2%;">
                        <img onClick="getArticles('ALL')" src="bgimages/logo.png" style = "cursor: pointer; cursor: hand; width:5em">
                    </div>
                    <div class="grid_9">
                        <div class="align-right">
                            <!--				<ul id="menuControl" style="margin-left: 5%;">
                                                                    <li><a class="scroll" href="#features">Features</a></li>
                                                                    <li><a class="scroll" href="#usage">Usage</a></li>
                                                                    <li><a class="scroll" href="#examples">Examples</a></li>
                                                                    <li><a class="scroll" href="#requirements">Requirements</a></li>
                                                                    <li><a target="_blank" href="https://github.com/ComputerWolf/SlickNav">View on Github</a></li>
                                                            </ul>-->
                            <div class="left menu" id="menuControl" style="margin-left: 5%;">


                            </div>
                        </div>
                    </div>


                    <div class="right item" style="margin-right: 2%;" >

                        <div class="item" >
                            <div id="search_article" class="ui blue button" style="width: 100%" >
                                Search
                            </div>
                        </div>

                        <div class="item" >
                            <div id="learn_more" class="ui blue button" style="width: 100%" >
                                Learn More
                            </div>
                        </div>

                        <?php
                        if ($this->session->userdata('username') != NULL) {
                            ?>
                            <div id="logged_in" class="ui grey button" style="width: 100%" >
                                Admin Panel
                            </div>
                            <?php
                        } else {
                            ?>
                            <div id="show_login_content" class="ui grey button" style="width: 100%" >
                                Login
                            </div>
                            <?php
                        }
                        ?>


                    </div>
                    <div class="item" id="mobileMenu"></div>
                </div>
            </div>
        </div>


        <!--        <div class="ui stackable menu" id="menuControl">
                    <div class="item">
                        <img src="ArticleImages/devmieimage1.jpg">
                    </div>
                    <div class="right menu">
                        <div class="ui button">Log-in</div>
                    </div>
        
                </div>-->

        <div class="ui second modal newsletterthankyou">
            <i class="close icon"></i>
            <div class="header">
                Thank You for Subscribing for Loud Horn Marketing Morning Newsletters
            </div>
        </div>

        <div class="ui modal newsletter">
            <i class="close icon"></i>
            <div class="header">
                Sign up for the morning newsletter
            </div>
            <div class="image content">
                <div class="ui form">
                    <div class="description">
                        Please enter your email address to receive our morning newsletter 
                    </div>
                    <br>
                    <input class="ui" id="emailNewsletter" name="emailNewsletter" type="email" placeholder="Email Address" onkeyup="ValidateEmail();">   
                </div>
            </div>
            <div class="actions">
                <div class="ui red deny button">
                    No Thanks
                    
                </div>
                <div class="ui positive right labeled icon button disabled" id="subscribe_submit">
                    Submit
                    <i class="checkmark icon"></i>
                </div>
            </div>
        </div>


        <div class="ui modal moreinfo" id="moreArticleInfoControl">

        </div>

        <div class="ui modal" id="displayArticle">

        </div>

        <script type="text/html" id="menuItems">
            <a onclick="getArticles(this.attributes[5].value)" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)"  class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey;" data-value="menuId" data-content="menuTitle"></a>

        </script>




        <script type="text/html" id="pin">
            <div onclick="moreInformation(this.id)" data-id="article_id" class="pin">
                <img data-src="articleImage" />
                <h3 data-content="title"></h3>
                <p data-content="display_content"></p>
                <p data-content="display_date"></p>
            </div>

        </script>

        <script type="text/html" id="pinads">
            <div onclick="moreInformation(this.id)" data-id="article_id" class="pinads pin">
                <img data-src="articleImage" />

            </div>

        </script>

        <script type="text/html" id="moreArticleInfo">
            <div id="idtitle" class="header article_title" data-content="title" style="font-size: '25px'"></div>

            <div class="content">

                <img style="height: 7%; width: 100%;" data-src="articleImage" />
                <hr>
                <p data-content="content" class="article_content"></p>
                <hr>


                <div class="ui borderless menu">
                    <!--                    <div class="item left align">
                                            <div class="ui huge star rating" onclick="changeStarRating(this)" data-max-rating="5"></div>
                                        </div>-->
                    <div class="item right align">
                        <div onclick="copyUrl(this.id)" data-id="copy_url" class="ui item primary button">Copy URL</div>
                        <div onclick="window.open(this.id)" data-id="original_url" class="ui item primary button">Original Link</div>
                        <!--<a target="_blank" title="Share this page" data-href="hrefURL"><div class="ui item primary button">Share</div></a>-->
                        <div data-id="hrefURL" onclick="window.open(this.id, '_blank', 'toolbar=yes, scrollbars=yes, resizable=yes, width=800, height=500');" class="ui item primary button">Share</div>
                    </div>
                </div>
                <img onclick="window.open(this.id)" data-id="ad_url" height="50" width="100%" data-src="adImage" />
            </div>
        </script>

        <div id="wrapper">
            <div id="columns">
                <div class="sizer"></div>
            </div>
        </div>

        <div id="login-content">
            <form action="auth/authenticate" method="POST" class="ui form">
                <fieldset id="inputs">
                    <input  id="uname" name="uname" type="text" placeholder="username">   
                    <input id="pword" name="pword" type="password" placeholder="password">
                </fieldset>
                <fieldset id="actions">
                    <input type="submit" id="submit" value="Log in" class="ui button large fluid grey">
                    <!--<label><input type="checkbox" checked="checked"> Keep me signed in</label>-->
                </fieldset>
                <div class="ui red small message" id="login_error_msg" style="display: none;">
                    Invalid Username / Password
                </div>
            </form>
        </div> 

        <div id="search-content">
            <div class="ui action input fluid">
                <input id="searchTerm" name="searchTerm" type="text" placeholder="Search by (Title, Description)" onkeypress="searchEnterPressed(event, $(this).val())">
                <button onclick="searchArticles(searchTerm.value)"  class="ui icon button">
                    <i class="search icon"></i>
                </button>
            </div>
        </div>

    </body>
</html>

<script>

    function myPeriodicMethod() {
        var i=0;
        console.log("--------------");
        var x = $("#columns .pin");
        var firsttop,lowtop,hightop;
        $.each(x, function (key, value) {
            //alert( key + ": " + value );
            if(i==0){

                firsttop=$(value).offset().top;
                lowtop=firsttop+100;
                hightop=firsttop-100;

                if(firsttop=='0px'){
                    return;
                }
            }
            if(i<5) {

                console.log($(value).offset().top);
                var mytop=$(value).offset().top;
                if(mytop>hightop){
                    if(mytop<lowtop){
                        console.log("Doing it");
                        $(value).css({top: '0px'});
                    }
                }
                else{

                }
            }
            i=i+1;
        });
    }
    //setInterval(myPeriodicMethod, 500);
</script>