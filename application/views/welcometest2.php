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

    <script src="js/date.js" type="text/javascript"></script>

    <script src="https://npmcdn.com/imagesloaded@4.1/imagesloaded.pkgd.js"></script>
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
        line-height: 1.1 !important;
        display:block;
    /*//width:250px;*/
    }
    .mytitle p {
        font: 12px/18px Arial, sans-serif;
        color: grey;
        margin: 0;
        padding: 10px;
        padding-bottom: 15px;
        display: block;

    }
    .mytitle h6 {
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
    },
    @-moz-document url-prefix() {
        .menuheight { height: 50px; }
    }
    @media screen and (-webkit-min-device-pixel-ratio:0) {
        .menuheight { height: 50px; }
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
        $("#login-content").hide();
        $("#search").toggle('show');
        if($("#search").is(":visible")){
            $("#grid").css("width",'108%');
        }
        else{
            $("#grid").css("width", 'auto');
        }


    }

    function togglelogin(){
        $("#login-content").toggle();
    }

</script>

<script>
    $(document).ready(function(){

        $("html").click(function(e){

            if(!$(e.target).hasClass('searchclass')) {
                $("#search").hide();
            }
            if(!$(e.target).hasClass('loginclass')) {
                $("#login-content").hide();
            }

        });
    });
</script>

<div class="ui fixed borderless menu menuheight" id="filter" style="height: 50px">
    <div style="margin-left: 3%; margin-right: 10px">
        <a data-filter="*"><img onClick="getArticles('ALL')" src="bgimages/logo.png" style = "cursor: pointer; cursor: hand; height: 45px; width: 76px;"></a>
    </div>
    <div class="grid_9">
        <div class="align-right">

            <div class="left menu" id="menuControl" style="width: 800px">
                <div style="display: inline;align-items: center" id="filter">
                <ul class="media-boxes-filter" >
<!--               <li><a class="selected item itemBar" href="#" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar filterlinks" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(38, 220, 194);" value="1|#26dcc2" data-filter="*">All</a></li>-->
                    <li><a href="#" data-filter=".category1" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar filterlinks" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(38, 220, 194);" value="1|#26dcc2">CORPORATE</a></li>
                    <li><a href="#" data-filter=".category2" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar filterlinks" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(255, 121, 115);" value="2|#ff7973">HOSPITALITY & RECREATION</a></li>
                    <li><a href="#" data-filter=".category3" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar filterlinks" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(174, 79, 255);" value="3|#ae4fff">FOOD & RESTAURANTS</a></li>
                    <li><a href="#" data-filter=".category4" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar filterlinks" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(251, 115, 221);" value="4|#fb73dd">CSR</a></li>
                    <li><a href="#" data-filter=".category5" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="item itemBar filterlinks" style="font-weight: bold; font-family: calibri; font-size: 16px; color: grey; border-top-width: 3px; border-top-style: solid; border-top-color: rgb(251, 115, 221);" value="4|#ffc24f">OTHER</a></li>
                </ul>
                    </div>
            </div>
        </div>

    </div>


    <div class="right item"  >

        <div class="searchclass" style="margin-left: 10px"  >
            <div  id="search_article" class="btn btn-primary searchclass" style="width: 100%" onclick="javascript:togglesearch();">
                Search
            </div>
            <input type="text" id="search" class="media-boxes-search searchclass" placeholder="Search By Title/Content" hidden>
        </div>

        <div style="margin-left: 10px" >
            <div id="learn_more" class="btn btn-primary" style="width: 100%" >
                Learn More
            </div>
        </div>
        <?php
        if ($this->session->userdata('username') != NULL) {
            ?>
            <div id="logged_in" onclick="location.href='auth/authenticate'" class="btn btn-primary" style="width: 100%;margin-left: 10px; background-color: #767676">
                Admin Panel
            </div>
            <?php
        } else {
            ?>
        <div style="margin-left: 10px" class="loginclass" >
            <div id="show_login_content" class="btn btn-primary loginclass" style="width: 100%; background-color: #767676" onclick="javascript:togglelogin();" >
                Login
            </div>
            </div>
            <div id="login-content" class="loginclass">

                <form action="auth/authenticate" method="POST" class="ui form loginclass" id="login-content-form">
                    <fieldset id="inputs">
                        <input class="loginclass" id="uname" name="uname" type="text" placeholder="username">
                        <input class="loginclass" id="pword" name="pword" type="password" placeholder="password">
                    </fieldset>
                    <fieldset id="actions">
                        <input type="button" id="submit" value="Log in" class="ui button large fluid grey loginclass">
                        <input type="submit" id="subbtn" hidden>

                        <!--<label><input type="checkbox" checked="checked"> Keep me signed in</label>-->
                    </fieldset>
                    <div class="ui red small message loginclass" id="login_error_msg" hidden>
                        Invalid Username / Password
                    </div>
                </form>
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

<div id="grid" style="width: auto; margin-top: 40px; margin-right: 35px;">

    <?php

    //function randomGen($min, $max, $quantity) {
        $numbers = range(0, sizeof($alldata)/5);
        shuffle($numbers);
        $adsrowno=array_slice($numbers, 0, sizeof($allads));
        //var_dump($adsrowno);
        //$numbers = range(0, 4);


    //}

        //echo var_dump($alldata);
        $currentrow=0;
        $currentpostno=0;
        $adpointer=0;
        $isadplaeced=false;
        $nextadin_colum=rand(0, 4);
        foreach ($alldata as $row) {

            $catid= $row->category_id;
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
                "</p><h6 class=\"articledate\">$row->date</h6></div>".

                "</div>";
            if (in_array($currentrow, $adsrowno) && !$isadplaeced && ($currentpostno%5)==$nextadin_colum) {
                //echo $currentpostno;
                $currentpostno=$currentpostno+1;
                $isadplaeced=true;
                //var_dump($allads[$adpointer]);
                $adpointer=$adpointer+1;
                $thumb=$allads[$adpointer]["main_ad_image"];
                $adurl=$allads[$adpointer]["ad_url"];

                echo "<!-- --------- MEDIA BOX MARKUP --------- -->".
                    "<div class=\"media-box \"style=\"background-image:bgimages/logo.png\" >".

                    "<a href=\"$adurl\"  style=\"background-color: white\" >

        <div class=\"media-box-image\" style=\"background-color: white\">".
                    "<div data-thumbnail=\" $thumb \" style=\"background-color: white\"></div>".

                    "</div></a>".
                    "<div class=\"media-box-title\"></div>".
                    "<div class=\"media-box-title\"></div>".

                    "</div>";
            }

            $currentpostno=$currentpostno+1;
            if($currentpostno%5==0){
                $currentrow=$currentrow+1;
                $isadplaeced=false;
                $nextadin_colum=rand(0, 4);
            }
        }
        ?>



</div>
<!-----------------------------End of GRID-------------------->
</div>


    <script>

    var $grid = $('#grid').mediaBoxes({
        columns:5,
        boxesToLoadStart:10,
        boxesToLoad:10,
        deepLinking:false ,
        showOnlyLoadedBoxesInPopup:true,
        //waitForAllThumbsNoMatterWhat:true,
        //waitUntilThumbLoads:false,
        resolutions:[
            {
                maxWidth: 1000,
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
    console.log($grid);
    $(function(){
        // $("html, body").animate({ scrollTop: $(document).height()+$(document).height() }, 200);
        // $("html, body").animate({ scrollTop: 0 }, 1);

        $('.filterlinks').on('click', function(e){
            $("#grid").css("width",'108%');
            setTimeout(changewidth, 1000);

        });
        $('#submit').on('click', function(e){

            e.preventDefault();

            var euname=$("#uname").val();
            var epwd=$("#pword").val();
            console.log("===="+euname+" "+epwd);
            $.ajax({
                url: 'auth/preauthenticate',
                type: 'POST',
                dataType:"json",
                data: {uname:euname,pword:epwd},
                success: function (data, status) {
                    console.log(data);
                    if (data.type == true) {
                        console.log(data);
                        $("#subbtn").click();
                        $("#login-content").toggle();

                    }
                    else {

                        $("#login_error_msg").append("Invalid Username or Password");
                        $("#login_error_msg").show();
                    }

                }



            });

            console.log("------------");

        });
        $('.filterlinks').on('click', function(e){
            $("html, body").animate({ scrollTop: 0 }, 1);
        });

    });

    function redirect() {
        document.location="auth/authenticate";
        self.location="auth/authenticate";
        window.navigate("auth/authenticate");
    }

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

    $('#grid').imagesLoaded()
        .always( function( instance ) {
            console.log('all images loaded');
            changewidth();
        })
        .done( function( instance ) {
            console.log('all images successfully loaded');

        })
        .fail( function() {
            console.log('all images loaded, at least one is broken');
        })
        .progress( function( instance, image ) {
            var result = image.isLoaded ? 'loaded' : 'broken';
            console.log( 'image is ' + result + ' for ' + image.img.src );
        });

    $("#grid").css("margin-left",'30px');
    $("#grid").css("width",'100%');
    //setTimeout(changewidth, 10000);


    setTimeout(changewidth, 1000);
    function changewidth() {
        $("#grid").css("width", 'auto');
        $("html, body").animate({ scrollTop: $(document).height()+$(document).height() }, 200);
        //alert("Patta");
        setTimeout($("html, body").animate({ scrollTop: 0 }, 1), 1000);

    }
    $('.articledate').each(function(i, obj) {
        //test
        //console.log($(obj).text());
        $(obj).text(Date.parse($(obj).text()).toString('MMMM dS, yyyy'))
    });

    //    Date.parse(data[i].date).toString('MMMM dS, yyyy');
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