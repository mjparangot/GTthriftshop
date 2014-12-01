
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script>
      function setOrbit() {
  		  $(document).foundation({
    			orbit: {
    			  animation: 'slide',
    			  timer_speed: 4000,
    			  pause_on_hover: true, // Pauses on the current slide while hovering
    			  resume_on_mouseout: true, // If pause on hover is set to true, this setting resumes playback after mousing out of slide
    			  next_on_click: true, // Advance to next slide on click
    			  animation_speed: 500, // Sets the amount of time in milliseconds the transition between slides will last
    			  navigation_arrows: false,
    			  slide_number: true,
    			  bullets: false,
    			  navigation_arrows: false,
    			  slide_number_class: 'orbit-slide-number',
    			  timer_progress_class: 'orbit-progress',
    			  timer_container_class: 'orbit-timer'
    			}
  		  });
  		}
      var container = document.querySelector('#container-ul');
      var msnry = new Masonry( container, {
        // options
        itemSelector: '.sale-item'
      });

      imagesLoaded( container, function() {
        //msnry.reloadItems();
        //setOrbit();
      });

      var $iso_container = $('#container');
  		// init
  		$iso_container.isotope({
    		// options
    		itemSelector: '.sale-item'
  		});
  	
  		$('#searchpanel').submit(submitSearch);
  		
  		function submitSearch() {
  			/*
  			var text = $('#searchbar').val();
  			
  			if (text == '') {
  				$iso_container.isotope({ filter: '*' })
  			} else {
  				$iso_container.isotope({ filter: function() {
  					if ($(this).text().toLowerCase().indexOf($('#searchbar').val()) >= 0)
  						return true;
  					else
  						return false;
  				}
  			});
  			}
  			*/
  			return true;
  		}
    </script>
    <script type="text/javascript">
        
        Parse.initialize("6B6ut2PB7V6850Lb9b96txrM9BU7iWCpEBuoyRjH", "tbPvSvs4uCPn35NMauQSA1TTqsg3EfU2oiLn2rPm");
		window.fbAsyncInit = function() {
    		Parse.FacebookUtils.init({ // this line replaces FB.init({
      			appId      : '507863555984054', // Facebook App ID
      			//status     : true, // check Facebook Login status
      			version    : 'v2.0',
      			cookie     : true, // enable cookies to allow Parse to access the session
      			xfbml      : true
   			 });
   		};
   		
   		function isLoggedIn() {
			if (Parse.User.current() == null){
				return false;
			}
			else
				return true;
		}
		
		// Make a post form filled or not
		function formNotFilled(){
			$('#submit-button').hide();
			$('#submit-button-disabled').show();
		}
		
		function formFilled(){
			$('#submit-button').show();
			$('#submit-button-disabled').hide();
		}
		
		function loginStuff() {
			$('#fb-login').hide();
     		$('#fb-logout').show();
     		$('#make-post-button').show();
     		$('#make-post-button-disabled').hide();
		}
		
		function logoutStuff() {
			$('#fb-login').show();
     		$('#fb-logout').hide();
     		$('#make-post-button').hide();
     		$('#make-post-button-disabled').show();
		}
   			 
        function loginWithFacebook(){
    		// Run code after the Facebook SDK is loaded.
      		Parse.FacebookUtils.logIn(null, {
  				success: function(user) {
    				if (!isLoggedIn()) {
    					//User is already logged in
     		 			alert("User signed up and logged in through Facebook!");
   			 		} else {
     		 			alert("You have logged in through Facebook!");
     		 			loginStuff();
     		 			//ACCESS TOKEN -
     		 			//alert(Parse.User.current().get('authData')['facebook']['access_token']);
    				}
  				},
 		 		error: function(user, error) {
   			 		//alert("User cancelled the Facebook login or did not fully authorize.");
  				}
			});
  		};
  		
  		function logoutWithFacebook(){
  		  	FB.logout(function(response) {
  				//console.log(user is now logged out);
			});
			logoutStuff();
  		};
  	
 		(function(d, s, id){
    		var js, fjs = d.getElementsByTagName(s)[0];
    		if (d.getElementById(id)) {return;}
    		js = d.createElement(s); js.id = id;
    		js.src = "//connect.facebook.net/en_US/all.js";
    		fjs.parentNode.insertBefore(js, fjs);
  		}(document, 'script', 'facebook-jssdk'));
  		
   		var TestObject = Parse.Object.extend("TestObject");
    	var testObject = new TestObject();
      	testObject.save({foo: "bar"}, {
      		success: function(object) {
        		$(".success").show();
      		},
      		error: function(model, error) {
        		$(".error").show();
      		}
    	});
  			
    	if (isLoggedIn())
			loginStuff();
		else
			logoutStuff();
			
		// Scrolling stuff
		var gettingFromScroll = false;
		
		<?
			// don't do the scrolling thing if we're searching
			if (!isset($_GET['search'])) {
		?>
		$(window).scroll(function() {
		   if($(window).scrollTop() + $(window).height() > $(document).height() - 150 && gettingFromScroll == false) {
			   gettingFromScroll = true;
			   $.get( "__get.php?type=get_posts&start="+$('.sale-item').length, function( data ) {
				  data = $.parseHTML(data);
				  data = $.grep(data, function(elem) {
					return elem.nodeName != "#text";
				  });
				  $(container).append(data);
				  msnry.appended(data);
				  setOrbit();
				  msnry.layout();
				  gettingFromScroll = false;
				});
		   }
		});
		<? } ?>
    
    </script>
  </body>
</html>
