<?php session_start(); ?>
<?php
	if ($_SESSION) {
		header("location:main.html");
		exit;
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>智慧型光感應儀</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shivs.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/index.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie81.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie91.css" /><![endif]-->
	</head>
	<body>

		<!-- Header -->
			<header id="header"style="font-family:微軟正黑體;">
				<h1>智慧型光感應儀</h1>
				<p>簡單方式登入<br />
				立即體驗獨特功能 </p>
			</header>

		<!-- Signup Form -->
			<form id="signup-form" method="post" action="loginCheck.php">
			            <input type="text" class="text" name="account"/><br />
						<input type="password" name="password"/>
						<!--<div class="submit">-->
						<input type="submit" value="LOGIN"/>
						<input type="button" value="SIGN UP" onclick="location.href='signUp.html'">
						<p><a href="#">Forgot Password ?</a></p>
					    </div>
			</form>

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
					<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
				</ul>
				<ul class="copyright">
					<li>&copy; Untitled.</li>
				</ul>
			</footer>

		<!-- Scripts -->
			<!--[if lte IE 8]><script src="assets/js/ie/responds.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>