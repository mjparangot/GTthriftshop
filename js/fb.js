Parse.initialize("6B6ut2PB7V6850Lb9b96txrM9BU7iWCpEBuoyRjH", "tbPvSvs4uCPn35NMauQSA1TTqsg3EfU2oiLn2rPm");

window.fbAsyncInit = function() {
  Parse.FacebookUtils.init({ // this line replaces FB.init({
    appId      : '507863555984054',
    status     : true, // check Facebook Login status
    cookie     : true, // enable cookies to allow Parse to access the session
    xfbml      : true
  });

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
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));