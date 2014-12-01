<?
	include '__database.php';

if ($_GET['type'] == 'get_posts') {
	$items = getAllItems($_GET['start']);
	createItems($items);
}

?>
