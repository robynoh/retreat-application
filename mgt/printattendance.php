<?php
require_once("../class/class.php");

  $connect =new connection(); 
$connect->connectTodatabase();
$connect->selectDatabase();

$sql="SELECT * FROM member where session='".$_GET['session']."' order by member_id DESC";
$results=$connect->retrieve($sql);
$rows=$connect->arrayFetch($results);

$file_name ="attendane_for_".$_GET['session']." session.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file_name");            
                      
?>

<table class="table table-striped" style="font-size:14px">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Position</th>
  
	   <th scope="col">Day 1</th>
	
	  
	   <th scope="col">Day 2</th>
	    <th scope="col">Day 3</th>
		
    </tr>
  </thead>
  <tbody>
  <?php foreach($rows as $row){ ?>
  
    <tr>
     
      <td><b><?php echo ucwords($row['lastname']); ?> <?php echo ucwords($row['firstname']); ?></b></td>
    
	  
	  
	    <td><?php echo $row['position']; ?></td>
		 <td style="color:#090"><?php if($row['day1']==1){echo "Present";}else{ echo'Absent' ;} ?></td>
		  <td style="color:#090"><?php if($row['day2']==1){echo "Present";}else{ echo'Absent' ;} ?></td>
		   <td style="color:#090"><?php if($row['day3']==1){echo "Present";}else{ echo'Absent' ;} ?></td>
	
	
    </tr>
	
  <?php }?>
  </tbody>
</table>