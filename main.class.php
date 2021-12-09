<?php 
//echo phpinfo();

class Main
{   
   
   	
	protected $dbName = "softgrid";
	protected $dbHost = "localhost";
	protected $dbUser = "root";
	protected $dbPass = "";
   	
	public $db;
	
	function __construct()
	{
		@session_start();
		$this->db = new PDO("mysql:host=$this->dbHost;dbname=$this->dbName",$this->dbUser,$this->dbPass);		
	}
	

	
	public function rowCount($query)
	{
		
		$sql = $this->db->query($query);
		//$fetch = $sql->fetch();
		$count = $sql->rowCount();
		return $count;
	}
        public function numRows($tbl)
        {
            $sql = $this->db->query("SELECT * FROM $tbl");
            //$fetch = $sql->fetch();
            $count = $sql->rowCount();
            return $count;
        }
	public function fetchAll($tbl,$where)
	{
		return $this->db->query("select * from $tbl where $where")->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function getAll($tbl)
	{
		return $this->db->query("select * from $tbl")->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function getSingle($tbl,$id)
	{
		return $this->db->query("select * from $tbl where id=$id")->fetch(PDO::FETCH_OBJ);
	}
	
	public function fetchSingle($tbl,$where)
	{
		return $this->db->query("select * from $tbl where $where")->fetch(PDO::FETCH_OBJ);
	}
	
	public function customQuery($query)
	{
		return $this->db->query($query)->fetchAll(PDO::FETCH_OBJ);
	}
	public function singleQuery($query)
	{
		return $this->db->query($query)->fetch(PDO::FETCH_OBJ);
	}
	
	public function customDelete($query)
	{
		return $this->db->query($query);
	}
	public function customDelete2($tbl,$where)
	{
		return $this->db->query("DELETE FROM $tbl WHERE $where");
	}
	public function queryUpdate($query)
	{
		return $this->db->query($query);
	}
	
	public function customUpdate($tbl,$fields,$where)
	{
		$data='';
		foreach($fields as $key => $fieldsz)
		{
			$data .= $key."='".$fieldsz."',";
			
		}
		$data=rtrim($data,',');
		
		return $this->db->query("UPDATE $tbl SET $data where $where");
	}
	public function customUpdate2($tbl,$fields,$a,$b)
	{
		
		
	return $this->db->query("UPDATE $tbl SET password='".$fields."' where username='".$a."' AND type='".$b."'");
	}
	
	public function queryInsert($query)
	{
		return $this->db->query($query);
	}
	
	public function customInsert($tbl,$fields)
	{
		$data='';
		foreach($fields as $key => $fieldsz)
		{
			$data .= "'".$fieldsz."',";
		}
		$data=rtrim($data,',');
		
                //echo $data;exit();
	   return $this->db->query("INSERT INTO $tbl values (NULL,$data)");
            //return $insert;
	}
    public function delete($tbl,$id)
	{
		return $this->db->query("DELETE FROM $tbl where id=$id");
	}	
	
	public function CausesFetch($start){
		
		return $this->db->query("select * from tbl_our_causes LIMIT $start,3")->fetchAll(PDO::FETCH_OBJ);
	}
	public function CausesCount(){
		
	    $sql=$this->db->query("select * from tbl_our_causes");
		$fetch = $sql->fetch();
		$count = $sql->rowCount();
		return $count;
	}
/*==================================ImageGallery===========================================*/	
	
/*=======================GalleryInsert Start=========================*/
	
	public function insert($tbl)
	{
		//print_r($_POST); exit;
		$fields = array_diff($_POST,array('submit'));
		$data='';
		foreach($fields as $key => $fieldsz)
		{
			/*$pos = strpos($key, "countdown");
    		if ($pos === false) */
			if($key=="countdown")
			{
    		} 
			else
			{
				$data .= "'".$fieldsz."',";
			}
			//$data .= "'".$fieldsz."',";
		}
		$data=rtrim($data,',');
		
		if(isset($_FILES) && empty($_FILES))
		{
			
				$data .= '';
		}
		else
		{
			$filename = $this->upload();
			$data .= ",'".$filename."'";
		}
		
		return $this->db->query("INSERT INTO $tbl values (NULL,$data)");
	}
	
public function imageUpload($name)
	{
		$file_upload="true";
		$file_up_size=$_FILES[$name]['size'];
		$filename = rand()."_".$_FILES[$name]['name'];
		
		
		//$file_name=rand()."_".$_FILES['file_up']['name'];
		$add="productImages/$filename"; // the path with the file name where the file will be stored
		if($file_up_size > 0)
		{
			if($file_upload=="true"){
			
				if(move_uploaded_file ($_FILES[$name]['tmp_name'], $add))
				{
				// do your coding here to give a thanks message or any other thing.
				}
				else
				{
					echo "Failed to upload file Contact Site admin to fix the problem";
				}
			
			}
			
		}
		return $filename;
	
	}	
	/*======================Insert Any Type of File start=======================*/
public function fileUpload($name,$folder)
	{
		$file_upload="true";
		$file_up_size=$_FILES[$name]['size'];
		$filename = rand()."_".$_FILES[$name]['name'];
		
		
		//$file_name=rand()."_".$_FILES['file_up']['name'];
		$add="Images/".$folder."/$filename"; // the path with the file name where the file will be stored
		if($file_up_size > 0)
		{
			if($file_upload=="true"){
			
				if(move_uploaded_file ($_FILES[$name]['tmp_name'], $add))
				{
				// do your coding here to give a thanks message or any other thing.
				}
				else
				{
					echo "Failed to upload file Contact Site admin to fix the problem";
				}
			
			}
			
		}
		return $filename;
	
	}/*=======================InsertVideoGallery end============================*/
	/*=======================Product Relative Image Upload Start=========================*/
	
	
	public function imageUpload1($name)
	{
		$path = "Images/";
		$valid_formats = array("jpg", "png", "gif", "bmp","jpeg","PNG","JPG","JPEG","GIF","BMP");
		$imagename = $_FILES[$name]['name'];
        $size = $_FILES[$name]['size'];
		
        $uploadedfile = $_FILES[$name]['tmp_name'];
		$ext = strtolower($this->getExtension($imagename));
		$actual_image_name = rand()."_".$imagename;
		$newwidth =600; 
        $newheight =600;
        $image=$this->compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth,$newheight);
		
		
		
		return $image;
	
	}
	/*=======================Product Relative Image Upload End=========================*/
	

 /*=======================Slider Update End=========================*/
	public function changeStatus($id,$status,$tbl)
	{
		if($status == 0)
		{
      		return $this->db->query("UPDATE $tbl SET status='1' where id=$id");
		}
		elseif( $status == 1)
		{
			return $this->db->query("UPDATE $tbl SET status='0' where id=$id");
		}
	}
	
	public function getDateFormat($date)
	{
		$date = explode('/',$date);
		return $date[2].'-'.$date[0].'-'.$date[1];
	}
	
	public function displayDateFormat($date)
	{
		$date = explode('-',$date);
		return $date[1].'/'.$date[2].'/'.$date[0];
	}
	
	public function addDate($date)
	{
		$newdate = strtotime ( '+1 day' , strtotime ( $date ) ) ;
		return date ( 'Y-m-d' , $newdate );
	}
	
    public function compressImage($ext,$uploadedfile,$path,$actual_image_name,$newwidth,$newheight)
    {

            if($ext=="jpg" || $ext=="jpeg" )
            {
                    $src = imagecreatefromjpeg($uploadedfile);
            }
            else if($ext=="png")
            {
                    $src = imagecreatefrompng($uploadedfile);
            }
            else if($ext=="gif")
            {
                    $src = imagecreatefromgif($uploadedfile);
            }
            else
            {
                    $src = imagecreatefrombmp($uploadedfile);
            }

            list($width,$height)=getimagesize($uploadedfile);
            $tmp=imagecreatetruecolor($newwidth,$newheight);
            imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
            $filename =$actual_image_name; //PixelSize_TimeStamp.jpg
            imagejpeg($tmp,$path.$filename,100);
            imagedestroy($tmp);
            return $filename;
    }

    /*get extention function start*/
    public function getExtension($str)
    {
        $i = strrpos($str,".");
        if (!$i)
        {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
    }
    /*get extention function End*/
    function siteUrl(){
        $siteurl = "https://metavoxx.net/my-metavoxx";
        return $siteurl;
    }

    function siteImg(){
        $siteimg = "https://metavoxx.net/my-metavoxx/img";
        return $siteimg;
    }
	function baseUrl() {
        $siteurl = "https://metavoxx.net/my-metavoxx";
        return $siteurl;
    }
	 function adminlink() {
        $siteimg = "http://localhost/Mymetavoxx/Metavoxx-Admin/admin/";
        return $siteimg;
    }
    function siteTitle(){
        $sitetitle = "My Metavoxx";
        return $sitetitle;
    }
}

$main = new Main();

?>