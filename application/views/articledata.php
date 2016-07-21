<html xmlns="http://www.w3.org/1999/html"><head>


    <base href=<?php echo base_url();?>>
    <script src="newjscss/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="newjscss/jquery.js"></script>
    <script type="text/javascript" src="newjscss/html5gallery.js"></script>
    <script type="application/javascript" src="newjscss/bootstrap.min.js"></script>
    <script type="application/javascript" src="newjscss/clipboard.min.js"></script>
    <script type="application/javascript" src="newjscss/notify.min.js"></script>

    <link rel="stylesheet" href="newjscss/bootstrap.min.css">

    <meta property="og:type" content="article" />
    <meta property="og:headline" content="When Great Minds Don’t Think Alike2" />
    <meta property="og:description" content="How much does culture influence creative thinking?" />

<!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
</head>
<style>
    html{
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
    }

    h1 {
        font-family: Arial, Helvetica, sans-serif !important;
        font-size: 28px;
        color: #5b6c76;
        font-weight: 700;
        margin: 0 0 12px;
        /*padding: 10px;*/
        padding-bottom: 5px;
        line-height: 1.1 !important;
        display:block;
    //width:250px;
    }
    .readContent {
        font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; !important;
        font-size: 15px;
        color: #5b6c76;
        font-weight: 200;
        margin: 0 0 12px;
        /*padding: 10px;*/
        padding-bottom: 15px;
        display: block;
    }
    .myButton{
        font-size: 12px;
    }

    .myButton a{
        text-decoration: none;
        color: #ffffff;
    }

    .myButton:active  /* use Dot here */
    {
        background-color: blue;
    }


</style>
<script src="//connect.facebook.net/en_US/all.js#xfbml=1&version=v2.6&appId=101681440262813"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script src="https://apis.google.com/js/platform.js"></script>

<script src="//cdn.jsdelivr.net/whatsapp-sharing/1.3.3/whatsapp-button.js"></script>
<script>
    var clipboard = new Clipboard('.clipboarddata');

    clipboard.on('success', function(e) {
        $(".clipboarddata").notify(
            "Link copied to your clipboard",
            "success"

        );
        e.clearSelection();
    });

    function fbsahre() {
        var pth=$("#selflink").attr("href");
        var title = $("#caption").text();
        var des = $("#des").text();

        console.log(pth);
        FB.ui({
            method: 'share',
            href: pth,//'https://developers.facebook.com/docs/',
            title: title,
            description:des
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

<div style='background-color: #ffffff;width:90%;min-width: 50%; margin:0 auto; min-height: 70%; padding: 5px;'>

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
//var_dump($alldata);
$base="http://ajax.vivawebhost.com/~loudhorn/"."welcome/article/".$arid;
echo "<a href=\"$base\" id='selflink' hidden></a>";
echo "<a id=\"gplusshare\" href=\"https://plus.google.com/share?url=$base\" onclick=\"javascript:window.open(this.href,
  '', 'menubar=no, toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;\"><img
        src=\"https://www.gstatic.com/images/icons/gplus-64.png\" alt=\"Share on Google+\" hidden/></a>";
echo "<div class=\"modal-body row\">";
echo "<div class=\"col-lg-5 col-md-5 col-sm-5\" style=\"height: 80%\">";
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

<!--<br>-->
<div class="col-lg-12" style="position: absolute; bottom: 0;">
    <div class="input-group" style="margin-bottom: 2%; margin-right: 3%">
        <span class="input-group-addon" id="basic-addon3">Article URL: </span>
        <input type="text" id="clipboarddataactual" class="form-control" value="<?php echo "http://ajax.vivawebhost.com/~loudhorn/welcome/article/".$arid ?>" aria-describedby="basic-addon3">
    </div>
    <button onclick="javascript:x();" class="btn btn-success myButton clipboarddata" style="margin-right: 1%;margin-bottom: 2%" data-clipboard-target="#clipboarddataactual">Copy URL</button>

    <button class="btn btn-warning myButton" style="margin-bottom: 2%"> <a href="<?php echo $alldata[0]["original_url"]; ?>" target="_blank">Orginal</a></button>

    <div>
        <br><br>
        Share this article on,
        <br><br>
    <button onclick="javascript:fbsahre();" class="btn btn-primary myButton col-lg-3 col-sm-10" style="margin-right: 1%;"><i class="fa fa-facebook"></i>&nbsp;Facebook</button>
    <button onclick="javascript:gplusshare();" class="btn btn-danger myButton col-lg-3 col-sm-10" style="margin-right: 1%;"><i class="fa fa-google-plus"></i>&nbsp;Google+</button>
    <button class="btn btn-info myButton col-lg-3 col-sm-10"><a class="twitter-share-button" id="tweetshare" href="https://twitter.com/intent/tweet?url=<?php echo $base?>"><i class="fa fa-twitter"></i>&nbsp;Twitter</a></button>
    </div>
            <!-- Target -->




</div>
<!-- 79756445930e9657e9571088720e77c7a5c79b57-->
</div>

<div class="col-lg-7 col-md-7 col-sm-7 readContent" style="height: 80%">
    <?php
    if(isset($alldata[0]["title"])){

    echo "<h1 id=\"caption\">".$alldata[0]["title"]."</h1>";
    }
    ?>
    <div id="des" hidden>
        <?php
        echo $alldata[0]["display_content"];
        ?>
    </div>
    <div class="readContent" style="overflow-y:scroll; height: 68%">
    <?php

//hhhhhhhhhhhhhhhhhhhhhhhhhhhhh
    echo $alldata[0]["content"];
?>
        <!-- Your second column here -->

    </div>
    <br>
    <div style="position: absolute; bottom: 0; margin-right: 15px;"><a href="<?php echo $ad['ad_url'] ?>"><img src="<?php echo "AdvertisementImages/ad2Main.jpg";//$ad['main_ad_image']?>" class="img-responsive" width="auto" height="50px"></a>

    </div>
    </div>



</div>
</div>
</body>
</html>