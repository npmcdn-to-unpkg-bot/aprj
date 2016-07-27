<?php

/**
 * Author :- B.S.P.Mendis
 * File Name :- article_m.php
 * type :- Model
 */
class article_m extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function removeCat($id) {
        //$this->output->enable_profiler(TRUE);


        $this->db->where('category_id', $id);
        $this->db->delete('articlecategories');
    }

    public function searchArticles($search_user, $search_after,$search_before,$search_status,$search_category){
        //$this->output->enable_profiler(TRUE);
        ///var_dump($search_user);
        $this->db->select('a.article_id,a.title, a.display_content, a.content, a.image, a.original_url, a.creator, a.status, a.date, c.category_name');
        $this->db->from('article a');
        $this->db->join('articlecategories c', 'c.category_id = a.category_id');


        
        //$this->db->select('article_id, title, display_content, content, image, original_url, creator, status, date, category_id');
        if ($search_user != '') {
            //var_dump($search_user);
            if (strpos($search_user, ',') === false) {
                $this->db->like('creator', $search_user);
            } else {
                $users = explode(',', $search_user);
                foreach ($users as $user) {
                    $this->db->like_or('creator', $user);
                }
            }
            //$this->db->like('creator' , $search_user);
        }
        if ($search_after != '') {
            $this->db->where(array('date >=' => $search_after));
        }
        if ($search_before != '') {
            $this->db->where(array('date <' => $search_before));
        }
        //var_dump($search_status);
        if ($search_status != '') {
            $status = json_decode($search_status, TRUE);
            $chk_status = array();
            //var_dump($status);
            if (count($status) > 0) {
                foreach ($status as $state) {
                    array_push($chk_status, $state);
                    //$this->db->like_or('status' => $chk_status));
                }
                //var_dump($chk_status);
                $this->db->where_in('status', $chk_status);
            }
        }
        if ($search_category != '' && $search_category != 'null') {
            $categories = json_decode($search_category, TRUE);
            $chk_cat = array();
            //var_dump($status);
            if (count($categories) > 0) {
                foreach ($categories as $cat) {
                    array_push($chk_cat, $cat);
                    //$this->db->like_or('status' => $chk_status));
                }
                //var_dump($chk_status);
                $this->db->where_in('c.category_id', $chk_cat);
                //$this->db->where(array('category_id' => $search_category));
            }
        }
            //$res = $this->db->get('article');
           $res = $this->db->get();
            $allData = array();
            foreach ($res->result_array() as $row) {
                $allData[] = $row;
            }
            return $allData;
        
    }

    public function searchArticlesBar($search) {
            $this->db->select("article_id, title, display_content, content, rating, thumbnail, image, image1, image2, image3, image4, video, original_url, DATE_FORMAT(date, '%M %D, %Y') AS date", FALSE);
            $this->db->where(array('status' => 'Approve'));
            $this->db->or_like('title', $search);
            $this->db->or_like('display_content', $search);
            $this->db->or_like('content', $search);
            $this->db->order_by("article_id", "desc");
            $res = $this->db->get('article');

            $allData = array();
            foreach ($res->result_array() as $row) {
                $allData[] = $row;
            }
            return $allData;
    }

    public function getArticle($id, $type) {
      //$this->output->enable_profiler(TRUE);
        if ($type == 'CATEGORY')
        {
            //$this->db->select('article_id, title, display_content, content, rating, thumbnail, image, original_url');//DATE_FORMAT(date, '%M %d, %Y') AS
            $this->db->select("article_id, title, display_content, content, rating, thumbnail, image, image1, image2, image3, image4, video, original_url, date", FALSE);
            if ($id != 'ALL'){
                $this->db->where(array('category_id' => $id));
            }
            $this->db->where(array('status' => 'Approve'));
            $this->db->order_by("date", "DESC");
            //$this->db->order_by("article_id", "desc");

            $res = $this->db->get('article',10,0);

            $allData = array();
            //foreach ($res->result_array() as $row) {
            //    $allData[] = $row;
            //}
            return $res->result();
        }
        
        else if ($type == 'ADMIN')
        {
            $this->db->select('t1.article_id, t1.title, t1.display_content, t1.content, t1.rating, '
                    . 't1.thumbnail, t1.image, t1.image1, t1.image2, t1.image3, t1.image4, t1.video, t1.original_url');
            $this->db->where(array('t1.article_id' => $id));
            $res = $this->db->get('article AS t1');
            
            $this->db->select('t2.ad_id, t2.second_ad_image, t2.ad_url');
            $this->db->where(array('t2.priority' => 1));
            $res1 = $this->db->get('advertiesment AS t2',10,0);
            
            
//            $this->db->select('t1.article_id, t1.title, t1.display_content, t1.content, t1.rating, t1.thumbnail, '
//                    . 't1.image, t1.original_url, t2.ad_id, t2.second_ad_image, t2.ad_url');
//            
//            $res = $this->db->get('article AS t1, advertiesment AS t2');
//            $this->db->where(array('t1.article_id' => $id));
//            $this->db->where(array('t2.priority' => 1));
            
            

            $allData = array();
            $allDataArt = array();
            $allDataAds = array();
            
            foreach ($res->result_array() as $row) {
                $allDataArt[] = $row;
            }
            foreach ($res1->result_array() as $row1) {
                $allDataAds[] = $row1;
                //array_push($allData1, $row1);
            }
            
            $allData['article'] = $allDataArt;
            $allData['ads'] = $allDataAds;
            return $allData;
        }
        
        else if ($type == 'ARTICLE')
        {
            $this->db->select('t1.article_id, t1.title, t1.display_content, t1.content, t1.rating, '
                    . 't1.thumbnail, t1.image, t1.image1, t1.image2, t1.image3, t1.image4, t1.video, t1.original_url');
            $this->db->where(array('t1.article_id' => $id));
            //$this->db->where(array('status' => 'Approve'));
            $this->db->order_by("article_id", "desc");
            $res = $this->db->get('article AS t1');
            
            $this->db->select('t2.ad_id, t2.second_ad_image, t2.ad_url');
            $this->db->where(array('t2.priority' => 1));
            $res1 = $this->db->get('advertiesment AS t2',10,0);
            
            
//            $this->db->select('t1.article_id, t1.title, t1.display_content, t1.content, t1.rating, t1.thumbnail, '
//                    . 't1.image, t1.original_url, t2.ad_id, t2.second_ad_image, t2.ad_url');
//            
//            $res = $this->db->get('article AS t1, advertiesment AS t2');
//            $this->db->where(array('t1.article_id' => $id));
//            $this->db->where(array('t2.priority' => 1));
            
            

            $allData = array();
            $allDataArt = array();
            $allDataAds = array();
            
            foreach ($res->result_array() as $row) {
                $allDataArt[] = $row;
            }
            foreach ($res1->result_array() as $row1) {
                $allDataAds[] = $row1;
                //array_push($allData1, $row1);
            }
            
            $allData['article'] = $allDataArt;
            $allData['ads'] = $allDataAds;
            return $allData;
        }
    }
    
    public function loadMoreArticles($id, $type,$articleId,$limit) {
        //$this->output->enable_profiler(TRUE);
        if ($type == 'CATEGORY')
        {
            //$this->db->select('article_id, title, display_content, content, rating, thumbnail, image, original_url');
            $this->db->select("article_id, title, display_content, content, rating, thumbnail, image, original_url, date", FALSE);
            if ($id != 'ALL'){
                $this->db->where(array('category_id' => $id));
            }
            $this->db->where(array('status' => 'Approve'));
            //$this->db->order_by("article_id", "desc");
            $this->db->order_by("date", "DESC");
            $res = $this->db->get('article',10,$limit);

            $allData = array();
            foreach ($res->result_array() as $row) {
                $allData[] = $row;
            }
            return $allData;
        }
        
        else if ($type == 'ARTICLE')
        {
            $this->db->select('t1.article_id, t1.title, t1.display_content, t1.content, t1.rating, '
                    . 't1.thumbnail, t1.image, t1.original_url');
            $this->db->where(array('t1.article_id' => $id));
            $this->db->where(array('status' => 'Approve'));
            $this->db->order_by("article_id", "desc"); 
            $res = $this->db->get('article AS t1');
            
            $this->db->select('t2.ad_id, t2.second_ad_image, t2.ad_url');
            $this->db->where(array('t2.priority' => 1));
            $res1 = $this->db->get('advertiesment AS t2',10,$limit);

            $allData = array();
            $allDataArt = array();
            $allDataAds = array();
            
            foreach ($res->result_array() as $row) {
                $allDataArt[] = $row;
            }
            foreach ($res1->result_array() as $row1) {
                $allDataAds[] = $row1;
                //array_push($allData1, $row1);
            }
            
            $allData['article'] = $allDataArt;
            $allData['ads'] = $allDataAds;
            return $allData;
        }
    }
        
    public function getCategories() {
        $this->db->select('category_id, category_name, colour, artilcle_count ,order');
        $this->db->order_by('order', 'asc'); 
        $res = $this->db->get('articlecategories');
        $allData = array();
       
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }
    
    public function updateCategories($rows_array){
    //$this->output->enable_profiler(TRUE);

            foreach ($rows_array as $row) {
                $data = array(
                    'category_name' => $row->Category ,
                    'colour' => $row->Colour,
                    'order' => $row->Order
                );
                $this->db->where('category_id', $row->Id);
                $this->db->update('articlecategories', $data);
            }
    }
    public function updateImageURL($articleId, $extension,$imagename,$fieldname)
    {

        $data = array($fieldname => "ArticleImages/".$imagename."/".$articleId.".".$extension);
        $this->db->where('article_id', $articleId);
        $x=$this->db->update('article', $data);
        echo var_dump($x);
    }
public function updateArticle($id, $title, $thumbnail, $preview, $content, $image, $url, $category, $creator,$video) {
        //$this->output->enable_profiler(TRUE);
        if($thumbnail === '' &&$image === '' ){
            //var_dump('1');
            //var_dump($image . $thumbnail);
            $data = array('title' => $title,
            'original_url' => $url,
            'content' => $content,
            'creator' => $creator,
            'display_content' => $preview,
            'category_id' => $category);
        }
        else if($image === '' || $thumbnail != ''){
            //var_dump('2');
            //var_dump($image . $thumbnail);
            $data = array('title' => $title,
            'original_url' => $url,
            'content' => $content,
            'creator' => $creator,
            'display_content' => $preview,
            'thumbnail' => $thumbnail,
            'category_id' => $category);
        }
        else if($thumbnail === '' ||$image != '' ){
            //var_dump('3');
            //var_dump($image . $thumbnail);
            $data = array('title' => $title,
            'image' => $image,
            'original_url' => $url,
            'content' => $content,
            'creator' => $creator,
            'display_content' => $preview,
            'category_id' => $category);
        }
        
        else{
           // var_dump('4');
           // var_dump($image . $thumbnail);
        $data = array('title' => $title,
            'image' => $image,
            'original_url' => $url,
            'content' => $content,
            'creator' => $creator,
            'display_content' => $preview,
            'thumbnail' => $thumbnail,
            'category_id' => $category);
        }
        if($video !== 'https://www.youtube.com/watch?v=undefined'){
            $data['video'] = $video;
        }
        $this->db->where('article_id', $id);
            $this->db->update('article', $data);
        
        
    }

        public function addCategory($title, $colour,$order) {

        $Cdata = array('category_name' => $title,
            'colour' => $colour,
            'order'=> $order);
        $this->db->insert('articlecategories', $Cdata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }

    public function getToApproveCount() {
        $this->db->select('article_id, title, creator');
        $this->db->where('status', 'Pending');

        $res = $this->db->get('article');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }


   public function getArticlesForAdmin() {
       //$this->output->enable_profiler(TRUE);

        //$this->db->select('article_id, title, display_content, content, image, original_url, creator, status, date, category_id');
//        $this->db->where(array('status' => 'Approve'));
//        $res = $this->db->get('article');
//        $allData = array();
//        foreach ($res->result_array() as $row) {
//            $allData[] = $row;
//        }
//        return $allData;
        $this->db->select('a.article_id,a.title, a.display_content, a.content, a.image, a.original_url, a.creator, a.status, a.date, c.category_name');
        $this->db->from('article a');
        $this->db->join('articlecategories c', 'c.category_id = a.category_id');
        
        $res = $this->db->get();
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }
    public function getArticlesForUser($username) {
       //$this->output->enable_profiler(TRUE);

        $this->db->select('article_id, title, display_content, content, image, original_url, creator, status, date, category_id');
        $this->db->where(array('creator' => $username));
        $res = $this->db->get('article');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }

    public function addArticle($title, $thumbnail, $preview, $content, $image, $url, $category, $creator, $video,$ar_id,$files) {
        //$this->output->enable_profiler(true);
        if($video == 'https://www.youtube.com/watch?v=undefined'){
            $Adata = array('title' => $title,
                'article_id'=>$ar_id,
            'image' => $image,
            'original_url' => $url,
            'content' => $content,
            'creator' => $creator,
            'display_content' => $preview,
            'thumbnail' => $thumbnail,
            'category_id' => $category);
        }
        else{
            $Adata = array('title' => $title,
                'article_id'=>$ar_id,
            'image' => $image,
            'original_url' => $url,
            'content' => $content,
            'creator' => $creator,
            'display_content' => $preview,
            'thumbnail' => $thumbnail,
            'category_id' => $category,
            'video' => $video);
        }

        if($files["article_image"]["name"]!=""){
            $orgImg = $_FILES['article_image']['name'];
            $extension = explode(".", $orgImg)[1];
            $Adata['image']="ArticleImages/mainImages/".$ar_id.".".$extension;
        }

        if($files["article_image1"]["name"]!=""){
            $orgImg = $_FILES['article_image1']['name'];
            $extension = explode(".", $orgImg)[1];
            $Adata['image1']="ArticleImages/mainImages1/".$ar_id.".".$extension;
        }

        if($files["article_image2"]["name"]!=""){
            $orgImg = $_FILES['article_image2']['name'];
            $extension = explode(".", $orgImg)[1];
            $Adata['image2']="ArticleImages/mainImages2/".$ar_id.".".$extension;
        }
        if($files["article_image3"]["name"]!=""){
            $orgImg = $_FILES['article_image3']['name'];
            $extension = explode(".", $orgImg)[1];
            $Adata['image3']="ArticleImages/mainImages3/".$ar_id.".".$extension;
        }
        if($files["article_image4"]["name"]!=""){
            $orgImg = $_FILES['article_image4']['name'];
            $extension = explode(".", $orgImg)[1];
            $Adata['image4']="ArticleImages/mainImages4/".$ar_id.".".$extension;
        }

        
        $this->db->insert('article', $Adata);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }
    public function setRating($id, $rating) {
//        $this->db->where(array('article_id' => $id));
//        $this->db->update('article', array('rating' =>  $rating));
        //var_dump($rating);
        //$this->output->enable_profiler(true);
        $data = array('rating' => $rating);
        
        $this->db->where('article_id', $id);
                    //$this->db->set('rating', $rating, FALSE);
                    $this->db->update('article', $data);
    }

    public function removeArticle($id) {
        $this->output->enable_profiler(TRUE);

        $data = array(
            'status' => 'Blocked'
        );
        $this->db->where('article_id', $id);
        $this->db->update('article', $data);
    }

    public function updateThumbUrl($articleId, $extension)
    {
        $data = array('thumbnail' => '\~loudhorn\ArticleImages\thumbnails\\'. $articleId . '.' .$extension);
        $this->db->where('article_id', $articleId);
        $this->db->update('article', $data);
    }
    
    public function updateMainImageUrl($articleId, $extension, $folder)
    {
        if($folder === 'mainImages'){
		$data = array('image' => '\ArticleImages\\'. $folder . '\\' . $articleId . '.' .$extension);
	}
	else if($folder === 'mainImages1'){
		$data = array('image1' => '\ArticleImages\\'. $folder . '\\' . $articleId . '.' .$extension);
	}
	else if($folder === 'mainImages2'){
		$data = array('image2' => '\ArticleImages\\'. $folder . '\\' . $articleId . '.' .$extension);
	}
	else if($folder === 'mainImages3'){
		$data = array('image3' => '\ArticleImages\\'. $folder . '\\' . $articleId . '.' .$extension);
	}
	else if($folder === 'mainImages4'){
		$data = array('image4' => '\ArticleImages\\'. $folder . '\\' . $articleId . '.' .$extension);
	}
        //var_dump('\~loudhorn\ArticleImages\mainImages\\'. $articleId . '.gif');
        $this->db->where('article_id', $articleId);
        $this->db->update('article', $data);
    }

    public function updateAdMainUrl($adId, $extension)
    {
        $data = array('main_ad_image' => '\~loudhorn\AdvertisementImages\mainImages\\'. $adId . '.' .$extension);
        $this->db->where('ad_id', $adId);
        $this->db->update('advertiesment', $data);
    }

    public function updateAdSmalleUrl($adId, $extension)
    {
        $data = array('second_ad_image' => '\~loudhorn\AdvertisementImages\smallImages\\'. $adId . '.' .$extension);
        $this->db->where('ad_id', $adId);
        $this->db->update('advertiesment', $data);
    }
    
    public function ApproveDenyArticles($rows_array){
        //$this->output->enable_profiler(TRUE);
        //var_dump($rows_array);
            foreach ($rows_array as $row) {
                //var_dump($row);
                $data = array(
                    'status' => $row->Status
                );
                $this->db->where('article_id', $row->Id);
                $this->db->update('article', $data);
                
                $this->db->select('creator, title');
                $this->db->where('article_id', $row->Id);
        	$query= $this->db->get('article');
        	//var_dump($query);
        	if ($query->num_rows() > 0)  //Ensure that there is at least one result 
		{
		   foreach ($query->result() as $data)  //Iterate through results
		   {
		      $username = $data->creator;
		      $title = $data->title;
		   }
		}

                if ($row->Status != 'Pending') {
                
                        if($row->Status == 'Approve')
                        {
                            $emailStat = 'Approved';	
                        }
                        if($row->Status == 'Reject')
                        {
                            $emailStat = 'Rejected';	
                        }
                
	                $this->load->model('user_m');
                        $email = $this->user_m->getEmailAddress($username);
	                
	                //Email by Sajith
	                $config = Array(
	                    'protocol' => 'smtp',
	                    'smtp_host' => 'ssl://smtp.googlemail.com',
	                    'smtp_port' => 465,
	                    'smtp_user' => 'easyalevel@gmail.com',
	                    'smtp_pass' => 'all123456',
	                    'smtp_timeout' => '4',
	                    'mailtype' => 'text',
	                    'charset' => 'iso-8859-1'
	                );
	                $this->load->library('email', $config);
	                $this->email->set_newline("\r\n");
	                $this->email->from('easyalevel@gmail.com');
	                $this->email->to($email);
	                $this->email->subject("Regarding Article Published At Loud Horn Marketing \n");
	                $this->email->message("Article :- ".  $title . "\nStatus :- ".  $emailStat. "\nComment :- ".$row->Comment);
	                $this->email->send();
	                //End Email by Sajith
                }

            }
    }
    public function getArticleById($art_id) {
        //$this->output->enable_profiler(TRUE);
        $this->db->select('title, image, image1, image2, image3, image4, video, display_content, content,article_id, thumbnail, original_url, category_id');
        $this->db->where('article_id', $art_id);
        $res = $this->db->get('article');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
    }
    public function subscribeNewsletter($email)
    {
       $this->output->enable_profiler(TRUE);
        $Data = array('email' => $email);
        $this->db->insert('newslettersubscription', $Data);
        $this->db->trans_complete();
    }
    
    public function getSubscribers() {
        $this->db->select('email');
        $res = $this->db->get('newslettersubscription');
        $allData = array();
        foreach ($res->result_array() as $row) {
            $allData[] = $row;
        }
        return $allData;
        
    }

    ///////////////////////////////////////

    function getArticleToView($cat_id=NULL){
        $this->db->select('article_id, title, display_content, image, original_url, creator, status, date, category_id,thumbnail');
        if($cat_id!=NULL) {
            $this->db->where(array('category_id' => $cat_id));

        }
        else{
            //$this->db->where(array('status' => 'Approve'))->limit(100, 1);
            $this->db->where(array('status' => 'Approve'));
        }
        $this->db->where(array('status' => 'Approve'));
        $this->db->order_by("date", "DESC");
        //$this->db->limit(0, 20);

        $res = $this->db->get('article');

        return $res->result();
    }

    function getOtherArticles(){
        $this->db->select('article_id, title, display_content, image, original_url, creator, status, date, category_id,thumbnail');

        $this->db->where(array('status' => 'Approve'))->limit(1000, 10);

        //$this->db->limit(0, 20);

        $res = $this->db->get('article');

        return $res->result();

    }
    
}