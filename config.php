<?php
$result = @mysql_connect ('localhost','admin','4444');

if(!$result)
{
	echo "<p align='center'>V nastoja6ij moment podklju4enie k serveru ne vozmozhno!</p>";
	exit();
}


$conn = @mysql_select_db('CMS_book_3',$result);

if(!$conn)
{
	echo "V nastoja6ij moment podklju4enie k DB ne vozmozhno!";
	exit();
}




function puterror($message)
{
	echo "<p>$message</p>";
	exit();
}

?>