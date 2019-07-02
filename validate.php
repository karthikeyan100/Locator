<?php
session_start();
if(!isset($_POST["gid"]))
{echo "<script>window.location.href='index.php';</script>";}
$x=$_POST["gid"];
$y=$_POST["password"];
$con=mysqli_connect("localhost","id8665240_kalamsdream","allama","id8665240_locate");
$smt=$con->prepare("select * from users where gid=? and password=?");
$smt->bind_param('ss',$x,$y);
$smt->execute();
$rst=$smt->get_result();
if($rst->fetch_assoc())
{
	$_SESSION['gid']=$x;
	echo "<script>window.location.href='login.php';</script>";
}
else{
	echo '<script>alert("Invalid credentials");</script>';
	echo "<script>window.location.href='index.php';</script>";
}
?>
