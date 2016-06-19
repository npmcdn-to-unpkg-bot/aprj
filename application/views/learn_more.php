<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
	<base href=<?php echo base_url();?>>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />
	<meta http-equiv="Language" content="en" />
	<meta name="viewport" content="width=1002" />
	<meta name="MobileOptimized" content="1002" />
	<title>Loud Horn Marketing</title>
<script type="text/javascript">window.jQuery || document.write('<script src="js/jquery-1.8.3.min.js"><\/script>')</script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
        <link href="css/all_2.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#login-form").validate({
				errorClass: "hiddenErrorMsgs",
				rules:{
					email:{
						required:true,
						email:true
					},
					password:{
						required:true
					}
				}
			});
			
			
			$("#sign-form").validate({
				errorClass: "hiddenErrorMsgs",
				rules:{
					email:{
						required:true,
						email:true
					},
					password1: {
						required: true,
						minlength: 6
					},
					password2: {
						required: true,
						minlength: 6,
						equalTo: "#password1"
					},
						linkurl: {
						required:true,
						notEqual: "Website URL"
				    },
				    	sitename: {
						required:true,
						notEqual: "Website Name"
				    }
				}
			});
			
			$("#contact-form").validate({
				errorClass: "hiddenErrorMsgs",
				rules:{
				   contactName: {
						required:true,
						notEqual: "Your Name"
				   },
				   contactEmail: {
						email:true,
						notEqual: "Your Email"
				   }
				},
		
				submitHandler: function() {
					$('#contact-box').hide();
					$('#contact-area').show();
					
					
					var encodedContactName = encodeURIComponent($('#contactName').val());
					var encodedContactMsg = encodeURIComponent(document.getElementById('contactMsg').value);
					var encodedContactEmail = encodeURIComponent($('#contactEmail').val());
					
					$.post('ajax/contactrequest.php', { 
						contactName: encodedContactName, 
						contactEmail: encodedContactEmail, 
						contactMsg: encodedContactMsg
					});
				}
				
			});
		});
		
                
                function contactUs()
                {
                    contactName = $('#contactName').val();
                    contactEmail = $('#contactEmail').val();
                    contactMsg = $('#contactMsg').val();
                    
                    data_json = {
                        contact_Name: contactName,
                        contact_Email: contactEmail,
                        contact_Msg: contactMsg,
                    };
                    $.ajax({
                        url: 'auth/contactUsEmail',
                        data: data_json,
                        success: function (data) {
                            alert(data);
                        },
                        async: true,
                        type: 'POST'
                    });
                }
		
	</script>
</head>

<body>
	<div id="header">
		<div class="header-holder">
			<div class="area-holder">
				<strong class="logo" style="height: 4em; width: 20%; margin-top: -2%; margin-bottom: -2%;"><a href="http://localhost/aprj/">Loud Horn Marketing</a></strong>
				<ul id="nav">
					<li><a class="smoothscroll" href="#how-it-works">HOW IT WORKS</a></li>
					<li><a class="smoothscroll" href="#features">FEATURES</a></li>
					<li><a class="smoothscroll" href="#contact">CONTACT</a></li>
				</ul>
			</div>
			<div class="frame-holder">
				<div class="popup-area">
					<a class="login open" href ="javascript:openPage()">LOGIN</a>
					<div class="popup">
						<div class="holder">
							<div class="block">
								<form action="login" id="login-form" class="login-form" method="post">
									<fieldset>
										<input type="hidden" name="action" value="login" />
										<div class="row">
											<input type="text" name="email" id="email" value="Email"/>
										</div>
										<div class="row">
											<input type="password" name="password" id="password" value="Password" autocomplete="off"/>
										</div>
										<div class="row-3">
											<a href="forgot">FORGOTTEN PASSWORD?</a>
											<button type="submit" value="">LOGIN</button>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</div>
				</div>
				<a class="sing lightbox" href="#popup1">SIGN UP</a>
			</div>
		</div>
	</div>
	
	<div id="wrapper">
		<div class="w1">
			<div class="banner">
				<div class="text-aling">
					<h1>Got great news or content? Reach Thousands of readers’ everyday</h1>
					<span>Sit back and relax, let us tell the world, it’s our job.</span>
					<div class="area-holder">
						<span>Our service is free with no commitments of any kind. Come check us out. </span>
						<a class="sing-up lightbox" href="#popup1">SIgn UP</a>
					</div>
				</div>
			</div>
			<br>
				<div class="block-holder" style="position:relative;">
					<div style="position:absolute;top:-70px;" id="how-it-works"></div>
					<div class="holder">
						<div class="block">
							<div class="text-holder">
								<h2>We promote your articles to wider audience of Quality Readers</h2>
							</div>
							<div class="tab-holder">
								<ul class="tabset">
									<li>
										<p>Most of the time great articles, news or content have a very short life span. Well that because it’s not in the right place. We are dedicated to promoting your great content, whether it be a product launch,  event, a new restaurant, hotel or you just want to talk about your organization’s exciting new future plans. When great things happen and want to be told, it deserves the right attention and the reach.</p>
										<p>Our job is to promote your great news or content to a greater audience of eager readers who want much organized and easily accessible data, in this fast paced and busy world. Simply accessible on the mobile, tablet or PC and you get to say more, with better interaction.</p>
									</li>
									<li>
										<a href="#tab2">
											<strong>How we do it..</strong>
											<span>Our team of professionals are dedicated to one objective, we promote your articles to a wider reach of audience using technical resources such as online advertising, search engine optimization, database marketing are just a few. Don’t worry about spending heaps of money and time trying to reach readers, we will do it for you. In short we will make sure your content is well seen by quality readers.</span>
										</a>
									</li>
									<li>
										<a href="#tab2">
											<strong>Sign up is Free, become a partner today. Come check us out. (sign up button)</strong>
										</a>
									</li>
									
								</ul>
								
							</div>
						</div>
					</div>
				</div>
				
				
				<div style="position:relative;clear:both;">
					<div style="position:absolute;top:-120px;" id="features">&nbsp;</div>
				</div>
				
				<div class="area-frame">
					
					<div class="holder">
						<div class="block">
							<div class="text-holder">
								<h2>We believe in Quick and effective accessibility for everyone</h2>
								<p>Here are some features we use to make sure that our partners and readers get the best.</p>
							</div>
							<div class="tab-holder">
								<ul class="tabset2">
									<li>
										<a href="#tab1_2">
											<strong>Reader Friendly, with a quick overview</strong>
											<span>We realized how fast paced life is, we rarely have time purchase and read newspapers and we also

identified the need of many business people and professionals for a quick market update. So, we 

created a space for organized, quality articles with a quick over view and easily accessible by visitors on 

tech devices. In simple, a very reader friendly and compelling web space.</span>
										</a>
									</li>
									<li>
										<a href="#tab2_2">
											<strong>Say more the with Video</strong>
											<span>Our publishing platform also provides to upload along with your article videos, such as introductory 

videos, event clips, interviews or reviews. The best part is, its uploaded directly to you tube as well to 

get the best views for your videos.</span>
										</a>
									</li>
									<li>
										<a href="#tab3_2">
											<strong>Publish your article whenever you want</strong>
											<span>Whatever the news is, its great when its hot! so why wait for it to go out of date? Tell everyone when

you want it to be told. We give you the power to publish articles whenever you want to on our space but 

of course with a quick review from our quality team. Our team will also make sure to provide you real 

support if at any time you are having a trouble publishing or organizing your articles.</span>
										</a>
									</li>
									<li>
										<a href="#tab4_2">
											<strong>Utilize our resources.</strong>
											<span>We understand that you may have great news but sometimes may not have the right resources to tell

the world. Team Corporate Sri Lanka can help you a step further. Our professional writers, 

photographers, videographers, interviewers and editors are at your disposal. You just have to call us. 

Once the content is done we will hand it over to you to be utilized however you prefer. Furthermore we 

will also cover your PR events for free and provide you with the video or photographs to utilize as you 

wish.</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<br>
				<div class="contact-holder" id="contact" style="min-height:470px;">
					<div class="contact-box" id="contact-box">
						<h3>Contact Us</h3>
                                                        <fieldset>
                                                            <form class="sign-form" id="sign-form">
								<div class="row">
									<input type="text" name="contactName" id="contactName" placeholder="Your Name" style="background-color: #f2f2f2;" />
								</div>
								<div class="row">
									<input type="text" name="contactEmail" id="contactEmail" placeholder="Your Email" style="background-color: #f2f2f2;" />
								</div>
								<div class="row-2">
									<textarea name="contactMsg" id="contactMsg" rows="8" cols="46" placeholder="Your Message" style="background-color: #f2f2f2;"></textarea>
								</div>
                                                                <button type="submit" class="ui green button" id="btn_contact_us" onclick="contactUs()">
                                                                    SEND
                                                                </button>
                                                                <label>Hotline: +94 767 871 432</label>
                                                            </form>
                                                        </fieldset>
					</div>
					
					<div class="contact-area" id="contact-area">
						<div class="align">
							<img src="info-site/images/img-symbol.png" alt="image description" />
							<h3>Message Sent!</h3>
							<span>We’ll be in touch soon</span>
						</div> 
					</div>
					
				</div>
				<div id="footer">
					<span>
						&copy; 2016 Loud Horn Marketing All Rights Reserved.
					</span>
					<div class="area">
						<span>You make great content. We help you promote it.</span>
						<a class="sing-up lightbox" href="#popup1">SIGN UP</a>
					</div>
				</div>
			</div>
		</div>
		</div>
<div class="popup-holder">
		<div id="popup1" class="lightbox" style = "display:none!important">
			<div class="contact-box">
				<h3>Sign Up</h3>
				<form class="sign-form" id="sign-form"  action="signup" method="post">
					<input type="hidden" name="action" value="signup" />
					<fieldset>
						<div class="row">
							<input type="text" name="email" id="email" value="Your Email" />
						</div>
						<div class="row">
							<input type="password" name="password1" id="password1"  value="Password" autocomplete="off" />
						</div>
						<div class="row">
							<input type="password" name="password2" id="password2" value="Verify Password" autocomplete="off" />
						</div>
						<div class="row">
							<input type="text"  name="sitename" id="sitename" value="Website Name" />
						</div>
						<div class="row">
							<input type="text" name="linkurl" id="linkurl"  value="Website URL" />
						</div>
						<button type="submit" value="">Sign Up</button>
					</fieldset>
				</form>
			</div>
		</div>
</div>
	</div>
</body>
<script language="javascript" type="text/javascript">

$(document).ready(function(){
		$('.smoothscroll').on('click',function (e) {
	    e.preventDefault();
	    var target = this.hash,
	    $target = $(target);
	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});

var scrt_var = 1; 
openPage = function() {//ToDo set home url
location.href = "/?Key="+scrt_var;
}

</script>
</html>

