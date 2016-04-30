<!doctype html>
<html>
  <head>
      <base href="http://localhost/aprj/">
    <meta charset="utf-8">
    <title>Upload to YouTube</title>
    <link rel="stylesheet" href="upload_video.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans' type='text/css'>
	<script src="js/semantic.js" type="text/javascript"></script>
        <link href="css/semantic.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
body {
                top: 6%;
                background-image: url("bgimages/tiledBg.png");
            }
        #channel-image {
            width: 2em;
            height: 2em;
            vertical-align: middle;
          }

          #channel-name {
            margin-left: 0.2em;
            margin-right: 0.2em;
          }

          #disclaimer {
            font-size: 0.75em;
            color: #aeaeae;
            max-width: 350px;
          }

          body {
            font-family: "Open Sans", sans-serif;
            font-size: 1.2em;
          }

          .post-sign-in {
            display: none;
          }

          .during-upload {
            display: none;
          }

          .post-upload {
            display: none;
          }

          label {
            display: block;
          }

          

          textarea {
            height: 7em;
          }

    </style>
  </head>
  <body>
<img src="/bgimages/logo.png" style = "height : 20%; width :20%; margin-left:38%">
<h1 style ="margin-left:13%">Sign in with google to upload video</h1>
  <span id="signinButton" class="pre-sign-in" style ="margin-left:39%">
<!--       IMPORTANT: Replace the value of the <code>data-clientid</code>
           attribute in the following tag with your project's client ID.
        ours: data-clientid="379818889573-3h4liidvjthbg8hk9fp4m38nfcjm9fg2.apps.googleusercontent.com"
        ex : data-clientid="1034451067661-h7v9fipq91k83log7c47f49l1o257rl4.apps.googleusercontent.com"-->
      <span
        class="g-signin"
        data-callback="signinCallback"
	data-clientid="673567076213-7okbnh9b2nm023kakt7kvbou54jojieq.apps.googleusercontent.com"
        data-cookiepolicy="single_host_origin"
        data-scope="https://www.googleapis.com/auth/youtube.upload https://www.googleapis.com/auth/youtube"
        data-prompt = "select_account">
      </span>
    </span>

    <div class="post-sign-in ui form" >
      <div>
        <img id="channel-thumbnail">
        <span id="channel-name"></span>
      </div>

      <div>
        <label for="title">Title:</label>
        <input id="title" type="text" value="Default Title">
      </div>
      <div>
        <label for="description">Description:</label>
        <textarea id="description">Default description</textarea>
      </div>
      <div>
        <label for="privacy-status">Privacy Status:</label>
        <select id="privacy-status">
          <option>public</option>
          <option>unlisted</option>
          <option>private</option>
        </select>
      </div>

      <div>
        <input input type="file" id="file" class="button" accept="video/*">
        <button id="button">Upload Video</button>
      <div class="during-upload">
        <p><span id="percent-transferred"></span>% done (<span id="bytes-transferred"></span>/<span id="total-bytes"></span> MB)</p>
        <progress id="upload-progress" max="1" value="0"></progress>
      </div>

      <div class="post-upload">
        <p>Uploaded video with id <span id="video-id"></span>. Polling for status...</p>
        <ul id="post-upload-status"></ul>
        <div id="player"></div>
      </div>
      <div class="ui olive small message">
        <p>By uploading a video, you certify that you own all rights to the content or that you are authorized by the owner to make the content publicly available on YouTube, and that it otherwise complies with the YouTube Terms of Service located at <a href="http://www.youtube.com/t/terms" target="_blank">http://www.youtube.com/t/terms</a></p>
    </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://apis.google.com/js/client:plusone.js"></script>
    <script src="js/cors_upload.js"></script>
    <script src="js/upload_video.js"></script>
  </body>
</html>
