<?php
require_once 'mysql.php';
?>

<head>
<meta charset="UTF-8">
<title>記帳分析</title>
<link rel="icon" type="image/png" href="http://example.com/myicon.png">
<link href="incomeanalysis1.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php require('header.php');?>
<?php require('title.php');?>

<?php 
session_start();
$uid= $_SESSION['username'];

$select = "SELECT * FROM income WHERE uid= '$uid' ORDER BY `income`.`date` DESC;";
$result = mysqli_query($mysqli,$select);

if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
      $datas[] = $row;
    }
}
else{
  echo "{$select} 錯誤" ;
}

$salary = 0;
$bonus = 0;
$lifeexpense = 0;
$necessity = 0;
$other = 0;
foreach ($datas as $row):
$category = $row['category'];
if($category == '薪水'){
  $salary = $salary + $row['cost'];
}elseif ($category == '獎金'){
  $bonus = $bonus + $row['cost'];
}elseif ($category == '生活費'){
  $lifeexpense = $lifeexpense + $row['cost'];
}elseif ($category == '其它'){
  $other = $other + $row['cost'];
}
endforeach;
?>

<div class="blank"></div>
<div class="title1">收入分析</div>
    <a href="expenseanalysis.php"><img src="image/expense.png" style="height:60px"></a>
    <a href="incomeanalysis.php"><img src="image/income.png" style="height:60px"></a>
<div class="information">
總計薪水<?php echo $salary?>元</br>
總計獎金<?php echo $bonus?>元</br>
總計生活費<?php echo $lifeexpense?>元</br>
總計其它<?php echo $other?>元</br>
</div>
<div id="flotcontainer"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="flot/jquery.flot.min.js"></script>
<script src="flot/jquery.flot.pie.min.js"></script> 

<!-- Javascript -->
<script>

$(function () { 
    var data = [
      {label: "獎金", data: <?php echo $bonus;?>},
      {label: "薪水", data: <?php echo $salary;?>},
      {label: "娛樂", data: <?php echo $lifeexpense;?>},
      {label: "其它", data: <?php echo $other;?>}
    ];

    var options = {
     series: {
        pie: {
            innerRadius: 0,
            show: true
          }
        },

        legend: {
            show: false
        }
    };

    $.plot($("#flotcontainer"), data, options);  
});
</script>
</body>