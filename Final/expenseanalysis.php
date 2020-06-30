<?php
require_once 'mysql.php';
?>

<head>
<meta charset="UTF-8">
<title>記帳分析</title>
<link rel="icon" type="image/png" href="http://example.com/myicon.png">
<link href="expenseanalysis.css" rel="stylesheet" type="text/css">

</head>
<body>
<?php require('header.php');?>
<?php require('title.php');?>

<?php 
session_start();
$uid= $_SESSION['username'];

$select = "SELECT * FROM expense WHERE uid= '$uid' ORDER BY `expense`.`date` DESC;";
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

$food = 0;
$traffic = 0;
$entertainment = 0;
$necessity = 0;
$other = 0;
foreach ($datas as $row):
$category = $row['category'];
if($category == '伙食'){
  $food = $food + $row['cost'];
}elseif ($category == '交通'){
  $traffic = $traffic + $row['cost'];
}elseif ($category == '娛樂'){
  $entertainment = $entertainment + $row['cost'];
}elseif ($category == '生活用品'){
  $necessity = $necessity + $row['cost'];
}elseif ($category == '其它'){
  $other = $other + $row['cost'];
}
endforeach;
?>

<div class="blank"></div>
<div class="title1">支出分析</div>
<div class="a1">
    <a href="expenseanalysis.php"><img src="image/expense.png" style="height:60px"></a>
    <a href="incomeanalysis.php"><img src="image/income.png" style="height:60px"></a>
</div>
<div class="information">
<div class="category1">總計伙食<?php echo $food?>元</div>
<div class="category2">總計交通<?php echo $traffic?>元</div>
<div class="category3">總計娛樂<?php echo $entertainment?>元</div>
<div class="category4">總計生活用品<?php echo $necessity?>元</div>
<div class="category5">總計其它<?php echo $other?>元</div>
</div>
<div id="flotcontainer"></div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="flot/jquery.flot.min.js"></script>
<script src="flot/jquery.flot.pie.min.js"></script> 

<!-- Javascript -->
<script>
$(function () { 
    var data = [
      {label: "交通", data: <?php echo $traffic;?>},
      {label: "伙食", data: <?php echo $food;?>},
      {label: "娛樂", data: <?php echo $entertainment;?>},
      {label: "生活用品", data: <?php echo $necessity;?>},
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
</div>
</body>