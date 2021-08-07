<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=u415020159_mantizb;charset=utf8', 'Mantizb*#17', 'u415020159_mantizb');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
