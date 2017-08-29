<?php 

// Check if register


?>

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else {
      // The person is not logged into your app or we are unable to tell.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>
<div class="wrapper">
	<div class="content">
		<form class="form-validate" action="<?php echo $this->language['key']; ?>/register" method="POST">
			<div class="panel panel-body login-form">
				<div class="text-center">
					<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
					<h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
				</div>

				<div class="form-group has-feedback has-feedback-left">
					<input type="text" class="form-control" placeholder="Username" name="username" required="required">
					<div class="form-control-feedback">
						<i class="icon-user text-muted"></i>
					</div>
				</div>

				<div class="form-group has-feedback has-feedback-left">
					<input type="text" class="form-control" placeholder="Password" name="password" required="required">
					<div class="form-control-feedback">
						<i class="icon-lock2 text-muted"></i>
					</div>
				</div>

				<div class="form-group login-options">
					<div class="row">
						<div class="col-sm-6">
							<label class="checkbox-inline">
								<input type="checkbox" class="styled" checked="checked">
								Remember
							</label>
						</div>

						<div class="col-sm-6 text-right">
							<a href="login_password_recover.html">Forgot password?</a>
						</div>
					</div>
				</div>

				<div class="form-group">
					<button type="submit" class="btn bg-blue btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
				</div>

				<div class="content-divider text-muted form-group"><span>or sign in with</span></div>
				<ul class="list-inline form-group list-inline-condensed text-center">
					<li>
						<div class="fb-login-button" data-width="32" data-max-rows="1" data-size="medium" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
					</li>
					<li><a href="#" class="btn border-pink-300 text-pink-300 btn-flat btn-icon btn-rounded"><i class="icon-dribbble3"></i></a></li>
					<li><a href="#" class="btn border-slate-600 text-slate-600 btn-flat btn-icon btn-rounded"><i class="icon-github"></i></a></li>
					<li><a href="#" class="btn border-info text-info btn-flat btn-icon btn-rounded"><i class="icon-twitter"></i></a></li>
				</ul>

				<div class="content-divider text-muted form-group"><span>Don't have an account?</span></div>
				<a href="login_registration.html" class="btn btn-default btn-block content-group">Sign up</a>
			</div>
		</form>
	</div>
</div>