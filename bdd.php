<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=edeproca_p;charset=utf8', 'edeproca_fix_test_user', 'fix_test_user');
}
catch(Exception $e)
{
        die('Error : '.$e->getMessage());
}
