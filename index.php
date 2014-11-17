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
			<li class="sale-item">
				<ul class="pricing-table">                        
					<li class="title"><?= $item['name'] ?></li>
					<li class="price">
            <? 
              if ($item['price'] == -1)
                echo 'Price varies';
              else
                echo $item['price']; 
            ?>
          </li>
					<li class="description"><?= $item['description'] ?></li>
					<li class="bullet-item"><?= $item['status'] ?></li>
          <li class="bullet-item"><img src="<?= ($item['picture'] == '' ? 'http://placehold.it/185x150' : $item['picture']) ?>"/></li>  
					<li class="cta-button"><a class="button" href="#">View Post</a></li>
				</ul>
			</li>
  			<?
          }
  			?>
      </ul>
    </div>
    
    <script type="text/javascript">
    	console.log("test");
    </script>
<? include '_footer.php'; ?>
