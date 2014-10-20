<!doctype html>
<head>
  <meta charset="utf-8">

  <title>My Parse App</title>
  <meta name="description" content="My Parse App">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/styles.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://www.parsecdn.com/js/parse-1.3.0.min.js"></script>
</head>

<body>
  
  <div id="main">
    <h1>You're ready to use Parse!</h1>

    <p>Read the documentation and start building your JavaScript app:</p>

    <ul>
      <li><a href="https://www.parse.com/docs/js_guide">Parse JavaScript Guide</a></li>
      <li><a href="https://www.parse.com/docs/js">Parse JavaScript API Documentation</a></li>
    </ul>

    <div style="display:none" class="error">
      Looks like there was a problem saving the test object. Make sure you've set your application ID and javascript key correctly in the call to <code>Parse.initialize</code> in this file.
    </div>

    <div style="display:none" class="success">
      <p>We've also just created your first object using the following code:</p>
      
        <code>
          var TestObject = Parse.Object.extend("TestObject");<br/>
          var testObject = new TestObject();<br/>
          testObject.save({foo: "bar"});
        </code>
        
    </div>
  </div>

  <script type="text/javascript">
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
     		 alert("User logged in through Facebook!");
    		}
  		},
 		 error: function(user, error) {
   			 alert("User cancelled the Facebook login or did not fully authorize.");
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
  </script>
</body>

</html>
