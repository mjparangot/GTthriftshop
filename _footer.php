
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script>
      $(document).foundation();
      var container = document.querySelector('#container');
      var msnry = new Masonry( container, {
        // options
        itemSelector: '.sale-item',
        isAnimated: true
      });

      imagesLoaded( container, function() {
        msnry.layout();
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
    
    </script>
  </body>
</html>
