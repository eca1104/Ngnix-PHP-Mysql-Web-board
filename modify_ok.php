<?php
require_once("./connect.php");
$no=$_POST['no'];
$title=$_POST['title'];
$content=$_POST['content'];
$dir = "./upload/";
$file = $_FILES['file']['name'];
$file_hash = $date.$_FILES['file']['name'];
$file_hash = md5($file_hash);
$upfile = $dir.$file_hash;
$date=date('Y-m-d H:i:s');
$hit=0;


if($title==NULL || $content==NULL){
        echo "Uh..oh..Null or Filtering";
        header("Refresh:2; url=modify.php");
        exit;
}

if(is_uploaded_file($_FILES['file']['tmp_name']))
    {
            if(!move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
            {
                    echo "upload error";
                    exit;
            }
    }


$sql="update board set title='$title',content='$content',date='$date',hit='$hit',hash='$file_hash' where no='$no'";
$res=mysqli_query($connect,$sql) or die(mysqli_error($connect));
echo "<script>alert('Modify OK')</script>";
echo "<script>location.replace(\"./view.php?no=$no\")</script>";

?>
