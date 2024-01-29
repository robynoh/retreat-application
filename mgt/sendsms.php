<?php 
ob_start();
  // Database
  require_once("../class/class.php");

  $connect =new connection(); 
$connect->connectTodatabase();
$connect->selectDatabase();
$msg="";

$recordperpage = 500;
	$pagenum = 1;
	if(isset($_GET['page'])){
	$pagenum = $_GET['page'];
	}
	$offset = ($pagenum - 1) * $recordperpage;

$sql="SELECT * FROM member order by member_id DESC limit $offset, $recordperpage";
$results=$connect->retrieve($sql);
$rows=$connect->arrayFetch($results);


if(isset($_POST['sendmsg'])){
	
	if(empty($_POST['applicant'])){
		
		$msg="Please select atleast one attendee to send SMS to.";
	
	}else{
		
		
		foreach($_POST['applicant'] as  $key => $val){
			
			
			
			$sql="SELECT * FROM `member` WHERE member_id='".$_POST['applicant'][$key]."'";
			$results=$connect->retrieve($sql);
			$rows=$connect->arrayFetch($results);
			foreach($rows as $row){
				
				 $connect->CURLsendsms($row['phone'],$row['prefname'],$_POST['message']);
				 $sql="update member set send_status=1 where member_id=".$_POST['applicant'][$key];
				$result=$connect->insertion($sql);	
				
			}
		
		//ExecuteQuery("update news_update set status=1 where update_id='".$_POST['news'][$key]."'");
		header('location:sendsms?status=sent');
		}
		
		
		
		
	}
	
	
	
}

 if(isset($_POST['delete'])){
	 
	 
	if(empty($_POST['applicant'])){
		
		$msg="Please select a member to delete.";
	
	}else{
		
			foreach($_POST['applicant'] as  $key => $val){
				
				$sql="delete from member where member_id=".$_POST['applicant'][$key];
				$result=$connect->insertion($sql);
				header('location:all_student?status=deleted');
				
			}
	} 
	 
 } 
 

 
 if(isset($_GET['status'])&& $_GET['status']=='deleted'){
	 
	 $msg="<span style=\"color:#090\">Member Deleted successfully</span>";
 }
 
 if(isset($_GET['status'])&& $_GET['status']=='sent'){
	 
	 $msg="<span style=\"color:#090\">SMS Sent Sucessfully</span>";
 }
 
 if(isset($_GET['status'])&& $_GET['status']=='refresh'){
	 
	$sql="update member set send_status=0";
	$result=$connect->insertion($sql);
	header('location:sendsms');
 }
  
?>
 
 <title>Applicants</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div style="text-align:center;font-weight:bold">
	
	<?php if(mysqli_num_rows($results)>0){ 
	
	 $connect->Pages_admin("SELECT COUNT(member_id) AS numrows FROM `member`  ",$recordperpage,$pagenum,"all_members?get");?>

<?php }?>
	
	</div>
<br/>
 <div style="text-align:center;color:#ff0000;font-weight:bold"> <?php echo $msg; ?></div>
      <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">All Members</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                           
                       
                                    
                           
                                
                          <!--   <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>-->
                                    

                                
                           


                                <div style="" class="form-group">
								
								
                                    <!-- Button -->



                                    <div class="col-sm-12 controls">
									<span style="font-size:30px">Send SMS</span><BR/>
                                  <!--    <a  onclick="showBox();" id="send" href="javascript:void(0);" class="btn btn-success">Send SMS </a>-->
									
									 <a href="all_members" class="btn btn-primary" >Go back </a>
									<?php if(isset($_GET['status'])&& $_GET['status']=='sent'){ ?>
									<a href="sendsms?status=refresh" class="btn btn-warning" >Refresh </a><?php }?>
									  <span style="float:right">  <input type="checkbox" name="applicant[]" class="input border mr-2" id="checkAll" value="" > Select All</span>
									  <br/> <br/>
									  
									
                                    </div>
									<br/><br/>
									 <div id="msgbox" >
									<form method="POST" action="">
									<textarea name="message"
   rows="5" style="width:100%" placeholder="type message here"  required></textarea>
   
									<button name="sendmsg" type="submit" id="send" class="btn btn-success" style="float:right">Send SMS </button>
								
									</div>
									
									
									<table class="table table-striped" style="font-size:14px">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
  
	   <th scope="col"></th>
	
	  
	   <th scope="col"></th>
	    <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row){ ?>
  
    <tr><a href="">
      <td width="5%"><input type="checkbox" name="applicant[]" class="" id="" value="<?php echo $row['member_id']; ?>" <?php if($row['send_status']==1){?>disabled> <?php }?></td>
    
      <td><b><?php echo ucwords($row['lastname']); ?> <?php echo ucwords($row['firstname']); ?></b></td>
    
	  <td><?php echo $row['phone']; ?></td>
	  
	    <td><?php echo $row['position']; ?></td>
	  <td> <?php if($row['send_status']==1){?><img src="icon/success.png" alt="" class="img-circle img-responsive" width="20px"><?php }?></td>
	  <td><a href="view_members?id=<?php echo $row['member_id'] ?>">View</a></td>
   </a> </tr>
	
  <?php }?>
  </tbody>
</table>
									
									
                                </div>


                              
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="passwd" placeholder="Password">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Invitation Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="button" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                        <span style="margin-left:8px;">or</span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>
                                
                                
                                
                           
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    

</body>
</html>
<script>


$("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });

function showBox(){
	
	$('#msgbox').show();
	$('#hide').show();
	$('#send').hide();
	
}

function hideBox(){
	
	$('#msgbox').hide();
	$('#hide').hide();
	$('#send').show();
	
}
</script>