<? include '_header.php'; ?>
<body>

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
            <p class="lead">Use this form to create a post on GT Thrift Shop.</p>
            <p>This form helps us create a standard structure for posts which makes it easier to populate this site.</p>
            <form enctype="multipart/form-data" action="__post.php" method="post" id="make-post-form">
              <input id="make-post-seller" type="hidden" name="seller" value=""/>
              <input type="hidden" name="type" value="make_post"/>
              <div class="row">
                <div class="large-6 columns">
                  <label>Item Name
                    <input type="text" name="name" placeholder="Name of item being sold" required/>
                  </label>
                </div>
                <div class="large-6 columns">
                  <label>Price
                    <input type="text" name="price" placeholder="Asking price" required/>
                  </label>
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                  <label>Description
                    <textarea name="description" placeholder="Description of item being sold" required></textarea>
                  </label>
                </div>
              </div>
              <input type="submit" class="button" value="Submit"/>
            </form>

            <!-- FB Send Button Popup -->
            <div id="fb-send-modal" class="reveal-modal" data-reveal>
            Click the send button below to add your post to Facebook's GT Thrift Shop page for more visibility!
 			<center><div class="fb-send" data-href="http://gt-thrift-shop-test.herokuapp.com/#" data-width="1000" data-height="1000" data-colorscheme="light"></div></center>
 			
 			<a class="close-reveal-modal">&#215;</a>
			</div>
            
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
    <ul id="container-ul" class="small-block-grid-1 medium-block-grid-3 large-block-grid-4">
			<?
				if (!isset($_GET['search']) || $_GET['search'] == '')
					$items = getAllItems();
				else
					$items = getSelectedItems($_GET['search']);
				
				createItems($items);
			?>
    </ul>
  </div>
    
<? include '_footer.php'; ?>
