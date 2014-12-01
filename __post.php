<?
	include '__database.php';
	include '__functions.php';

if ($_POST['type'] == 'make_post') {
	// return, array with vars text with text, action with action item to do
	
	$name = trim($_POST['name']);
	$description = trim($_POST['description']);
	$price = trim($_POST['price']);
	$picture = trim($_POST['picture']);
	$seller = trim($_POST['seller']);
	
	if ($name == '')
		return json_encode(array("text" => 'You need to specify a name', 'action' => 'alert'));
	
	if (!(is_float($price) || is_int($price)))
		return json_encode(array("text" => 'Invalid Price', 'action' => 'alert'));
	
	if ($description == '')
		return json_encode(array("description" => 'You need a description', 'action' => 'alert'));
	
	if ($description == '')
		return json_encode(array("description" => 'You need a description', 'action' => 'alert'));
}

?>
