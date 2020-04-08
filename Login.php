<?php
include('connect.php');
$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = "SELECT * FROM Account WHERE Username='$Username' AND Password='$Password'";
$result = mysqli_query($conn,$sql);
$loggedin = 0;
while ($row = mysqli_fetch_array($result))
	{
		$Account_Type = $row[4];
		$Username = $row[2];
		echo"Welcome back $Username";
		$_SESSION['Username'] = $Username;
		$_SESSION['Account_Type'] = $Account_Type;
		$loggedin = 1;	
	 if (isset($_SESSION['Username']))
	{
		$Username = $_SESSION['Username'];
		$Account_Type = $_SESSION['Account_Type'];
		//header("location:Homepage.php");
	}	
	}
if ($loggedin == 0)
{
	
		echo"Invalid Login or Password<br/>";
		echo"<a href='LoginPage.php'>Click Here</a> to try again";
}
?>