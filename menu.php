<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FSP Counter</title>
</head>

<body>
	
<p>
  <?php
	
session_start();
include('functions.php');
	

	
if($_SESSION['boolAuthenticated'] != true)
{
	header("refresh:0; url=login.php");
	exit();
}
	

	
if(!file_exists("data.txt")) 
{
	$arrData = array(array("", 0, 0, ""));
	savedata("data.txt", $arrData);
}



?>
</p>
<h2>FS Points</h2>
<h4>hi joods :)</h4>
<form id="form1" name="form1" method="post">
  <p>
    <select name="fvOperation" id="fvOperation">
<option></option>
<option value="1">Add</option>
<option value="2">Subtract</option>
    </select>
    <label for="fvAdd"></label>
    <input type="number" name="fvNumber" id="fvNumber">
  </p>
  <p>
    <label for="fvMessage">Message:</label>
  <textarea name="fvMessage" id="fvMessage"></textarea>
  </p>
  <p>
    <label for="fvUser">For:</label>
    <select name="fvUser" id="fvUser">
		<option></option>
      <option value="1">Jensen</option>
      <option value="2">Joods</option>
    </select>
  </p>
  <p>
    <input name="fvAdd" type="submit" id="fvAdd" formaction="edit.php" value="Add">
  </p>
	
	
	<?php

	if(!empty($_SESSION['boolError']))
	{
		echo('<p style="color: #FF0000">' . $_SESSION['boolError'] . '</p>');
	}
	?>
	
</form>
	
<table width="100%" border="1">
  <tbody>
    <tr>
      <th width="25%" scope="col">Change</th>
      <th width="15%" scope="col">Jensen total</th>
	  <th width="15%" scope="col">Joods total</th>
      <th scope="col">Message</th>
    </tr>
    
	 <?php
	  
	  

	  loaddata("data.txt", $arrData);
	  $arrDisplay = array_reverse($arrData);
	  foreach($arrDisplay as $arrRow)	
	  {
		  echo "<tr>";	
		  echo "<td>" . $arrRow[0] . "</td>";
		  echo "<td>" . $arrRow[1] . "</td>";
		  echo "<td>" . $arrRow[2] . "</td>";
		  echo "<td>" . $arrRow[3] . "</td>";
		  echo "</tr>";
	  }
	  
	  ?>
	  
  </tbody>
</table>
</body>
</html>
