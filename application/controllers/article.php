<?php

/**
 * Author :- B.S.P.Mendis
 * File Name :- article.php
 * type :- Controller
*/

class article extends CI_Controller {

    public function _remap($method) {
        if ($method == 'searchArticlesBar') {
            $this->searchArticlesBar();
        }
        if ($method == 'getArticles') {
            $this->getArticles();
        }
        if ($method == 'getCategories') {
            $this->getCategories();
        }
        if ($method == 'setRating') {
            $this->setRating();
        }
        if ($method == 'addArticle') {
            $this->addArticle();
        }
        if ($method == 'addCategory') {
            $this->addCategory();
        }
        if ($method == 'getToApproveCount') {
            $this->getToApproveCount();
        }
        if ($method == 'getArticlesForAdmin') {
            $this->getArticlesForAdmin();
        }
        if ($method == 'updateCategories') {
            $this->updateCategories();
        }
        if ($method == 'removeArticle') {
            $this->removeArticle();
        }
        if ($method == 'getArticlesForUser') {
            $this->getArticlesForUser();
        }
        if ($method == 'mainView') {
            $this->mainView();
        }
        if ($method == 'uploadArticleImages') {
            $this->uploadArticleImages();
        }
        if ($method == 'loadMoreArticles') {
            $this->loadMoreArticles();
        }
        if ($method == 'ApproveDenyArticle') {
            $this->ApproveDenyArticle();
        }
        if ($method == 'uploadAdImages') {
            $this->uploadAdImages();
        }
        if ($method == 'searchArticles') {
            $this->searchArticles();
        }
        if ($method == 'removeCat') {
            $this->removeCat();
        }
        if ($method == 'subscribeNewsletter') {
            $this->subscribeNewsletter();
        }
	if ($method == 'getArticle') {
            $this->getArticle();
	}
	if ($method == 'updateArticle') {
            $this->updateArticle();
        }
        if ($method == 'getSubscribers') {
            $this->getSubscribers();
        }
        if ($method == 'exportSubscribers') {
            $this->exportSubscribers();
        }
        if ($method == 'downloadSubscribers') {
            $this->downloadSubscribers();
        }
      	if ($method == 'uploadVideo') {
            $this->uploadVideo();
        }
    }

    public function searchArticlesBar() {
        $search = -1;
        $search = $this->input->get("search");

        if (isset($arguments['username'])) {
            $id = $arguments['username'];
            $id = urldecode($id);
        }
        $this->load->model('article_m');
        $arrayResult = $this->article_m->searchArticlesBar($search);
        echo json_encode($arrayResult);
    }

    function downloadSubscribers()
    {
        $this->load->helper('download');
        $data = file_get_contents('./exportSubscribers/Subscribers.xls');
        $name = 'Subscribers.xls';
        force_download($name, $data);
    }

    function exportSubscribers() {
        //place where the excel file is created
        $myFile = "./exportSubscribers/Subscribers.xls";
        $this->load->library('parser');

        //load required data from database
        $this->load->model('article_m');
        $exportSubscribers = $this->article_m->getSubscribers();
        $data['subscribers'] = $exportSubscribers;

        //pass retrieved data into template and return as a string
        $stringData = $this->parser->parse('excel_template', $data, true);

        //open excel and write string into excel
        $fh = fopen($myFile, 'w') or die("can't open file");
        fwrite($fh, $stringData);

        //fclose($fh);
        //download excel file
        $this->load->helper('download');
        $data = file_get_contents('./exportSubscribers/Subscribers.xls');
        $name = 'mytext.txt';

       force_download($name, $data);
        
    }
    
    public function subscribeNewsletter() {

        $email = -1;
        $email = $this->input->post("email");
        $this->load->model('article_m');
        $arrayResult = $this->article_m->subscribeNewsletter($email);
        echo json_encode($arrayResult);
    }

    public function getSubscribers() {
        $this->load->model('article_m');
        $arrayResult = $this->article_m->getSubscribers();
        echo json_encode($arrayResult);
    }
    public function searchArticles(){
        $search_user = $this->input->get("search_user");
        $search_after = $this->input->get("search_after");
        $search_before = $this->input->get("search_before");
        $search_status = $this->input->get("search_status");
        $search_category = $this->input->get("search_category");
        $this->load->model('article_m');
        $arrayResult = $this->article_m->searchArticles($search_user, $search_after,$search_before,$search_status,$search_category);
        echo json_encode($arrayResult);
    }
        public function uploadAdImages() {
        $imgArticleIdAd = -1;
        $imgArticleIdAd = $this->input->post("imgArticleIdAd");
        //svar_dump('answeridimage '.$answeridimage);
        $this->load->model('article_m');
        if($_FILES['ad_main_img']['name']!==''){ 
        $orgImg = $_FILES['ad_main_img']['name'];
        $extension = explode(".", $orgImg);
        $config['upload_path'] = './AdvertisementImages/mainImages';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $imgArticleIdAd;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
        $data['upload_data'] = '';
        $this->upload->do_upload("ad_main_img");
        $this->article_m->updateAdMainUrl($imgArticleIdAd,$extension[1]);
        }

        if($_FILES['ad_second_img']['name']!==''){ 
        $orgImg = $_FILES['ad_second_img']['name'];
        $extension = explode(".", $orgImg);
        $config1['upload_path'] = './AdvertisementImages/smallImages';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['max_size'] = '10000';
        $config1['max_width'] = '1024';
        $config1['max_height'] = '768';
        $config1['overwrite'] = FALSE;
        $config1['file_name'] = $imgArticleIdAd;
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);
        $this->upload->set_allowed_types('*');
        $data['upload_data'] = '';
        $this->upload->do_upload("ad_second_img");
        $this->article_m->updateAdSmalleUrl($imgArticleIdAd,$extension[1]);
        }
        //$this->load->view('welcome_message');
        $this->load->helper('url');
        redirect('/auth/authenticate');
    }
    
    public function loadMoreArticles() {

        $id = -1;
        $type = -1;
        $id = $this->input->get("id");
        $type = $this->input->get("type");
        $articleId = $this->input->get("articleId");
        $limit = $this->input->get("limit");

        if (isset($arguments['username'])) {
            $id = $arguments['username'];
            $id = urldecode($id);
        }
        $this->load->model('article_m');
        $arrayResult = $this->article_m->loadMoreArticles($id, $type,$articleId,$limit);
        echo json_encode($arrayResult);
    }
    
    public function mainView(){
        $this->load->view('welcome_message');
    }
    
    public function uploadArticleImages() {
        $imgArticleId = -1;
        $imgArticleId = $this->input->post("imgArticleId");
        //svar_dump('answeridimage '.$answeridimage);
        $this->load->model('article_m');
        var_dump('upload');
        if($_FILES['thumbImage']['name']!==''){ 
        $orgImg = $_FILES['thumbImage']['name'];
        $extension = explode(".", $orgImg);
        $config['upload_path'] = './ArticleImages/thumbnails';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $imgArticleId;
        $this->load->library('upload', $config);
        $this->upload->overwrite = true;
        $this->upload->initialize($config);
        $this->upload->set_allowed_types('*');
        $data['upload_data'] = '';
        $this->upload->do_upload("thumbImage");
        //var_dump('uploaded');
        $this->article_m->updateThumbUrl($imgArticleId,$extension[1]);
        }
        
        if($_FILES['mainImage']['name']!==''){ 
        $orgImg = $_FILES['mainImage']['name'];
        $extension = explode(".", $orgImg);
        $config1['upload_path'] = './ArticleImages/mainImages';
        $config1['allowed_types'] = 'gif|jpg|png';
        $config1['max_size'] = '10000';
        $config1['max_width']  = '1024';
        $config1['max_height']  = '768';
        $config1['overwrite'] = TRUE;
        //var_dump($_FILES['mainImage']['name']);
        $config1['file_name'] = $imgArticleId;
        $this->load->library('upload', $config1);
        $this->upload->overwrite = true;
        $this->upload->initialize($config1);
        $this->upload->set_allowed_types('*');
        $data['upload_data'] = '';
        $this->upload->do_upload("mainImage");
        
        $this->article_m->updateMainImageUrl($imgArticleId,$extension[1],'mainImages');
        }
			
		if($_FILES['mainImage1']['name']!==''){ 
			$orgImg = $_FILES['mainImage1']['name'];
			$extension = explode(".", $orgImg);
			$config1['upload_path'] = './ArticleImages/mainImages1';
			$config1['allowed_types'] = 'gif|jpg|png';
			$config1['max_size'] = '10000';
			$config1['max_width']  = '1024';
			$config1['max_height']  = '768';
			$config1['overwrite'] = TRUE;
			//var_dump($_FILES['mainImage']['name']);
			$config1['file_name'] = $imgArticleId;
			$this->load->library('upload', $config1);
			$this->upload->overwrite = true;
			$this->upload->initialize($config1);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
			$this->upload->do_upload("mainImage1");
			
			$this->article_m->updateMainImageUrl($imgArticleId,$extension[1],'mainImages1');
		}
		
		if($_FILES['mainImage2']['name']!==''){ 
			$orgImg = $_FILES['mainImage2']['name'];
			$extension = explode(".", $orgImg);
			$config1['upload_path'] = './ArticleImages/mainImages2';
			$config1['allowed_types'] = 'gif|jpg|png';
			$config1['max_size'] = '10000';
			$config1['max_width']  = '1024';
			$config1['max_height']  = '768';
			$config1['overwrite'] = TRUE;
			//var_dump($_FILES['mainImage']['name']);
			$config1['file_name'] = $imgArticleId;
			$this->load->library('upload', $config1);
			$this->upload->overwrite = true;
			$this->upload->initialize($config1);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
			$this->upload->do_upload("mainImage2");
			
			$this->article_m->updateMainImageUrl($imgArticleId,$extension[1],'mainImages2');
		}
		
		if($_FILES['mainImage3']['name']!==''){ 
			$orgImg = $_FILES['mainImage3']['name'];
			$extension = explode(".", $orgImg);
			$config1['upload_path'] = './ArticleImages/mainImages3';
			$config1['allowed_types'] = 'gif|jpg|png';
			$config1['max_size'] = '10000';
			$config1['max_width']  = '1024';
			$config1['max_height']  = '768';
			$config1['overwrite'] = TRUE;
			//var_dump($_FILES['mainImage']['name']);
			$config1['file_name'] = $imgArticleId;
			$this->load->library('upload', $config1);
			$this->upload->overwrite = true;
			$this->upload->initialize($config1);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
			$this->upload->do_upload("mainImage3");
			
			$this->article_m->updateMainImageUrl($imgArticleId,$extension[1],'mainImages3');
		}
		
		if($_FILES['mainImage4']['name']!==''){ 
			$orgImg = $_FILES['mainImage4']['name'];
			$extension = explode(".", $orgImg);
			$config1['upload_path'] = './ArticleImages/mainImages4';
			$config1['allowed_types'] = 'gif|jpg|png';
			$config1['max_size'] = '10000';
			$config1['max_width']  = '1024';
			$config1['max_height']  = '768';
			$config1['overwrite'] = TRUE;
			//var_dump($_FILES['mainImage']['name']);
			$config1['file_name'] = $imgArticleId;
			$this->load->library('upload', $config1);
			$this->upload->overwrite = true;
			$this->upload->initialize($config1);
			$this->upload->set_allowed_types('*');
			$data['upload_data'] = '';
			$this->upload->do_upload("mainImage4");
			
			$this->article_m->updateMainImageUrl($imgArticleId,$extension[1],'mainImages4');
		}
        /*$this->load->library('../controllers/auth.php');
        $data['logged_username'] =  $this->auth->authenticate();
            //var_dump($data);
            $this->load->view('admin_panel', $data);*/
            $this->load->helper('url');
            redirect('/auth/authenticate');
        
    }

    public function getArticle(){
        $output = $this->input->post();
        $art_id = $output['art_id'];
        $this->load->model('article_m');
        $arrayResult = $this->article_m->getArticleById($art_id);
        echo json_encode($arrayResult);
    }
    public function getArticles() {

        $id = -1;
        $type = -1;
        $id = $this->input->get("id");
        $type = $this->input->get("type");

        if (isset($arguments['username'])) {
            $id = $arguments['username'];
            $id = urldecode($id);
        }
        $this->load->model('article_m');
        $arrayResult = $this->article_m->getArticle($id, $type);
       echo json_encode($arrayResult);
        //var_dump($arrayResult);

    }

    public function getArticlesForAdmin() {


        $this->load->model('article_m');
        $arrayResult = $this->article_m->getArticlesForAdmin();
        echo json_encode($arrayResult);
    }
    
    public function getArticlesForUser() {
        $output = $this->input->get();
        $username = $output['username'];
        $this->load->model('article_m');
        $arrayResult = $this->article_m->getArticlesForUser($username);
        echo json_encode($arrayResult);
    }

    public function addArticle() {
        $output = $this->input->post();
        var_dump($output);
        $title = $output['article_title'];
        $preview = $output['article_preview'];
        $thumbnail = $output['article_thumbnai'];
//        var_dump($thumbnail);
        $cat = $output['article_category'];
        $content = $output['article_content'];
        $image = $output['article_image'];
        $url = $output['original_url'];
        $user = $output['article_user'];
		$video = $output['article_video'];

        if (empty($title) || empty($cat) || empty($content) || empty($user)) {
            //var_dump('not set');
            echo ("The marked fields must be not be empty");
            //echo json_encode(array('status' => 1, 'desc' => 'Question Added Succesfully'));
        } else {
            $this->load->model('article_m');
            $arrayResult = $this->article_m->addArticle($title, $thumbnail, $preview, $content, $image, $url, $cat, $user, $video);
            echo json_encode($arrayResult);
        }
    }
    
    public function updateArticle() {
         $output = $this->input->post();
        //var_dump($output);
        $title = $output['article_title'];
        $preview = $output['article_preview'];
        $thumbnail = $output['article_thumbnai'];
	$video = $output['article_video'];
        $cat = $output['article_category'];
        $content = $output['article_content'];
        $image = $output['article_image'];
        $url = $output['original_url'];
        $user = $output['article_user'];
        $id = $output['article_id'];
        
        $this->load->model('article_m');
        $this->article_m->updateArticle($id,$title, $thumbnail, $preview, $content, $image, $url, $cat, $user, $video);
        
        
    }

    public function getCategories() {
        $this->load->model('article_m');
        $arrayResult = $this->article_m->getCategories();
        echo json_encode($arrayResult);
    }

    public function updateCategories() {
        $rows = $this->input->post("rows");
        $rows_array = json_decode($rows);
        $this->load->model('article_m');
        $this->article_m->updateCategories($rows_array);
    }
    
    public function removeCat(){
        $output = $this->input->post();
        $id = $output['cat_id'];
        $this->load->model('article_m');
        $this->article_m->removeCat($id);
        
    }

    public function setRating() {

        $id = $this->input->post("id");
        $rating = $this->input->post("rating");
        $this->load->model('article_m');
        $arrayResult = $this->article_m->setRating($id, $rating);
        echo json_encode($arrayResult);
    }

    public function addCategory() {
        $output = $this->input->post();
        $title = $output['title'];
        $colour = $output['colour'];
        $order = $output['order'];
        if (empty($title)) {
            //var_dump('not set');
            echo ("The marked fields must be not be empty");
            //echo json_encode(array('status' => 1, 'desc' => 'Question Added Succesfully'));
        } else {
            $this->load->model('article_m');
            $this->article_m->addCategory($title, $colour,$order);
        }
    }

    public function getToApproveCount() {
        $this->load->model('article_m');
        $arrayResult = $this->article_m->getToApproveCount();
        echo json_encode($arrayResult);
    }

    public function removeArticle(){
        $output = $this->input->post();
        $id = $output['artice_id'];
        $this->load->model('article_m');
        $this->article_m->removeArticle($id);
        
    }
    
    public function ApproveDenyArticle() {
        $rows = $this->input->post("rows");
        $rows_array = json_decode($rows);
        
        $this->load->model('article_m');
        //var_dump($rows_array);
        $this->article_m->ApproveDenyArticles($rows_array);
    }
        
    public function uploadVideo() {
        $this->load->view('youtube_upload');
    }
}