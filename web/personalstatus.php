<?php session_start(); ?>
<!DOCTYPE html>

<html>
<head>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<title>智慧型光感應儀</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shivs.js"></script><![endif]-->
<style>
	#container {
		min-width: 310px;
		max-width: 800px;
		height: 400px;
		margin: 0 auto
	}
</style>
</head>

<body>
	<div id="container"></div>
	<?php
        $Acc = $_SESSION['account'];
		$str = array("value","time");
		$questionvalue_data = array();
		if($Acc)
            {
				$database = mysql_connect( "140.138.152.207","frank85", "ak800730" );
                    if ( !mysql_select_db( "atm", $database ) )
                       die( "Could not open database!" );
					mysql_query("SET NAMES 'UTF8'");
                    $sql = "SELECT * FROM iot_value WHERE owner='".$Acc."'";
                    $result = mysql_query($sql);
					if($result)
                    {
						while($row = mysql_fetch_assoc($result)) {
								$questionvalue_data[] = $row;
							}
							}
			}
		$json_string = json_encode($arr); 
		echo "getProfile($json_string)"; 
	?>

		

	<script>
	Highcharts.chart('container', {

    title: {
        text: 'Solar Employment Growth by Sector, 2010-2016'
    },

    subtitle: {
        text: 'Source: thesolarfoundation.com'
    },

    yAxis: {
        title: {
            text: 'Number of Employees'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            pointStart: 2010
        }
    },

    series: [{
        name: 'Installation',
        data: [16]
    }]

});
</script>
</body>
</html>