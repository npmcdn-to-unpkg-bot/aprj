
<base href=<?php echo base_url();?>>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="http://opoloo.github.io/jquery_upload_preview/assets/js/jquery.uploadPreview.min.js"></script>

<link href="css/semantic.css" rel="stylesheet" type="text/css"/>

<link href="newjscss/bootstrap.min.css" rel="stylesheet" type="text/css">


<?php
/**
 * Created by PhpStorm.
 * User: NRV
 * Date: 7/27/2016
 * Time: 9:21 AM
 */
//echo var_dump($articledata);

?>
<style type="text/css">
    .image-preview {
        width: 400px;
        height: 400px;
        background-size: contain;
        background-size: cover;
        background-image:url("newjscss /download.png");
        background-repeat: no-repeat;
        background-position: center;
        color: #ecf0f1;
    }
    .image-preview input {
        line-height: 200px;
        font-size: 200px;
        position: absolute;
        opacity: 0;
        z-index: 10;
    }
    .image-preview label {
        position: absolute;
        z-index: 5;
        opacity: 0.8;
        cursor: pointer;
        background-color: #bdc3c7;
        width: 200px;
        height: 50px;
        font-size: 20px;
        line-height: 50px;
        text-transform: uppercase;

        margin: auto;
        text-align: center;
    }

    </style>


    <?php echo form_open_multipart('article/editarticle');?>
    Article Title
    <input type="text" name="article_title" value="<?php

        echo $articledata[0]["title"];
    ?>"><br>
    Article Preview
    <input type="text" name="article_preview" value="<?php
    echo $articledata[0]["display_content"];
    ?>"><br>
    <br>

    Article Category
    <select  name="article_category">
<?php

foreach ($cats as $acat) {

    if($acat['category_id']==$articledata[0]['category_id']) {
        echo "<option value=" . $acat["category_id"] . "selected>" . $acat["category_name"] . "</option>";
    }
    else{
        echo "<option value=" . $acat["category_id"] . ">" . $acat["category_name"] . "</option>";
    }
}

?>
        </select>
        <br>
    Article Content
    <input type="text" name="article_content" value="<?php
    echo $articledata[0]["content"];
    ?>"><br>


    Article URL
    <input type="text" name="original_url" value="<?php
    echo $articledata[0]["original_url"];
    ?>"><br>

    <input type="hidden" name="article_user" value="<?php
    echo  $uanme;
    ?>"><br>
    Article Video
    <input type="text" name="article_video" value="<?php
    echo $articledata[0]["video"];
    ?>"><div onclick="OpenYT();"><img src="newjscss/icons/videodownload.jpg">UPLOAD VIDEO</div><br>

    <input type="hidden" id="imgArticleId" name="imgArticleId" value="<?php
    echo $articledata[0]["article_id"];
    ?>"><br>

    <div>
    <div id="image-preview_div_article_thumbnai" class="image-preview">
        Article Thubnail
        <label for="image-upload" id="image-label_article_thumbnai">Choose File</label>
        <input type="file" name="article_thumbnai" id="article_image_article_thumbnai"><br>
    </div>

<!--
    <div id="image-preview_div_article_image" class="image-preview">
        Article Image
        <label for="image-upload" id="image-label_article_image">Choose File</label>
        <input type="file" name="article_image" id="article_image_article_image" ><br>
    </div>

-->
<!--
    <div id="image-preview_div_thumbImage" class="image-preview">
        Article ThumbImage
        <label for="image-upload" id="image-label_thumbImage">Choose File</label>
        <input type="file" name="article_image" id="article_image_thumbImage" ><br>

    </div>


-->
    <div id="image-preview_div_mainImage" class="image-preview" style="float:left;">
        Article MainImage
        <label for="image-upload" id="image-label_mainImage" >Choose File</label>
        <input type="file" name="article_image" id="article_image_mainImage" ><br>

    </div>


    <div id="image-preview_div_mainImage1" class="image-preview" style="float:left;">
        Article MainImage1
        <label for="image-upload" id="image-label_mainImage1">Choose File</label>
        <input type="file" name="article_image1" id="article_image_mainImage1" ><br>

    </div>



    <div id="image-preview_div_mainImage2" class="image-preview" style="float:left;">
        Article MainImage2
        <label for="image-upload" id="image-label_mainImage2">Choose File</label>
        <input type="file" name="article_image2" id="article_image_mainImage2" ><br>

    </div>

    <div id="image-preview_div_mainImage3" class="image-preview" style="float:left;">
        Article MainImage3
        <label for="image-upload" id="image-label_mainImage3">Choose File</label>
        <input type="file" name="article_image3" id="article_image_mainImage3" ><br>

    </div>

    <div id="image-preview_div_mainImage4" class="image-preview" style="float:left;">
        Article MainImage4
        <label for="image-upload" id="image-label_mainImage4">Choose File</label>
        <input type="file" name="article_image4" id="article_image_mainImage4" ><br>

    </div>
    <br>
        <button type="submit"style="float:left;">SUBMIT</button>

    </div>

</form>
<div hidden>
    <div id="thumbnail_link">url(<?php echo $articledata[0]["thumbnail"];?>)</div>
    <div id="image_link">url(<?php echo $articledata[0]["image"];?>)</div>
    <div id="image1_link">url(<?php echo $articledata[0]["image1"];?>)</div>
    <div id="image2_link">url(<?php echo $articledata[0]["image2"];?>)</div>
    <div id="image3_link">url(<?php echo $articledata[0]["image3"];?>)</div>
    <div id="image4_link">url(<?php echo $articledata[0]["image4"];?>)</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        if($("#thumbnail_link").text().length>1) {
            $('#image-preview_div_article_thumbnai').css("background-image", $("#thumbnail_link").text());
        }
        if($("#image_link").text().length>1) {
            $('#image-preview_div_mainImage').css("background-image", $("#image_link").text());
        }
        if($("#image1_link").text().length>1) {
        $('#image-preview_div_mainImage1').css("background-image", $("#image1_link").text());
        }
        if($("#image2_link").text().length>1) {
        $('#image-preview_div_mainImage2').css("background-image", $("#image2_link").text());
        }
        if($("#image3_link").text().length>1) {
        $('#image-preview_div_mainImage3').css("background-image", $("#image3_link").text());
        }
        if($("#image4_link").text().length>1) {
        $('#image-preview_div_mainImage4').css("background-image", $("#image4_link").text());
        }

        $.uploadPreview({
            input_field: "#article_image_article_image",   // Default: .image-upload
            preview_box: "#image-preview_div_article_image",  // Default: .image-preview
            label_field: "#image-label_article_image",    // Default: .image-label
            label_default: "Choose File for Article Thubnail",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_article_thumbnai",   // Default: .image-upload
            preview_box: "#image-preview_div_article_thumbnai",  // Default: .image-preview
            label_field: "#image-label_article_thumbnai",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_thumbImage",   // Default: .image-upload
            preview_box: "#image-preview_div_thumbImage",  // Default: .image-preview
            label_field : "#image-label_thumbImage",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_mainImage",   // Default: .image-upload
            preview_box: "#image-preview_div_mainImage",  // Default: .image-preview
            label_field: "#image-label_mainImage",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_mainImage1",   // Default: .image-upload
            preview_box: "#image-preview_div_mainImage1",  // Default: .image-preview
            label_field: "#image-label_mainImage1",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_mainImage2",   // Default: .image-upload
            preview_box: "#image-preview_div_mainImage2",  // Default: .image-preview
            label_field: "#image-label_mainImage2",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_mainImage3",   // Default: .image-upload
            preview_box: "#image-preview_div_mainImage3",  // Default: .image-preview
            label_field: "#image-label_mainImage3",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });
        $.uploadPreview({
            input_field: "#article_image_mainImage4",   // Default: .image-upload
            preview_box: "#image-preview_div_mainImage4",  // Default: .image-preview
            label_field: "#image-label_mainImage4",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
        });


    });
    function OpenYT() {
        var url = '<?php echo site_url('article/uploadVideo') ?>';
        var UploadWindow = window.open(url, 'name', 'width=600,height=400');
    }
</script>