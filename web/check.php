<html>
	<head>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="content-type" content="text/html" charset="UTF-8" />
	</head>

	<body>
		<form method = "post" action = "main.html">
		<div id="wrap">
	    <div id="masthead"></div>
		<div id="menu"></div>
		<?php
		$userAcc = trim($_POST["account"]);
		$userPwd = trim($_POST["password"]);

		$database = mysql_connect( "140.138.152.207","frank85", "ak800730" );
		if ( !mysql_select_db( "atm", $database ) )
		   die( "Could not open database!" );
		// 比對其帳號與密碼
		$sql = "SELECT * FROM iotuser WHERE account = '".mysql_real_escape_string($userAcc)."' AND password = '".mysql_real_escape_string($userPwd)."' ";
		$result = mysql_query( $sql, $database );
		$row = mysql_fetch_row($result);

		// 依檢查結果分別導向主作業畫面與錯誤警告畫面
		if ($row != null && $userAcc != null && $userPwd != null) {
			header("location:main.html");
			exit;
		}
		else {
			echo("<center>");
			echo("<h1><p>Error!</p>");
			echo("<p>Please back to login again!</p></h1>");
			echo("</center>");
			echo("<p></p>");
			echo("<input type='submit' value='back' >");
			exit;
		}
		?>
		</div>
	</body>
</html>
