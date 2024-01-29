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

$sql="SELECT * FROM member where session='".$_GET['session']."' order by member_id DESC";
$results=$connect->retrieve($sql);
$rows=$connect->arrayFetch($results);


if(isset($_POST['mark'])){
	
	if(empty($_POST['applicant'])){
		
		$msg="Please select an attendee to mark register.";
	
	}else{
		
		
		foreach($_POST['applicant'] as  $key => $val){
			
			if($_GET['day']==1){
			
			 $query="update member set day1=1 where member_id='".$_POST['applicant'][$key]."'";
	         $connect->insertion($query);
	
		 }
		 
		 if($_GET['day']==2){
			
			 $query="update member set day2=1 where member_id='".$_POST['applicant'][$key]."'";
	         $connect->insertion($query);
	
		 }
		 
		 if($_GET['day']==3){
			
			 $query="update member set day3=1 where member_id='".$_POST['applicant'][$key]."'";
	         $connect->insertion($query);
	
		 }
			}
			

		header('location:'.$_SERVER['PHP_SELF'].'?day='.$_GET['day'].'&session='.$_GET['session']);
		}
		
		
		
		
	}
	
	
	if(isset($_POST['unmark'])){
	
	if(empty($_POST['applicant'])){
		
		$msg="Please select an attendee to unmark in attendance.";
	
	}else{
		
		
		foreach($_POST['applicant'] as  $key => $val){
			
			if($_GET['day']==1){
			
			 $query="update member set day1=0 where member_id='".$_POST['applicant'][$key]."'";
	         $connect->insertion($query);
	
		 }
		 
		 if($_GET['day']==2){
			
			 $query="update member set day2=0 where member_id='".$_POST['applicant'][$key]."'";
	         $connect->insertion($query);
	
		 }
		 
		 if($_GET['day']==3){
			
			 $query="update member set day3=0 where member_id='".$_POST['applicant'][$key]."'";
	         $connect->insertion($query);
	
		 }
			}
			

		header('location:'.$_SERVER['PHP_SELF'].'?day='.$_GET['day'].'&session='.$_GET['session']);
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
	header('location:all_members');
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
                        <div class="panel-title">Attendance</div>
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


 <form id="loginform" action="" class="form-horizontal" role="form" method="POST">
                                    <div class="col-sm-12 controls">
									
                                  <!--    <a  onclick="showBox();" id="send" href="javascript:void(0);" class="btn btn-success">Send SMS </a>-->
									
									 <a onclick="hideBox();" id="hide" href="javascript:void(0);" class="btn btn-success" style="display:none">Close Box </a>
									 <span style="font-size:30px"> Day <?php echo $_GET['day']; ?> <?php echo $_GET['session']; ?> session</span>
									  <br/> <br/>
									
						 <a href="attenders" class="btn btn-primary">Go back </a>	<button name="mark" type="submit" class="btn btn" >Mark as Present </button>
						 <button name="unmark" type="submit" class="btn btn-danger" >Unmark</button>
									
									   <!--<button name="delete" id="btn-login" href="#" class="btn btn-danger">Delete </button>--!>
									  <span style="float:right">  <input type="checkbox" name="applicant[]" class="input border mr-2" id="checkAll" value="" > Select All</span>
                                      <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> -->

                                    </div>
									<br/><br/>
									 <!--<div id="msgbox" style="display:none">
									
									<textarea name="textarea"
   rows="5" style="width:100%" required></textarea>
   <?php //if(isset($_GET['status']) && $_GET['status']=='sent'){?>
									<a href="all_members?status=refresh" class="btn btn-primary">Refresh </a>
									
									<?php //}else{?>
									<button name="send" id="send" class="btn btn-success" style="float:right">Send SMS </button>
									<?php //}?>
									</div>-->
									
									
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
      <td width="5%"><input type="checkbox" name="applicant[]" class="" id="" value="<?php echo $row['member_id']; ?>" <?php if($row['day'.$_GET['day']]==1){?>disabled> <?php }?></td>
    
      <td><b><?php echo ucwords($row['lastname']); ?> <?php echo ucwords($row['firstname']); ?></b></td>
    
	  <td><?php echo $row['phone']; ?></td>
	  
	    <td><?php echo $row['position']; ?></td>
	  <td> <?php if($row['day'.$_GET['day']]==1){?><img src="icon/success.png" alt="" class="img-circle img-responsive" width="20px"><?php }?></td>
	  <td><a href="view_members?id=<?php echo $row['member_id'] ?>">View</a></td>
   </a> </tr>
	
  <?php }?>
  </tbody>
</table>
									
		 </form>							
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