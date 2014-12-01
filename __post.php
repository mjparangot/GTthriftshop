<?
	include '__database.php';
	include '__functions.php';

error_reporting(E_ERROR | E_WARNING | E_PARSE);

if ($_POST['type'] == 'make_post') {
	// return, array with vars text with text, action with action item to do
	
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);
	$price = floatval(trim($_POST['price']));
	$seller = trim($_POST['seller']);
	
	if ($name == '')
		echo json_encode(array("text" => 'You need to specify a name', 'action' => 'alert'));
	
	
	if ($description == '')
		return echoJSON(array("text" => 'You need a description', 'action' => 'alert'));
	
	$added = addItemToDB($name, $description, $price, '', $seller, null);
	
	return echoJSON(array("text" => "Added your item (".$name.")!", 'action' => '/item.php?id='.$added[0]['id'].'&newlycreated=true'));
}

function echoJSON($arr) {
	echo json_encode($arr);
}

?>
