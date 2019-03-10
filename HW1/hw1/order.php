<html>
<head>
<title>訂單內容</title>
</head>
<body>
<h1>訂單內容</h1>

Welcome <?php echo $_POST["name"]; ?><br>
Gender is: <?php echo $_POST["gender"]; ?><br>
Your cellphone is: <?php echo $_POST["phone"]; ?><br>
Your beverage is :<br>
<?php echo $_POST["blacktea"];echo $_POST["number1"];echo " 杯 "; echo $_POST["sweetness1"]; echo $_POST["icecube1"]; ?><br>
<?php echo $_POST["greentea"];echo $_POST["number2"];echo " 杯 "; echo $_POST["sweetness2"]; echo $_POST["icecube2"]; ?><br>
<?php echo $_POST["milktea"];echo $_POST["number3"];echo " 杯 "; echo $_POST["sweetness3"]; echo $_POST["icecube3"]; ?><br>
<?php 
$result1= $_POST["cost1"] * $_POST["number1"];
$result2= $_POST["cost2"] * $_POST["number2"];
$result3= $_POST["cost3"] * $_POST["number3"];
$total= $result1+$result2+$result3;
echo "總共價錢=". $total ."元"; ?><br/>

<?php
if ($total >=200){
	$total =(int) ($total * 0.9);
	echo "消費滿200打9折後價錢=" .$total ."元"; 
}
?>



</body>
</html>