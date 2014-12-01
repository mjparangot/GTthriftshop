<?
	$db = pg_connect("host=ec2-184-73-194-196.compute-1.amazonaws.com port=5432 dbname=d9cg95qfnscd29 user=prqorunfzkghvr password=jc2hyAmXE23mp9iS2wGn7CD6zU sslmode=require  options='--client_encoding=UTF8'") or die("Didn't work" . pg_last_error());
	
	function getSelectedItems($search, $start = 0) {
		$start = intval($start);
		$items = runQuery('SELECT * FROM "items" WHERE description ~* '.pg_escape_literal('([^\w\d]+|^)'.preg_quote($search).'([^\w\d]+|$)').' ORDER BY startdate ASC OFFSET '.$start);
		return $items;
	}
	
	function getAllItems($start = 0) {
		$start = intval($start);
		$items = runQuery('SELECT * FROM "items" ORDER BY startdate DESC  OFFSET '.$start.' LIMIT 20');
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
		
		while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		  $array[] = $row;
		}
		
		return $array;
	}
?>
