<?php
$con = mysql_connect("140.138.152.207","frank85","ak800730");
mysql_select_db("atm");
mysql_query("set names utf8");
$sql = "SELECT * FROM iot_questionnaire";
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
            "id"=>$question_data[$i]['id'],
            "questionTitle"=>$question_data[$i]['questionTitle'],
            "questionOption"=>$question_data[$i]['questionOption'],
            "questionValue"=>$question_data[$i]['questionValue'],
        ));
    }
}

echo json_encode(array("result"=>$res));
 
mysqli_close($con);
?>