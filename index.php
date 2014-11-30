<? include '_header.php'; ?>
<body>

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
  
  <div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">
      <nav class="tab-bar">
        <section class="left-small">
          <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
        </section>

        <section class="middle tab-bar-section">
          <h1 class="title">GT Thrift Shop</h1>
        </section>

        <section class="right-small">
          <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
        </section>
      </nav>

      <aside class="left-off-canvas-menu">
        <ul class="off-canvas-list">
          <li><label>Foundation</label></li>
          <li><a href="#">The Psychohistorians</a></li>
          <li><a href="#">...</a></li>
        </ul>
      </aside>

      <aside class="right-off-canvas-menu">
        <ul class="off-canvas-list">
          <li><label>Users</label></li>
          <li><a href="#">Hari Seldon</a></li>
          <li><a href="#">...</a></li>
        </ul>
      </aside>

      <section class="main-section">
        <!-- content goes here -->
      </section>

    <a class="exit-off-canvas"></a>

    </div>
  </div>

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