<? include '_header.php'; ?>

    <!-- Main jumbotron for a primary marketing message or call to action
    <div class="top-jumbotron">
      <div class="top-container">
        <h1>Welcome, GT Students!</h1>
      </div>
    </div>
    -->
    
    <!-- If they are not logged into Facebook, show login button -->
    <!-- If they are logged into Facebook, our webapp accesses their fb automatically -->
	<button type="submit" class="btn btn-success" onclick="loginWithFacebook();">Login with Facebook</button>
    
    <div class="container">
      <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
  			<?
  				$items = getAllItems();
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
                    echo '$' . $item['price']; 
                ?>
                </li>
      					<li class="description"><?= $item['description'] ?></li>
      					<li class="bullet-item"><?= $item['status'] ?></li>
                <li class="bullet-item"><img src="<?= ($item['picture'] == '' ? 'http://placehold.it/185x150' : $item['picture']) ?>"/></li>  
      					<li class="cta-button"><a class="button" href="<?= $item['postlink'] ?>" target="_blank">View Post</a></li>
      				</ul>
      			</li>
  			<?
          }
  			?>
      </ul>
    </div>
    
<? include '_footer.php'; ?>