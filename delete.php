<?php
require_once("./connect.php");
session_start();
$no = $_GET['no'];
if(!isset($_SESSION['userid'])){

echo "<script>alert('Access denied')</script>";
echo "<script>location.replace(\"./view.php?no=$no\")</script>";

}
else{
$sql="delete from board where no=$no";
$res=mysqli_query($connect,$sql) or die(mysqli_error($connect));
$sql="alter table board auto_increment=1";
$res=mysqli_query($connect,$sql) or die(mysqli_error($connect));
echo "<script>alert('Delete OK')</script>";
echo "<script>location.replace('./list.php')</script>";
}
 ?>
