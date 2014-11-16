<!--? include '_header.php'; ?-->

    <!-- Main jumbotron for a primary marketing message or call to action
    <div class="top-jumbotron">
      <div class="top-container">
        <h1>Welcome, GT Students!</h1>
      </div>
    </div>
    -->

    <div class="container">
      <ul class="small-block-grid-3">
  			<?
  				$items = getItems();
  				foreach ($items as $item) {
  			?>
    			<li class="sale-item">
    				<h3><?= $item['itemname'] ?></h3>
    				<img src="http://placehold.it/185x150"/>
    				<p>$<?= $item['itemprice'] ?> - <?= $item['itemstatus'] ?></p>
    				<p><?= $item['itemdescription'] ?></p>
    			</li>
  			<?
          }
  			?>
      </ul>
    </div>
<? include '_footer.php'; ?>
