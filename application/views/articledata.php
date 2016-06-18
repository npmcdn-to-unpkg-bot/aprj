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
<body bgcolor="black;">

<div style='background-color: #ffffff;width:90%; margin:0 auto; height: 90%; padding: 1%'>

<?php
var_dump($alldata);
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
<div style="background-color: #0000FF">PPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPPP PPPPPPPPPP</div>
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