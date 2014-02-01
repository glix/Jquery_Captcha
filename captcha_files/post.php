<?php
	session_start();
	if($_REQUEST['code'] == ($_SESSION['random_number']))
	{
		echo 1; 
	}
	else
	{	echo 77; 
	}
?>
