<?php
error_reporting(E_ALL);
require 'main.class.php';

$type=$_POST['type'];
if($type=="login")
{
    $username=$_POST['username'];
    $password= base64_encode($_POST['password']);
    //$fetch = $main->getAll("admin");
   
   $fetch= $main->fetchSingle("admin","username='$username' and password = '$password'");
   // print_r($fetch);
    if(!empty($fetch))
    {
     $_SESSION['id']=$fetch->id;   
     $_SESSION['username']=$fetch->username;   
     $_SESSION['type']='admin';   
     echo 1;
    }
    else{
     echo 0; 
        
    }
    

            
            
            
}
 elseif ($type =='filter') {
        $user=$_POST['user'];
        $start_date=$_POST['start_date'];
        if(!empty($start_date)){
        $start_date=strtotime($_POST['start_date'].''.'12:00:00 am');
        }
         $query ="select * from api_analyze where 1=1"       ; 
         if($user!="")
         {
             $query .=" and access_token = '$user'";
         }
         if($start_date!="")
         {
            
             $query .=" and unixtime <= $start_date";
         }
             
      //  echo $query;
         $api_analyze_data=$main->customQuery($query);
         $total= count($api_analyze_data);
             $html='';
          $i=1;
                                        foreach ($api_analyze_data as $api_analyze_dataza) {
                                           $get_user=$main->fetchSingle("user","access_token='$api_analyze_dataza->access_token'"); 
                                       $html .= '<tr>
                                            <td>'.$i.'</td>
                                            <td>'.$get_user->name.'</td>
                                            <td>'.date('jS M Y H:i a', strtotime($api_analyze_dataza->date)).'</td>
                                            
                                        </tr>';
                                        } 
                                        
                                        $ar=array('total'=>$total,'html'=>$html);
       
                                        echo json_encode($ar);
    }
?>