<?php 

class connection{
	
	var $db='bysgtraining';
	var $localhost='localhost';
	var $password='';
	var $username='root';
	var $connect;
	var $database;
	public function connectTodatabase(){
		
		
		$con=mysqli_connect($this->localhost,$this->username,$this->password);
		if(!$con){ echo'can not connect to database';}
		else{
		 $this->connect=$con;
		
		}
		
		 return $this->connect;
		}
		
		
		public function selectDatabase(){
			
		return	$this->database=mysqli_select_db($this->connect,$this->db);
			
			
			
		}
		
		function CURLsendsms($phone,$name,$message){ 
 
        $msg=urlencode(ucwords($name)." ".$message);
		 $url='https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=ZR3eJEIlCdsHh3mcchZy38OX20qNzlpyklN4ZfBTjbNgQZTRZ0yJiwzaOqX2&from=BYSGUYO2021&to='.urlencode($phone).'&body='.$msg.'&dnd=2';
       // $url='https://smsexperience.com/api/sms/sendsms?username=michaelodikeme&password=smsexperience&sender=dspz_cbt&recipient='.urlencode($phone).'&message='.$msg;
         $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		
        curl_exec($ch);
       
		curl_close($ch); 
		
         //return $output; 		// Close CURL

        // Use file get contents when CURL is not installed on server.
       // if(!$output){
       //    $output =  file_get_contents($smsgatewaydata);  
       // }

    }
	
	function CURLsendsms2($phone,$name){ 
 
        $msg=urlencode(ucwords($name).", Thanks for registering your information. Welcome to the 2021 Retreat. ");
		 $url='https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=ZR3eJEIlCdsHh3mcchZy38OX20qNzlpyklN4ZfBTjbNgQZTRZ0yJiwzaOqX2&from=BYSGUYO2021&to='.urlencode($phone).'&body='.$msg.'&dnd=2';
       // $url='https://smsexperience.com/api/sms/sendsms?username=michaelodikeme&password=smsexperience&sender=dspz_cbt&recipient='.urlencode($phone).'&message='.$msg;
         $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		
        curl_exec($ch);
       
		curl_close($ch); 
		
         //return $output; 		// Close CURL

        // Use file get contents when CURL is not installed on server.
       // if(!$output){
       //    $output =  file_get_contents($smsgatewaydata);  
       // }

    }
	
	function CURLsendsms3($phone,$name){ 
 
        $msg=urlencode(ucwords($name).", we have recieved your feedback. Thanks. ");
		 $url='https://www.bulksmsnigeria.com/api/v1/sms/create?api_token=ZR3eJEIlCdsHh3mcchZy38OX20qNzlpyklN4ZfBTjbNgQZTRZ0yJiwzaOqX2&from=BYSGUYO2021&to='.urlencode($phone).'&body='.$msg.'&dnd=2';
       // $url='https://smsexperience.com/api/sms/sendsms?username=michaelodikeme&password=smsexperience&sender=dspz_cbt&recipient='.urlencode($phone).'&message='.$msg;
         $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, TRUE);
            curl_setopt($ch, CURLOPT_NOBODY, TRUE); // remove body
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		
        curl_exec($ch);
       
		curl_close($ch); 
		
         //return $output; 		// Close CURL

        // Use file get contents when CURL is not installed on server.
       // if(!$output){
       //    $output =  file_get_contents($smsgatewaydata);  
       // }

    }
	
	
	 public function insertion($query){
		 
		$result=mysqli_query($this->connect,$query)or die("MySQL error: " . mysqli_error($this->connect) . "<hr>\nQuery: $query");
		
		return $result;
		 $this->closeDatabase();
		 
	 }
	 
	  public function retrieve($query){
		 
		$result=mysqli_query($this->connect,$query)or die("MySQL error: " . mysqli_error($this->connect) . "<hr>\nQuery: $query");
		
		return $result;
		 $this->closeDatabase();
		 
	 }
	 
	 public function arrayFetch($result){
		$arraycontent=array();
		while( $contents=mysqli_fetch_array($result)){
			$arraycontent[]=$contents;
			
		}
		return $arraycontent;
		 }
	 
	  public function lastInsertId(){
		 
		$id=mysqli_insert_id($this->connect);
		 
		 
		 return $id;
	 }
	 
	public function url(){
	 
	 $path="http://localhost/keffes/construction/";
	 return $path;
 } 
	 
	 public function numRows($query){
		 
		$num=mysqli_num_rows($query);
		 
		 return $num;
	 }
	 
	 function random($lenght){
	$characters = "1234567890";
	$name = "";
	for($i = 0; $i< $lenght; $i++){
		$name.= $characters[mt_rand(0, strlen ($characters) - 1)];
	}
	return $name;
}
	 
	 function get_country(){
		 $this->selectDatabase();
	$output='';
	$result_country="SELECT * FROM `countries`";
	$result=$this->retrieve($result_country);
	$rows=$this->arrayFetch($result);
	foreach($rows as $row){
	
		$output.='<option value="'.$row['country_id'].'">'. $row['country_name'].'</option>';
		}
		
		return $output;
	}
	
	

	 
	 
	public function time_ago($cur_time){
	if($cur_time == "")return "No date provided";
	else
$time_ = time() - strtotime($cur_time);

$seconds =$time_;
$minutes = round($time_ / 60);
$hours = round($time_ / 3600);
$days = round($time_ / 86400);
$weeks = round($time_ / 604800);
$months = round($time_ / 2419200);
$years = round($time_ / 29030400);

//Seconds

if($seconds <= 60){

   $time="Today";//"$seconds seconds ago";   

//Minutes

}else if($minutes <= 60){

   //if($minutes == 1){
   $time="Today";//"one minute ago";
  // }else{
//   $time="$minutes minutes ago";
//   }

//Hours

}else if($hours <= 24){

 // if($hours == 1){
  $time="Today";//"one hour ago";
 /* }else{
  $time="$hours hours ago";
  }*/

//Days

}else if($days <= 7){

   if($days == 1){
   $time="Yesterday";
   }else{
   $time="$days days ago";
   }

//Weeks

}else if($weeks <= 4){

  if($weeks == 1){
  $time="A week ago";
  }else{
  $time="$weeks weeks ago";
  }

//Months

}else if($months <= 12){

  if($months == 1){
  $time="A month ago";
  }else{
  $time="$months months ago";
  }

//Years

}else{  

  if($years == 1){
  $time="A year ago";
  }else{
  $time="$years years ago";
  }  

}
return $time;
}

	 
	 
	 
	 public function closeDatabase(){
		 
		 $close=mysqli_close($this->connect);
		return $close;
		 }
	
	
	
	public function encrypt_decrypt ($data, $encrypt) {
    if ($encrypt == true) {
        $output = base64_encode (convert_uuencode ($data));
    } else {
        $output = convert_uudecode (base64_decode ($data));
    }
    return $output;
	
	
	
}
	public function pendingKugbe($val1,$val2){
		 $connect=new connection();
		 $connect->connectTodatabase();
		 $connect->selectDatabase();
		 
		$pullinfo= "select * from reserve where reserve_package='".$val2."'";
	$inforesult=$connect->retrieve($pullinfo);
	$rowsinfo=$connect->arrayFetch($inforesult);
	foreach($rowsinfo as $rowinfo)
	
	$queryunqueueinsert="INSERT INTO `pending`(
`pending_id`,
`member_id`,
`reserve_email` ,
`package_sub`
)
VALUES(NULL,'".$val1."','".$rowinfo['reserve_email']."','$val2'
)";
	$connect->insertion($queryunqueueinsert);
	
	$memberUpdate= "update members set res_status=1 where member_id='".$val1."'";
	$infoupdate=$connect->insertion($memberUpdate);
		
	
		}
		
	public function accountcreateMail($val1,$val2){
		 $connect=new connection();
		 $connect->connectTodatabase();
		 $connect->selectDatabase();
		 
		$Email_message='';
		$to = $val1;
		$subject = 'New Membership:support@cornerpocket.co.ng';

		$Email_message ="Hi ".$val2.", "."Welcome to cornerpocket.co.ng. Your account have been created";  

		$headers = 'From:support@cornerpocket.co.ng' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($to, $subject, $Email_message, $headers);
		
		
		}
		
public function sendpaymentMail($name,$recieverid){
		 $connect=new connection();
		 $connect->connectTodatabase();
		 $connect->selectDatabase();
		 
		 $pullmemberinfo= "select * from members where member_id='".$recieverid."'";
		 $memberinforesult=$connect->retrieve($pullmemberinfo);
		 $memberrowsinfo=$connect->arrayFetch($memberinforesult);
		foreach($memberrowsinfo as $memberrowinfo)
		$Email_message='';
		$to = $memberrowinfo['email'];
		$subject = 'Payment Alert:support@cornerpocket.co.ng';

		$Email_message ="Hi ".ucwords($memberrowinfo['fullname']).", "."A member with name".ucwords($name)." has landed on your payment list.Please <a href=\"springerpeer.com/login\">Login</a> to view.";  

		$headers = 'From:support@cornerpocket.co.ng' . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($to, $subject, $Email_message, $headers);
		
		
		}
	
public function sendcontactmail($name,$email,$subject,$message){
		 $connect=new connection();
		 $connect->connectTodatabase();
		 $connect->selectDatabase();
		 
		 
		$Email_message='';
		$to = "newgateschool@yahoo.com";
		$subject = $subject;

		$Email_message =$message;  

		$headers = $email . "\r\n";
		$headers.= "MIME-version: 1.0\n";
		$headers.= "Content-type: text/html; charset= iso-8859-1\n";
		mail($to, $subject, $Email_message, $headers);
		
		
		}

	
	public function emailres(){
		$email='robinsonagaga@yahoo.com';
		return $email;
		
		}
		
		
		function Pages_admin($query1,$recordperpage,$pagenum,$pagelink){
			$total_record="";
	$result=$this->retrieve($query1);
	$rows=$this->arrayFetch($result);
	foreach($rows as $row){
	$total_record = $row ['numrows'];
	}
	$maxpage = ceil($total_record / $recordperpage);

	//$nav ="";
	$current = "";
	$current = $pagenum;
	$index_limit = 10;
	$start=max($current-intval($index_limit/2), 1);
    $end=$start+$index_limit-1;	 
	echo '<br /><br /><div class="pagination">';

        if($current==1) {
            echo '<span class="disabled">&lt; Previous</span>&nbsp;';
        } else {
            $i = $current-1;
            echo '<a href="'.$pagelink.'&page='.$i.'" class="prn" rel="nofollow" title="go to page'.$i.'">&lt; Previous</a>&nbsp;';
            echo '<span class="prn">...</span>&nbsp;';
        }
		
	  if($start > 1) {
            $i = 1;
            echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        for ($i = $start; $i <= $end && $i <= $maxpage; $i++){
            if($i==$current) {
                echo '<span class="current">'.$i.'</span>&nbsp;';
            } else {
                echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
            }
        }
		   if($maxpage > $end){
            $i = $maxpage;
            echo '<a href="'.$pagelink.'&page='.$i.'" title="go to page '.$i.'">'.$i.'</a>&nbsp;';
        }

        if($current < $maxpage) {
            $i = $current+1;
            echo '<span>...</span>&nbsp;';
            echo '<a href="'.$pagelink.'&page='.$i.'" class="prn" rel="nofollow" title="go to page '.$i.'">Next &gt;</a>&nbsp;';
        } else {
            echo '<span class="disabled">Next &gt;</span>&nbsp;';
        }
        
        //if nothing passed to method or zero, then dont print result, else print the total count below:
        if ($maxpage != 0){
            //prints the total result count just below the paging
			echo '<p id="total_count">(Viewing Page '.$pagenum.' of '.$maxpage.') | (Total '.$total_record.' Result (s))</p></div>';
        }
}
		
		
	}
class country_particular{
	private $connection;
	
	function get_province($id){
		$connection->connectTodatabase();
	$output="";
	$result_lgas= "select * from lgas  ";
	$result=$connect->retrieve($result_lgas);
	$rows=$connect->arrayFetch($result);
	 foreach($rows as $row){
		$output.='<option value="'.$row['lga_id'].'">'. $row['lga_name'].'</option>';
		}
		
		return $output;
	}
	
	
	function getPayments($id,$pck){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$querycount= "select member_id from payments where member_id='".$id."' and package_sub='".$pck."'";
	$result=$connection->retrieve($querycount);
	$count=$connection->numRows($result);
	 $output=$count*$pck;
		
		return number_format($output);
	}
	
	function getpendingPayments($id,$pck){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$querycountunqueued= "select unqueued_id from unqueued where paired_id='".$id."' ";
	$resultqueued=$connection->retrieve($querycountunqueued);
	$countqueued=$connection->numRows($resultqueued);
	 $output=$countqueued;
		
		return number_format($output);
		$connection->closeDatabase();
	}
	

function getPaymentstomake($id,$pck){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$querycountunqueued= "select unqueued_id from unqueued where member_id='".$id."'";
	$resultqueued=$connection->retrieve($querycountunqueued);
	$countqueued=$connection->numRows($resultqueued);
	 $output=$countqueued;
		
		return number_format($output);
		$connection->closeDatabase();
	}
	
	function get_chat_category(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from chat_category";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.='<option value="'.$row['chat_category_id'].'">'. $row['chat_category'].'</option>';
		}
		
		return $output;
	}
	
	function get_communities(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from keffes_communities";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.='<option value="'.$row['com_id'].'">'. ucwords($row['com_name']).'</option>';
		}
		
		return $output;
	}
	
	function pull_first_community(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from keffes_communities LIMIT 1";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row)
		$output.=' <li role="presentation" '.$this->showactivestatusfirst($_GET['comid']).'><a  href="com_projects?comid='.$row['com_id'].'"><i class="fa fa-angle-double-right" aria-hidden="true"></i> '.ucwords($row['com_name']).'</a></li>';
		
		
		
		return $output;
	}
	
	 function pull_communities_footer(){
		$firstvalue="";
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	
	
	$result_lgas= "select * from keffes_communities LIMIT 5";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.=' <li><a href="'.$connection->url().'community-projects/'.$this->get_single_community($row['com_id']).'/'.$row['com_id'].'" >'.ucwords($row['com_name']).'</a></li>';
		
		}
		
		return $output;
	}
	
	 
	 
	function pull_communities(){
		$firstvalue="";
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	
	$queryfirst= "select * from keffes_communities LIMIT 1";
	$resultfirst=$connection->retrieve($queryfirst);
	$rowsfirst=$connection->arrayFetch($resultfirst);
	foreach($rowsfirst as $rowfirst){
		$firstvalue.=$rowfirst['com_id'];
	}
	$result_lgas= "select * from keffes_communities where com_id !='".$firstvalue."'";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.=' <li role="presentation" '.$this->showactivestatus($_GET['comid'],$row['com_id']).'><a href="'.$connection->url().'community-projects/'.$this->get_single_community($row['com_id']).'/'.$row['com_id'].'" ><i class="fa fa-angle-double-right" aria-hidden="true"></i> '.ucwords($row['com_name']).'</a></li>';
		
		}
		
		return $output;
	}
	
	
	function showactivestatus($val,$val2){
		$output="";
		if(!empty($val)&& $val2==$val){
			
			$output.='class="active"';
		}
		else if(empty($val)&& $val2=$val){
			
			$output.='class="active"';
		}
		return $output;
	}
	
	function showactivestatusfirst($val){
		$output="";
		if(empty($val)){
			
			$output.='class="active"';
		}
		
		return $output;
	}
	
	
	function firstId(){
		
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
		
		$queryfirst= "select * from keffes_communities LIMIT 1";
	$resultfirst=$connection->retrieve($queryfirst);
	$rowsfirst=$connection->arrayFetch($resultfirst);
	foreach($rowsfirst as $rowfirst){
		$output.=$rowfirst['com_id'];
	}
	return $output;
	}
	
	
	function projects_in_community($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from projects where com_id={$val}";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row)
		//$output.='  <li><a href="project_detailed_Photo?projid='.$row['project_id'].'">'.$row['project_title'].' by <span style="font-weight:normal">'.$row['contractor'].'</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
		
		$output.='  <li><a href="'.$connection->url().'project/'.$this->get_single_community($val).'/'.$val.'/'.$row['project_id'].'/'.str_replace(' ', '-',$this->get_com_project_name($row['project_id'])).'">'.$row['project_title'].' by <span style="font-weight:normal">'.$row['contractor'].'</span><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
		
		
		return $output;
	}
	
	
	
	function pull_project_photo($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from project_photo where project_id={$val}";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.='  <div class="col-md-8 col-sm-12 co-xs-12 gal-item" style="float:left;width:50%">';
     $output.=' <div class="box">';
      $output.='  <a href="#" data-toggle="modal" data-target="#'.$row['photo_id'].'">';
       $output.='   <img src="'.$connection->url().'mgt-cpanel/project_photos/'.$row['filename'].'"  >';
       $output.=' </a>';
       $output.=' <div class="modal fade" id="'.$row['photo_id'].'" tabindex="-1" role="dialog">';
       $output.='   <div class="modal-dialog" role="document">';
       $output.='     <div class="modal-content">';
        $output.='        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
         $output.='     <div class="modal-body">';
         $output.='      <img src="'.$connection->url().'mgt-cpanel/project_photos/'.$row['filename'].'" >';
         $output.='     </div>';
          $output.='<div class="col-md-12 description">';
          $output.='<h4>'.$row['caption'].'</h4>';
           $output.='     </div>';
           $output.=' </div>';
         $output.=' </div>';
       $output.=' </div>';
     $output.=' </div>';
   $output.=' </div>';
		
	 }
		
		return $output;
	}
	
	function pull_gallery_photo(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from gallery order by photo_id DESC";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.='  <div class="col-md-8 col-sm-12 co-xs-12 gal-item" style="float:left;width:50%">';
     $output.=' <div class="box">';
      $output.='  <a href="#" data-toggle="modal" data-target="#'.$row['photo_id'].'">';
       $output.='   <img src="'.$connection->url().'mgt-cpanel/gallery/'.$row['filename'].'"  >';
       $output.=' </a>';
	   
       $output.=' <div class="modal fade" id="'.$row['photo_id'].'" tabindex="-1" role="dialog">';
       $output.='   <div class="modal-dialog" role="document">';
       $output.='     <div class="modal-content">';
        $output.='        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
         $output.='     <div class="modal-body">';
         $output.='      <img src="'.$connection->url().'mgt-cpanel/gallery/'.$row['filename'].'" >';
         $output.='     </div>';
          $output.='<div class="col-md-12 description">';
          $output.='<h4>'.$row['caption'].'</h4>';
           $output.='     </div>';
           $output.=' </div>';
         $output.=' </div>';
       $output.=' </div>';
     $output.=' </div>';
   $output.=' </div>';
		
	 }
		
		return $output;
	}
	
	function recent_project_photo(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from project_photo ";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		 
		$output.=' <div class="item">';
         $output.='    <div class="grid">';
           $output.='     <figure class="effect-sarah">';
             $output.='     <img src="'.$connection->url().'mgt-cpanel/project_photos/'.$row['filename'].'"  >';
               $output.='     <figcaption>';
                 $output.='       <h2>STATUS: <span>RECENT</span></h2>';
                    $output.='<p>'.$row['caption'].'</p>';
                  $output.='      <a href="project_list">View more</a>';
                 $output.='   </figcaption>   ';        
               $output.=' </figure>';
          $output.='  </div>';
               $output.='     </div> ';
		 
		 
		
		
	 }
		
		return $output;
	}
	
	
	
	function show_all_news(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$recordperpage = 5;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
	$query= "SELECT * FROM `news`  where status=1 order by news_id DESC limit $offset, $recordperpage";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
	
	
	
	 foreach($rows as $row){
		
		$output.=' <div class="main_blogpost_item">';
           $output.='  <div class="blog_image">';
                        $output.='            <img src="mgt-cpanel/news_photos/'. $row['filename'].'" alt="">';
                          $output.='          <div class="date">';
                           $output.='             <h5>'.$row['day'].' <span>'.$row['month'].'</span></h5>';
                             $output.='       </div>';
                             $output.='   </div>';
                              $output.='  <div class="main_blog_text">';
                               $output.='     <a href="#"><h2>'.$row['title'].'</h2></a>';
                               $output.='     <div class="blog_author_area">';
                                $output.='        <a href="#"><i class="fa fa-user"></i>By :  <span>Admin</span></a>';
                                 $output.='       <a href="#"><i class="fa fa-calendar"></i><span> '.$row['time_update'].'</span></a>';
                                 
                                  $output.='  </div>';
                                   $output.=' <p>'.strip_tags( substr($row['content'],0,250)).' </p>';
                                 $output.='  <a href="'.$connection->url().'news/'.$row['day'].'/'.$row['month'].'/'.$row['year'].'/'.str_replace(' ', '-',$row['title']).'/'.$row['news_id'].'" class="theme-btn btn-md hvr-bounce-to-right">Read more</a>';
                               $output.=' </div>';
                           $output.=' </div>';
		 
		 
		 
	
		 
		
		
	 }
	 
	
	 
	 
		return $output;
	}
	
	
	function show_news_detail($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$recordperpage = 5;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
	$query= "SELECT * FROM `news`  where news_id='".$val."'";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
	
	
	
	 foreach($rows as $row){
		
		$output.='  <div class="main_blogpost_item">';
                  $output.='<div class="blog_image">';
                   $output.='<img src="'.$connection->url().'mgt-cpanel/news_photos/'.$row['filename'].'" alt="">';
                    $output.=' <div class="date">';
                      $output.=' <h5>'.$row['day'].' <span>'.$row['month'].'</span></h5>';
                      $output.='               </div>';
                       $output.='          </div>';
                        $output.='         <div class="main_blog_text">';
                         $output.='            <a href="#"><h2>'.$row['title'].'</h2></a>';
                          $output.='           <div class="blog_author_area">';
                            $output.='             <a href="#"><i class="fa fa-user"></i>By :  <span>Admin</span></a>';
                             $output.='            <a href="#"><i class="fa fa-calendar"></i><span>'.$row['time_update'].'</span></a>';
                                       
                              $output.='       </div>';
                                $output.=$row['content'];
                              $output.='   </div>';
                           $output.='  </div>';
		 
		 
		 
	
		 
		
		
	 }
	 
	
	 
	 
		return $output;
	}
	
	
	
	
	function show_news_title($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$query= "SELECT * FROM `news`  where news_id='".$val."'";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
	
	
	
	 foreach($rows as $row){
		
		$output.=$row['title'];
		
	 }
	 
		return $output;
	}
	
	function show_news_highlight(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$recordperpage = 5;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
	$query= "SELECT * FROM `news`  where status=1 order by news_id DESC limit 3";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
	
	
	
	 foreach($rows as $row){
		
		
		 
	$output.='<div class="col-md-4 col-sm-4 col-xs-12">';
                       $output.=' <div class="service_box_item">';
                          $output.='  <a href="business.html" class="service_image">';
                            $output.='    <img src="mgt-cpanel/news_photos/'.$row['filename'].'" alt="">';
                           $output.=' </a>';
                           $output.=' <div class="service_text">';
                            $output.='    <a href="#"><h4>'.$row['title'].'</h4></a>';
                             $output.='   <p>'.strip_tags( substr($row['content'],0,110)).'</p>';
                              $output.='  <a class="theme-btn btn-md hvr-bounce-to-right" href="'.$connection->url().'news/'.$row['day'].'/'.$row['month'].'/'.$row['year'].'/'.str_replace(' ', '-',$row['title']).'/'.$row['news_id'].'" >Read more</a>';
                          $output.='  </div>';
                       $output.=' </div>';
                   $output.=' </div>';
		 
		
		
	 }
	 
	
	 
	 
		return $output;
	}
	
	function recent_news_post(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$recordperpage = 5;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;
	$query= "SELECT * FROM `news`  where status=1 order by news_id DESC limit 4";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
	
	
	
	 foreach($rows as $row){
		
		
		 
	$output.='<div class="recent_item">';
                                $output.=' <a href="'.$connection->url().'news/'.$row['day'].'/'.$row['month'].'/'.$row['year'].'/'.str_replace(' ', '-',$row['title']).'/'.$row['news_id'].'" ><h4>'.ucwords($row['title']).'</h4></a>';
                                 $output.='<h5> <i class="fa fa-calendar"></i> '.$row['time_update'].'</h5>';
                                 $output.=' </div>';
		 
		
		
	 }
	 
	
	 
	 
		return $output;
	}
	
	
	function pull_executives(){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$query= "SELECT * FROM `executives`";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
	
	 foreach($rows as $row){
		
	$output.='<div class="col-md-3">
                    <div class="team-member">
                        <figure class="effect-zoe">
                            <div class="team-photo">
                                <img src="mgt-cpanel/executives_photo/'.$row['filename'].'" alt="">
                            </div>
                            <div class="team-attrs">
                                <div class="team-name font-accident-two-bold-italic">'.ucwords($row['exec_name']).'</div>
                                <div class="team-position">'.ucwords($row['position']).'('.ucwords($row['exec_com']).')</div>
                            </div>
                            
                            
                        </figure>
                    </div>
                    <div class="dividewhite4"></div>
                </div>';
		
	 }
	 
		return $output;
	}
	
	
	
	function get_single_community($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from keffes_communities where com_id={$val}";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.=$row['com_name'];
		}
		
		return $output;
	}
	
	function get_com_project_name($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from projects where project_id={$val}";
	$result=$connection->retrieve($result_lgas);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.=$row['project_title'];
		}
		
		return $output;
	}
	
	function get_project_count($val){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$result_lgas= "select * from project_photo where project_id={$val}";
	$result=$connection->retrieve($result_lgas);
	$num=$connection->numRows($result);
	
	
		$output.=$num;
		
		
		return $output;
	}
	function get_expert_count($id){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$countresult= "select * from experts_info where specialization='".$id."'  ";
	$countresult=$connection->retrieve($countresult);
	$num=$connection->numRows($countresult);
	 
		$output.='('.$num.')';
		
		
		return $output;
	}
	
	function get_agricexpert_count($id){
		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
	$output="";
	$countresult= "select * from experts_info where agoption='".$id."'  ";
	$countresult=$connection->retrieve($countresult);
	$num=$connection->numRows($countresult);
	 
		$output.='('.$num.')';
		
		
		return $output;
	}
	
function pagination($query,$per_page=2,$page=1,$url='?'){ 

		$connection =new connection();
		$connection->connectTodatabase();
		$connection->selectDatabase();
		$total="";
	
    
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
	$result=$connection->retrieve($query);
	$rows=$connection->arrayFetch($result);
    //$row = mysqli_fetch_array(mysqli_query($conDB,$query));
	foreach($rows as $row){
    $total = $row['num'];
	}
    $adjacents = "2"; 
     
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
	$lastlabel = "Last &rsaquo;&rsaquo;";
     
    $page = ($page == 0 ? 1 : $page);  
    $start = ($page - 1) * $per_page;                               
     
    $prev = $page - 1;                          
    $next = $page + 1;
     
    $lastpage = ceil($total/$per_page);
     
    $lpm1 = $lastpage - 1; // //last page minus 1
     
    $pagination = "";
    if($lastpage > 1){   
        $pagination .= "<ul class='pagination'>";
        
             
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
             
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
            }
         
        } elseif($lastpage > 5 + ($adjacents * 2)){
             
            if($page < 1 + ($adjacents * 2)) {
                 
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                     
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                 
            } else {
                 
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
            }
        }
         
            if ($page < $counter - 1) {
				$pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
				$pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
			}
         $pagination .= "<li class='page_info'><br/>Page {$page} of {$lastpage}</li>";
        $pagination.= "</ul>";        
    }
     
    return $pagination;
}
	
	
	function getStates(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	$output="";
	$result_states= "SELECT * FROM `states` ";
	$result=$connection->retrieve($result_states);
	$rows=$connection->arrayFetch($result);
	 foreach($rows as $row){
		$output.='<option value="'.$row['states_id'].'">'. ucwords(strtolower($row['states_name'])).'</option>';
		}
		
		return $output;
	}
	
	public function get_exams(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM exam ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['exam_id'].'>'.$rowthread['name'].'</option>';
		}
		
		return $output;
	}   
	
	public function getclass2(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM class ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['class_id'].'>'.$rowthread['name'].'</option>';
		}
		
		return $output;
	}   
	
	public function getpersonalclass($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT class_id
FROM student_detail_track where student_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['class_id'].'>'.$this->showclass($rowthread['class_id']).'</option>';
		}
		
		return $output;
	}  

public function get_personal_exams($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM exam where exam_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['exam_id'].'>'.$rowthread['name'].'</option>';
		}
		
		return $output;
	}   	
	
	public function get_personal_examsopt($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM exam where exam_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['name'];
		}
		
		return $output;
	}   	
	
	public function get_student_name($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM student where student_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['name'];
		}
		
		return $output;
	}   	
	
	
	public function show_all_student_name(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *FROM student";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['name'].",";
		}
		
		return $output;
	}   	
	
	
	public function getpersonalexam($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT exam_id
FROM student_detail_track where student_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['exam_id'].'>'.$this->get_personal_exams($rowthread['exam_id']).'</option>';
		}
		
		return $output;
	}   
	
	public function get_selected_subject($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT * FROM subject where class_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.='<option value='.$rowthread['subject_id'].'>'.$rowthread['sub_name'].'</option>';
		}
		
		return $output;
	}   
	
	
	public function get_subject_name($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT * FROM subject where subject_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['subject_id'].'>'.$rowthread['sub_name'].'</option>';
		}
		
		return $output;
	}   
	
	public function get_timetable_subject($val,$val1,$val3,$val4){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT * FROM timetable  where day_id='".$val."' and class_id='".$val1."' and type='".$val4."'";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$this->get_subject_name($rowthread[$val3]);
		}
		
		return $output;
	}   
	
	
	
	public function childrencount($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM relationship where parent_id='".$val."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	$count=$connection->numRows($resultthread);
	
	
		$output.=$count;
		
		
		return $output;
	}   
	
	
	public function getstudentca($val1,$val2,$val3){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM mark where student_id='".$val1."' and exam_id='".$val2."' and subject_id='".$val3."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['ca'];
		}
		
		return $output;
	}   
	
	
	public function remarks($val){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM grade where mark_from <='".$val."' and mark_upto >='".$val."'";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['grade_point'];
		}
		
		return $output;
	}  
	
	
	
	public function getstudentexamscore($val1,$val2,$val3){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM mark where student_id='".$val1."' and exam_id='".$val2."' and subject_id='".$val3."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['examscore'];
		}
		
		return $output;
	}   
	
	public function get_threadcategory(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM `thread_category`";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.='<option value="'.$rowthread['thread_id'].'">'.$rowthread['thread'].'</option>';
		}
		
		return $output;
	}
	
	public function get_trendingthread(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM `trending_thread` left join thread_category using(thread_id) ORDER BY trending_thread_id DESC";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.='<a href="order-filter?filid='.$rowthread['thread_id'].'"><table class="hover-cover" width="100%" Halign="left"><tr>
        <td>
        <div class="CommodityList">'.$rowthread['thread'].'
		
        </div>
      </td></tr></table></a>';
		}
		
		return $output;
	}
	
	 
 public function get_experts_group(){
		$connection =new connection();
		$expertcount=new country_particular();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM chat_category ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.='<a href="expertask?catid='.$rowthread['chat_category_id'].'"> <table class="hover-cover" width="100%">
        <tr>
        <td>
        <div class="CommodityList">
      '.ucwords($rowthread['chat_category'])." "."<span style=\" font-weight:normal;color:#090;font-size:12px\">".$expertcount->get_expert_count($rowthread['chat_category_id']).'</span></div>
      </td></tr></table></a>';
		}
		
		return $output;
	}       
	
	
	public function get_experts_group_select(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM experts_category ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['category_id'].'>'.$rowthread['category'].'</option>';
		}
		
		return $output;
	}   
	
	public function get_faculty(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM faculties ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['fac_id'].'>'.$rowthread['faculty'].'</option>';
		}
		
		return $output;
	}   
	
	
	
	public function get_experts_sector_select(){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM chat_category ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=' <option value='.$rowthread['chat_category_id'].'>'.$rowthread['chat_category'].'</option>';
		}
		
		return $output;
	}   
	
	
	public function get_country_name($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM countries where country_id='".$id."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['country_name'];
		}
		
		return $output;
	}   
	public function showclass($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM class where class_id='".$id."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['name'];
		}
		
		return $output;
	}   
	
	public function showteacher($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM teacher where teacher_id='".$id."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['name'];
		}
		
		return $output;
	}   
	
	public function showteacher_class($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM class where teacher_id='".$id."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['name'];
		}
		
		return $output;
	}   
	
	public function showMother($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT * FROM parent left join relationship using (parent_id) where student_id='".$id."' and type='mother' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=ucwords($rowthread['name']);
		}
		
		return $output;
	}   
	public function showFather($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT * FROM parent left join relationship using (parent_id) where student_id='".$id."' and type='father' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=ucwords($rowthread['name']);
		}
		
		return $output;
	} 
public function showsiblings($id){
	$classdetail=new country_particular();
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT * FROM parent left join relationship using (parent_id) where student_id='".$id."' and type='mother' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
		///////////////////////get mother id here ///////////////////////////////////////////////////////////////////////////////////////
	$result_thread_parent="SELECT * FROM relationship where parent_id='".$rowthread['parent_id']."' and student_id !='".$id."'  ";
	
	$resultthreadparent=$connection->retrieve($result_thread_parent);
	$rowsthreadparent=$connection->arrayFetch($resultthreadparent);
	foreach($rowsthreadparent as $rowthreadparent){
	$result_thread_student="SELECT * FROM student where student_id='".$rowthreadparent['student_id']."'  ";
	$resultthread=$connection->retrieve($result_thread_student);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
		$output.='<i class="icon-user"></i>'.ucwords($rowthread['name']).' '.'<br/><b>sex</b> :'.$rowthread['sex'].' '.'<br/><b>class</b> :'.$classdetail->showclass($rowthread['class_id']).'<br/>';
	}
	}
		}
		
		return $output;
	}   
	
	public function get_realexp_name($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM experts_info where expert_id='".$id."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
	$namequery="SELECT firstname, surname
FROM profile where user_id='".$rowthread['user_id']."' ";
$nameresult=$connection->retrieve($namequery);
	$rowsquery=$connection->arrayFetch($nameresult);
	foreach($rowsquery as $rowquery){

		$output.=$rowquery['firstname']." ".$rowquery['surname'];
	}
		}
		
		return $output;
	}   
	
	public function get_realclient_name($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	
	
	$namequery="SELECT firstname, surname
FROM profile where user_id='".$id."' ";
$nameresult=$connection->retrieve($namequery);
	$rowsquery=$connection->arrayFetch($nameresult);
	foreach($rowsquery as $rowquery){

		$output.=$rowquery['firstname']." ".$rowquery['surname'];
	}
		
		
		return $output;
	}   
	
	
	public function get_state_name($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="SELECT *
FROM states where states_id='".$id."' ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	
		$output.=$rowthread['states_name'];
		}
		
		return $output;
	}   
	
	
	public function online_status_check($id){
		$connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
		
	$output='';
	$result_thread="select online_status from users where user_id='".$id."'  ";
	$resultthread=$connection->retrieve($result_thread);
	$rowsthread=$connection->arrayFetch($resultthread);
	foreach($rowsthread as $rowthread){
	if($rowthread['online_status']>0){
		
		$output.='<span style="background-color:#090; color:#FFF; font-weight:bold; border-radius:3px; padding:2px; font-size:10px">Online</span>';
		
		}else{
			
			$output.=' <span style="background-color:#F00; color:#FFF; font-weight:bold; border-radius:3px; padding:2px; font-size:10px">Offline</span>';
			}
		}
		
		return $output;
	}   
	
	 function EscapeStrings($string){
		 $connection =new connection();
		$connection->connectTodatabase();
		 $connection->selectDatabase();
	
	$val = mysqli_real_escape_string($connection,$string);
	return $val;
}    
	
	}
	
	class msgresponse {
		
		public  function errormsg($message){
			
			$output='';
			
			$output.='<div class="errormsg">
										<button class="close" data-dismiss="alert">&times;</button>
										<strong>Error!</strong>'.$message.'
									</div>';
									return $output;
			
			
			}
			
			
			public  function successmsg($message){
			
			$output='';
			
			
			
			$output.='<div class="alert alert-success">
										<button class="close" data-dismiss="alert">&times;</button> '.$message.'
									</div>';
									return $output;
			
			
			}
		
		
		
		
		}
		
		
		class news{

var $emptyMessage='<tr ><td colspan="6"><div class="alert">
										<button class="close" data-dismiss="alert">&times;</button>
										<strong>Sorry!</strong> There  is no news available yet.
									</div></td></tr>';	
                                    
                        function get_news(){
							$connect =new connection();
                                  $news_list=array();
								  
                                   $result=ExecuteQuery("SELECT * FROM `news_update` ");
								$news_count= $connect->numRows ($result);
								
								if($news_count<1){
									
									
								return $this->emptyMessage;	
									
									
									}
									else{
								   
								   while($news=SqlArray($result)){
									   
									 $news_list[]=$news;
									   
									   }
									   
									return $news_list;   

									}
                                    
                                    }







		}

	?>