<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php

session_start();
include('functions.php');

$_SESSION['boolError'] = false;
	

if(empty($_POST['fvOperation']))
{
	$_SESSION['boolError'] = "Operation (add or subtract) is not set";
	header("refresh:0; url=menu.php");
	exit();
}

if(empty($_POST['fvNumber']))
{
	$_SESSION['boolError'] = "Amount is not set";
	header("refresh:0; url=menu.php");
	exit();
}

if(empty($_POST['fvUser']))
{
	$_SESSION['boolError'] = "User is not set";
	header("refresh:0; url=menu.php");
	exit();
}


	
else
{
	loaddata("data.txt", $arrData);
	$intUser = $_POST['fvUser'];
	$intNumber = intval($_POST['fvNumber']);



	if(empty($_POST['fvMessage']))
        {
            $txtMessage = "";
        }
    else
	{
	    $txtMessage = $_POST['fvMessage'];
    	}



	if($intUser == 1)
	{
		$txtUserName = "Jensen";
	}
	if($intUser == 2)
	{
		$txtUserName = "Joods";
	}

	$txtOperation = $_POST['fvOperation'];

	if($txtOperation == "1")
	{
		if($intUser == 1)	
		{
			$arrRecord = 
				[
				("+{$intNumber} FS for {$txtUserName}"), 
				(($arrData[count($arrData)-1][1]) + $intNumber), 
				(($arrData[count($arrData)-1][2])),
                                ($txtMessage)
				];
		}

		if($intUser == 2)	
		{
			$arrRecord = 
				[
				("+{$intNumber} FS for {$txtUserName}"), 
				(($arrData[count($arrData)-1][1])), 
				(($arrData[count($arrData)-1][2]) + $intNumber),
                                ($txtMessage)
				];
		}
	}

	if($txtOperation == "2")
	{

		if($intUser == 1)	
		{
			$arrRecord = 
				[
				("-{$intNumber} FS for {$txtUserName}"), 
				(($arrData[count($arrData)-1][1]) - $intNumber), 
				(($arrData[count($arrData)-1][2])),
                                ($txtMessage)
				];
		}

		if($intUser == 2)	
		{
			$arrRecord = 
				[
				("-{$intNumber} FS for {$txtUserName}"), 
				(($arrData[count($arrData)-1][1])), 
				(($arrData[count($arrData)-1][2]) - $intNumber),
                                ($txtMessage)
				];
		}
	}
			
	
//	array_reverse($arrData);
	array_push($arrData, $arrRecord);
//	array_reverse($arrData);
	savedata("data.txt", $arrData);
	
	$_POST = array();
	header("refresh:0; url=menu.php");
	
}
	
?>
	
	
</body>
</html>
