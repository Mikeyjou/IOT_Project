<!doctype html>
<?php session_start(); ?>
<html lang="en-US">
<head>
<title>atM</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Light Theme</title>
<script language=javascript>
function aa(){
		var r1,r2,r3,r4,r5,r6,r7,r8,r9,r10,r11,r12,r13,r14,r15,r16,r17,r18,r19,r20;
		var form = document.getElementById("myform");
		for (var i=0; i< form.question_1.length; i++)
		{
		   if (form.question_1[i].checked)
		   {
			  r1 = form.question_1[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_2.length; i++)
		{
		   if (form.question_2[i].checked)
		   {
			  r2 = form.question_2[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_3.length; i++)
		{
		   if (form.question_3[i].checked)
		   {
			  r3 = form.question_3[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_4.length; i++)
		{
		   if (form.question_4[i].checked)
		   {
			  r4 = form.question_4[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_5.length; i++)
		{
		   if (form.question_5[i].checked)
		   {
			  r5 = form.question_5[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_6.length; i++)
		{
		   if (form.question_6[i].checked)
		   {
			  r6 = form.question_6[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_7.length; i++)
		{
		   if (form.question_7[i].checked)
		   {
			  r7 = form.question_7[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_8.length; i++)
		{
		   if (form.question_8[i].checked)
		   {
			  r8 = form.question_8[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_9.length; i++)
		{
		   if (form.question_9[i].checked)
		   {
			  r9 = form.question_9[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_10.length; i++)
		{
		   if (form.question_10[i].checked)
		   {
			  r10 = form.question_10[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_11.length; i++)
		{
		   if (form.question_11[i].checked)
		   {
			  r11 = form.question_11[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_12.length; i++)
		{
		   if (form.question_12[i].checked)
		   {
			  r12 = form.question_12[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_13.length; i++)
		{
		   if (form.question_13[i].checked)
		   {
			  r13 = form.question_13[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_14.length; i++)
		{
		   if (form.question_14[i].checked)
		   {
			  r14 = form.question_14[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_15.length; i++)
		{
		   if (form.question_15[i].checked)
		   {
			  r15 = form.question_15[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_16.length; i++)
		{
		   if (form.question_16[i].checked)
		   {
			  r16 = form.question_16[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_17.length; i++)
		{
		   if (form.question_17[i].checked)
		   {
			  r17 = form.question_17[i].value;
			  break;
		   }
		}
		for (var i=0; i< form.question_18.length; i++)
		{
		   if (form.question_18[i].checked)
		   {
			  r18 = form.question_18[i].value;
			  break;
		   }
		}
		for (var i=0; i<form.question_19.length; i++)
		{
		   if (form.question_19[i].checked)
		   {
			  r19 = form.question_19[i].value;
			  break;
		   }
		}
		r20=parseInt(r1)+ parseInt(r2)+ parseInt(r3)+ parseInt(r4)+parseInt(r5)+ parseInt(r6)+ parseInt(r7)+ parseInt(r8)+parseInt(r9)+ parseInt(r10)+ parseInt(r11)+ parseInt(r12)+parseInt(r13)+ parseInt(r14)+ parseInt(r15)+ parseInt(r16)+parseInt(r17)+ parseInt(r18)+ parseInt(r19);
		myform.T20.value= r20;
		alert(myform.T20.value);
	    var addvalue= r20;
		location.href="setvalue.php?addvalue="+addvalue ;
		}
		
</script>
</head>
<body>
		<div>
        	<form name="myform" id= "myform"> 
			1. 如果你能夠完全自由地計劃白天的時間，你希望大約在什麼時間起床? <br>
				<input type="radio" value="1" name="question_1"> 早上 11 點至正午 12 點 (11:00-12:00 h)</input><br>
				<input type="radio" value="2" name="question_1"> 早上 9 點 45 分至 11 點 (09:45-11:00 h)</input><br>
				<input type="radio" value="3" name="question_1"> 早上 7 點 45 分至 9 點 45 分(07:45-09:45 h)</input><br>
				<input type="radio" value="4" name="question_1"> 早上 6 點半至 7 點 45 分(06:30-07:45 h)</input><br>
				<input type="radio" value="5" name="question_1"> 早上 5 點至 6 點半 (05:00-06:30 h)</input><br><p>
			2. 如果你能夠完全自由地計劃夜晚，你希望大約在什麼時間去睡覺?  <br>
				<input type="radio" value="1" name="question_2"> 凌晨 1 點 45 分至 3 點 (01:45-03:00 h)</input><br>
				<input type="radio" value="2" name="question_2"> 凌晨 12 點半至 1 點 45 分(00:30-01:45 h)</input><br>
				<input type="radio" value="3" name="question_2"> 晚上 10 點 15 分至 12 點半(22:15-00:30 h)</input><br>
				<input type="radio" value="4" name="question_2"> 晚上 9 點至 10 點 15 分(21:00-22:15 h)</input><br>
				<input type="radio" value="5" name="question_2"> 晚上 8 點至 9 點(20:00-21:00 h)</input><br><p>
			3. 如果你要在早上的某個時刻起床，你會有多麼依賴鬧鐘來喚醒你? <br>
				<input type="radio" value="1" name="question_3"> 非常依賴</input><br>
				<input type="radio" value="2" name="question_3"> 比較依賴</input><br>
				<input type="radio" value="3" name="question_3"> 略為依賴</input><br>
				<input type="radio" value="4" name="question_3"> 完全不依賴</input><br><p>			
			4. 在早上時，你有多容易起床?（當你沒有被突如其來的事喚醒） <br>
				<input type="radio" value="1" name="question_4"> 非常困難</input><br>
				<input type="radio" value="2" name="question_4"> 比較困難</input><br>
				<input type="radio" value="3" name="question_4"> 一般容易</input><br>
				<input type="radio" value="4" name="question_4"> 非常容易</input><br><p>
			5. 早上起床後的半小時內，你有精神? <br>
				<input type="radio" value="1" name="question_5"> 完全不精神</input><br>
				<input type="radio" value="2" name="question_5"> 小小精神</input><br>
				<input type="radio" value="3" name="question_5"> 一般精神</input><br>
				<input type="radio" value="4" name="question_5"> 非常精神</input><br><p>
			6. 在起床後的半小時內，你感到有多肚餓?<br>
				<input type="radio" value="1" name="question_6"> 完全不肚餓</input><br>
				<input type="radio" value="2" name="question_6"> 小小肚餓</input><br>
				<input type="radio" value="3" name="question_6"> 一般肚餓</input><br>
				<input type="radio" value="4" name="question_6"> 非常肚餓</input><br><p>
			7. 清晨起床後的半小時內，你的感覺如何? <br>
				<input type="radio" value="1" name="question_7"> 非常疲倦</input><br>
				<input type="radio" value="2" name="question_7"> 稍為疲倦</input><br>
				<input type="radio" value="3" name="question_7"> 一般清醒</input><br>
				<input type="radio" value="4" name="question_7"> 非常清醒</input><br><p>
			8. 如果在第二天你沒有任何約會，相比你平時慣常的時間，你會選擇什麼時間去睡覺? 	<br>
				<input type="radio" value="1" name="question_8"> 較平常推遲兩小時以上</input><br>
				<input type="radio" value="2" name="question_8"> 較平常推遲 1-2 小時小小精神</input><br>
				<input type="radio" value="3" name="question_8"> 較平常推遲不到一小時一般精神</input><br>
				<input type="radio" value="4" name="question_8"> 較平常推遲很少或從不推遲非常精神</input><br><p>
			9. 假設你決定要開始做運動，你的朋友建議你應一周進行兩次一小時的運動，而且在早上 7-8 點(07-08h)為最佳時間。<br>
			   請緊記你只需考慮自己的生理時鐘，你認為你會表現得怎麼樣? <br>
				<input type="radio" value="1" name="question_9"> 非常難以執行</input><br>
				<input type="radio" value="2" name="question_9"> 難以執行</input><br>
				<input type="radio" value="3" name="question_9"> 幾好地表現</input><br>
				<input type="radio" value="4" name="question_9"> 很好的表現</input><br><p>
			10. 在夜晚你大約到什麼時候你會感到疲倦，而且需要睡覺? <br>
				<input type="radio" value="1" name="question_10">  凌晨 2 點至 3 點(02:00-03:00 h)</input><br>
				<input type="radio" value="2" name="question_10">  凌晨 12 點 45 分至 2 點 (00:45-02:00 h)</input><br>
				<input type="radio" value="3" name="question_10"> 晚上 10 點 15 分至 12 點 45 分(22:15-00:45 h)</input><br>
				<input type="radio" value="4" name="question_10"> 晚上 9 點至 10 點 15 分 (21:00-22:15 h)</input><br>
				<input type="radio" value="5" name="question_10"> 晚上 8 點至 9 點 (20:00-21:00 h)</input><br><p>
			11. 假設你希望在一項會令你精神疲累而且需持續兩個小時的測試中取得最佳表現時，<br>
				如果你能完全自由地計劃你的時間，僅需考慮你自己的生理時鐘，你會選擇以下哪段考試時間? <br>
				<input type="radio" value="6" name="question_11"> 早上 8 點至 10 點(08:00-10:00 h)</input><br>
				<input type="radio" value="4" name="question_11">早上 11 點至下午 1 點(11:00-13:00 h) </input><br>
				<input type="radio" value="2" name="question_11">下午 3 點至下午 5 點(15:00-17:00 h)</input> <br>
				<input type="radio" value="0" name="question_11">晚上 7 點至 9 點(19:00-21:00 h) </input><br><p>
			12. 如果你要在晚上 11 點(23:00 h)去睡覺,你會有多疲累? 		<br>	
				<input type="radio" value="0" name="question_12">完全不疲累</input><br>
				<input type="radio" value="2" name="question_12">小小疲累</input><br>
				<input type="radio" value="3" name="question_12">一般疲累 </input><br>
				<input type="radio" value="5" name="question_12">非常疲累 </input><br><p>
			13. 假設因為某些原因，你比平時遲幾個小時去睡覺，但又不需在第二天<br>
				早上的特定時間起床，你最可能出現以下哪種情況? 	<br>
				<input type="radio" value="1" name="question_13"> 較平常的時間遲起床</input><br>
				<input type="radio" value="2" name="question_13"> 按平常的時間起床，然後再睡</input><br>
				<input type="radio" value="3" name="question_13"> 按平常的時間起床，但感到昏昏欲睡</input><br>
				<input type="radio" value="4" name="question_13"> 按平常的時間起床，而且不會再睡</input><br><p>
			14. 假設因為你要當夜更，而你要在清晨 4-6 點(04:00-06:00 h)時候需要保持清醒，<br>
			第二天你沒有任何約會。以下哪種情況最適合你? 			<br>
				<input type="radio" value="1" name="question_14">當夜更結束後才去睡覺</input><br>
				<input type="radio" value="2" name="question_14">當夜更前片刻小睡，而結束後再睡覺</input><br>
				<input type="radio" value="3" name="question_14">當夜更前睡一覺，結束後再小睡</input><br>
				<input type="radio" value="4" name="question_14">只在當夜更前睡一覺</input><br><p>
			15. 假設你需要進行一項兩小時的艱鉅體力工作，你可以完全自由地計劃時間，僅需考慮你自己的生理時鐘，你會選擇以下哪個時段?<br>
				<input type="radio" value="1" name="question_15">夜晚 7 點-9 點 (19:00-21:00 h)	</input> <br>
				<input type="radio" value="2" name="question_15">下午 3 點-5 點 (15:00-17:00 h)</input><br>
				<input type="radio" value="3" name="question_15">上午 11 點-下午 1 點 (11:00-13:00 h)</input> <br>
				<input type="radio" value="4" name="question_15">上午 8 點-10 點 (08:00-10:00 h)</input><br><p>
			16. 假設你決定要開始做運動，你的朋友建議你應一周進行兩次一小時的運動，<br>
			而且在晚上 10-11 點(22:00-23:00 h)為最佳時間。請緊記你只需考慮自己的生理時鐘，你認為你會有怎麼樣的表現?<br>
				<input type="radio" value="1" name="question_16">很好的表現 </input><br>
				<input type="radio" value="2" name="question_16">幾好的表現 </input><br>
				<input type="radio" value="3" name="question_16">難以執行</input> <br>
				<input type="radio" value="4" name="question_16">非常難以執行</input> <br><p>
			17. 假設你可以選擇自己的工作時間，你每天只需工作 5 個小時(包括休息時間)，而這項工作是很有趣的，<br>
			酬金會依據你的工作表現，你會選擇以下哪個時段呢?<br>
				<input type="radio" value="1" name="question_17">五個小時，由下午 5 點至凌晨 4 點期間開始 (17:00-04:00 h)</input> <br>
				<input type="radio" value="2" name="question_17">五個小時，由下午 2 點至 5 點期間開始 (14:00-17:00 h)</input> <br>
				<input type="radio" value="3" name="question_17">五個小時，由早上 9 點至下午 2 點期間開始 (09:00-14:00 h)</input> <br>
				<input type="radio" value="4" name="question_17">五個小時，由早上 8 點至 9 點期間開始 (08:00-09:00 h)</input> <br>
				<input type="radio" value="5" name="question_17">五個小時，由早上 4 點至 8 點期間開始 (04:00-08:00 h)</input> <br><p>
			18. 一天之中以下哪個時段是你的最佳時間?<br>
				<input type="radio" value="1" name="question_18">晚上 10 點至凌晨 5 點 (22:00-05:00 h)</input> <br>
				<input type="radio" value="2" name="question_18">下午 5 點至 10 點 (17:00-22:00 h) </input><br>
				<input type="radio" value="3" name="question_18">早上 10 點至下午 5 點 (10:00-17:00 h)</input><br>
				<input type="radio" value="4" name="question_18">早上 8 點至 10 點 (08:00-10:00 h)</input> <br>
				<input type="radio" value="5" name="question_18">早上 5 點至 8 點 (05:00-08:00 h)</input> <br><p>
			19. 人可分為“清晨”型和“夜晚”型,你認為你自己屬於哪一類型?<br>
				<input type="radio" value="0" name="question_19">絕對“夜晚”型</input><br>
				<input type="radio" value="2" name="question_19">“夜晚”型多過“清晨”型 </input><br>
				<input type="radio" value="4" name="question_19">“清晨”型多過“夜晚”型 </input><br>
				<input type="radio" value="6" name="question_19">絕對“清晨”型 </input><br><p>	
			<p><input type="button" value="相加" name="B1" onclick ="aa()"></p> 
			<p>結果是：<input type="text" name="T20" size="18"></p> 
			
			</form>
		</div>
		
	</div>
	
</body>
</html>
