<html lang="en">
<head>
<meta charset="utf-8">
<title>Loud Horn Marketing</title>
<base href="http://localhost/aprj/">
<script src=" js/jquery.min.js" language="JavaScript"></script>
<script src="js/jquery-1.8.2.js" language="JavaScript"></script>
<script type="text/javascript" src="html5gallery/html5gallery.js"></script>
<script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.min.js"></script>
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
</head>

<body>
<script>
    $(document).scroll(function () {
        if(loadByScrolling){
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                if ($(document).scrollTop() + $(window).height() <= $(document).height()) {
                    if (is_loading == false) { // stop loading many times for the same page
                        // set is_loading to true to refuse new loading
                        is_loading = true;
                        // display the waiting loader
                        $('#loader').show();
                        // execute an ajax query to load more statments
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
</script>

</body>