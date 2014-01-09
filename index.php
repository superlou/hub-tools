<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hub Tools</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
		<?php
			session_start();
			
			try {
				if (isset($_SESSION['flash'])) {
					$notice = $_SESSION['flash'];
					unset($_SESSION['flash']);
					echo "<div class='alert alert-warning'>$notice</div>";
				}
			} catch (Exception $e) {
			}
		?>
		
		<div class='container'>
			<div class='page-header'>
				<h1>Hub Tools</h1>			
			</div>
			
			<h2>Change password</h2>
			<p>
				Note that these are <strong>stored in plain text</strong>, sorry.  Use something unique but not meaningful.
			</p>
			<div class="row">		
				<form action="actions.php" method="post" role="form" class="form-horizontal">
					<input type="hidden" name="action" value="change_password">
					
					<div class="form-group">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" class="form-control" placeholder="Username">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Current Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" class="form-control" placeholder="Current password">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">New Password</label>
						<div class="col-sm-10">
							<input type="password" name="new_password" class="form-control" placeholder="New password">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Confirm New Password</label>
						<div class="col-sm-10">
							<input type="password" name="new_password_confirmation" class="form-control" placeholder="Confirm new password">
						</div>
					</div>															
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-default">
						</div>
					</div>
				</form>
			</div>
		</div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
