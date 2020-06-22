<?php
require_once("./connect.php");
$no = $_GET['no'];
$sql = "update board set hit=hit+1 where no=$no";
mysqli_query($connect,$sql) or die (mysqli_error($connect));
$sql = "select * from board where no=$no";
$res=mysqli_query($connect,$sql) or die("Select Query Error");
$row = mysqli_fetch_assoc($res);

?>

<h4><strong>View Table</strong></h4>
<table border="1">
<thead>
<tr>
<th><?php echo $row['title'];?></th>
<th><?php echo $row['date'];?></th>
<th><?php echo $row['hit'];?></th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $row['content'];?></td>
</tr>
<tr>
<th><p align="right"><button type="button" onclick="location.href='./modify.php?no=<?php echo $no;?>'">Modify</button></p></th>
<th><p align="right"><button type="button" onclick="location.href='./delete.php?no=<?php echo $no;?>'">Delete</button></p></th>
<th><p align="right"><button type="button" onclick="location.href='./list.php'">List</button></p></th>
</tr>
</tbody>
</table>
