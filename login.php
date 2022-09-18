<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
</head>

<body>
	
	
	
<?php
session_start();
$_SESSION['boolAuthenticated'] = false;
$txtError = "";

if(isset($_POST['fvPassword']))
{
	if($_POST['fvPassword'] == "MontyRoyal")
	{
		$_SESSION['boolAuthenticated'] = true;
		header("refresh:0; url=menu.php"); //redirect to the form

	}
	
	else
	{
		$txtError = "Password incorrect";
	}
}
	

	
?>
	
	
	
<h2>Login</h2>
<form id="form1" name="form1" method="post">
  <p>
    <label for="fvPassword">Password:</label>
    <input type="password" name="fvPassword" id="fvPassword">
  </p>
  <p>
    <input name="submit" type="submit" id="submit" formaction="login.php" value="Login">
  </p>
  <p style="color: #FF0000"><?php echo $txtError; ?></p>
</form>
<p>&nbsp;</p>
	


</body>
</html>