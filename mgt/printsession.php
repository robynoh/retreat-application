<?php
require_once("../class/class.php");

  $connect =new connection(); 
$connect->connectTodatabase();
$connect->selectDatabase();

$sql="SELECT * FROM member where session='".$_GET['session']."' order by member_id DESC";
$results=$connect->retrieve($sql);
$rows=$connect->arrayFetch($results);

$file_name ="all_".$_GET['session']."_members.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");            
                      
?>

<table class="table table-striped" style="font-size:14px">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Position</th>
  
	   <th scope="col">Session</th>
	
	  
	   
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row){ ?>
  
    <tr><a href="">
      <td width="5%"></td>
    
      <td><b><?php echo ucwords($row['lastname']); ?> <?php echo ucwords($row['firstname']); ?></b></td>
     <td><?php echo ucwords($row['position']); ?></td>
	  <td><?php echo $row['session']; ?></td>
	  
	   
	  
   </a> </tr>
	
  <?php }?>
  </tbody>
</table>