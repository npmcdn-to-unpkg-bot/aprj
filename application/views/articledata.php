<html><head>

    <base href="http://localhost/aprj/">
</head>
<body bgcolor="#FFFFF">
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
if(isset($alldata[0]["image"])){
    echo "<img src=".$alldata[0]["image"].">";

}
if(isset($alldata[0]["image1"])){
    echo "<img src=".$alldata[0]["image1"].">";

}
if(isset($alldata[0]["image2"])){
    echo "<img src=".$alldata[0]["image2"].">";

}
if(isset($alldata[0]["image3"])){
    echo "<img src=".$alldata[0]["image3"].">";

}

?>

</body>
</html>