<html><head>


    <base href="http://localhost/aprj/">
    <script src="newjscss/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="newjscss/jquery.js"></script>
    <script type="text/javascript" src="newjscss/html5gallery.js"></script>
    <script type="application/javascript" src="newjscss/bootstrap.min.js"></script>

    <link rel="stylesheet" href="newjscss/bootstrap.min.css">
</head>
<style>

    h1 {
        font: bold 28px/28px Calibri, sans-serif;
        color: grey;
        margin: 0;
        padding: 10px;
        padding-bottom: 5px;
        word-break: break-all;
        display:block;
    //width:250px;
    }
    .readContent {
        font: 16px/22px Arial, sans-serif;
        color: grey;
        margin: 0;
        padding: 10px;
        padding-bottom: 15px;
        display: block;
    }


</style>
<script src="//connect.facebook.net/en_US/all.js#xfbml=1&version=v2.6&appId=101681440262813"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<script src="//cdn.jsdelivr.net/whatsapp-sharing/1.3.3/whatsapp-button.js"></script>
<script>
    function fbsahre() {
        var pth=$("#selflink").attr("href");
        console.log(pth);
        FB.ui({
            method: 'share',
            href: pth,//'https://developers.facebook.com/docs/',
        }, function(response){
            console.log(response);
        });

    }

    function gplusshare() {

        $('#gplusshare').click();

    }

    function sendemail() {

        //$('#tweetshare').click();

    }


</script>


<body bgcolor="black;">

<div style='background-color: #ffffff;width:90%; margin:0 auto; height: 90%; padding: 1%'>

<?php
echo json_encode($alldata);
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 6/12/2016
 * Time: 4:04 PM
 */


//var_dump($alldata[0]);
//if(isset($alldata[0]["title"])){
//
//    echo "<h1>".$alldata[0]["title"]."</h1>";
//
//}
$arid=$alldata[0]["article_id"];
$base="http://ajax.vivawebhost.com/~loudhorn/"."welcome/article/".$arid;
echo "<a href=\"$base\" id='selflink' hidden></a>";
echo "<a id=\"gplusshare\" href=\"https://plus.google.com/share?url=$base\" onclick=\"javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\"><img
        src=\"https://www.gstatic.com/images/icons/gplus-64.png\" alt=\"Share on Google+\" hidden/></a>";
echo "<div class=\"modal-body row\">";
echo "<div class=\"col-lg-4 col-md-4 col-sm-4\">";
echo "<div style=\"display:none;\" class=\"html5gallery\" data-responsive=\"true\" data-skin=\"light\">";

if($alldata[0]["image"]!=""){
    $thumbnail=str_replace ( "\\" , "/" , $alldata[0]["image"] );
    echo "<a href=\"$thumbnail\"><img src=\"$thumbnail\" alt=\"image0\"></a>";


}
if($alldata[0]["image1"]!=""){
    $thumbnail=str_replace ( "\\" , "/" , $alldata[0]["image1"] );
    echo "<a href=\"$thumbnail\"><img src=\"$thumbnail\" alt=\"image1\"></a>";


}
if($alldata[0]["image2"]!=""){
    $thumbnail=str_replace ( "\\" , "/" , $alldata[0]["image2"] );
    echo "<a href=\"$thumbnail\"><img src=\"$thumbnail\" alt=\"image2\"></a>";


}
if($alldata[0]["image3"]!=""){
//    echo "<img src=".$alldata[0]["image3"].">";
    $thumbnail=str_replace ( "\\" , "/" , $alldata[0]["image3"] );
    echo "<a href=\"$thumbnail\"><img src=\"$thumbnail\" alt=\"image3\"></a>";

}
if($alldata[0]["image4"]!=""){
//    echo "<img src=".$alldata[0]["image3"].">";
    $thumbnail=str_replace ( "\\" , "/" , $alldata[0]["image4"] );
    echo "<a href=\"$thumbnail\"><img src=\"$thumbnail\" alt=\"image4\"></a>";

}


if($alldata[0]["video"]!=""){
//    echo "<img src=".$alldata[0]["image3"].">";
    $thumbnail=str_replace ( "\\" , "/" , $alldata[0]["video"] );
    $thumbnailvideo=str_replace ( "\\" , "/" , $alldata[0]["thumbnail"] );
    //echo "<a href=\"$thumbnail\"><img src=\"$thumbnail\" alt=\"Trees\"></a>";
    echo "<a href=\"$thumbnail\"><img src=\"$thumbnailvideo\" alt=\"Video\"></a>";
}


?>



    <!-- Add videos to Gallery
    <a href="images/Big_Buck_Bunny.mp4"><img src="images/Big_Buck_Bunny.jpg" alt="Big Buck Bunny, Copyright Blender Foundation"></a>

    <!-- Add Youtube video to Gallery
    <a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>

    <!-- Add Vimeo video to Gallery
    <a href="https://player.vimeo.com/video/1084537?title=0&amp;byline=0&amp;portrait=0"><img src="images/Big_Buck_Bunny.jpg" alt="Vimeo Video"></a>
-->

</div>
<?php
echo "<a class=\"twitter-share-button\" id=\"tweetshare\" href=\"https://twitter.com/intent/tweet?url=$base\">Tweet</a>";
?>
<div style="background-color: #0000FF">PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP PPPPPPPPPP
    <div id="fb"><button onclick="javascript:fbsahre();">Facebook</button></div>
    <div id="fb"><button onclick="javascript:gplusshare();">Google</button></div>
    <?php
    echo "<div id=\"fb\"><button onclick=\"javascript:tweetclick();\"><a class=\"twitter-share-button\" id=\"tweetshare\" href=\"https://twitter.com/intent/tweet?url=$base\">Tweet</a>
            </button></div>";
    echo "<div id=\"fb\"><button onclick=\"javascript:x();\"><a href=\"whatsapp://send\" data-text=\"Take a look at this awesome website:\" data-href=\"$base\" class=\"wa_btn wa_btn_s\">WhatsApp</a></button></div>";
    ?>
    <div id="fb"><button onclick="javascript:sendemail();">Email</button></div>

</div>
</div>

<div class="col-lg-8 col-md-8 col-sm-8">
    <?php
    if(isset($alldata[0]["title"])){

    echo "<h1>".$alldata[0]["title"]."</h1>";
    }
    ?>

    <div class="readContent" style="overflow-y:scroll;height: 85%">
    <?php
//hhhhhhhhhhhhhhhhhhhhhhhhhhhhh
    echo $alldata[0]["content"];
?>
        <!-- Your second column here -->
    </div>
    </div>
</div>

</div>
</body>
</html>