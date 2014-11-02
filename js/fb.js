Parse.initialize("M5oofaMjdXd7e6DVPaF1ClMOye5ihfpPVOcUBDls", "rgACeEmcU6vQgReZZ5QE9C9o1MNrmmkO38PkPux9");

window.fbAsyncInit = function() {
  Parse.FacebookUtils.init({ // this line replaces FB.init({
    appId      : '397910377029373',
    status     : true, // check Facebook Login status
    cookie     : true, // enable cookies to allow Parse to access the session
    xfbml      : true,
    version    : 'v2.1'
  });

  Parse.FacebookUtils.logIn(null, {
    success: function(user) {
      if (!user.existed()) {
        alert("User signed up and logged in through Facebook!");
        alert(Parse.User.current().get('username'));
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