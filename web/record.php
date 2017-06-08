<?php session_start(); ?>
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

		<!-- Page Wrapper -->
			<div id="page-wrapper"style="font-family:微軟正黑體;">

				<!-- Header -->
					<header id="header">
						<h1><a href="index.php">智慧型光感應儀</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
										<li><a href="index.php">首頁</a></li>
											<li><a href="statistics.php">統計</a></li>
											<li><a href="elements.php">問卷</a></li>
                                            <li><a href="record.php">問卷紀錄</a></li>
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
							<h2>問卷填寫紀錄</h2>
							<p>...</p>
						</header>
						<section class="wrapper style5">
							<div class="inner">

								<h3>Lorem ipsum dolor</h3>
                    <table border="1">
                    <tr>
                        <td>問卷分數</td>
                        <td>填寫時間</td> 
                        <td>類型</td>                        
                    </tr> 

					<?php
					    $account = $_SESSION['account'];

                        $database = mysql_connect( "140.138.152.207","frank85", "ak800730" );
                        if ( !mysql_select_db( "atm", $database ) )
                           die( "Could not open database!" );
                        mysql_query("SET NAMES 'UTF8'");
                        $sql = "SELECT * FROM iot_value WHERE owner='".$account."' ORDER BY 'time' ASC";
                        $result = mysql_query($sql);
                        $value = [];
                        if($result)
                        {
                            while($row = mysql_fetch_assoc($result)) {
                                    $value[] = $row;
                            }
                        }

                        $col = array('value', 'time');
                        $type = array('絕對夜晚型', '中度夜晚型', '中間型', '中度清晨型', '絕對清晨型');
                        if(count($value) > 0)
                            for($i = 0; $i < count($value); $i++)
                            {
                                echo '<tr>';
                                for($j = 0; $j < count($value[$i]) - 1; $j++)
                                {
                                    echo '<td>';
                                    echo $value[$i][$col[$j]];
                                    echo '</td>';
                                }
                                echo '<td>'; 
                                $score = $value[$i]['value'];
                                if($score >= 16 && $score <= 30)
                                    echo $type[0];
                                else if($score >= 31 && $score <= 41)
                                    echo $type[1];
                                else if($score >= 42 && $score <= 58)
                                    echo $type[2];
                                else if($score >= 59 && $score <= 69)
                                    echo $type[3];
                                else if($score >= 70 && $score <= 86)
                                    echo $type[4];
                                echo '</td>';
                                echo '</tr>';
                            }
					?>	
                    </table>
								<hr />
                  <h4>分數說明</h4>
                <table border="1">
                <tr>
                    <td>16~30</td>
                    <td>31~41</td>
                    <td>42~58</td>
                    <td>59~69</td>
                    <td>70~86</td>
                </tr>
                <tr>
                    <td>絕對夜晚型</td>
                    <td>中度夜晚型</td>
                    <td>中間型</td>
                    <td>中度清晨型</td> 
                    <td>絕對清晨型</td>
                </tr>
                </table>
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
							<li>&copy; Untitled</li>
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