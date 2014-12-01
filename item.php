<? if (!isset($_GET['id'])) echo 'You need an item ID'; else {

include '_header.php';

$item = getSpecificItem($_GET['id']);
$item = $item[0];
?>

    <div class="container">
		<div class="row">
				<h2><?= $item['name'] ?> ($<?= $item['price'] ?>)</h2>
		</div>
		<div class="row">
			<div class="col-md-7">
				<div class="original-post">
					<p><?= $item['description'] ?></p>
				</div>
			</div>
		</div>

    <script>
		$( document ).ready(function() {
			$('#posts-container').masonry({
			  columnWidth: 235,
			  itemSelector: '.item'
			});
		});
    </script>

<? include '_footer.php';
}
?>
