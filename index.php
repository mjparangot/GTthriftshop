<? include '_header.php'; ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome, GT Students!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-2">
          <h2>Filters</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-10">
          <div id="posts-container">
			<div class="item">
				<h3>iPod Nano</h3>
				<img src="http://placehold.it/185x150"/>
				<p>$100 - Negotiable</p>
				<p>Perfect condition, no scratches</p>
			</div>
			<div class="item">
				<h3>iPod Nano</h3>
				<img src="http://placehold.it/185x150"/>
				<p>$100 - Negotiable</p>
				<p>Perfect condition, no scratches</p>
			</div><div class="item">
				<h3>iPod Nano</h3>
				<img src="http://placehold.it/185x150"/>
				<p>$100 - Negotiable</p>
				<p>Perfect condition, no scratches</p>
			</div><div class="item">
				<h3>iPod Nano</h3>
				<img src="http://placehold.it/185x150"/>
				<p>$100 - Negotiable</p>
				<p>Perfect condition, no scratches</p>
			</div><div class="item">
				<h3>iPod Nano</h3>
				<img src="http://placehold.it/185x150"/>
				<p>$100 - Negotiable</p>
				<p>Perfect condition, no scratches</p>
			</div>
          </div>
       </div>
      </div>

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->
    
    <script>
		$( document ).ready(function() {
			$('#posts-container').masonry({
			  columnWidth: 235,
			  itemSelector: '.item'
			});
		});
    </script>

<? include '_footer.php'; ?>
