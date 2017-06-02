<!DOCTYPE HTML>
<!--
	Spectral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>智慧型光感應儀</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body>
		<script>
		function countScore(){
			var element = document.getElementById("questionForm");
			var num = element.getElementsByTagName('div').length - 2;
			var score = 0;
			for (var i = 0; i < num; i++)
			{
				var questionDiv = document.getElementById("question_"+ (i+1));
				var questionLength = questionDiv.getElementsByTagName('input').length;
				for(var j = 0; j < questionLength; j++)
				{
					//alert("question_"+ (i+1) + "_" + (j+1));
					var question = document.getElementById("question_"+ (i+1) + "_" + (j+1));
					if(question.checked)
						score += parseInt(question.value);
				}
			}
			//alert(score);
			location.href="setvalue.php?addvalue="+score;
		}
		
		
		</script>
		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header"style="font-family:微軟正黑體;">
						<h1><a href="main.html">智慧型光感應儀</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>選單</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.html">首頁</a></li>
											<li><a href="generic.html">Generic</a></li>
											<li><a href="elements.php">問卷</a></li>
											<li><a href="logout.php">登出</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<article id="main">
						<header>
							<h2>問卷填寫</h2>
							<p>...</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">
								<section>
									<h4>問卷</h4>
									<form method="post" action="#" id="questionForm">
										<!--
										<div class="6u 12u$(xsmall)">
											<input type="text" name="demo-name" id="demo-name" value="" placeholder="Name" />
										</div>
										<div class="6u$ 12u$(xsmall)">
											<input type="email" name="demo-email" id="demo-email" value="" placeholder="Email" />
										</div>
										-->
										<div class="12u$">
											<div class="select-wrapper">
												<select name="demo-category" id="demo-category">
													<option value="">- 性別 -</option>
													<option value="1">男性</option>
													<option value="1">女性</option>
												</select>
											</div>
										</div>

										<?php
										$database = mysql_connect( "140.138.152.207","frank85", "ak800730" );
										if ( !mysql_select_db( "atm", $database ) )
											die( "Could not open database!" );
										mysql_query("SET NAMES 'UTF8'");

										$result = mysql_query("SELECT * FROM iot_questionnaire");

										$question = array(array());
										if($result)
					                    {
					                        while($row = mysql_fetch_assoc($result)) {
					                        	$question[$row['id']][] = $row;
					                        }

					                        for($i = 0; $i < count($question) - 1; $i++)
					                        {
					                        	echo'<div style="width:1000px;"'.'id="question_'.($i+1).'"">';
				                            	echo$question[$i + 1][0]['questionTitle'];

					                        	for($j = 0; $j < count($question[$i + 1]); $j++)
					                        	{
														echo'<input type="radio" id="question_'.($i+1).'_'.($j+1).'" value="'.$question[$i+1][$j]['questionValue'].'" name="question_'.($i+1).'">';
														echo'<label for="question_'.($i+1).'_'.($j+1).'">'.$question[$i + 1][$j]['questionOption'].'</label>';
					                        	}

					                        	echo'</div>';
					                        }
					                    }

										?>
										
										</form>
										<input type ="button" onclick="countScore()" value="送出"></input>
								</section>
							</div>
						</section>
					</article>

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
							<li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; Untitled</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>