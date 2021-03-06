<?
	include_once '__functions.php';
	include_once '__database.php';
?>
<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

  <head>
    <meta charset="utf-8">
    <!-- If you delete this meta tag World War Z will become a reality -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GT Thrift Shop</title>

	<!-- Facebook post -->
	<meta property="og:title" content="<?= $item['name'] ?>"/>
	<meta property="og:site_name" content="GT Thrift Shop"/>
	<meta property="og:description" content="<?= $item['description'] ?>"/>
	
    <!-- Foundation -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/foundation.css">

    <!-- Custom styles -->
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/vendor/modernizr.js"></script>
    
    <!-- Parse -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 	<script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.3.0.min.js"></script>

  </head>
