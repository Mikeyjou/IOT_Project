<!doctype html>
<?php session_start(); ?>
<html lang="en-US">
<head>
<title>兩數相加</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language=javascript>
function aa(){
var r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14,r15,r16,r17,r18,r19,r20;
r1=eval(myform.question_1.value);
r2=eval(myform.question_2.value);
r3=eval(myform.question_3.value);
r4=eval(myform.question_4.value);
r5=eval(myform.question_5.value);
r6=eval(myform.question_6.value);
r7=eval(myform.question_7.value);
r8=eval(myform.question_8.value);
r9=eval(myform.question_9.value);
r10=eval(myform.question_10.value);
r11=eval(myform.question_11.value);
r12=eval(myform.question_12.value);
r13=eval(myform.question_13.value);
r14=eval(myform.question_14.value);
r15=eval(myform.question_15.value);
r16=eval(myform.question_16.value);
r17=eval(myform.question_17.value);
r18=eval(myform.question_18.value);
r19=eval(myform.question_19.value);
r20=r1+r2+r3r4r5r6+r7+r8+r9+r10+r11+r12+r13+r14+r15+r16+r17+r18+r19;
myform.T20.value=r20;
}
</script>
</head>
<body>
<p><input type="button" value="相加" name="B1" onclick ="aa()"></p> 
<p>結果是：<input type="text" name="T20" size="18"></p> 
</form>
</body>
</html>