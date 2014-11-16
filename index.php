<? include '_header.php'; ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="top-jumbotron">
      <div class="top-container">
        <h1>Welcome, GT Students!</h1>
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
      			<?
      				$items = getItems();
      				foreach ($items as $item) {
      			?>
      			
        			<div class="item">
        				<h3><?= $item['itemname'] ?></h3>
        				<img src="http://placehold.it/185x150"/>
        				<p>$<?= $item['itemprice'] ?> - <?= $item['itemstatus'] ?></p>
        				<p><?= $item['itemdescription'] ?></p>
        			</div>
      			
      			<?
      				}
      			?>
          </div>
       </div>
      </div>
    </div>
<? include '_footer.php'; ?>
