<? include '_header.php'; ?>
<body>

	<!-- Facebook Send Button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=507863555984054&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

  <div class="sticky">
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="http://gt-thrift-shop-test.herokuapp.com">GT Thrift Shop</a></h1>
        </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <!-- If they are not logged into Facebook, show login button -->
          <!-- If they are logged into Facebook, our webapp accesses their fb automatically -->
          <a href="#" id="fb-login" class="button active" onclick="loginWithFacebook()">Login with Facebook</a>
          <a href="#" id="fb-logout" class="button active hidden-element" onclick="logoutWithFacebook()">Logout</a>
          <a href="#" id="make-post-button" class="button active make-post hidden-element" data-reveal-id="post-modal">Make a Post</a>
          <a href="#" id="make-post-button-disabled" class="button transparent-element" onclick="alert('You must be logged in to make a post!');">Make a Post</a>
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

  <!-- If they are not logged into Facebook, show login button -->
  <!-- If they are logged into Facebook, our webapp accesses their fb automatically -->
  
  <div id="container">
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
            <!-- Item image(s) -->
            <li>
              <ul class="image-orbit" data-orbit>
        			  <?
        					$array_of_pics = array();
        					
        					if ($item['picture'] == '')
        						$array_of_pics[] = 'http://placehold.it/185x150';
        					// else if it's an album of pics
        					else if (strpos($item['picture'], ',') !== FALSE) {
        						$array_of_pics = explode(',', $item['picture']);
        					} else {
        						$array_of_pics[] = $item['picture'];
        					}
        					
        					foreach ($array_of_pics as $pic) {
        						if ($pic == '')
        							continue;
        						
        						if (strpos($pic, '://') === FALSE)
        							$url = "https://graph.facebook.com/".$pic."/picture";
        						else
        							$url = $pic;
        						?>
        							<li class="item-image">
                        <img src="<?= $url ?>">
                          <a href="<?=$item['postlink']?>" class="button [radius round] view-post-btn">View Post</a>
                          <div class="dim-overlay"></div>
                        </img>
                      </li>
        						<?
        					}
        			  ?>
              </ul>
            </li>

            <!-- Item description -->
  					<li class="description"><?= $item['description'] ?></li>

            <!-- Item price -->
            <? 
              if ($item['price'] != -1)
                echo '<li class="price">$'.$item['price'].'</li>'; 
            ?>
  				</ul>
  			</li>
			<?
        }
			?>
    </ul>
  </div>
    
<? include '_footer.php'; ?>
