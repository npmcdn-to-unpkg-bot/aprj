<head>
    <base href="http://localhost/aprj/">
    <meta charset="UTF-8">
    <title>Loud Horn Marketing</title>

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

<body background="bgimages/tiledBg.png">
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
</script>
<div class="ui fixed borderless menu menuheight" >
    <div class="item" style="margin-left: 2%;">
        <img onClick="getArticles('ALL')" src="bgimages/logo.png" style = "cursor: pointer; cursor: hand; width:5em">
    </div>
    <div class="grid_9">
        <div class="align-right">

            <div class="left menu" id="menuControl" style="margin-left: 5%;">

                <a class="selected item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey;" href="#" data-filter="*">All</a>
                <a href="#" data-filter=".category1" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(38, 220, 194);" value="1|#26dcc2">Category 1</a>
                <a href="#" data-filter=".category2" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(255, 121, 115);" value="2|#ff7973">Category 2</a>
                <a href="#" data-filter=".category3" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(174, 79, 255);" value="3|#ae4fff">Category 3</a>
                <a href="#" data-filter=".category4" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(251, 115, 221);" value="4|#fb73dd">Category 4</a>
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
<br>



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
        "<div class=\"media-box $catname\"style=\"background-image:bgimages/logo.png\" >".

        "<a href=\"welcome/article/$row->article_id\" class=\"ajax-popup-link\" style=\"background-color: white\" >

        <div class=\"media-box-image\" style=\"background-color: white\">".
            "<div data-thumbnail=\" $thumbnail.\" style=\"background-color: white\"></div>".

        "</div></a>".
            "<div class=\"mytitle\"><h3 style=\"background-color: white;margin:0px\">$title</h3></div>".
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

        var $grid = $('#grid').mediaBoxes({
            columns:6,
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
            ]
        });
        $(function(){
            $("html, body").animate({ scrollTop: $(document).height()+$(document).height() }, 200);
            $("html, body").animate({ scrollTop: 0 }, 1);
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