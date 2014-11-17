    
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script type="text/javascript">
        $(document).foundation();
        

        console.log("login with fb");
        Parse.initialize("6B6ut2PB7V6850Lb9b96txrM9BU7iWCpEBuoyRjH", "tbPvSvs4uCPn35NMauQSA1TTqsg3EfU2oiLn2rPm");

	window.fbAsyncInit = function() {
    Parse.FacebookUtils.init({ // this line replaces FB.init({
      appId      : '507863555984054', // Facebook App ID
      //status     : true, // check Facebook Login status
      version    : 'v1.0',
      cookie     : true, // enable cookies to allow Parse to access the session
      xfbml      : true
    });
 
    // Run code after the Facebook SDK is loaded.
      Parse.FacebookUtils.logIn(null, {
  		success: function(user) {
    		if (!user.existed()) {
     		 alert("User signed up and logged in through Facebook!");
   			 } else {
     		 alert("User logged in through Facebook! access token:");
     		 //ACCESS TOKEN -
     		 alert(Parse.User.current().get('authData')['facebook']['access_token']);
    		}
  		},
 		 error: function(user, error) {
   			 alert("User cancelled the Facebook login or did not fully authorize.");
  		}
	});
  	
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
    }
    </script>
  </body>
</html>
