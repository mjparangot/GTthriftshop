<? include '_header.php'; ?>
<body>

  <nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">GT Thrift Shop/a></h1>
      </li>
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <li class="active"><a href="#">Right Button Active</a></li>
        <li class="has-dropdown">
          <a href="#">Right Button Dropdown</a>
          <ul class="dropdown">
            <li><a href="#">First link in dropdown</a></li>
            <li class="active"><a href="#">Active link in dropdown</a></li>
          </ul>
        </li>
      </ul>

      <!-- Left Nav Section -->
      <ul class="left">
        <li><a href="#">Left Nav Button</a></li>
      </ul>
    </section>
  </nav>
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