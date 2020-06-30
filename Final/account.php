<?php
require_once 'mysql.php';
?>
<html>
<head>
<title>記帳</title>
<link href="account.css" rel="stylesheet" type="text/css"> 
</head>
<body>
<?php require('header.php');?>
<?php require('title.php');?>

<?php 
session_start();
$id= $_SESSION['username'];
$point = "SELECT * FROM account WHERE username='$id';";
$result = mysqli_query($mysqli,$point);
if($result)
{
    while($row=mysqli_fetch_assoc($result))
    {
      $datas[] = $row;
    }
}
foreach ($datas as $row):
    $point=$row['point'];
?>
<div class="information">
  <div class="blank"></div>
  <form action="account.php" method="post">
  <input type="hidden" name="uid" value="<?php echo $id?>">
  <div class="title1">
    <?php $getdate=date("m月d日");
    $date=date("Y-m-d");
    $month=date("m");
    echo $getdate?>新增支出
  </div>
  <input type="hidden" name="date" value="<?php echo $date?>">
  <input type="hidden" name="month" value="<?php echo $month?>">
  <input type="hidden" name="point" value="<?php echo $point?>">
  <div class="insert1"><font size="70px">種類:
    <select name="category" style="font-size:40px">
  　   <option value="伙食">伙食</option>
  　   <option value="交通">交通</option>
  　   <option value="娛樂">娛樂</option>
  　   <option value="生活用品">生活用品</option>
       <option value="其它">其它</option></select>
  <br></div>
  <div class="insert2"><font size="70px">金額: <input type="text" name="cost" style="font-size:32px"><br></div>
  <div class="insert3"><font size="70px">備註: <input type="text" name="remark" style="font-size:32px"><br></div>
  <div class="button1">
    <input type="image" src="image/send.png" onClick="document.post.submit();" style="height:80px">
    <div class="space1"></div>
    <button type="reset"><img src="image/clean.png" style="height:80px"></button>
  </div>
  </form>
</div>

<?php
if($_POST){
$uid = $_SESSION['username'];
$date = $_POST['date'];
$month = $_POST['month'];
$category = $_POST['category'];
$cost = $_POST['cost'];
$remark = $_POST['remark'];
$point = $_POST['point'] + 1;

$sql = "INSERT INTO expense (uid,date,month,category,cost,remark) VALUES ('$uid','$date','$month','$category','$cost','$remark')";
$update = "UPDATE `account` SET `point` = '$point' WHERE `username` = '$uid'";

$result = mysqli_query($mysqli,$update);

if(!mysqli_query($mysqli,$sql))
  {
	  echo "not insert";
  }
  else
  {
    header("Location:expenserecord.php");

  }
}
?>
<?php endforeach; ?>

</body>
</html>