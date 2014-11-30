    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/masonry.pkgd.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script>
      var container = document.querySelector('.container');
      var msnry = new Masonry( container, {
        // options
        //columnWidth: 200,
        itemSelector: '.sale-item',
        isAnimated: true,
        animationOptions: {
          duration: 750,
          easing: 'linear',
          queue: false
        }
      });
      
      var $iso_container = $('.container');
  		// init
  		$iso_container.isotope({
    		// options
    		itemSelector: '.sale-item'
  		});

      $container.masonry('reloadItems');
		
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
        $(document).foundation();
        
        Parse.initialize("6B6ut2PB7V6850Lb9b96txrM9BU7iWCpEBuoyRjH", "tbPvSvs4uCPn35NMauQSA1TTqsg3EfU2oiLn2rPm");
		window.fbAsyncInit = function() {
    		Parse.FacebookUtils.init({ // this line replaces FB.init({
      			appId      : '507863555984054', // Facebook App ID
      			//status     : true, // check Facebook Login status
      			version    : 'v1.0',
      			cookie     : true, // enable cookies to allow Parse to access the session
      			xfbml      : true
   			 });
   			 
  			FB.Event.subscribe('auth.authResponseChange', function(response) {
    		// Here we specify what we do with the response anytime this event occurs. 
    			if (response.status === 'connected') {
      				// logged into the app
    				alert('logged');
    				$('#fb-button').hide();
    			} else if (response.status === 'not_authorized') {
      				// In this case, the person is logged into Facebook, but not into the app
    				alert('not authorized but logged into fb');
    				$('#fb-button').hide();
   	 			} else {
      				// not logged into Facebook
    				alert('not logged');
    			}
  			});
   		};
   			 
        function loginWithFacebook(){
    		// Run code after the Facebook SDK is loaded.
      		Parse.FacebookUtils.logIn(null, {
  				success: function(user) {
    				if (!user.existed()) {
     		 			alert("User signed up and logged in through Facebook!");
   			 		} else {
     		 			alert("User logged in through Facebook! access token:");
     		 			//ACCESS TOKEN -
     		 			//alert(Parse.User.current().get('authData')['facebook']['access_token']);
    				}
  				},
 		 		error: function(user, error) {
   			 		//alert("User cancelled the Facebook login or did not fully authorize.");
  				}
			});
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
  			
  		
    	//if (isLoggedIn())
		//	$('#fb-button').hide();
    
    </script>
  </body>
</html>
