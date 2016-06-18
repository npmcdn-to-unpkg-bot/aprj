<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function hospitalityandmanagement(){

        $this->load->view('welcome_message_hoandrec');
    }
    public function foodandresturant(){

        $this->load->view('welcome_message_foodandrest');
    }
    public function csr(){

        $this->load->view('welcome_message_csr');
    }
    public function other(){

        $this->load->view('welcome_message_oth');
    }

    public function abcD(){
        //echo "DoneP";
        $this->load->view('welcome_message_test');
    }

    public function abcE($cat=NULL){
        //echo "DoneP";
        $this->load->model("advertisement_m");
        $this->load->model("article_m");
        $data["alldata"]=$this->article_m->getArticleToView($cat);

        $this->load->view('welcometest2',$data);
    }

    public function article($arid){
        //echo "DoneP";
        //$this->load->model("advertisement_m");
        $this->load->model("article_m");
        $data["alldata"]=$this->article_m->getArticleById($arid);
        $data["arid"]=$arid;
        //echo "-------------";
        $this->load->view('articledata',$data);
    }

    public function youtube() {

        $this->load->library('google_client_api');
        ///echo $this->rahul->my_function();
        //exit;
        $video= "vendor/a.3gp";
        $title= "final test add youtube video v3";
        $desc= "this is a final test youtube video desc";
        $tags=["rahultvn","youtubeapi3"];
        $privacy_status="public";
        $youtube=$this->google_client_api->youtube_upload($video,$title,$desc,$tags,$privacy_status);
        print_r($youtube);
        //echo "hi";

/*
        require_once 'vendor/autoload.php';
// Call set_include_path() as needed to point to your client library.
require_once 'vendor/google/apiclient/src/Google/Client.php';
require_once 'vendor/google/apiclient-services/Google/Service/YouTube.php';
session_start();


/*
 * You can acquire an OAuth 2.0 client ID and client secret from the
 * Google Developers Console <https://console.developers.google.com/>
 * For more information about using OAuth 2.0 to access Google APIs, please see:
 * <https://developers.google.com/youtube/v3/guides/authentication>
 * Please ensure that you have enabled the YouTube Data API for your project.
 */
        /*
$OAUTH2_CLIENT_ID = '769945113709-77elo5v9ilfjinntek7tskt352a8ufpa.apps.googleusercontent.com';
$OAUTH2_CLIENT_SECRET = 'vslShreJxV_UClx5Gzkbfyul';

$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);
$client->setScopes('https://www.googleapis.com/auth/youtube');
$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],
    FILTER_SANITIZE_URL);
$client->setRedirectUri($redirect);

// Define an object that will be used to make all API requests.
$youtube = new Google_Service_YouTube($client);

if (isset($_GET['code'])) {
    if (strval($_SESSION['state']) !== strval($_GET['state'])) {
        die('The session state did not match.');
    }

    $client->authenticate($_GET['code']);
    $_SESSION['token'] = $client->getAccessToken();
    header('Location: ' . $redirect);
}

if (isset($_SESSION['token'])) {
    $client->setAccessToken($_SESSION['token']);
}

// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
    try{
        // REPLACE this value with the path to the file you are uploading.
        $videoPath = "/path/to/file.mp4";

        // Create a snippet with title, description, tags and category ID
        // Create an asset resource and set its snippet metadata and type.
        // This example sets the video's title, description, keyword tags, and
        // video category.
        $snippet = new Google_Service_YouTube_VideoSnippet();
        $snippet->setTitle("Test title");
        $snippet->setDescription("Test description");
        $snippet->setTags(array("tag1", "tag2"));

        // Numeric video category. See
        // https://developers.google.com/youtube/v3/docs/videoCategories/list
        $snippet->setCategoryId("22");

        // Set the video's status to "public". Valid statuses are "public",
        // "private" and "unlisted".
        $status = new Google_Service_YouTube_VideoStatus();
        $status->privacyStatus = "public";

        // Associate the snippet and status objects with a new video resource.
        $video = new Google_Service_YouTube_Video();
        $video->setSnippet($snippet);
        $video->setStatus($status);

        // Specify the size of each chunk of data, in bytes. Set a higher value for
        // reliable connection as fewer chunks lead to faster uploads. Set a lower
        // value for better recovery on less reliable connections.
        $chunkSizeBytes = 1 * 1024 * 1024;

        // Setting the defer flag to true tells the client to return a request which can be called
        // with ->execute(); instead of making the API call immediately.
        $client->setDefer(true);

        // Create a request for the API's videos.insert method to create and upload the video.
        $insertRequest = $youtube->videos->insert("status,snippet", $video);

        // Create a MediaFileUpload object for resumable uploads.
        $media = new Google_Http_MediaFileUpload(
            $client,
            $insertRequest,
            'video/*',
            null,
            true,
            $chunkSizeBytes
        );
        $media->setFileSize(filesize($videoPath));


        // Read the media file and upload it chunk by chunk.
        $status = false;
        $handle = fopen($videoPath, "rb");
        while (!$status && !feof($handle)) {
            $chunk = fread($handle, $chunkSizeBytes);
            $status = $media->nextChunk($chunk);
        }

        fclose($handle);

        // If you want to make other calls after the file upload, set setDefer back to false
        $client->setDefer(false);


        $htmlBody .= "<h3>Video Uploaded</h3><ul>";
        $htmlBody .= sprintf('<li>%s (%s)</li>',
            $status['snippet']['title'],
            $status['id']);

        $htmlBody .= '</ul>';

    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }

    $_SESSION['token'] = $client->getAccessToken();
} else {
    // If the user hasn't authorized the app, initiate the OAuth flow
    $state = mt_rand();
    $client->setState($state);
    $_SESSION['state'] = $state;

    $authUrl = $client->createAuthUrl();
    $htmlBody = <<<END
  <h3>Authorization Required</h3>
  <p>You need to <a href="$authUrl">authorize access</a> before proceeding.<p>
END;
}

echo "
<!doctype html>
<html>
<head>
    <title>Video Uploaded</title>
</head>
<body>
<?=$htmlBody?>
</body>
</html>
";

*/
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
