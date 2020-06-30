<html>
<head>
<title>記帳小屋</title>
<link href="index4.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php require('header.php');?>
<?php session_start();
if ( $_SESSION["login_session"] != true ) 
   header("Location:login.php");
?>
<?php 
$id= $_SESSION['username'];
?>
<div class="information">
  <div class="blank"></div>
  <div class="image1">
    <div class="icon1">
    	<a href="account.php"><img src="image/accounticon.png" width="30%" height="21%"></a>
    	<a href="income.php"><img src="image/incomeicon.png" width="30%" height="21%"></a>
    </div>
    </br>
   	<div class="icon2">
   		<a href="expenserecord.php"><img src="image/recordicon.png" width="30%" height="21%"></a>
   		<a href="expenseanalysis.php"><img src="image/analysisicon.png" width="30%" height="21%"></a>
   	</div>
  </div>
</div>

</body>
</html>