<?
	include '__database.php';
	include '__functions.php';

if ($_GET['type'] == 'get_posts') {
	$items = getAllItems($_GET['start']);
	createItems($items);
}

?>
