<?
	$db = pg_connect("host=ec2-184-73-194-196.compute-1.amazonaws.com port=5432 dbname=d9cg95qfnscd29 user=prqorunfzkghvr password=jc2hyAmXE23mp9iS2wGn7CD6zU sslmode=require  options='--client_encoding=UTF8'") or die("Didn't work" . pg_last_error());
	
	function getItems() {
		$items = runQuery('SELECT * FROM "Items"');
		
		return $items;
	}
	
	function runQuery($query) {
		global $db;
		
		$result = pg_query($db, $query);
		
		if (!$result) {
		  echo "An error occurred.\n";
		  exit;
		}
		
		$array = array();
		
		while ($row = pg_fetch_row($result)) {
		  $array[] = $row;
		}
		
		return $array;
	}
?>
