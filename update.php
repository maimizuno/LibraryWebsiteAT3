<?php
	include("includes/header.php");
	require_once('includes/mysqli_connect.php'); //function called

if(isset($_POST['update']))
{
	$userEmail = $_POST["txtUserEmail"];
	$currentPassword = $_POST["txtCurrentPassword"];
	$newPassword = $_POST["txtNewPassword"];

$query="SELECT * FROM accounts WHERE (userEmail = '$userEmail' AND userPassword = SHA('$currentPassword'))";
	$result = mysqli_query($dbc, $query);
	$num = mysqli_num_rows($result);
if( $num != 0)
{
  
$query="UPDATE accounts SET userPassword = SHA('$newPassword') WHERE userEmail = '$userEmail' and userPassword = SHA('$currentPassword')";


	 $result = mysqli_query($dbc, $query);
	  header('Location: index.php');

}
else
{
	   echo "Cannot find this user";
	}

}
?>

<h1>Update Password</h1>
	<form action="update.php" method="post">
	<fieldset style="{width:700px}">
	Enter User Email:
	<input type="text" name="txtUserEmail" />
	<p>
	Enter Current Password:
	<input type="userPassword" name="txtCurrentPassword" />
	Enter New Password:
	<input type="userPassword" name="txtNewPassword" />

	<p>
	<input type="submit" name="update" value="Update" /></p>
	</fieldset>
	</form>

<?php 
	include ('includes/footer.html'); 
?>


