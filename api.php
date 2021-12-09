<?php

//error_reporting(0);
require_once("Rest.inc.php");
require_once 'main.class.php';

class API extends REST {

    public $data = "";
    private $mysqli = NULL;

    public function __construct() {
        parent::__construct(); // Init parent contructor
        //$this->dbConnect();    
        //$DB = new Model;
        $this->Main = new Main(); // Initiate Database connection
        // echo 'hi' ;
        // exit();
       
        date_default_timezone_set("Asia/Kolkata");
    }

   

    /*
     *  Connect to Database
     */
    /* private function dbConnect(){
      $this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB);
      } */
    /*
     * Dynmically call the method based on the query string
     */

    public function processApi() {
        $func = strtolower(trim(str_replace("/", "", $_REQUEST['request'])));
        if ((int) method_exists($this, $func) > 0)
            $this->$func();
        else
            $this->response('', 404); // If the method not exist with in this class, response would be "Page not found".
    }



  

    private function json($data) {
        if (is_array($data)) {
            return json_encode($data);
        }
    }


  

    
       function countryList() {

        if ($this->get_request_method() != "GET") {
            $error = array(
                'status' => "0",
                "error" => "Method Not Allowed"
            );
            $this->response($this->json($error), 405);
        }
        $access_token=$_GET['access_token'];
if(!empty($access_token)){
    $chkAccesstoken=$this->Main->fetchSingle("user","Access_token='$access_token'");
    if(!empty($chkAccesstoken)){
    
    /*hit api by user*/
    $ar=array('access_token'=>$access_token,'date'=>date('Y-m-d H:i:s'),'unixtime'=> time());
    $this->Main->customInsert('api_analyze',$ar);
    /*end his api by user*/
        $fetch = $this->Main->getAll("countries");
        if (count($fetch) > 0) {
            foreach ($fetch as $value) {
                $data[] = array(
                    'country_id' => $value->country_id,
                    'country_name' => $value->country_name
                  
                );
            }
            $status = array(
                'status' => 1,
                'message' => "Country listed successfully",
                'category' => $data
            );
            $this->response($this->json($status), 200);
        } else {
            $error = array(
                'status' => 1,
                "message" => "data not found"
            );
            $this->response($this->json($error), 200);
}}
else{
    $error = array(
                'status' => 0,
                "message" => "Unauthorize Access"
            );
            $this->response($this->json($error), 200);
}




        }
 else {
      $error = array(
                'status' => 0,
                "message" => "Access Token  Missing"
            );
            $this->response($this->json($error), 200);
    }
    }
    
}

// Initiiate Library
$api = new API;
$api->processApi();
?>