<head>
    <base href="http://localhost/aprj/">
    <meta charset="UTF-8">
    <title>Media Boxes</title>

    <link rel="icon" href="img/favicon.ico" type="image/png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"> <!-- needed for mobile devices -->

    <!-- Import font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>


    <!-- Media Boxes CSS files -->
    <link rel="stylesheet" href="newjscss/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="newjscss/mediaBoxes.css">


    <!-- jQuery 1.8+ -->
    <script src="newjscss/jquery-1.10.2.min.js"></script>

    <!-- Style for Bootstrap -->
    <link rel="stylesheet" href="newjscss/bootstrap.min.css">


    <!-- Media Boxes JS files -->
    <script src="newjscss/jquery.isotope.min.js"></script>
    <script src="newjscss/jquery.imagesLoaded.min.js"></script>
    <script src="newjscss/jquery.transit.min.js"></script>
    <script src="newjscss/jquery.easing.js"></script>
    <script src="newjscss/waypoints.min.js"></script>
    <script src="newjscss/modernizr.custom.min.js"></script>
    <script src="newjscss/jquery.magnific-popup.min.js"></script>
    <script src="newjscss/jquery.mediaBoxes.js"></script>

    <!-- Bootstrap JS file -->
    <script src="newjscss/bootstrap.min.js"></script>

    <script src="newjscss/jquery.bpopup.min.js"></script>

</head>

<body>
<style>
    .white-popup {
        position: relative;
        background: #FFF;
        padding: 20px;
        width: auto;
        max-width: 1000px;
        margin: 20px auto;
    }

</style>

<!--<!-- The searching text field -->
<!--<input type="text" id="search" class="media-boxes-search" placeholder="Search By Title">-->


<!-- The filter bar -->
<ul class="media-boxes-filter" id="filter">
    <li><a class="selected" href="#" data-filter="*">All</a></li>
    <li><a href="#" data-filter=".category1">Category 1</a></li>
    <li><a href="#" data-filter=".category2">Category 2</a></li>
    <li><a href="#" data-filter=".category3">Category 3</a></li>
    <li><a href="#" data-filter=".category4">Category 4</a></li>
</ul>

<!--<!-- The sorting drop down -->
<!--<div class="media-boxes-drop-down" id="sort">-->
<!--    <div class="media-boxes-drop-down-header">-->
<!--    </div>-->
<!--    <ul class="media-boxes-drop-down-menu">-->
<!--        <li><a class="selected" href="#" data-sort-by="title">Original Order</a></li>-->
<!--        <li><a href="#" data-sort-by="title">Sort by Title</a></li>-->
<!--        <li><a href="#" data-sort-by="text">Sort by Text</a></li>-->
<!--    </ul>-->
<!--</div>-->
<!---->

<!-- The grid with media boxes -->
<div style="justify-content: center">
<div id="grid" style="width: auto;">

    <?php
    //echo var_dump($alldata);

    foreach ($alldata as $row) {
        $catid= rand ( 1 , 4 );
        $catname="category".$catid;
        $titallowelen=50;
        $strsize=strlen($row->title);
        if($strsize>$titallowelen){
            $title=substr ($row->title , 0,$titallowelen );
        }
        else{

            $title=$row->title;
            $rem=$titallowelen-$strsize;
            $title=str_pad($title, $titallowelen," A");
        }

        $allowelen=200;
        $strsize=strlen($row->display_content);
        if($strsize>$allowelen){
            $summery=substr ($row->display_content , 0,$allowelen );
        }
        else{

            $summery=$row->display_content;
            $rem=$allowelen-$strsize;
            $summery=str_pad($summery, $allowelen,"-");
        }
        $thumbnail=str_replace ( "\\" , "/" , $row->thumbnail );
        //$thumbnail= $row->thumbnail ;

       //echo var_dump($row);
        echo "<!-- --------- MEDIA BOX MARKUP --------- -->".
        "<div class=\"media-box $catname white-popup-block\">".

        "<a href=\"welcome/article/$row->article_id\" class=\"ajax-popup-link white-popup-block\">

        <div class=\"media-box-image\">".
            "<div data-thumbnail=\" $thumbnail.\"></div>".

        "</div></a>".
            "<div class=\"mytitle\"><h3>$title</h3></div>".
        "<div style=\"background-color: #aaaaaa\">".
            $summery.
        "</div>".

    "</div>";


    }
    ?>


    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">1</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/0.jpg"></div>

        </div>
        <div style="background-color: #aaaaaa">
            1 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>

    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">2</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/54.jpg"></div>

        </div>
        <div style="background-color: #aaaaaa">
            2  Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">3</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/55.jpg"></div>

        </div>
        <div style="background-color: #aaaaaa">
            3 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">4</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/56.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            4 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">5</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/58.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            5 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>

    <!-------------->
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">6</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/0.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            6 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>

    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">7</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/0.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            7  Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">8</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/78.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            8 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">9</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/80.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            9 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    <!-- --------- MEDIA BOX MARKUP
    <div class="media-box category1">
        <div class="mytitle">10</div>
        <div class="media-box-image">
            <div data-thumbnail="ArticleImages/mainImages/0.jpg"></div>
        </div>
        <div style="background-color: #aaaaaa">
            10 Here goes some content that belong to category 2 Here goes some content that belong to category 2
        </div>

    </div>
    --------- -->
</div>
<!-----------------------------End of GRID-------------------->
</div>


    <script>

        var $grid = $('#grid').mediaBoxes({columns:5});



        $('button').on('click', function(){
            var box =   '<div class="media-box category1">'+

                '<div class="media-box-image">'+
            '<div data-thumbnail="http://goo.gl/nzRWqf"></div>'+
            '<div data-type="iframe" data-popup="http://dimsemenov.com/plugins/magnific-popup/documentation.html"></div>'+
'<div style="background-color: #aaaaaa">'+
            '6 Here goes some content that belong to category 2 Here goes some content that belong to category 2'+
            '</div>'+
            '<div class="thumbnail-overlay">'+
            '<i class="fa fa-plus mb-open-popup">HI</i>'+
            '</div>'+
            '</div>'+

            '</div>';


            $grid.isotopeMB( 'insert', $(box).hide(), function(){
                // alert('Boxes Added!');
            });
        });

    </script>

<script>
    function onclickcontent(elem){

        $('button').magnificPopup({
            items: {
                src: '<div class="white-popup">Dynamically created popup</div>',
                type: 'ajax'
            }
        });
    }


    $('.ajax-popup-link').magnificPopup({
        type: 'ajax',


        closeOnBgClick:false,
        closeBtnInside: false
    });
    function abc(){
        var magnificPopup = $.magnificPopup('close');
        console.log(magnificPopup);
        //$.magnificPopup.close();
        //$('.ajax-popup-link').magnificPopup('close');
    }
</script>


</body>