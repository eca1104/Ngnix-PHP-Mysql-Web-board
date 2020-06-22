<?php
require_once("./connect.php");
?>
<table border="1">
        <thead>
        <tr>
        <th>No</th>
        <th>Title</th>
        <th>Date</th>
        <th>Hit</th>
        </tr>
        </thead>
<tbody><tr>
<?php
#=======================Sort===========================
$sort=$_GET['sort'];
if(!isset($_GET['page']) || $_GET['page']==NULL)
$page=1;
else{
        $page=$_GET['page'];
}
$before=10*($page-1);
if($sort=='desc'){
$sql="select * from board order by no desc limit $before,10";
$res=mysqli_query($connect,$sql) or die("Error");
}
if($sort=='asc'){
$sql="select * from board order by no asc limit $before,10";
$res=mysqli_query($connect,$sql) or die("Error");
}
else{
  $sql="select * from board order by no desc limit $before,10";
  $res=mysqli_query($connect,$sql) or die("Error");
}
#=======================Search===========================
$search=$_GET['search'];
$catgo=$_GET['catgo'];

if($search!=NULL){
$sql="select * from board where $catgo like '%$search%' order by no desc limit $before,10 ";
$res=mysqli_query($connect,$sql) or die("Error");
}

while($row=mysqli_fetch_assoc($res)){
        $tt=$row['title'];
        $str=substr($tt,0,42);
        $row['date']=explode(' ',$row['date'])[0];
        echo "<tr>";
        echo "<td>{$row['no']}</td>";
        echo "<td><a href=\"./view.php?no={$row['no']}\">$str</a></td>";
        echo "<td>{$row['date']}</td>";
        echo "<td>{$row['hit']}</td>";
        echo "</tr>";
}
?>
</tbody>
<form method="get" action="./list.php">
Desc<input type="radio" name="sort" value="desc"> ASC<input type="radio" name="sort" value="asc">
<input type="submit" name="form" value="Apply"/>
</form>
</table>
<ul>
<?php
$sql="select count(*) from board";
$result=mysqli_query($connect,$sql) or die(mysqli_error($connect));
$total_page=((mysqli_fetch_row($result)[0])/10)+1;
for($i=1;$i<$total_page;$i++){
        echo "<li><ol><a href='./list.php?page=$i'\"> $i</a></ol></li>";
}
?>
</ul>
<br>
<form action="list.php" method="get">
  <select name="catgo">
          <option value="title">제목</option>
        </select>
        <input type="text" name="search" size="40" required="required"/> <button>검색</button>
</form>


<button type="button"onclick="location.href='./write.php'">글쓰기</button></p>
