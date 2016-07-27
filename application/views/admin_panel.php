<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Loud Horn Marketing</title>
        <base href=<?php echo base_url();?>>
        <script src="js/jquery.min.js" language="JavaScript"></script>
        <script src="js/jquery-1.8.2.js" language="JavaScript"></script>
        <script type="text/javascript" src="html5gallery/html5gallery.js"></script>
        <script src="js/jquery.loadTemplate-1.4.4.js" type="text/javascript"></script>
        <script src="js/semantic.js" type="text/javascript"></script>
        <link href="css/semantic.css" rel="stylesheet" type="text/css"/>
        <link href="css/SimpleSlider.css" rel="stylesheet" type="text/css">

        <style type="text/css">
            .pin {
                //display: inline-block;
                background: #FEFEFE;
                //border: 2px solid #FAFAFA;
                box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
                margin: 0 2px 15px;
                -webkit-column-break-inside: avoid;
                -moz-column-break-inside: avoid;
                column-break-inside: avoid;
                //               padding: 15px;
                //                padding-bottom: 5px;
                background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
                opacity: 1;

                -webkit-transition: all .2s ease;
                -moz-transition: all .2s ease;
                -o-transition: all .2s ease;
                transition: all .2s ease;
                cursor: pointer; cursor: hand;
                width: 40%;
            }

            .pin img {
                width: 100%;
                border-bottom: 1px solid #ccc;
                padding-bottom: 1px;
                margin-bottom: 1px;
            }
            #search_bar_item{
                width: 200%;
            }
            #wrapper {

                width: 90%;
                max-width: 1200px;
                min-width: 800px;
                margin: 50px auto;
            }
            #grid_container {
                padding: 20px;
                width: 90%;
                max-width: 1200px;
                min-width: 800px;
                margin: 50px auto;
            }
            .step{
                cursor: pointer;
            }
            tr{
                cursor: pointer;
            }
            #article_title{
                resize:none;
                overflow:hidden;
                min-height:25px;
                max-height:100px;

            }

        </style>
        <script>
            var toApproveArticles;
            var prev_hash_loc;
            var confirm_shown = false;
            var from_editable = false;
            //true / false => admin/ normal
            var p;
            var article_id_edit;
            function auto_grow(element) {
                element.style.height = "5px";
                element.style.height = (element.scrollHeight) + "px";
                $('#article_title_2').val($('#article_title').val());
                //todo
                $('#preview_title')[0].innerHTML = $('#article_title').val();
            }

            function getCheckUserType() {
                $.ajax({
                    url: "auth/currentUser",
                    success: function (data) {
                        if (data == 1) {
                            p = true;
                        }
                        else {
                            p = false;
                            $('.admin_only').css('display', 'none');
                            $('#main_menu_grid').removeClass('five');
                            $('#main_menu_grid').addClass('one');

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: true,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });

            }
            function OpenYT() {
                var url = '<?php echo site_url('article/uploadVideo') ?>';
                var UploadWindow = window.open(url, 'name', 'width=600,height=400');
            }
            function UploadDone(id) {
                //alert(id);
                $('#vid_upload').attr('src', 'http://img.youtube.com/vi/' + id + '/default.jpg');
                $('#vid_upload').attr('val', id);
                //alert(id);
            }
            $(document).ready(function () {
                window.location.hash = "home_panel";
                window.onbeforeunload = function () {
                    return "Are you sure that you want to go back to the live site";
                };
                $(window).on('hashchange', function (e) {
                    //alert(window.location.hash);
                    // alert(e.oldURL);
                    if (e.originalEvent.oldURL.split('#')[1] == "add_user" ||
                            e.originalEvent.oldURL.split('#')[1] == "category_main" ||
                            e.originalEvent.oldURL.split('#')[1] == "approve_article" ||
                            e.originalEvent.oldURL.split('#')[1] == "add_advertisement") {
                        if (!confirm_shown) {
                            if (confirm('Are you sure you want ot leave? Any unsaved changes will be lost.')) {
                                // Save it!

                                $('#dashboard_main').children().hide();
                                $(window.location.hash).show();
                            } else {
                                // Do nothing!
                                window.location.hash = e.originalEvent.oldURL.split('#')[1];
                                e.stopPropagation();
                            }
                        }
                        else {
                            $('#dashboard_main').children().hide();
                            $(window.location.hash).show();
                            confirm_shown = false;
                        }
                    }
                    else {
                        $('#dashboard_main').children().hide();
                        $(window.location.hash).show();
                        confirm_shown = false;
                    }

                });

                $('#thumbImage').change(function () {
                    //alert( $(this).val());
                    if (this.files && this.files[0]) {
                        if (this.files[0].size > 500000) {
                            $('#thumbnail_image_warning').text('Image needs to be less then 500KB in size. \n  Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                            $('#thumbnail_image_warning').css('visibility', 'visible');
                        }
                        else {
                            var reader = new FileReader();
                            reader.onload = imageIsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#thumbnail_image_warning').css('visibility', 'hidden');
                        }
                    }

                });

                $('#mainImage').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!'); mainImg_warning
                    if (this.files[0].size > 500000) {
                        $('#mainImg_warning').text('Image needs to be less then 500KB in size. \n Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#mainImg_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = mainIsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#mainImg_warning').addClass('hidden');
                        }
                    }
                });
                $('#mainImage1').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    if (this.files[0].size > 500000) {
                        $('#mainImg1_warning').text('Image needs to be less then 500KB in size. \n Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#mainImg1_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = main1IsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#mainImg1_warning').addClass('hidden');
                        }
                    }
                });
                $('#mainImage2').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    if (this.files[0].size > 500000) {
                        $('#mainImg2_warning').text('Image needs to be less then 500KB in size. \nSelected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#mainImg2_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = main2IsLoaded;
                            reader.readAsDataURL(this.files[0]);
                        }
                        $('#mainImg2_warning').addClass('hidden');
                    }
                });
                $('#mainImage3').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    if (this.files[0].size > 500000) {
                        $('#mainImg3_warning').text('Image needs to be less then 500KB in size. \n Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#mainImg3_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = main3IsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#mainImg3_warning').addClass('hidden');
                        }
                    }
                });
                $('#mainImage4').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    if (this.files[0].size > 500000) {
                        $('#mainImg4_warning').text('Image needs to be less then 500KB in size. \n Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#mainImg4_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = main4IsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#mainImg4_warning').addClass('hidden');
                        }
                    }
                });
                $('#video').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    //window.open("localhost/ArticleManagementSystem/YouTubeUpload", "Google", "width=500,height=500");
                    //);
//                    var url = ';'
//                    window.open(url, 'name', 'width=600,height=400');

                    if (this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = vidIsLoaded();
                        reader.readAsDataURL(this.files[0]);
                    }
                });
                
                $('#ad_main_img').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    if (this.files[0].size > 500000) {
                        $('#ad_main_img_warning').text('Image needs to be less then 500KB in size. \n Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#ad_main_img_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = ad_main_img_IsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#ad_main_img_warning').addClass('hidden');
                        }
                    }
                });
                
                $('#ad_second_img').change(function () {
                    //alert( $(this).val());
                    //$('#image_url').text('Image Selected!');
                    if (this.files[0].size > 500000) {
                        $('#ad_second_img_warning').text('Image needs to be less then 500KB in size. \n Selected image - Size : ' + this.files[0].size / 1000 + 'KB');
                        $('#ad_second_img_warning').removeClass('hidden');
                    }
                    else {
                        if (this.files && this.files[0]) {
                            var reader = new FileReader();
                            reader.onload = ad_second_img_IsLoaded;
                            reader.readAsDataURL(this.files[0]);
                            $('#ad_second_img_warning').addClass('hidden');
                        }
                    }
                });

                $('#btn_upload_img').click(function () {
                    $('#thumbImage').trigger('click');
                });



                function imageIsLoaded(e) {
                    $('#thumbnail_upload').attr('src', e.target.result);
                    $('#preview_thumb').attr('src', e.target.result);
                    if (Math.abs($('#thumbnail_upload')[0].height - $('#thumbnail_upload')[0].width) > 30) {
                        $('#thumbnail_image_warning').text('Image needs to be a square \n Selected image - Height: ' + $('#thumbnail_upload')[0].height + 'px | Width: ' + $('#thumbnail_upload')[0].width);
                        $('#thumbnail_image_warning').css('visibility', 'visible');
                        $('#thumbnail_upload').attr('src', 'http://www.drawdeck.com/sites/all/themes/pinboard2/img/artwork-upload-placeholder.jpg');
                        $('#preview_thumb').attr('src', 'http://www.drawdeck.com/sites/all/themes/pinboard2/img/artwork-upload-placeholder.jpg');
                    }
                    else {
                        $('#thumbnail_image_warning').css('visibility', 'hidden');
                    }
                }
                ;
                function mainIsLoaded(e) {
                    $('#main_upload').attr('src', e.target.result);
                }
                ;
                function main1IsLoaded(e) {
                    $('#main1_upload').attr('src', e.target.result);
                }
                ;
                function main2IsLoaded(e) {
                    $('#main2_upload').attr('src', e.target.result);
                }
                ;
                function main3IsLoaded(e) {
                    $('#main3_upload').attr('src', e.target.result);
                }
                ;
                function main4IsLoaded(e) {
                    $('#main4_upload').attr('src', e.target.result);
                }
                ;
                function vidIsLoaded(e) {
                    //$('#vid_upload').attr('src', e.target.result);
                }
                ;
                
                function ad_main_img_IsLoaded(e) {
                    $('#main_ad_upload').attr('src', e.target.result);
                }
                
                function ad_second_img_IsLoaded(e) {
                    $('#sec_ad_upload').attr('src', e.target.result);
                }

                $('#btn_upload_main_img').click(function () {
                    $('#mainImage').trigger('click');
                });
                $('#btn_upload_main_img1').click(function () {
                    $('#mainImage1').trigger('click');
                });
                $('#btn_upload_main_img2').click(function () {
                    $('#mainImage2').trigger('click');
                });
                $('#btn_upload_main_img3').click(function () {
                    $('#mainImage3').trigger('click');
                });
                $('#btn_upload_main_img4').click(function () {
                    $('#mainImage4').trigger('click');
                });
                $('#btn_upload_video').click(function () {
                    $('#video').trigger('click');
                });

                $('#btn_upload_main_ad').click(function () {
                    $('#ad_main_img').trigger('click');
                });

                $('#btn_upload_sec_ad').click(function () {
                    $('#ad_second_img').trigger('click');
                });

                getCheckUserType();
                $('.special.cards .image').dimmer({
                    on: 'hover'
                });
                $('.menu_body').hide();
//                $('#content_step_tab').hide();
//                $('#media_step_tab').hide();
//                $('#submit_step_tab').hide();
                $('select.dropdown').dropdown();
                //update category drop down
                $.ajax({
                    url: "article/getCategories",
                    success: function (data) {
                        $.each(jQuery.parseJSON(data), function (index, value) {
                            $('#category_selector').append('<option value=' + value.category_id + '>' + value.category_name + '</option>');
                            $('#search_category').append('<option value=' + value.category_id + '>' + value.category_name + '</option>');

                        });
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: true,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });
                //get to approve article count
                LoadArticleCount();

                $('#new_article_count').click(function () {
                    //tbl_approve_articles_body 

                });
//                $('#menu_add_article').click(function () {
//                    $('#home_panel').hide();
//                    $('#add_article').show();
//
//                });
                $('#save_cat').click(function () {

                    if ($(this).hasClass('add_')) {
                        category_title = $('.category_title:not(.disabled)').val();
                        cat_order = $('.order_:not(.disabled)').val();
                        colour = $('.colour_:not(.disabled)').val();
                        //alert(cat_order);
                        data_json = {
                            title: category_title,
                            colour: colour,
                            order: cat_order
                        };
                        $.ajax({
                            url: "article/addCategory",
                            data: data_json,
                            success: function (data) {
                                LoadCategories();
                                AddCategory();
                                //alert(data);
                                var r = 5;
                            },
                            error: function (jqXHR, textStatus, errorThrown) {

                            },
                            async: true,
                            type: 'POST'
                        });
                    }
                    else {
                        var array = [];
                        var headers = [];
                        $('#tbl_all_cats th').each(function (index, item) {
                            headers[index] = $(item).html();
                        });
                        $('#tbl_all_cats tr').has('td').each(function () {
                            var arrayItem = {};
                            $('td', $(this)).each(function (index, item) {
                                arrayItem[headers[index]] = $(item).children().val();
                            });
                            array.push(arrayItem);
                        });

                        data_json = {
                            rows: JSON.stringify(array)
                        }
                        $.ajax({
                            url: "article/updateCategories",
                            data: data_json,
                            success: function (data) {
                                if ($('.success_msg').length == 0) {
                                    $('#category_main').append("<div class='ui green message success_msg'>Changes Successfuly Saved!</div>");
                                }
                            },
                            async: true,
                            type: "POST" // the type can be anything but hv to map it like in library line 27
                        });
                    }

                });

                $('#save_ads').click(function () {
                    var array = [];
                    var headers = [];
                    $('#tbl_all_ads th').each(function (index, item) {
                        headers[index] = $(item).html();
                    });
                    $('#tbl_all_ads tr').has('td').each(function () {
                        var arrayItem = {};
                        $('td', $(this)).each(function (index, item) {
                            arrayItem[headers[index]] = $(item).children().val();
                        });
                        array.push(arrayItem);
                    });

                    data_json = {
                        rows: JSON.stringify(array)
                    }
                    $.ajax({
                        url: "advertisement/updateAds",
                        data: data_json,
                        success: function (data) {
                            if ($('.success_msg').length == 0) {
                                //$('#category_main').append("<div class='ui green message success_msg'>Changes Successfuly Saved!</div>");
                            }
                        },
                        async: true,
                        type: "POST" // the type can be anything but hv to map it like in library line 27
                    });
                });

                $('#save_articles_approved').click(function () {
//                    status = $('#article_approve_status').val();
//                    //alert(status);
                    var array = [];
                    var headers = [];
                    $('#tbl_approve_articles th').each(function (index, item) {
                        headers[index] = $(item).html();
                    });
                    $('#tbl_approve_articles tr').has('td').each(function () {
                        var arrayItem = {};
                        $('td', $(this)).each(function (index, item) {
                            arrayItem[headers[index]] = $(item).children().val();
                        });

                        array.push(arrayItem);
                    });

                    //alert(JSON.stringify(array));
                    data_json = {
                        rows: JSON.stringify(array)
                    }
                    $.ajax({
                        url: "article/ApproveDenyArticle",
                        data: data_json,
                        success: function (data) {
                            LoadArticleCount();
                            LoadArticlesToApprove();
                            if ($('.success_msg').length == 0) {
                                $('#approve_article').append("<div class='ui green message success_msg'>Changes Successfuly Saved!</div>");
                            }
                        },
                        async: true,
                        type: "POST" // the type can be anything but hv to map it like in library line 27
                    });
                });

                $('#btn_export_subscribers').click(function () {
                    $.ajax({
                        url: "article/exportSubscribers",
                        success: function (data) {
                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        },
                        async: true,
                        type: 'POST'
                    });
                });


                $('#btn_add_article').click(function () {

                    URL = "article/addArticle";
                    title = $('#article_title').val();
                    cat = $('#category_selector').val();
                    content = $('#article_content').val();
                    org_url = $('#original_url').val();
                    console.log(org_url);
                    image_path = $('#image_url').val();
                    thumbnail_path = $('#thumbnail_image_url').val();
                    preview = $('#article_preview_content').val();

                    user = <?php echo json_encode($logged_username); ?>;
                    if ($(this).hasClass('edit_')) {
                        URL = "article/updateArticle";
                        data_json = {
                            article_image: image_path,
                            article_title: title,
                            article_category: cat,
                            article_content: content,
                            article_user: user,
                            original_url: org_url,
                            article_thumbnai: thumbnail_path,
                            article_preview: preview,
                            article_id: article_id_edit,
                            article_video: 'https://www.youtube.com/watch?v=' + $('#vid_upload').attr('val')
                        };
                    }
                    else {
                        alert("****");
                        URL = "article/addArticle";
                        data_json = {
                            article_image: image_path,
                            article_title: title,
                            article_category: cat,
                            article_content: content,
                            article_user: user,
                            original_url: org_url,
                            article_thumbnai: thumbnail_path,
                            article_preview: preview,
                            article_video: 'https://www.youtube.com/watch?v=' + $('#vid_upload').attr('val')
                        };
                    }
                    $.ajax({
                        url: URL,
                        data: data_json,
                        success: function (articleId) {
                            if ($('#btn_add_article').hasClass('edit_')) {
                                $('#imgArticleId').val(article_id_edit);
                            }
                            else {
                                $('#imgArticleId').val(articleId);
                            }
                            $('#thumb_upload_form').submit();
                            if ($('.success_msg').length == 0) {
                                $('#add_article').append("<div class='ui green message success_msg'>Article Successfuly Added!</div>");
                            }
                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        },
                        async: true,
                        type: 'POST'
                    });
                });


                $('#btn_update_user').click(function () {
                    $( ".success_msg" ).remove();
                    if ($('#confirm_pswd').val() !== $('#new_pswd').val())
                    {
                        $('#user_profile').append("<div class='ui red message success_msg'> Please re-enter the password correctly.</div>");
                    }
                    URL = "user/addUser";
                    name = $('#profile_name').val();
                    username = $('#user_profile_title')[0].innerText;
                    email = $('#profile_email').val();
                    old_pswd = $('#old_pswd').val();
                    pswd = $('#new_pswd').val();
                    action = 'update';
                    data_json = {
                        action: action,
                        user_name: name,
                        user_username: username,
                        user_email: email,
                        old_pswd: old_pswd,
                        user_pswd: pswd
                    };
                    $.ajax({
                        url: URL,
                        data: data_json,
                        success: function (data) {
                            if(data != "" && $('.success_msg').length == 0){
                                $('#user_profile').append("<div class='ui red message success_msg'>"+ data + "</div>");
                            }        
                            if ($('.success_msg').length == 0) {
                                $('#user_profile').append("<div class='ui green message success_msg'>Profile Successfuly Updated!</div>");
                            }
                        },
                        async: true,
                        type: 'POST'
                    });
                });
                $('#btn_add_ad').click(function () {
                    //preventDefault();
                    //LoadAdvertisements();
                    URL = "advertisement/addAd";
                    id = $('#ad_name').val();
                    priority = $('#ad_priority').val();
                    main_img = $('#main_ad_upload').attr('src');
                    sec_img = $('#sec_ad_upload').attr('src');
                    url = $('#ad_url').val();
                    action = '';
                    if ($(this).hasClass('update_')) {
                        action = 'update';
                    }
                    else if ($(this).hasClass('submit_')) {
                        action = 'add';
                    }
                    data_json = {
                        action: action,
                        ad_id: id,
                        ad_priority: priority,
                        ad_main_img: main_img,
                        ad_sec_img: sec_img,
                        ad_url: url
                    };
                    $.ajax({
                        url: URL,
                        data: data_json,
                        success: function (data) {

                            $('#imgArticleIdAd').val(id);
                            $('#ad_upload_form').submit();
                            if ($('.success_msg').length == 0) {
                                $('#add_advertisement').append("<div class='ui green message success_msg'>Advertiesment Successfully Added!</div>");
                            }

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            if ($('.success_msg').length == 0) {
                                $('#add_advertisement').append("<div class='ui green message success_msg'>Advertiesment Successfully Added!</div>");
                            }
                        },
                        async: true,
                        type: 'POST'
                    });
                });
                $('#btn_add_user').click(function () {
                    URL = "user/addUser";
                    name = $('#name').val();
                    username = $('#username').val();
                    email = $('#email').val();
                    pswd = $('#pswd').val();
                    action = '';
                    if ($(this).hasClass('update_')) {
                        action = 'update';
                    }
                    else if ($(this).hasClass('submit_')) {
                        action = 'add';
                    }
                    data_json = {
                        action: action,
                        user_name: name,
                        user_username: username,
                        user_email: email,
                        user_pswd: pswd,
                    };

                    $.ajax({
                        url: URL,
                        data: data_json,
                        success: function (data) {
                            if ($('.success_msg').length == 0) {
                                $('#add_user').append("<div class='ui green message success_msg'>User Successfully Saved!</div>");
                            }
                        },
                        async: true,
                        type: 'POST'
                    });
                    if (action === 'add') {
                        email_opt = $('#send_mail_chk').val();
                        //TO-DO:if the check box i checked
                        data_json = {
                            user_email: email,
                            user_pswd: pswd,
                        };
                        $.ajax({
                            url: 'user/sendRegMail',
                            data: data_json,
                            success: function (data) {
                                if ($('.success_msg').length == 0) {
                                    $('#add_user').append("<div class='ui green message success_msg'>User Successfully Updated!</div>");
                                }
                            },
                            async: true,
                            type: 'POST'
                        });
                    }
                });

                $('#generate_btn').click(function () {
                    $.ajax({
                        url: "user/generatePswd",
                        success: function (data) {
                            $('#pswd').val(data);


                        },
                        async: false,
                        type: 'POST'
                    });
                });

                $('#username').focusout(function () {
                    URL = "user/userExist";
                    username = $('#username').val();
                    //$('#username_icon').remove();
                    data_json = {
                        user_username: username
                    };
                    $.ajax({
                        url: URL,
                        data: data_json,
                        success: function (data) {
                            $(this).parent().removeClass('loading');

                            if (data === "0")
                            {
                                if ($('#username_msg').length == 0) {
                                    $('#username').parent().append('<i class="green check circle icon" id="username_icon"></i>');
                                    $('#btn_add_user').removeClass('disabled');
                                }
                                else {
                                    $('#username_msg').remove();
                                    $('#username').parent().append('<i class="green check circle icon" id="username_icon"></i>');
                                    $('#btn_add_user').removeClass('disabled');
                                }

                            }
                            else if (data === "") {
                                $('#username_icon').remove();
                                $('#btn_add_user').addClass('disabled');
                                $('#username_msg').remove();
                            }
                            else
                            {
                                if ($('#add_user_title')[0].innerText != 'Edit User')
                                {
                                    if ($('#username_msg').length == 0)
                                        $('#username').parent().append('<div id= "username_msg">' +
                                                '<i class="red remove circle icon" id="username_icon"></i>' +
                                                '<div class="ui left pointing red basic label">That username is taken!</div>' +
                                                '</div>');
                                    $('#btn_add_user').addClass('disabled');
                                }
                            }


                        },
                        async: false,
                        type: 'POST'
                    });
                });

                $('#btn_show_article_search').click(function () {
                    $('.small.article_search_dlg.modal')
                            .modal('show');
                });
                first_search = true;
                var added_ids = [];
                $('.search_field').on('change keyup', function () {
                    //$('.small.article_search_dlg.modal').hide();
                    var search_user = $('#search_username').val();
                    var search_after = $('#search_pub_after').val();
                    var search_before = $('#search_pub_before').val();
                    var search_status = $('#search_status').val();
                    var search_category = $('#search_category').val();
                    //alert(search_user + search_after + search_before + search_status + search_category);
                    if (first_search) {
                        $('#tbl_all_articles_body').empty();
                    }
                    first_search = false;

                    URL = "article/searchArticles";

                    data_json = {
                        search_user: search_user,
                        search_after: search_after,
                        search_before: search_before,
                        search_status: JSON.stringify(search_status),
                        search_category: JSON.stringify(search_category)
                    };
                    $.ajax({
                        url: URL,
                        data: data_json,
                        success: function (data) {
                            var data = jQuery.parseJSON(data);
                            //if (data.length === 0) {
                            $('#tbl_all_articles_body').empty();
                            //}
                            //else {
                            for (var i in data) {
                                //if (added_ids.indexOf(data[i].article_id) === -1 ){
                                var status_;
                                if (data[i].status === 'Approve') {
                                    status_ = 'Approved';
                                }
                                else if (data[i].status === 'Reject') {
                                    status_ = 'Rejected';
                                }
                                else if (data[i].status === 'Pending') {
                                    status_ = 'Pending Approval';
                                }
                                else {
                                    status_ = data[i].status;
                                }

                                $('#tbl_all_articles_body').loadTemplate($("#all_articles_tbl_row"),
                                        {
                                            'article_id': data[i].article_id,
                                            'title': data[i].title,
                                            'creator': data[i].creator,
                                            'category': data[i].category_name,
                                            'date': data[i].date,
                                            'status': status_
                                        }, {append: true});
                                added_ids.push(data[i].article_id);
                                //}
                            }
                            //}

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            //alert('fail');
                        },
                        async: true,
                        type: "GET" // the type can be anything but hv to map it like in library line 27
                    });
                });
//                $('.search_field').change(function () {
//                    //$('.small.article_search_dlg.modal').hide();
//
//                    var search_user = $('#search_username').val();
//                    var search_after = $('#search_pub_after').val();
//                    var search_before = $('#search_pub_before').val();
//                    var search_status = $('#search_status').val();
//                    var search_category = $('#search_category').val();
//                    //alert(search_user + search_after + search_before + search_status + search_category);
//                    if (first_search) {
//                        $('#tbl_all_articles_body').empty();
//                    }
//                    first_search = false;
//
//                    URL = "/ArticleManagementSystem/index.php/article/searchArticles";
//
//                    data_json = {
//                        search_user: search_user,
//                        search_after: search_after,
//                        search_before: search_before,
//                        search_status: JSON.stringify(search_status),
//                        search_category: JSON.stringify(search_category)
//                    };
//                    $.ajax({
//                        url: URL,
//                        data: data_json,
//                        success: function (data) {
//                            var data = jQuery.parseJSON(data);
//                            //if (data.length === 0) {
//                            $('#tbl_all_articles_body').empty();
//                            //}
//                            //else {
//                            for (var i in data) {
//                                //if (added_ids.indexOf(data[i].article_id) === -1 ){
//                                var status_;
//                                if (data[i].status === 'Approve') {
//                                    status_ = 'Approved';
//                                }
//                                else if (data[i].status === 'Reject') {
//                                    status_ = 'Rejected';
//                                }
//                                else if (data[i].status === 'Pending') {
//                                    status_ = 'Pending Approval';
//                                }
//                                else {
//                                    status_ = data[i].status;
//                                }
//
//                                $('#tbl_all_articles_body').loadTemplate($("#all_articles_tbl_row"),
//                                        {
//                                            'article_id': data[i].article_id,
//                                            'title': data[i].title,
//                                            'creator': data[i].creator,
//                                            'category': data[i].category_name,
//                                            'date': data[i].date,
//                                            'status': status_
//                                        }, {append: true});
//                                added_ids.push(data[i].article_id);
//                                //}
//                            }
//                            //}
//
//                        },
//                        error: function (jqXHR, textStatus, errorThrown) {
//                            //alert('fail');
//                        },
//                        async: true,
//                        type: "GET" // the type can be anything but hv to map it like in library line 27
//                    });
//                });

                $('#toggle_change_pswd').click(function () {
                    $('#change_pswd_toggle').slideToggle();
                });
                //step functionalities
                $('.step').click(function () {
                    $('.step').removeClass('active');
                    $('.step_tab').hide();
                    $(this).addClass('active');
                    $('#' + $(this).attr('id') + '_tab').show();
                });

                //step buttons
                $('#btn_next_thumbnail').click(function () {
                    // check if all eneterd
                    if($('#article_title').val() == '' || $('#article_preview_content').val() == '' ||$('#thumbnail_upload').attr('src') == "" || $('#thumbnail_upload').attr('src') == "bgimages/img_placeholder.png"){
                        if ($('.error_msg_thumb').length == 0) {
                            $('#thumbnail_step_tab').append("<div class='ui red message error_msg_thumb'>Please fill all the mandatory fields!</div>");
                        }
                    }
                    else{
                        if ($('.error_msg_thumb').length !== 0) {
                            //$('#thumbnail_step_tab', ".error_msg").remove();
                            $('.error_msg_thumb').remove();
                        }
                        $('#thumbnail_step').removeClass('active');
                       // $('#thumbnail_step_tab').hide();
                        $('#content_step').addClass('active');
                        $('#content_step_tab').show();
                        $('#article_title_2').val($('#article_title').val());
                        //todo
                        $('#preview_title')[0].innerHTML = $('#article_title').val();
                    }

                });

                $('#btn_next_content').click(function () {
                    if($('#category_selector').val() == "" || $('#original_url').val()  == "" ||
                            $('#article_content').val() == ""){
                        if ($('.error_msg_content').length == 0) {
                            $('#content_step_tab').append("<div class='ui red message error_msg_content'>Please fill all the mandatory fields!</div>");
                        }
                    }
                    else{
                        if ($('.error_msg_content').length != 0) {
                            //$('#content_step_tab', ".error_msg").remove();
                            $('.error_msg_content' ).remove();
                        }
                        $('#content_step').removeClass('active');
                     //   $('#content_step_tab').hide();

                        $('#media_step').addClass('active');
                        $('#media_step_tab').show();
                        //$('#submit_step').addClass('active');
                        //$('#submit_step_tab').show();
                    }
                });
                $('#btn_next_media').click(function () {
                    if($('#main_upload').attr('src') == "" || $('#main_upload').attr('src') == "bgimages/img_placeholder.png" ||
                          $('#main1_upload').attr('src') == "" || $('#main1_upload').attr('src') == "bgimages/img_placeholder.png")
                    {
                        if ($('.error_msg_media').length == 0) {
                            $('#media_step_tab').append("<div class='ui red message error_msg_media'>Please select at least 2 images!</div>");
                        }
                    }
                    else{
                        if ($('.error_msg_media').length != 0) {
                            //$('#content_step_tab', ".error_msg").remove();
                            $('.error_msg_media' ).remove();
                        }
                        $('#media_step').removeClass('active');
                        $('#media_step_tab').hide();
                        $('#submit_step').addClass('active');

                        $('#submit_step_tab').show();
                    }
                });



                $('#btn_upload_img').click(function () {
                    //alert('sdfds');
                });
            });

            function LoadUserProfile()
            {
                var username = $('#user_profile_title')[0].innerText;
                //get other info
                data_json = {
                    username: username
                };
                $.ajax({
                    url: "user/getUser",
                    data: data_json,
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        for (var i in data) {
                            $('#profile_name').val(data[i].name);
                            $('#profile_email').val(data[i].email);
                        }
                    },
                    async: true,
                    type: 'POST'
                });
            }
            function LoadArticleCount()
            {
                $.ajax({
                    url: "article/getToApproveCount",
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        toApproveArticles = data;
                        for (var i in data) {
                            if (data.length == 0)
                            {
                                $('#new_article_count')[0].innerText = '0';
                            }
                            else
                            {
                                $('#new_article_count')[0].innerText = data.length;
                            }

                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: false,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });
            }
            function SwitchPanel(e, toShow, toEmpty, titleElem, titleText) {

                //alert(window.location.hash);
                //


                if (window.location.hash != "#" + toShow) {
                    if (window.location.hash == "#add_user" ||
                            window.location.hash == "#category_main" ||
                            window.location.hash == "#approve_article" ||
                            window.location.hash == "#add_advertisement") {

                        if (confirm('Are you sure you want ot leave? Any unsaved changes will be lost.')) {
                            // Save it!

                            if(toShow=="add_article"){
                                window.open("/aprj/auth/addarticle");
                                return;
                            }
                            prev_hash_loc = window.location.hash;
                            confirm_shown = true;
                            window.location.hash = toShow;
                            $(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio, .lbl_txt').val('');
                            $('.disabled').removeClass('disabled');
                            $(':checkbox, :radio').prop('checked', false);
                            $('#' + titleElem).text(titleText);
                            $('#' + toEmpty).children().hide();
                        }
                        else {
                            if (e != null)
                                e.stopPropagation();
                            // Do nothing!
                        }


                    }
                    else {
                        //$('#content_step_tab').show();$('#media_step_tab').show();$('#submit_step_tab').show();
                        if(toShow=="add_article"){
                            window.open("/aprj/auth/addarticle");
                            return;
                        }
                        prev_hash_loc = window.location.hash;
                        confirm_shown = true;
                        window.location.hash = toShow;
                        $(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio, .lbl_txt').val('');
                        $('.disabled').removeClass('disabled');
                        $(':checkbox, :radio').prop('checked', false);
                        $('#' + titleElem).text(titleText);
                        $('#' + toEmpty).children().hide();
                    }
                }
                else {
                    if (e !== null) {
                        e.stopPropagation();
                    }
                }


                //$('#' + toShow).show();
            }


            function LoadUsers()
            {
                $("#tbl_all_users_body").empty();
                $.ajax({
                    url: "user/getAllUsers",
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        for (var i in data) {
                            var act = "large red minus circle icon";
                            if (data[i].active === 'N')
                            {
                                act = "large green checkmark icon";
                            }
                            $("#tbl_all_users").loadTemplate($("#user_tbl_row"),
                                    {
                                        'user_name': data[i].username,
                                        'user': data[i].name,
                                        'act_status': data[i].active,
                                        'pro_pic': data[i].image
                                    }, {append: true});
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: true,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });
            }

            function GenerateTempPassword($item)
            {
                URL = "user/forgotPword";
                data_json = {
                    user_username: $item.id
                };
                $.ajax({
                    url: URL,
                    data: data_json,
                    success: function (data) {
                        LoadUsers();
                    },
                    async: false,
                    type: 'POST'
                });
            }
            function ShowRemoveArticleModal($item)
            {

                $('.basic.small.remove_article.modal')
                        .modal({'closable': false,
                            onDeny: function () {
                                return false;
                            },
                            onApprove: function () {
                                //window.alert('Approved!');
                                URL = "article/removeArticle";
                                data_json = {
                                    artice_id: $item.id
                                };
                                $.ajax({
                                    url: URL,
                                    data: data_json,
                                    success: function (data) {
                                        LoadArticles();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        //alert(errorThrown);
                                    },
                                    async: false,
                                    type: 'POST'
                                });
                            }})
                        .modal('show');
                $('#block_user_heading').text($item.innerText + ' the user ' + $item.id);
                $('#block_user_desc').text('Are you sure you want to ' + $item.innerText + ' user ' + $item.id + '?');
                //alert($item.innerText);

            }
            function ShowRemoveAdvertisementModal($item) {
                $('.basic.small.remove_ad.modal')
                        .modal({'closable': false,
                            onDeny: function () {
                                window.alert('Wait not yet!');
                                return false;
                            },
                            onApprove: function () {
                                //window.alert('Approved!');
                                URL = "advertisement/removeAd";
                                data_json = {
                                    ad_id: $item.id
                                };
                                $.ajax({
                                    url: URL,
                                    data: data_json,
                                    success: function (data) {
                                        LoadAdvertisements();
                                    },
                                    async: false,
                                    type: 'POST'
                                });
                            }})
                        .modal('show');

            }

            function ShowRemoveCategoryModal($item) {
                $('.basic.small.remove_cat.modal')
                        .modal({'closable': false,
                            onDeny: function () {
                                //window.alert('Wait not yet!');
                                return false;
                            },
                            onApprove: function () {
                                //window.alert('Approved!');
                                URL = "article/removeCat";
                                data_json = {
                                    cat_id: $item.id
                                };
                                $.ajax({
                                    url: URL,
                                    data: data_json,
                                    success: function (data) {
                                        LoadCategories();
                                    },
                                    async: false,
                                    type: 'POST'
                                });
                            }})
                        .modal('show');

            }

            function ShowBlockUnblockUserModal($item)
            {

                $('.basic.small.block_user.modal')
                        .modal({'closable': false,
                            onDeny: function () {
                                // window.alert('Wait not yet!');
                                return false;
                            },
                            onApprove: function () {
                                //window.alert('Approved!');
                                URL = "user/blockUser";
                                data_json = {
                                    user_username: $item.id,
                                    state: $item.innerText
                                };
                                $.ajax({
                                    url: URL,
                                    data: data_json,
                                    success: function (data) {
                                        LoadUsers();
                                    },
                                    async: false,
                                    type: 'POST'
                                });
                            }})
                        .modal('show');
                $('#block_user_heading').text($item.innerText + ' the user ' + $item.id);
                $('#block_user_desc').text('Are you sure you want to ' + $item.innerText + ' user ' + $item.id + '?');
                //alert($item.innerText);

            }

            function GetNextPriority()
            {
                $.ajax({
                    url: "advertisement/getNextPriority",
                    success: function (data) {
                        var data = jQuery.parseJSON(data.substring(63));
                        $('#ad_priority').val(parseInt(data.priority) + 1);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: true,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });
            }
            function LoadAdvertisements()
            {
                $("#tbl_all_ads_body").empty();
                $.ajax({
                    url: "advertisement/getAllAds",
                    success: function (data) {
                        var data = jQuery.parseJSON(data.substring(63));
                        for (var i in data) {

                            $("#tbl_all_ads_body").loadTemplate($("#advert_tbl_row"),
                                    {
                                        'ad_priority': data[i].priority,
                                        'ad_ref': data[i].ad_id,
                                        'ad_url': data[i].ad_url
                                    }, {append: true});
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: true,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });
            }

            function LoadArticles()
            {
                $('#tbl_all_articles_body').empty();
                var URL = "";

                if (p)
                {
                    URL = "article/getArticlesForAdmin";
                }
                else
                {
                    URL = "article/getArticlesForUser";
                    var user = <?php echo json_encode($logged_username); ?>;

                }
                data_json = {
                    username: user
                };
                $.ajax({
                    url: URL,
                    data: data_json,
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        for (var i in data) {
                            var status_;
                            if (data[i].status === 'Approve') {
                                status_ = 'Approved';
                            }
                            else if (data[i].status === 'Reject') {
                                status_ = 'Rejected';
                            }
                            else if (data[i].status === 'Pending') {
                                status_ = 'Pending Approval';
                            }
                            else {
                                status_ = data[i].status;
                            }

                            $('#tbl_all_articles_body').loadTemplate($("#all_articles_tbl_row"),
                                    {
                                        'article_id': data[i].article_id,
                                        'title': data[i].title,
                                        'creator': data[i].creator,
                                        'category': data[i].category_name,
                                        'date': data[i].date,
                                        'status': status_
                                    }, {append: true});
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: true,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });

                //approve_articles_tbl_row
            }

            function LoadArticlesToApprove()
            {
                $('#tbl_approve_articles_body').empty();
                for (var i in toApproveArticles) {
                    $('#tbl_approve_articles_body').loadTemplate($("#approve_articles_tbl_row"),
                            {
                                'title': toApproveArticles[i].title,
                                'creator': toApproveArticles[i].creator,
                                'article_id': toApproveArticles[i].article_id
                            }, {append: true});
                }
                //approve_articles_tbl_row
            }
            function LoadSubscribers()
            {
                //cats_tbl_row
                $("#tbl_view_subscribers_body").empty();
                $.ajax({
                    url: "article/getSubscribers",
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        for (var i in data) {

                            $("#tbl_view_subscribers_body").loadTemplate($("#subs_tbl_row"),
                                    {
                                        'email': data[i].email
                                    }, {append: true});
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: false,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });

                $('#cat_page_title').text('Edit Category');
                $('#save_cat').removeClass('add_');
            }
            function LoadCategories()
            {
                //cats_tbl_row
                $("#tbl_all_cats_body").empty();
                $.ajax({
                    url: "article/getCategories",
                    success: function (data) {
                        var data = jQuery.parseJSON(data);
                        for (var i in data) {

                            $("#tbl_all_cats_body").loadTemplate($("#cats_tbl_row"),
                                    {
                                        'category_id': data[i].category_id,
                                        'category_name': data[i].category_name,
//                                        'artilcle_count': data[i].artilcle_count,
                                        'colour': data[i].colour,
                                        'order_id': data[i].order
                                    }, {append: true});
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //alert('fail');
                    },
                    async: false,
                    type: "GET" // the type can be anything but hv to map it like in library line 27
                });

                $('#cat_page_title').text('Edit Category');
                $('#save_cat').removeClass('add_');
            }
            function AddCategory()
            {
                $("#tbl_all_cats").loadTemplate($("#cats_tbl_row"),
                        {
                            'category_name': '',
                            'artilcle_count': '0',
                            'colour': '',
                            'order_id': '0'
                        }, {append: true});
                $('.category_title:not(:last)').addClass('disabled');
                $('.category_title:not(:last)').parent().addClass('disabled');
                $('.order_:not(:last)').addClass('disabled');
                $('.order_:not(:last)').parent().addClass('disabled');

                $('#save_cat').addClass('add_');
                $('#cat_page_title').text('Add Category');
            }
            function GoToEditMode(toShow, toEmpty, titleElem, titleText, key)
            {

                $('#' + titleElem)[0].innerText = titleText;
                if (toShow === 'add_user') {
                    //get user by 'key'getUser
                    data_json = {
                        username: key
                    };
                    $.ajax({
                        url: "user/getUser",
                        data: data_json,
                        success: function (data) {
                            var data = jQuery.parseJSON(data);
                            for (var i in data) {
                                $('#name').val(data[i].name);
                                $('#username').val(data[i].username);
                                $('#email').val(data[i].email);
                                $('#user_pro_pic').attr('src', data[i].image);
                                $('#pswd').val(data[i].pswd);
                                $('#username').parent().addClass('disabled');
                                $('#btn_add_user').addClass('update_');
                                $('#btn_add_user').removeClass('submit_');
                                $('#btn_add_user').removeClass('disabled');
                                $('#btn_add_user').text('Save');
                            }
                            ;
                            $('#username_icon').remove();
                        },
                        async: true,
                        type: 'POST'
                    });
                }
                else if (toShow === 'add_advertisement') {
                    //get user by 'key'getUser
                    data_json = {
                        ad_id: key
                    };
                    $.ajax({
                        url: "advertisement/getAd",
                        data: data_json,
                        success: function (data) {
                            var data = jQuery.parseJSON(data.substring(63));
                            for (var i in data) {
                                $('#ad_name').val(data[i].ad_id);
                                $('#ad_priority').val(data[i].priority);
                                $('#ad_url').val(data[i].ad_url);
                                $('#main_ad_upload').attr('src', data[i].main_ad_image);
                                $('#sec_ad_upload').attr('src', data[i].second_ad_image);
                                $('#btn_add_ad').addClass('update_');
                                $('#btn_add_ad').removeClass('submit_');
                            }
                        },
                        async: true,
                        type: 'POST'
                    });
                }
                else if (toShow === 'add_article') {
                    data_json = {
                        art_id: key
                    };
                    $.ajax({
                        url: "article/getArticle",
                        data: data_json,
                        success: function (data) {
                            var data = jQuery.parseJSON(data);
                            for (var i in data) {
                                $('#article_title').val(data[i].title);
                                $('#article_title_2').val(data[i].title);
                                $('#article_preview_content').val(data[i].display_content);
                                $('#category_selector').val(data[i].category_id.toString());
                                $('#original_url').val(data[i].original_url);
                                $('#article_content').val(data[i].content);
                                //$('#thumbnail_image_url').text('Thumbnail Selected!');
                                //$('#image_url').text('Image Selected!');
                                if(data[i].image != ""){
                                    $('#main_upload').attr('src', data[i].image);
                                }
                                if(data[i].image1 != ""){
                                    $('#main1_upload').attr('src', data[i].image1);
                                }
                                if(data[i].image2){
                                    $('#main2_upload').attr('src', data[i].image2);
                                }
                                if(data[i].image3 !=""){
                                    $('#main3_upload').attr('src', data[i].image3);
                                }
                                if(data[i].image4 != ""){
                                    $('#main4_upload').attr('src', data[i].image4);
                                }
                                if(data[i].thumbnail != ""){
                                    $('#thumbnail_upload').attr('src', data[i].thumbnail);
                                    $('#preview_thumb').attr('src', data[i].thumbnail);
                                }

                                //$('#btn_add_ad').addClass('update_');
                                //$('#btn_add_ad').removeClass('submit_');
                            }
                        },
                        async: true,
                        type: 'POST'
                    });
                    $('#btn_add_article').addClass('edit_');
                    article_id_edit = key;
                }
                SwitchPanel(null, toShow, toEmpty);
            }

            function  mainView() {//ToDo set mainURL
                location.href = "/";
            }

            function logoutUser()
            {
                //location.href = "auth/logout";
                $.ajax({
                    url: "auth/logout",
                    success: function (data) {
                        location.href = "";

                    },
                    async: true,
                    type: 'POST'
                });
            }

            function fadeOut()
            {
                $('.product-gallery-popup').fadeOut(100);
                $('body').css({'overflow': 'initial'});
            }

            function moreInformation(article_id) {
                /*
                 if (article_id.split("|")[1] != null)
                 {
                 //alert(article_id.split("|")[1]);
                 window.open(article_id.split("|")[1]);
                 }
                 $('#moreArticleInfoControl').empty();
                 $.ajax({
                 url: 'article/getArticles',
                 data: {
                 id: article_id,
                 type: 'ADMIN'
                 },
                 success: function (data) {
                 //alert('generateMock ' +data.questionTitle);
                 var data = jQuery.parseJSON(data);
                 
                 
                 for (var i in data)
                 var urlTitle = data['article'][0].title;
                 var urlContent = data['article'][0].display_content;
                 var pageUrl = "http://ajax.vivawebhost.comindex.php?id=" + data['article'][0].article_id;
                 var urlImage = "http://ajax.vivawebhost.com" + data['article'][0].thumbnail;
                 urlImage = urlImage.replace("%5C", "/");
                 urlImage = urlImage.replace(/\\/g, "/");
                 var shareUrl = "http://www.sharethis.com/share?url=" + pageUrl + "&title=" + urlTitle + "&summary=" + urlContent + "&img=" + urlImage;
                 var starRating = data['article'][0].rating;
                 currentRating = starRating;
                 currentArticleId = data['article'][0].article_id;
                 
                 $("#moreArticleInfoControl").loadTemplate($("#moreArticleInfo"),
                 {
                 'article_id': data['article'][0].article_id,
                 'articleImage': data['article'][0].image,
                 'title': data['article'][0].title,
                 'content': data['article'][0].content,
                 'original_url': data['article'][0].original_url,
                 'copy_url': pageUrl,
                 'hrefURL': encodeURI(shareUrl),
                 'adImage': data['ads'][0].second_ad_image,
                 'ad_url': data['ads'][0].ad_url
                 }, {append: true});
                 
                 ;
                 showmodal(starRating);
                 },
                 async: true,
                 type: "GET"
                 });
                 */

                if (article_id.split("|")[1] != null)
                {
                    //alert(article_id.split("|")[1]);
                    window.open(article_id.split("|")[1]);
                }
                $('#moreArticleInfoControl').empty();
                $.ajax({
                    url: 'article/getArticles',
                    data: {
                        id: article_id,
                        type: 'ARTICLE'
                    },
                    success: function (data) {
                        //alert('generateMock ' +data.questionTitle);
                        var data = jQuery.parseJSON(data);


                        for (var i in data)
                            var urlTitle = data['article'][0].title;
                        var urlContent = data['article'][0].display_content;
                        var pageUrl = "http://ajax.vivawebhost.comindex.php?id=" + data['article'][0].article_id;
                        var urlImage = "http://ajax.vivawebhost.com" + data['article'][0].thumbnail;
                        urlImage = urlImage.replace("%5C", "/");
                        urlImage = urlImage.replace(/\\/g, "/");
                        var shareUrl = "http://www.sharethis.com/share?url=" + pageUrl + "&title=" + urlTitle + "&summary=" + urlContent + "&img=" + urlImage;
                        var starRating = data['article'][0].rating;
                        currentRating = starRating;
                        currentArticleId = data['article'][0].article_id;
                        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                            $("#moreArticleInfoControl").loadTemplate($("#moreArticleInfo"),
                                    {
                                        'article_id': data['article'][0].article_id,
                                        'articleImage': data['article'][0].image,
                                        'title': data['article'][0].title,
                                        'content': data['article'][0].content,
                                        'original_url': data['article'][0].original_url,
                                        'copy_url': pageUrl,
                                        'hrefURL': encodeURI(shareUrl),
                                        'adImage': data['ads'][0].second_ad_image,
                                        'ad_url': data['ads'][0].ad_url
                                    }, {append: true});
                            showmodal(starRating);
                        }
                        else
                        {

                            $('.html5gallery').empty();


                            $('<div class="product-gallery-popup"> ' +
                                    '<div class="popup-overlay"></div>' +
                                    ' 	<div class="product-popup-content"> ' +
                                    '<div class="product-image ">'
                                    + '<div style="display:none;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="450">'
                                    + '</div>' +
                                    '<div class = "options">' +
                                    '<div onclick="shareBtnClick();" class="ui tiny item primary button share-btn">Share</div> ' +
                                    '<div onclick="copyUrl(this.id)" class="ui tiny item primary button copy-url">Copy URL</div>' +
                                    '<div onclick="window.open(this.id)" class="ui tiny item primary button org-url">Original URL</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="product-information"> ' +
                                    '<h2  data-title></h2><p class="product-desc" style = "overflow-y:scroll;height: 90%;"></p>' +
                                    '<a target = "_blank"><img class = "ad_img_div"></a>' +
                                    '</div>' +
                                    '<div class="clear"></div>' +
                                    '<a class="cross" style = "cursor: hand; cursor: pointer;"  onclick="fadeOut()">X</a>' +
                                    '</div>' +
                                    '</div>').appendTo('body');


                            $('.product-gallery-popup').fadeIn(100);
                            $('body').css({'overflow': 'hidden'});
                            // $('.product-popup-content .product-image img').attr('src', $(this).find('img').attr('src'));
                            //$('.product-popup-content .product-information h2').text($(this).find('h2').attr('data-title'));
                            //$('.product-popup-content .product-information p').text($(this).find('div').attr('data-desc'));
                            $('.product-popup-content .product-information h2').text(data['article'][0].title);
                            $('.product-popup-content .product-information p').text(data['article'][0].content);
                            $('.product-popup-content .product-image .options .share-btn').attr('id', shareUrl);
                            $('.product-popup-content .product-image .options .copy-url').attr('id', pageUrl);
                            $('.product-popup-content .product-image .options .org-url').attr('id', data['article'][0].original_url);
                            $('.product-popup-content .product-information .ad_img_div').attr('src', data['ads'][0].second_ad_image);
                            $('.product-popup-content .product-information .ad_img_div').parent().attr('href', data['ads'][0].ad_url);
                            if (data['article'][0].image != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image + '">' +
                                        '<img src="' + data['article'][0].image + '" alt="Image 1">' +
                                        '</a>');
                            }
                            if (data['article'][0].image1 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image1 + '">' +
                                        '<img src="' + data['article'][0].image1 + '" alt="Image 2">' +
                                        '</a>');
                            }
                            if (data['article'][0].image2 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image2 + '">' +
                                        '<img src="' + data['article'][0].image2 + '" alt="Image 3">' +
                                        '</a>');
                            }
                            if (data['article'][0].image3 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image3 + '">' +
                                        '<img src="' + data['article'][0].image3 + '" alt="Image 4">' +
                                        '</a>');
                            }
                            if (data['article'][0].image4 != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].image4 + '">' +
                                        '<img src="' + data['article'][0].image4 + '" alt="Image 5">' +
                                        '</a>');
                            }
                            if (data['article'][0].video != "")
                            {
                                $('.html5gallery').append('<a href="' + data['article'][0].video + '">' +
                                        '<img src="' + data['article'][0].image3 + '" alt="Youtube Video">' +
                                        '</a>');
                            }

//                        <a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>'
                            //html5gallery
                            $('.html5gallery').html5gallery();
                            $Current = $(this);
                            $PreviousElm = $(this).prev();
                            $nextElm = $(this).next();
                            if ($PreviousElm.length === 0) {
                                $('.nav-btn.prev').css({'display': 'none'});
                            }
                            else {
                                $('.nav-btn.prev').css({'display': 'block'});
                            }
                            if ($nextElm.length === 0) {
                                $('.nav-btn.next').css({'display': 'none'});
                            }
                            else {
                                $('.nav-btn.next').css({'display': 'block'});
                            }
                        }
                    },
                    async: true,
                    type: "GET"
                });

            }

            function showPreview() {
                $('.html5gallery').empty();


                $('<div class="product-gallery-popup"> ' +
                        '<div class="popup-overlay"></div>' +
                        ' 	<div class="product-popup-content"> ' +
                        '<div class="product-image ">'
                        + '<div style="display:none;" class="html5gallery" data-skin="horizontal" data-width="480" data-height="450">'
                        + '</div>' +
                        '<div class = "options">' +
                        '<div onclick="shareBtnClick();" class="ui tiny item primary button share-btn">Share</div> ' +
                        '<div onclick="copyUrl(this.id)" class="ui tiny item primary button copy-url">Copy URL</div>' +
                        '<div onclick="window.open(this.id)" class="ui tiny item primary button org-url">Original URL</div>' +
                        '</div>' +
                        '</div>' +
                        '<div class="product-information"> ' +
                        '<h2  data-title></h2><p class="product-desc" style = "overflow-y:scroll;height: 90%;"></p>' +
                        '<a target = "_blank"><img class = "ad_img_div"></a>' +
                        '</div>' +
                        '<div class="clear"></div>' +
                        '<a class="cross" style = "cursor: hand; cursor: pointer;"  onclick="fadeOut()">X</a>' +
                        '</div>' +
                        '</div>').appendTo('body');


                $('.product-gallery-popup').fadeIn(100);
                $('body').css({'overflow': 'hidden'});
                // $('.product-popup-content .product-image img').attr('src', $(this).find('img').attr('src'));
                //$('.product-popup-content .product-information h2').text($(this).find('h2').attr('data-title'));
                //$('.product-popup-content .product-information p').text($(this).find('div').attr('data-desc'));
                $('.product-popup-content .product-information h2').text($('#article_title').val());
                $('.product-popup-content .product-information p').text($('#article_content').val());
                $('.product-popup-content .product-image .options .share-btn').attr('id', '');
                $('.product-popup-content .product-image .options .copy-url').attr('id', '');
                $('.product-popup-content .product-image .options .org-url').attr('id', $('#original_url').val());
                $('.product-popup-content .product-information .ad_img_div').attr('src', 'data[ads][0].second_ad_image');
                $('.product-popup-content .product-information .ad_img_div').parent().attr('href', 'data[ads][0].ad_url');
                if ($('#main_upload').attr('src') != "" && $('#main_upload').attr('src') !== "bgimages/img_placeholder.png")
                {
                    $('.html5gallery').append('<a href="' + $('#main_upload').attr('src') + '">' +
                            '<img src="' + $('#main_upload').attr('src') + '" alt="Image 1">' +
                            '</a>');
                }
                if ($('#main1_upload').attr('src') != ""  && $('#main1_upload').attr('src') !== "bgimages/img_placeholder.png")
                {
                    $('.html5gallery').append('<a href="' + $('#main1_upload').attr('src') + '">' +
                            '<img src="' + $('#main1_upload').attr('src') + '" alt="Image 2">' +
                            '</a>');
                }
                if ($('#main2_upload').attr('src') != "" && $('#main2_upload').attr('src') !== "bgimages/img_placeholder.png")
                {
                    $('.html5gallery').append('<a href="' + $('#main2_upload').attr('src') + '">' +
                            '<img src="' + $('#main2_upload').attr('src') + '" alt="Image 3">' +
                            '</a>');
                }
                if ($('#main3_upload').attr('src') != "" && $('#main3_upload').attr('src') !== "bgimages/img_placeholder.png")
                {
                    $('.html5gallery').append('<a href="' + $('#main3_upload').attr('src') + '">' +
                            '<img src="' + $('#main3_upload').attr('src') + '" alt="Image 4">' +
                            '</a>');
                }
                if ($('#main4_upload').attr('src') != "" && $('#main4_upload').attr('src') !== "bgimages/img_placeholder.png")
                {
                    $('.html5gallery').append('<a href="' + $('#main4_upload').attr('src') + '">' +
                            '<img src="' + $('#main4_upload').attr('src') + '" alt="Image 5">' +
                            '</a>');
                }
                if ($('#vid_upload').attr('src')!= "" && $('#vid_upload').attr('src') !== "bgimages/img_placeholder.png")
                {
                    $('.html5gallery').append('<a href="' + $('#vid_upload').attr('src')+ '">' +
                            '<img src="' + $('#vid_upload').attr('src') + '" alt="Youtube Video">' +
                            '</a>');
                }

//                        <a href="http://www.youtube.com/embed/YE7VzlLtp-4"><img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>'
                //html5gallery
                $('.html5gallery').html5gallery();
                $Current = $(this);
                $PreviousElm = $(this).prev();
                $nextElm = $(this).next();
                if ($PreviousElm.length === 0) {
                    $('.nav-btn.prev').css({'display': 'none'});
                }
                else {
                    $('.nav-btn.prev').css({'display': 'block'});
                }
                if ($nextElm.length === 0) {
                    $('.nav-btn.next').css({'display': 'none'});
                }
                else {
                    $('.nav-btn.next').css({'display': 'block'});
                }
            }
            function showmodal(starRating) {
//                $('.ui.modal')
//                        .modal('show');

                currentRating = starRating;

                $('.ui.modal.show_article')
//                    .modal({
//                      blurring: true
//                    })
                        //                       .modal('setting', 'transition', 'browse right')
                        .modal('show')
                        ;

                $('.ui.rating')
                        .rating({
                            initialRating: starRating,
                            maxRating: 5
                        })
                        ;
            }

            function countCharArtPreCon(val) {
                var len = val.value.length;
                if (len >= 200) {
                    val.value = val.value.substring(0, 200);
                } else {
                    $('#charNumArtPreCon').text(200 - len);
                }
                $('#preview_content')[0].innerHTML = $('#article_preview_content').val();
            }

            function countCharArtCon(val) {
                var len = val.value.length;
                if (len >= 5000) {
                    val.value = val.value.substring(0, 5000);
                } else {
                    $('#charNumArtCon').text(5000 - len);
                }
            }


        </script>

    </head>

    <script type="text/html" id="user_tbl_row">
        <tr>
            <td>
                <h4 class="ui image header">
                    <img data-src="pro_pic" class="ui mini rounded image">
                    <div class="content">
                        <span data-content="user"></span>
                        <div class="sub header">
                            <span data-content="user_name"></span>
                        </div>
                    </div>
                </h4>
            </td>

            <td >
                <i data-id='user_name' class="large edit icon" onclick="GoToEditMode('add_user', 'dashboard_main', 'add_user_title', 'Edit User', this.id)"></i>
            </td>
            <td>
                <i data-id='user_name' class="large lock icon" onclick="GenerateTempPassword(this);"></i>
            </td>
            <td>
                <a data-id="user_name" data-content="act_status" onclick="ShowBlockUnblockUserModal(this);" ></a>
            </td>
        </tr>
    </script>

    <script type="text/html" id="approve_articles_tbl_row">
        <tr>

            <td class="ui form" style="display: none" >
                <input type="text"  data-value ='article_id' class="ui input" >
            </td>
            <td data-id='article_id' data-content='title' onclick="moreInformation(this.id)"></td>

            <td data-content='creator' ></td>
            <td class = 'ui form'>

                <select class="ui dropdown" id="article_approve_status">
                    <option value="Pending">Pending</option>
                    <option value="Approve">Approve</option>
                    <option value="Reject">Reject</option>
                </select>

            </td>
            <td class="ui form" >
                <input type="text"  class="ui input app_rej_comment"  >
            </td>
        </tr>
    </script>

    <script type="text/html" id="all_articles_tbl_row">
        <tr>
            <td data-id='article_id' data-content='title' onclick="moreInformation(this.id)"></td>

            <td data-content='creator' ></td>
            <td data-content='category' ></td>
            <td data-content='date' ></td>
            <td> 
                <i data-id="article_id" class="large remove icon" onclick="ShowRemoveArticleModal(this)" ></i>
            </td>
            <td> 
                <i data-id="article_id" class="large edit icon" onclick="GoToEditMode('add_article', 'dashboard_main', 'add_art_title', 'Edit Article', this.id);" ></i>
            </td>
            <td data-id='article_id' data-content='status' ></td>
        </tr>
    </script>

    <script type="text/html" id="advert_tbl_row">
        <tr>
            <td class="ui form disabled " >
                <input type="text" class="lbl_txt" data-value ='ad_ref'  style="display:inline-block;">
            </td>

            <td class="ui form" >
                <input type="text" class="lbl_txt" data-value ='ad_priority' style="display:inline-block">
            </td>
            <td>
                <a  data-content='ad_url'></a>
            </td>
            <td> 
                <i data-id="ad_ref" class="large edit icon" onclick="GoToEditMode('add_advertisement', 'dashboard_main', 'add_ad_title', 'Edit Advertisment', this.id)" ></i>
            </td>
            <td> 
                <i data-id="ad_ref" class="large remove icon" onclick="ShowRemoveAdvertisementModal(this)" ></i>
            </td>
        </tr>
    </script>
    <script type="text/html" id="cats_tbl_row">
        <tr>

            <td class="ui form" style="display: none" >
                <input type="text" data-value ='category_id' class="ui input lbl_txt" >
            </td>
            <td class="ui form"  >
                <input type="text"  data-value ='order_id' class="ui input order_ lbl_txt" >
            </td>
            <td class="ui form" >
                <input type="text" data-value ='category_name' class="ui input category_title lbl_txt" >
            </td>

<!--            <td class="ui form disabled" >
                <input type="text"  data-value ='artilcle_count lbl_txt' >
            </td>-->
            <td class="ui form" >
                <input type="text"  data-value ='colour' class="ui input colour_ lbl_txt" >
            </td>
            <td>
                <i data-id="category_id" class="large remove icon" onclick="ShowRemoveCategoryModal(this)" ></i>
            </td>
        </tr>
    </script>

    <script type="text/html" id="subs_tbl_row">
        <tr>
            <td>
                <i class="large mail icon" ></i>
            </td>
            <td class="ui form"  data-content ='email' >

            </td>

        </tr>
    </script>

    <script type="text/html" id="moreArticleInfo">
        <div id="idtitle" class="header" data-content="title"></div>

        <div class="content">

            <img style="height: 7%; width: 100%;" data-src="articleImage" />
            <hr>
            <p data-content="content"></p>
            <hr>


            <div class="ui borderless menu">
                <div class="item left align">
                    <div class="ui huge star rating" onclick="changeStarRating(this)" data-max-rating="5"></div>
                </div>
                <div class="item right align">
                    <div onclick="copyUrl(this.id)" data-id="copy_url" class="ui item primary button">Copy URL</div>
                    <div onclick="window.open(this.id)" data-id="original_url" class="ui item primary button">Original Link</div>

                    <a target="_blank" title="Share this page" data-href="hrefURL"><div class="ui item primary button">Share</div></a>

                </div>
            </div>
            <img onclick="window.open(this.id)" data-id="ad_url" height="50" width="100%" data-src="adImage" />
        </div>
    </script>

    <body>
        <div class="ui modal show_article" id="moreArticleInfoControl">

        </div>
        <input type="hidden" id="block_username" name="logged_username" value="<?php echo $logged_username; ?>">

        <div class="ui basic remove_cat small modal">
            <i class="close icon"></i>
            <div class="header" id="remove_cat_heading">
                Remove this Category?
            </div>
            <div class="image content">
                <div class="image">
                    <i class="remove user icon"></i>
                </div>
                <div class="description" id="remove_cat_desc">
                    <p>Are you sure you want to remove this category?</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">
                    <div class="ui red basic inverted negative button">
                        <i class="remove icon"></i>
                        No
                    </div>
                    <div class="ui green basic inverted positive button">
                        <i class="checkmark icon"></i>
                        Yes
                    </div>
                </div>
            </div>
        </div>

        <div class="ui basic remove_ad small modal">
            <i class="close icon"></i>
            <div class="header" id="remove_ad_heading">
                Remove this advertiesement?
            </div>
            <div class="image content">
                <div class="image">
                    <i class="remove user icon"></i>
                </div>
                <div class="description" id="remove_ad_desc">
                    <p>Are you sure you want to remove this ad?</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">
                    <div class="ui red basic inverted negative button">
                        <i class="remove icon"></i>
                        No
                    </div>
                    <div class="ui green basic inverted positive button">
                        <i class="checkmark icon"></i>
                        Yes
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="ui article_search_dlg small modal">
            <i class="close icon"></i>
            <div class="header" id="block_user_heading">
                Search Articles
            </div>
            <div class="content">
                <div class="ui form">
                    <div class="field">
                        <label>Username</label>
                        <input type="text" id="search_username" placeholder="Username">
                    </div>
                    <div class="two fields">
                        <div class=" field">
                            <label>Published After</label>
                            <input type="text" id="search_pub_after" placeholder="YYYY-MM-DD">
                        </div>
                        <div class="field">
                            <label>Published Before</label>
                            <input type="text" id="search_pub_before" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="field">
                        <label>Status</label>
                        <input type="text" id="search_status" placeholder="Status">
                    </div>
                    <div class="field">
                        <label>Category</label>
                        <input type="text" id="search_category" placeholder="Category">
                    </div>
                </div>
            </div>
            <div class="actions">

                <div class="ui grey basic button">
                    <i class="remove icon"></i>
                    Cancel
                </div>
                <div class="ui blue button" id="btn_perform_search">
                    <i class="search icon"></i>
                    Search
                </div>

            </div>
        </div>-->

        <div class="ui basic block_user small modal">
            <i class="close icon"></i>
            <div class="header" id="block_user_heading">
                Block the user Dev
            </div>
            <div class="image content">
                <div class="image">
                    <i class="remove user icon"></i>
                </div>
                <div class="description" id="block_user_desc">
                    <p>Are you sure you want to block / unblock user Dev?</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">
                    <div class="ui red basic inverted negative button">
                        <i class="remove icon"></i>
                        No
                    </div>
                    <div class="ui green basic inverted positive button">
                        <i class="checkmark icon"></i>
                        Yes
                    </div>
                </div>
            </div>
        </div>

        <div class="ui basic remove_article small modal">
            <i class="close icon"></i>
            <div class="header" id="block_user_heading">
                Remove the article
            </div>
            <div class="image content">
                <div class="image">
                    <i class="remove user icon"></i>
                </div>
                <div class="description" id="block_user_desc">
                    <p>Are you sure you want to remove this article? The users will not be able to see this article.</p>
                </div>
            </div>
            <div class="actions">
                <div class="two fluid ui inverted buttons">
                    <div class="ui red basic inverted negative button">
                        <i class="remove icon"></i>
                        No
                    </div>
                    <div class="ui green basic inverted positive button">
                        <i class="checkmark icon"></i>
                        Yes
                    </div>
                </div>
            </div>
        </div>
        <!--
                <div class="ui grid">
                    <div class="computer tablet row" >
                        <div class="ui fixed menu navbar page grid">
        
                            <div class="left menu" id="menuControl" style="margin-left: 5%;">
                                <div class="left item">
                                    <img onclick="mainView()" src="bgimages/logo.jpg" style="width: 5em;">
                                </div>
        
                            </div>
        
                            <div class="item" style="margin-right: 5%;" >
        
                                <div onclick="logoutUser()" id="logout_user" class="ui grey button" style="width: 100%" >
                                    Logout
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->

        <div class="ui grid" >
            <div class="computer tablet row" >
                <!--<div class="ui fixed borderless menu navbar page grid" style="height: 7.5%;">-->
                <div class="ui fixed borderless menu" style="height: 7.5%;">

                    <div class="left menu" id="menuControl" style="margin-left: 5%;">
                        <div class="left item">
                            <img onclick="mainView()" src="bgimages/logo.jpg" style = "width: 5em; cursor: pointer; cursor: hand;">
                        </div>

                    </div>

                    <div class="item" style="margin-right: 5%;" >

                        <div onclick="logoutUser()" id="logout_user" class="ui grey button" style="width: 100%" >
                            Logout
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div id="wrapper">

            <div class="ui grid" id="grid_container">
                <div class="three wide column" id="dashboard_menu" >
                    <div class="ui compact vertical labeled icon menu">
                        <a class="red item" onclick="SwitchPanel($(this).event, 'home_panel', 'dashboard_main', '', '');">
                            <i class="dashboard icon"></i>
                            Home
                        </a>
                        <a class="orange item admin_only" onclick="SwitchPanel($(this).event, 'users_main', 'dashboard_main', 'main_user_title', 'Users');
                                LoadUsers();">
                            <i class="users icon"></i>
                            Users
                        </a>
                        <a class="item" onclick="SwitchPanel($(this).event, 'article_main', 'dashboard_main', 'main_article_title', 'Articles');
                                LoadArticles();" >
                            <i class="newspaper icon" ></i>
                            Articles
                        </a>
                        <a class="item admin_only" onclick="SwitchPanel($(this).event, 'category_main', 'dashboard_main', 'main_cat_title', 'Categories');
                                LoadCategories()">
                            <i class="tags icon"></i>
                            Categories
                        </a>
                        <a class="item admin_only" onclick="SwitchPanel($(this).event, 'advertisements_main', 'dashboard_main', 'main_ad_title', 'Advertiesments');
                                LoadAdvertisements();">
                            <i class="dollar icon"></i>
                            Advertisements
                        </a>
                        <a class="item" onclick="SwitchPanel($(this).event, 'user_profile', 'dashboard_main', 'main_profile_title', 'User Profile');
                                LoadUserProfile()">
                            <i class="user icon"></i>
                            User Profile
                        </a>
                        <a class="item admin_only" onclick="SwitchPanel($(this).event, 'view_subscribers', 'dashboard_main', 'main_subs_title', 'Subscribers');
                                LoadSubscribers()">
                            <i class="rss icon"></i>
                            Subscribers
                        </a>
                    </div>
                </div>
                <div class="thirteen wide column " >
                    <div class="ui segment"style="background-color: whitesmoke" id="dashboard_main">
                        <div id="home_panel">
                            <h2 class="ui header">

                                <img src="http://semantic-ui.com/images/avatar2/large/patrick.png">
                                <div class="content">
                                    Hello <?php echo $logged_username; ?>
                                    <div class="sub header">What would you like to do?</div>
                                </div>
                            </h2>
                            <div class="ui five stackable cards"id="main_menu_grid">
                                <div class="card ">
                                    <button class="ui button red add_new_" id="menu_add_article" onclick="SwitchPanel($(this).event, 'add_article', 'dashboard_main', 'add_article_title', 'Add Article');">
                                        Add<br>Article
                                    </button>
                                </div>
                                <div class="card admin_only">
                                    <button class="ui button orange admin_only add_new_" id="menu_add_user" onclick="SwitchPanel($(this).event, 'add_user', 'dashboard_main', 'add_user_title', 'Add User');">
                                        Add<br>User
                                    </button>
                                </div>
                                <div class="card">
                                    <button class="ui button yellow admin_only add_new_" id="menu_add_category" onclick="SwitchPanel($(this).event, 'category_main', 'dashboard_main');
                                            LoadCategories();
                                            AddCategory();">
                                        Add<br>Category
                                    </button>
                                </div>
                                <div class="card admin_only">
                                    <button class="ui button olive admin_only add_new_" id="menu_approve_article" onclick="SwitchPanel($(this).event, 'approve_article', 'dashboard_main');
                                            LoadArticlesToApprove();">
                                        <div class="floating ui red label" id="new_article_count"></div>
                                        Approve<br>Article
                                    </button>
                                </div>
                                <div class="card admin_only">
                                    <button class="ui button green admin_only add_new_" id="menu_add_advert" onclick="SwitchPanel($(this).event, 'add_advertisement', 'dashboard_main');
                                            GetNextPriority();
                                            ">
                                        Add<br>Advertiesment 
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="ui menu_body" id="add_article">
                            <div>
                                <div class="content">
                                    <h2 class="ui header ">
                                        <i class="large icons">
                                            <i class="grey newspaper icon"></i>
                                            <i class="blue corner add icon"></i>
                                        </i>
                                        <span id="add_art_title">Add Article</span>
                                    </h2>

                                    <div class="ui four steps small" >
                                        <div class="step active button" id="thumbnail_step" >
                                            <i class="truck icon"></i>
                                            <div class="content">
                                                <div class="title">Preview</div>
                                                <div class="description">Thumbnail View</div>
                                            </div>
                                        </div>
                                        <div class="step" id="content_step">
                                            <i class="payment icon"></i>
                                            <div class="content">
                                                <div class="title">Text</div>
                                                <div class="description">Add Text</div>
                                            </div>
                                        </div>
                                        <div class="step" id="media_step">
                                            <i class="payment icon"></i>
                                            <div class="content">
                                                <div class="title">Media</div>
                                                <div class="description">Upload Media</div>
                                            </div>
                                        </div>
                                        <div class="step"id="submit_step" >
                                            <i class="info icon"></i>
                                            <div class="content">
                                                <div class="title">Post Article</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui form">
                                        <div id="thumbnail_step_tab" class="step_tab">
                                            <div class="ui centered special cards">
                                                <div class="card">
                                                    <div class="blurring dimmable image">
                                                        <div class="ui inverted dimmer">
                                                            <div class="content">
                                                                <div class="center">
                                                                    <form id="thumb_upload_form" action="article/uploadArticleImages" method="POST" enctype="multipart/form-data" >
                                                                        <div class="ui button" id="btn_upload_img">Change Thumbnail</div>
                                                                        <input type="hidden" id="imgArticleId" name="imgArticleId">
                                                                        <input type="file"  id="thumbImage" name="thumbImage" value="Browse" style="display: none">
                                                                        <input type="file"  id="mainImage" name="mainImage" value="Browse" style="display: none">
                                                                        <input type="file"  id="mainImage1" name="mainImage1" value="Browse" style="display: none">
                                                                        <input type="file"  id="mainImage2" name="mainImage2" value="Browse" style="display: none">
                                                                        <input type="file"  id="mainImage3" name="mainImage3" value="Browse" style="display: none">
                                                                        <input type="file"  id="mainImage4" name="mainImage4" value="Browse" style="display: none">
                                                                        <!--<input type="file"  id="video" name="video" value="Browse" style="display: none">-->
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img class="ui mini image" id="thumbnail_upload" src="bgimages/img_placeholder.png">
                                                    </div>

                                                </div>
                                            </div>
                                            <label id="thumbnail_image_url"></label>
                                            <a class="ui pointing red basic label" id="thumbnail_image_warning" style="visibility: hidden"></a>

                                            <div class="inline field">
                                                <textarea  style="font-weight: bold; width: 80%" placeholder="Title *" id="article_title" onkeyup="auto_grow(this)"></textarea>
                                                <div class="ui left pointing yellow basic label" style="width: 15%">
                                                    <span> A short meaningful title.</span> 
                                                </div>
                                            </div>
                                            <!--<a class="header">Russian Hackers of Dow Jones Said to Have Sought Trading Tips</a>-->
                                            <div class="right aligned" id="charNumArtPreCon">Max Word Count :- 200</div>
                                            <div class="inline field">
                                                <textarea style="width: 80%"  placeholder="News Text Here.. *" id="article_preview_content" onkeyup="countCharArtPreCon(this)"></textarea>
                                                <div class="ui left pointing yellow basic label" style="width: 15%">
                                                    <span > A short description to be shown as a preview. Please limit the number of characters to 200.</span> 
                                                </div>
                                            </div>

                                            <button class="ui green button fluid" id="btn_next_thumbnail">
                                                Proceed
                                            </button>

                                        </div>
                                        <div id="content_step_tab" class="step_tab">
                                            <div class="inline field">
                                                <input style="font-weight: bold; width: 80%" type="text" placeholder="Title" id="article_title_2">
                                                <div class="ui left pointing yellow basic label" style="width: 15%">
                                                    <span > A short meaningful title.</span> 
                                                </div>
                                            </div>
                                            <!--<div class="ui button" id="btn_upload_main_img">Change Main Image</div>-->
                                            <!--                                            <div class="ui centered special cards">
                                                                                            <div class="card" style="width: 70%;">
                                                                                                <div class="blurring dimmable image">
                                                                                                    <div class="ui inverted dimmer">
                                                                                                        <div class="content">
                                                                                                            <div class="center">
                                                                                                                
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <img class="ui massive fluid image" src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTuftQ_6I6sgW2vKbbrQekUytEFsFfzTxm7ziMUpgLrmrc8QEIQ">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>-->
                                            <label id="image_url"></label>
                                            <div class="inline field" style="width: 80%">
                                                <select class="ui dropdown" id="category_selector">
                                                    <option value="">Category</option>
                                                </select>
                                                <div class="ui left pointing yellow basic label" >
                                                    <span > A suitable category for the domain of your article.</span> 
                                                </div>
                                            </div>
                                            <div class="inline field" ">
                                                <input type="text" placeholder="Original URL" id="original_url" style="width: 80%">
                                                <div class="ui left pointing yellow basic label" style="width: 15%" >
                                                    <span > Original URL to the information</span> 
                                                </div>
                                            </div>

                                            <div class="right aligned" id="charNumArtCon">Max Word Count :- 5000</div>
                                            <div class="inline field" ">
                                                <textarea placeholder="News Text Here.." id="article_content" onkeyup="countCharArtCon(this)" style="width: 80%"></textarea>
                                                <div class="ui left pointing yellow basic label" style="width: 15%" >
                                                    <span > A long description to the article. Please use no more than 5000 characters.</span> 
                                                </div> 
                                            </div>

                                            <button class="ui green button" id="btn_next_content" style="width: 100%;">
                                                Proceed
                                            </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="media_step_tab" class="step_tab">
                                        <div class="ui yellow icon message">
                                            <i class="large icons">
                                                <i class="file image outline icon"></i>
                                                <i class="corner add icon"></i>
                                            </i>
                                            <div class="content">
                                                <div>
                                                    Please note all the images must be less than 50 KB in size.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui special three stackable cards">
                                            <div class="card">
                                                <div class="blurring dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <div class="ui inverted button media_upload" id="btn_upload_main_img"><i class="icon upload"></i>Change Image 1</div></br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="main_upload" src="bgimages/img_placeholder.png">
                                                </div>
                                                <div class="extra content" >
                                                    <a id="mainImg_warning"  class="ui hidden pointing red basic label"></a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="blurring dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <div class="ui inverted button media_upload" id="btn_upload_main_img1"><i class="icon upload"></i>Change Image 2</div></br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="main1_upload" src="bgimages/img_placeholder.png">
                                                </div>
                                                <div class="extra content" >
                                                    <a id="mainImg1_warning"  class="ui hidden pointing red basic label"></a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="blurring dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <div class="ui inverted button media_upload" id="btn_upload_main_img2"><i class="icon upload"></i>Change Image 3</div></br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="main2_upload" src="bgimages/img_placeholder.png">
                                                </div>
                                                <div class="extra content" >
                                                    <a id="mainImg2_warning"  class="ui hidden pointing red basic label"></a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="blurring dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <div class="ui inverted button media_upload" id="btn_upload_main_img3"><i class="icon upload"></i>Change Image 4</div></br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="main3_upload" src="bgimages/img_placeholder.png">
                                                </div>
                                                <div class="extra content" >
                                                    <a id="mainImg3_warning"  class="ui hidden pointing red basic label"></a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="blurring dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <div class="ui inverted button media_upload" id="btn_upload_main_img4"><i class="icon upload"></i>Change Image 5</div></br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="main4_upload" src="bgimages/img_placeholder.png">
                                                </div>
                                                <div class="extra content" >
                                                    <a id="mainImg4_warning"  class="ui hidden pointing red basic label"></a>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="blurring dimmable image">
                                                    <div class="ui dimmer">
                                                        <div class="content">
                                                            <div class="center">
                                                                <div class="ui inverted button" id="btn_upload_video" onclick="OpenYT();"><i class="icon upload"></i>Change Video</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="vid_upload" src="bgimages/img_placeholder.png">
                                                </div>
                                                <div class="extra content" >
                                                    <a id="video_warning"  class="ui hidden pointing red basic label"></a>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="ui green button" id="btn_next_media" style="width: 100%;">
                                            Proceed
                                        </button>
                                    </div>

                                    <div id="submit_step_tab" class="step_tab">
                                        <div onclick="showPreview()" data-id="article_id" class="pin">
                                            <img id= "preview_thumb" src="http://semantic-ui.com/images/avatar2/large/patrick.png" />
                                            <h3 data-content="title" id="preview_title"></h3>
                                            <p data-content="display_content" id="preview_content"> </p>
                                            <p data-content="display_date" id="article_preview_date"></p>
                                        </div>
                                        <button class="ui green button" id="btn_add_article" >
                                            Publish
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="ui menu_body" id="add_user">
                            <h2 class="ui header ">
                                <i class="large icons">
                                    <i class="grey user icon"></i>
                                    <i class="blue corner add icon"></i>
                                </i>
                                <span id="add_user_title">Add User</span>
                            </h2>
                            <div class="content ui stackable grid">
                                <div class="twelve wide column">
                                    <div class="ui form center">
                                        <div class="fifteen wide field ">
                                            <label>Full Name</label>
                                            <input type="text" placeholder="Full Name" id="name">
                                        </div>
                                        <div class="fifteen wide field">
                                            <label>Username</label>
                                            <div class="ui icon input ">
                                                <input type="text" placeholder="Username" id="username">

                                            </div>
                                        </div>
                                        <div class="fifteen wide field">
                                            <label>Email Address</label>
                                            <input type="email" placeholder="Email Address" id="email">
                                        </div>
                                        <div class="fifteen wide field">
                                            <label>Generated Password</label>
                                            <div class="ui right labeled left icon input">
                                                <i class="tags icon"></i>
                                                <input type="password" placeholder="Generated Password" id="pswd">
                                                <div class="ui button tag label" id="generate_btn">
                                                    Generate
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ui toggle checkbox">
                                            <input type="checkbox" name="send_mail" checked="true" id="send_mail_chk">
                                            <label>Email the password to the newly created user</label>
                                        </div>

                                        <button class="ui green button disabled" id="btn_add_user">
                                            Add User
                                        </button>
                                    </div>
                                </div>
                                <div class="four wide column">
                                    <img id="user_pro_pic" class="ui centered small circular image" src="" style="visibility: hidden">
                                </div>
                            </div>

                        </div>

                        <div class="ui menu_body" id="add_advertisement">
                            <h2 class="ui header ">
                                <i class="large icons">
                                    <i class="grey newspaper icon"></i>
                                    <i class="blue corner add icon"></i>
                                </i>
                                <span id="add_ad_title">Add Advertisement</span>
                            </h2>
                            <div class="ui stackable grid">
                                <div class="nine wide column " >
                                    <div class="ui form">
                                        <div class="two fields">
                                            <div class=" field">
                                                <label>Reference Name</label>
                                                <input type="text" id="ad_name" placeholder="Ad Reference Name">
                                            </div>
                                            <div class="field">
                                                <label>Priority</label>
                                                <input type="text" placeholder="Priority" id="ad_priority">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label>Main Ad Image</label>
                                            <form id="ad_upload_form" action="article/uploadAdImages" method="POST" enctype="multipart/form-data" >
                                                <!--<div class="ui button" id="btn_upload_main_ad_img">Change Main Ad Image</div>-->
                                                <input type="hidden" id="imgArticleIdAd" name="imgArticleIdAd">
                                               
                                                <input type="file"  id="ad_main_img" name="ad_main_img" value="Browse" style="display: none">
                                                <input type="file"  id="ad_second_img" name="ad_second_img" value="Browse" style="display: none">
                                                <div class="ui centered special cards">
                                                    <div class="card">
                                                        <div class="blurring dimmable image">
                                                            <div class="ui dimmer">
                                                                <div class="content">
                                                                    <div class="center">
                                                                        <div class="ui inverted button media_upload" id="btn_upload_main_ad"><i class="icon upload"></i>Main Ad Image</div></br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img id="main_ad_upload" src="bgimages/img_placeholder.png">
                                                        </div>
                                                        <div class="extra content" >
                                                            <a id="main_ad_warning"  class="ui hidden pointing red basic label"></a>
                                                        </div>
                                                    </div>

                                                    <div class="card">
                                                        <div class="blurring dimmable image">
                                                            <div class="ui dimmer">
                                                                <div class="content">
                                                                    <div class="center">
                                                                        <div class="ui inverted button media_upload" id="btn_upload_sec_ad"><i class="icon upload"></i>Secondary Ad Image</div></br>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img id="sec_ad_upload" src="bgimages/img_placeholder.png">
                                                        </div>
                                                        <div class="extra content" >
                                                            <a id="sec_ad_warning"  class="ui hidden pointing red basic label"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
<!--                                        <div class="field">
                                            <label>Thumbnail Ad Image</label>
                                            <div class="ui button" id="btn_upload_small_ad_img">Change Thumbnail Ad Image</div>
                                        </div>-->
                                        <div class="field">
                                            <label>Destination URL</label>
                                            <input type="text" id="ad_url" placeholder="Ad Destination URL">
                                        </div>
                                        <br>
                                        <button class="ui button submit_" id="btn_add_ad"  >Submit Advertisement</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="ui menu_body" id="users_main">
                            <h2 class="ui header ">
                                <i class="large icons">
                                    <i class="grey newspaper icon"></i>
                                    <i class="blue corner add icon"></i>
                                </i>
                                <span id="main_user_title">Users</span>
                            </h2>
                            <table class="ui  selectable celled table" id="tbl_all_users">
                                <thead class="full-width">
                                    <tr>
                                        <th>User</th>
                                        <th>Edit</th>
                                        <th>Change<br>Password</th>
                                        <th>Block/<br>Unblock</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_all_users_body">

                                </tbody>
                            </table>
                        </div>

                        <div class="ui menu_body" id="advertisements_main">
                            <table class="ui selectable celled table" id="tbl_all_ads">
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Priority</th>
                                        <th>URL</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_all_ads_body">

                                </tbody>
                                <tfoot class="full-width">
                                    <tr>
                                        <th colspan="4">
                                <div class="ui right floated small green labeled icon button" id="save_ads">
                                    <i class="save icon"></i> Save
                                </div>
                                </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="ui menu_body" id="category_main">
                            <h2 class="ui header ">
                                <i class="large icons">
                                    <i class="grey tag icon"></i>
                                    <i class="blue corner add icon"></i>
                                </i>
                                <span id="cat_page_title"></span>
                            </h2>
                            <table class="ui selectable celled table" id="tbl_all_cats">
                                <thead>
                                    <tr>
                                        <th style="display: none">Id</th>
                                        <th>Order</th>
                                        <th>Category</th>
                                        <!--<th>Article Count</th>-->
                                        <th>Colour</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_all_cats_body">

                                </tbody>
                                <tfoot class="full-width">
                                    <tr>
                                        <th colspan="4">
                                <div class="ui right floated small green labeled icon button" id="save_cat">
                                    <i class="save icon"></i> Save
                                </div>
                                </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="ui menu_body" id="article_main">
                            <h2 class="ui header ">
                                <i class="large icons">
                                    <i class="grey newspaper icon"></i>
                                    <i class="blue corner add icon"></i>
                                </i>
                                <span id="main_article_title">Articles</span>
                            </h2>
                            <button class="ui button" id="btn_show_article_search">
                                <i class="search icon"></i>
                                Search
                            </button>


                            <div class="search_panel">
                                <div class="ui form">
                                    <div class="three fields">
                                        <div class="field">
                                            <label>Username</label>
                                            <input type="text" class="search_field" id="search_username" placeholder="Username">
                                        </div>

                                        <div class=" field">
                                            <label>Published After</label>
                                            <input type="text" class="search_field" id="search_pub_after" placeholder="YYYY-MM-DD">
                                        </div>
                                        <div class="field">
                                            <label>Published Before</label>
                                            <input type="text" class="search_field" id="search_pub_before" placeholder="YYYY-MM-DD">
                                        </div>
                                    </div>
                                    <div class="two fields">
                                        <div class="field">
                                            <label>Status</label>
                                            <select id="search_status" name="status" multiple="" class="ui fluid dropdown search_field">
                                                <option value="Approve">Approved</option>
                                                <option value="Blocked">Blocked</option>
                                                <option value="Pending">Pending</option>
                                            </select>
                                            <!--<input type="checkbox" class="search_field" id="approved_art" ><label for="approved_art">Approved</label>-->
                                        </div>
                                        <div class="field">
                                            <label>Category</label>
                                            <!--<input type="text" class="search_field" id="search_category" placeholder="Category">-->
                                            <select id="search_category" name="cats" multiple="" class="ui fluid dropdown search_field">
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="actions">

                                <div class="ui grey basic button">
                                    <i class="remove icon"></i>
                                    Cancel
                                </div>
                                <div class="ui blue button" id="btn_perform_search">
                                    <i class="search icon"></i>
                                    Search
                                </div>

                            </div>

                            <table class="ui selectable celled table" id="tbl_all_articles">
                                <thead>
                                    <tr>
                                        <th class="six wide">Title</th>
                                        <th class="two wide">Creator</th>
                                        <th class="two wide">Category</th>
                                        <th class="two wide">Date</th>
                                        <th class="one wide">Remove</th>
                                        <th class="one wide">Edit</th>
                                        <th class="three wide">Status</th>

                                    </tr>
                                </thead>
                                <!--<tbody id="tbl_all_a_body">-->
                                <tbody id="tbl_all_articles_body">

                                </tbody>
                            </table>
                        </div>

                        <div class="ui menu_body" id="approve_article">
                            <table class="ui selectable celled table" id="tbl_approve_articles">
                                <thead>
                                    <tr>
                                        <th style="display: none">Id</th>
                                        <th class="six wide">Title</th>
                                        <th class="two wide">Creator</th>
                                        <th class="three wide">Status</th>
                                        <th class="five wide">Comment</th>

                                    </tr>
                                </thead>
                                <!--<tbody id="tbl_all_cats_body">-->
                                <tbody id="tbl_approve_articles_body">

                                </tbody>
                                <tfoot class="full-width">
                                    <tr>
                                        <th colspan="4">
                                <div class="ui right floated small green labeled icon button" id="save_articles_approved">
                                    <i class="save icon"></i> Save
                                </div>
                                </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="ui menu_body" id="user_profile">

                            <div class="content ui stackable grid">
                                <div class="eight wide column">
                                    <h1 class="ui  teal header ">
                                        <div class="content">
                                            <span  id="user_profile_title"><?php echo $logged_username; ?></span>
                                            <div class="sub header">
                                                <span  id="user_profile_type">Super User</span>
                                            </div>
                                        </div>

                                    </h1>
                                    <div class="ui form center" >
                                        <div class="field ">
                                            <label>Full Name</label>
                                            <input type="text" placeholder="Full Name" id="profile_name">
                                        </div>

                                        <div class="field">
                                            <label>Email Address</label>
                                            <input type="email" placeholder="Email Address" id="profile_email">
                                        </div>
                                        <button class="ui teal basic button" id="toggle_change_pswd">Change Password</button>
                                        <div id="change_pswd_toggle" style="display: none;">
                                            <div class="field">
                                                <label>Old Password</label>
                                                <input type="password" placeholder="Old Password" id="old_pswd">
                                            </div>
                                            <div class="field">
                                                <label>New Password</label>
                                                <input type="password" placeholder="New Password" id="new_pswd">
                                            </div>
                                            <div class=" field">
                                                <label>Re-enter Password</label>
                                                <input type="password" placeholder="Email Address" id="confirm_pswd">
                                            </div>
                                        </div>
                                        <button class="ui green button" id="btn_update_user">
                                            Save Changes
                                        </button>

                                    </div>

                                </div>
                                <div class="eight wide column">

            <!--<img id="user_pro_pic" class="ui fluid image" src="http://www.daneshjooyar.com/mag/wp-content/uploads/2015/01/729ebe0c689023040b7eb03fe48e7792.png">-->

                                    <img id="user_pro_pic" class="ui centered small circular image" src="">
                                </div>
                            </div>
                        </div>

                        <div class="ui menu_body" id="view_subscribers">
                            <table class="ui selectable celled table" id="tbl_view_subscribers">
                                <thead>
                                    <tr>
                                        <th class="one wide"></th>
                                        <th >Subscriptions</th>

                                    </tr>
                                </thead>
                                <!--<tbody id="tbl_all_cats_body">-->
                                <tbody id="tbl_view_subscribers_body">
                                <button class="ui green button" id="btn_export_subscribers">
                                    Export
                                </button>
                                <code>Click <a href="<?php echo base_url(); ?>index.php/article/downloadSubscribers/"><b><i>HERE</i></b></a> to download Subscribed Email Addresses </code>
                                </tbody>
                                <!--<tfoot class="full-width">
                                    <tr>
                                        <th colspan="4">
                                <div class="ui right floated small green labeled icon button" id="save_articles_approved">
                                    <i class="save icon"></i> Save
                                </div>
                                </th>
                                </tr>
                                </tfoot>-->
                            </table>
                        </div>
                    </div>
                </div>

            </div>

    </body>
</html>