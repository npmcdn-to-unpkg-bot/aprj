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
        display: table-cell;

        text-align:center;
    }
</style>
<body bgcolor="black;">


<div style='background-color: #e7e7e7;width:75%'>

<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 6/12/2016
 * Time: 4:04 PM
 */


//var_dump($alldata[0]);
if(isset($alldata[0]["title"])){

    echo "<h1>".$alldata[0]["title"]."</h1>";

}

echo "<div class=\"modal-body row\">";
echo "<div class=\"col-lg-6 col-md-6 col-sm-6\">";
echo "<div style=\"display:none;\" class=\"html5gallery\" data-skin=\"light\" data-width=\"360\" data-height=\"204\">";

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

<div class="col-lg-6 col-md-6 col-sm-6">
    <div style="overflow-y:scroll;height: 100%">
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