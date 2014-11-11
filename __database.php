<?
	error_reporting(E_ALL & ~E_NOTICE);
	$db = pg_connect("host=ec2-184-73-194-196.compute-1.amazonaws.com port=5432 dbname=d9cg95qfnscd29 user=prqorunfzkghvr password=jc2hyAmXE23mp9iS2wGn7CD6zU sslmode=require  options='--client_encoding=UTF8'") or die("Didn't work" . pg_last_error());
	var_dump($db);
	echo 'd';
?>
