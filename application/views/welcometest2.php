<head>


    <meta charset="UTF-8">
    <title>Loud Horn Marketing</title>
    <base href=<?php echo base_url();?>>

    <link rel="icon" href="img/favicon.ico" type="image/png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"> <!-- needed for mobile devices -->

    <!-- Import font -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>


    <!-- Media Boxes CSS files -->
    <link rel="stylesheet" href="newjscss/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="newjscss/mediaBoxes.css">
    <link href="css/semantic.css" rel="stylesheet" type="text/css"/>



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

<body style="background-image: url('bgimages/tiledBg.png')">
<style>
    .white-popup {
        position: relative;
        background: #FFF;
        padding: 20px;
        width: auto;
        max-width: 1000px;
        margin: 20px auto;
    }
    .mytitle h3 {
        font: bold 22px/22px Calibri, sans-serif;
        color: grey;
        margin: 0;
        padding: 10px;
        padding-bottom: 5px;
        word-break: break-all;
        display:block;
    //width:250px;
    }
    .mytitle p {
        font: 12px/18px Arial, sans-serif;
        color: grey;
        margin: 0;
        padding: 10px;
        padding-bottom: 15px;
        display: block;
    }
    #search {


        display: none;
        position: fixed;
        top: 8%;
        left: 50%;
        z-index: 999;
        background: #fff;
        background-image: linear-gradient(top, #fff, #eee);
        padding: 15px;
        box-shadow: 0 2px 2px -1px rgba(0,0,0,.9);
        border-radius: 3px 0 3px 3px;
        width: 35%;

    }

</style>

<!--<!-- The searching text field -->
<!--<input type="text" id="search" class="media-boxes-search" placeholder="Search By Title">-->
<!--<div style="background-color: #a9d5de">-->
<!--    <div style="display: inline"><img src="bgimages/logo.png" style="cursor: pointer; cursor: hand; width:5em; display: inline"></div>-->
<!--<div style="display: inline;align-items: center"><!-- The filter bar -->-->
<!--    <ul class="media-boxes-filter" id="filter" style="display: inline">-->
<!--        <li><a class="selected" href="#" data-filter="*">All</a></li>-->
<!--        <li><a href="#" data-filter=".category1">Category 1</a></li>-->
<!--        <li><a href="#" data-filter=".category2">Category 2</a></li>-->
<!--        <li><a href="#" data-filter=".category3">Category 3</a></li>-->
<!--        <li><a href="#" data-filter=".category4">Category 4</a></li>-->
<!--    </ul></div>-->
<!--<div style="display: inline"><button>Search</button><button>LearnMore</button><button>Login</button></div>-->
<!--</div>-->
<script type="text/javascript">
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
    function togglesearch(){
        $("#search").toggle();
    }
</script>
<div class="ui fixed borderless menu menuheight" >
    <div class="item" style="margin-left: 2%;">
        <img onClick="getArticles('ALL')" src="bgimages/logo.png" style = "cursor: pointer; cursor: hand; width:5em">
    </div>
    <div class="grid_9">
        <div class="align-right">

            <div class="left menu" id="menuControl">
                <div style="display: inline;align-items: center" id="filter">
                <ul class="media-boxes-filter" id="filter">
               <li><a class="selected item itemBar" href="#" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(38, 220, 194);" value="1|#26dcc2" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".category1" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(38, 220, 194);" value="1|#26dcc2">Corporate</a></li>
                    <li><a href="#" data-filter=".category2" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(255, 121, 115);" value="2|#ff7973">Hospitality & Recreation</a></li>
                    <li><a href="#" data-filter=".category3" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(174, 79, 255);" value="3|#ae4fff">Food & Restaurants</a></li>
                    <li><a href="#" data-filter=".category4" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(251, 115, 221);" value="4|#fb73dd">CSR</a></li>
                    <li><a href="#" data-filter=".category5" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(251, 115, 221);" value="4|#ffc24f">Other</a></li>
                </ul>
                    </div>
            </div>
        </div>

    </div>


    <div class="right item" style="margin-right: 2%;" >

        <div class="item" >
            <div id="search_article" class="ui blue button" style="width: 100%" onclick="javascript:togglesearch();">
                Search
            </div>
            <input type="text" id="search" class="media-boxes-search" placeholder="Search By Title/Content" hidden>
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
<br>




<!-- The grid with media boxes -->
<div style="justify-content: center;position: relative;">

<div id="grid" style="width: auto; margin-top: 40px;">

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
        "<div class=\"media-box $catname\"style=\"background-image:bgimages/logo.png\" >".

        "<a href=\"welcome/article/$row->article_id\" class=\"ajax-popup-link\" style=\"background-color: white\" >

        <div class=\"media-box-image\" style=\"background-color: white\">".
            "<div data-thumbnail=\" $thumbnail\" style=\"background-color: white\"></div>".

        "</div></a>".
            "<div class=\"media-box-title mytitle\"><h3 >$title</h3></div>".
        "<div class=\"media-box-title mytitle\"><p>".
            $summery.
        "</p></div>".

    "</div>";


    }
    ?>



</div>
<!-----------------------------End of GRID-------------------->
</div>


    <script>

        var $grid = $('#grid').mediaBoxes({
            columns:5,
            resolutions:[
                {
                    maxWidth: 960,
                    columnWidth: 'auto',
                    columns: 3
                },
                {
                    maxWidth: 650,
                    columnWidth: 'auto',
                    columns: 2
                },
                {
                    maxWidth: 450,
                    columnWidth: 'auto',
                    columns: 1
                },
            ],
            search: '#search',
            searchTarget: '.media-box-title'
        });
        $(function(){
           // $("html, body").animate({ scrollTop: $(document).height()+$(document).height() }, 200);
           // $("html, body").animate({ scrollTop: 0 }, 1);
        });


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
        filterContainer: '#filter',
        filter: 'a',

        closeOnBgClick:false,
        closeBtnInside: false
    });

    $("#grid").css("margin-left",'-10px');
    $("#grid").css("width",'103%');
    setTimeout(changewidth, 1000);
    function changewidth() {
        $("#grid").css("width", 'auto');
    }
//    $("#grid").css("margin-right",'1px');
    /*$grid.isotopeMB( 'insert', $(box).hide(), function(){
        // alert('Boxes Added!');
    });*/

    function abc(){
        var magnificPopup = $.magnificPopup('close');
        console.log(magnificPopup);
        //$.magnificPopup.close();
        //$('.ajax-popup-link').magnificPopup('close');
    }
</script>


</body>