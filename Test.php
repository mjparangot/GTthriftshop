<? include '_header.php'; ?>

    <div class="container">
		<div class="row">
				<h2>iPod Nano</h2>
		</div>
		<div class="row">
			<div class="col-md-5">
				<img src="http://placehold.it/185x150"/>
			</div>
			<div class="col-md-7">
				<div class="tags-container">
					<span class="tag">apple</span> <span class="tag">ipod</span>
				</div>
				<div class="original-post">
					<p>Test test test test test test test test test test test test test test
					 test test test test test test test test test test test test test test test
					  test test test test test test test test test test test test test test test</p>
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

<? include '_footer.php'; ?>
