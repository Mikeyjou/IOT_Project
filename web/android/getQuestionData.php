<?php
$con = mysql_connect("140.138.152.207","frank85","ak800730");
mysql_select_db("atm");
mysql_query("set names utf8");
$user = $_GET['user'];
$sql = "SELECT * FROM iot_value WHERE owner='".$user."'";
$result = mysql_query($sql);
$question_data = array();


$res = array();

if($result && mysql_num_rows($result) > 0)
{
    while($row = mysql_fetch_assoc($result)) {
        $question_data[] = $row;
    }

    for($i = 0; $i < count($question_data); $i++)
    {
        array_push($res,array(
            "owner"=>$question_data[$i]['owner'],
            "value"=>$question_data[$i]['value'],
            "time"=>$question_data[$i]['time'],
        ));
    }
}

echo json_encode(array("result"=>$res));
 
mysqli_close($con);
?>