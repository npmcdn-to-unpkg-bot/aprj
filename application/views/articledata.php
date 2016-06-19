<html><head>


    <base href="http://localhost/aprj/">
    <script src="newjscss/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="newjscss/jquery.js"></script>
    <script type="text/javascript" src="newjscss/html5gallery.js"></script>
    <script type="application/javascript" src="newjscss/bootstrap.min.js"></script>

    <link rel="stylesheet" href="newjscss/bootstrap.min.css">
<!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
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
    .myButton{
        background-image: url('bgimages/social/fb-like.png');
        cursor:pointer;
        border:none;
        width:50px;
        height:50px;
    }

    .myButton:active  /* use Dot here */
    {
        background-color: blue;
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

<div style='background-color: #ffffff;width:90%; margin:0 auto; height: auto; padding: 1%'>

<?php
//<<<<<<< HEAD
////var_dump($alldata);
//=======
//echo json_encode($alldata);
//>>>>>>> 79756445930e9657e9571088720e77c7a5c79b57
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
echo "<div class=\"col-lg-5 col-md-5 col-sm-5\">";
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
<!--<<<<<<< HEAD-->
<!--<br>-->
<!--<br>-->
<!--Share this article on,-->
<!--<br><br>-->
<!--<div><button class="btn btn-primary" style="width: 24%"><i class="fa fa-facebook"></i>&nbsp;Facebook</button> <button class="btn btn-info" style="width: 24%"><i class="fa fa-twitter"></i>&nbsp;Twitter</button> <button class="btn btn-danger" style="width: 24%"><i class="fa fa-google-plus"></i>&nbsp;Google+</button> <button class="btn btn-warning" style="width: 24%"><i class="fa fa-envelope"></i>&nbsp;Email</button></div>-->
<!--=======-->

<br>
Share this article on,
<br><br>
<!--<br>-->
<div>
    <button onclick="javascript:fbsahre();" class="btn btn-primary" style="width: 19%"><i class="fa fa-facebook"></i>&nbsp;Facebook</button> <button onclick="javascript:gplusshare();" class="btn btn-danger" style="width: 19%"><i class="fa fa-google-plus"></i>&nbsp;Google+</button>
    <?php
    echo " <button onclick=\"javascript:tweetclick();\" class=\"btn btn-info\" style=\"width: 19%\"><a class=\"twitter-share-button\" id=\"tweetshare\" href=\"https://twitter.com/intent/tweet?url=$base\"><i class=\"fa fa-twitter\"></i>&nbsp;Twitter</a>
            </button>";
    echo " <button onclick=\"javascript:x();\" class=\"btn btn-success\" style=\"width: 19%\"><a href=\"whatsapp://send\" data-text=\"Take a look at this awesome website:\" data-href=\"$base\" class=\"wa_btn wa_btn_s\">WhatsApp</a></button>";
    ?>
    <button onclick="javascript:sendemail();" class="btn btn-warning" style="width: 19%"><i class="fa fa-envelope"></i>&nbsp;Email</button>

</div>
<!-- 79756445930e9657e9571088720e77c7a5c79b57-->
</div>

<div class="col-lg-7 col-md-7 col-sm-7 readContent">
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