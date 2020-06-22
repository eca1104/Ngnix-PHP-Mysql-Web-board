<?php
require_once("./connect.php");
$no = $_GET['no'];
$sql = "select * from board where no=$no";
$res=mysqli_query($connect,$sql) or die("Select Query Error");
$row = mysqli_fetch_assoc($res);
?>

<html>
<form method="post" action="./modify_ok.php">
<h1>Write Board</h1>
<label>ID</label>
<input name="id" type="text" value="<?php echo $_SESSION['userid'];?>">
<label>Date</label>
<input name="id" type="text" value="<?php echo $row['date'];?>">
<label>HIT</label>
<input name="id" type="text" value="<?php echo $row['hit'];?>">
<label>Title</label>
<input name="title" type="text" value="<?php echo $row['title'];?>">
<label>Content</label>
<input name="content" type="text" value="<?php echo $row['content'];?>" >
<input type="hidden" name="no" value="<?php echo $no;?>">
<input type="file" name="file"/><br/>
<button type="submit" name="form">Modify</button>
</form>
<html>
