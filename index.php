<? include '_header.php'; ?>

    <!-- Main jumbotron for a primary marketing message or call to action
    <div class="top-jumbotron">
      <div class="top-container">
        <h1>Welcome, GT Students!</h1>
      </div>
    </div>
    -->

    <div class="container">
      <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">
  			<?
  				$items = getItems();
  				foreach ($items as $item) {
  			?>
          <ul class="pricing-table sale-item">
            <li class="title"><?= $item['itemname'] ?></li>
            <li class="price"><?= $item['itemprice'] ?></li>
            <li class="description"><?= $item['itemdescription'] ?></li>
            <li class="bullet-item"><?= $item['itemstatus'] ?></li>
            <li class="cta-button"><a class="button" href="#">Request</a></li>
          </ul>
  			<?
          }
  			?>
      </ul>
    </div>
<? include '_footer.php'; ?>
