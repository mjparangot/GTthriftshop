<? include '_header.php'; ?>
<body>

  <nav class="top-bar sticky" data-topbar role="navigation">
    <ul class="title-area">
      <li class="name">
        <h1><a href="#">GT Thrift Shop</a></h1>
      </li>
       <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
      <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    <section class="top-bar-section">
      <!-- Right Nav Section -->
      <ul class="right">
        <!-- If they are not logged into Facebook, show login button -->
        <!-- If they are logged into Facebook, our webapp accesses their fb automatically -->
        <li class="active"><a onclick="loginWithFacebook()">Login with Facebook</a></li>
        <li class="active make-post"><a href="#" data-reveal-id="post-modal">Make a Post</a></li>
        <!-- Make a post modal -->
        <div id="post-modal" class="reveal-modal" data-reveal>
          <p class="lead">Use this form to create a post on the GT Thrift Shop Facebook page.</p>
          <p>This form helps us create a standard structure for posts which makes it easier to populate this site.</p>
          <form>
            <div class="row">
              <div class="large-6 columns">
                <label>Name
                  <input type="text" placeholder="Name of item being sold" />
                </label>
                <div class="large-6 columns">
                  <label>Price
                    <input type="text" placeholder="Asking price" />
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <label>Description
                  <textarea placeholder="Description of item being sold"></textarea>
                </label>
              </div>
            </div>
          </form>
          <p>You can attach images in Facebook before you post to the group.</p>
          <a href="#" class="button">Add Another Item</a>
          <a href="#" class="button">Submit</a>
          <a class="close-reveal-modal">&#215;</a>
        </div>
      </ul>
      <!-- Left Nav Section -->
      <ul class="left">
        <li class="has-form">
          <div class="row collapse">
            <div class="large-8 small-9 columns">
              <input type="text" placeholder="Find Stuff">
            </div>
            <div class="large-4 small-3 columns">
              <a href="#" class="alert button expand">Search</a>
            </div>
          </div>
        </li>
      </ul>
    </section>
  </nav>
  
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