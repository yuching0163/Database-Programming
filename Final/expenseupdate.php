<?php
require_once 'mysql.php';
?>
<html>
<head>
<title>修改支出紀錄</title>
<link href="expenseupdate2.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php require('header.php');?>

<?php $id = $_GET['id'];?>

<?php
$select = "SELECT * FROM expense WHERE id='$id';";
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
?>

<?php if(!empty($datas)):?>
		<?php foreach ($datas as $row):?>
		<?php $date=$row['date'];
		$category=$row['category'];
		$cost=$row['cost'];
		$remark=$row['remark'];?>

<div class="information">
  <div class="title1">修改支出紀錄</div>
  <form action="expenserecord.php" method="post">
  <div><input type="hidden" name="id" value="<?php echo $id?>"></div>
  <div><input type="hidden" name="month" value=""></div>
  <div class="insert1"><font size="70px">種類:
    <select name="category" style="font-size:40px">
  　   <option value="伙食">伙食</option>
  　   <option value="交通">交通</option>
  　   <option value="娛樂">娛樂</option>
  　   <option value="生活用品">生活用品</option>
       <option value="其它">其它</option></select>
  <br></div>
  <div class="insert2"><font size="70px">金額:<input type="text" name="cost" value="<?php echo $cost ?>" style="font-size:32px"><br></div>
  <div class="insert3"><font size="70px">備註:<input type="text" name="remark" value="<?php echo $remark ?>" style="font-size:32px"><br></div>

  <div class="button1">
    <input type="image" src="image/send.png" onClick="document.post.submit();" style="height:80px">
  </div>
  </form>
</div>
		<?php endforeach; ?>
    <?php else: ?>
      查無資料
    <?php endif; ?>

</body>
</html>