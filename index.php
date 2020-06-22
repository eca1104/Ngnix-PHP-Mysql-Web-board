<html>
<head>
</head>
<body>

<?php
session_start();

if(!isset($_SESSION['userid'])){
echo "<a href=\"login.php\">Login PAGE</a><br>";
echo "<a href=\"signup.php\">SignUp PAGE</a><br>";
}
if(isset($_SESSION['userid'])){
echo "<a href=\"write.php\">WRITE PAGE</a><br>";
echo "<a href=\"list.php\">LIST PAGE</a><br>";
echo "<a href=\"logout.php\">Logout</a>";
}
 ?>
</body>
</html>
