<? include '_header.php'; ?>
<body>
  <div class="sticky">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="gt-thrift-shop-test.herokuapp.com">GT Thrift Shop</a></h1>
        </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <!-- If they are not logged into Facebook, show login button -->
          <!-- If they are logged into Facebook, our webapp accesses their fb automatically -->
          <li id="fb-login" class="active"><a href="#" onclick="loginWithFacebook()">Login with Facebook</a></li>
          <li id="fb-logout" class="active hidden-element"><a href-"#" onclick="logoutWithFacebook()">Logout</a></li>
          <li class="divider"></li>
          <li class="active make-post"><a href="#" data-reveal-id="post-modal">Make a Post</a></li>
          <!-- Make a post modal -->
          <div id="post-modal" class="reveal-modal" data-reveal>
            <p class="lead">Use this form to create a post on the GT Thrift Shop Facebook page.</p>
            <p>This form helps us create a standard structure for posts which makes it easier to populate this site.</p>
            <form>
              <div class="row">
                <label>Item 1</label>
                <div class="large-6 columns">
                  <label>Name
                    <input type="text" placeholder="Name of item being sold" />
                  </label>
                </div>
                <div class="large-6 columns">
                  <label>Price
                    <input type="text" placeholder="Asking price" />
                  </label>
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
              <form id="searchpanel" action="" method="get">
				  <div class="large-8 small-9 columns">
					<input id="searchbar" name="search" type="text" placeholder="Find Stuff">
				  </div>
				  <div class="large-4 small-3 columns">
					<input type="submit" value="Search" id="searchbutton" href="#" class="alert button expand"/>
				  </div>
              </form>
            </div>
          </li>
        </ul>
      </section>
    </nav>
  </div>

  <div class="container">
    <ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
			<?
				if (!isset($_GET['search']) || $_GET['search'] == '')
					$items = getAllItems();
				else
					$items = getSelectedItems($_GET['search']);
				foreach ($items as $item) {
			?>
    			<li class="sale-item">
    				<ul class="pricing-table">  
              <li class="item-image"><img src="<?= ($item['picture'] == '' ? 'http://placehold.it/185x150' : $item['picture']) ?>"/></li>  
    					<!--
              <li class="title"><?= $item['name'] ?></li>
    					<li class="price">
                <? 
                  //if ($item['price'] == -1)
                  //  echo 'Price varies';
                  //else
                  //  echo '$' . $item['price']; 
                ?>
              </li>
              <li class="cta-button"><a class="button" href="<?= $item['postlink'] ?>" target="_blank">View Post</a></li>
              -->
    					<li class="description"><?= $item['description'] ?></li>					
    				</ul>
    			</li>
			<?
        }
			?>
      <script>
        var container = document.querySelector('.container');
        $container.masonry('reloadItems');
      </script>
    </ul>
  </div>
    
<? include '_footer.php'; ?>
