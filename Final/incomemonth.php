<?php
require_once 'mysql.php';
?>
<head>
<title>查詢收入紀錄</title>
<link href="incomerecord2.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php require('header.php');?>
<?php require('title.php');?>

<?php 
session_start();
$uid= $_SESSION['username'];
?>
<?php $id = $_GET['id'];?>

<div class="blank"></div>
<?php
if($_POST){
	$month = $_POST['month'];
	if($month!=null){
	   header("Location:incomemonth.php?id=$month");	
	}
	else{
	$id = $_POST['id'];
	$category = $_POST['category'];
	$cost = $_POST['cost'];
	$remark = $_POST['remark'];

	$update = "UPDATE `income` SET `category` = '$category',`cost` = '$cost',`remark` = '$remark' WHERE `id` = $id";
	$result = mysqli_query($mysqli,$update);
	}
}
?>

<?php
$select = "SELECT * FROM income WHERE uid= '$uid' && month= '$id' ORDER BY `income`.`date` DESC;";
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
<div class="record">
    <a href="expenserecord.php"><img src="image/expense.png" style="height:60px"></a>
    <a href="incomerecord.php"><img src="image/income.png" style="height:60px"></a>
    <form a action="incomemonth.php?id=$month" method="post">
       <select name="month" style="font-size:34px">
  　   <option value="01">一月</option>
  　   <option value="02">二月</option>
  　   <option value="03">三月</option>
  　   <option value="04">四月</option>
  　   <option value="05">五月</option>
  　   <option value="06">六月</option>
	   <option value="07">七月</option>
	   <option value="08">八月</option>
       <option value="09">九月</option>
	   <option value="10">十月</option>
	   <option value="11">十一月</option>
	   <option value="12">十二月</option></select></a>
       <button type="submit" style="font-size:26px">搜尋</button>
   </form>
</div>
<?php if(!empty($datas)):?>
	<table border="1px" align="center" style="font-size:42px;">
		<tr><td>日期</td>
			<td>種類</td>
			<td>價錢</td>
			<td>備註</td>
			<td>修改</td>
			<td>刪除</td>
		</tr>
		<?php foreach ($datas as $row):?>
			<tr><td><?php echo $row['date'];?></td> 
			<td><?php echo $row['category'];?></td> 
			<td><?php echo $row['cost'];?></td>
			<td><?php echo $row['remark'];?></td> 
			<td><a href="incomeupdate.php?id=<?php echo $row['id'];?>">修改</a></td>
			<td><a href="incomedelete.php?id=<?php echo $row['id'];?>">刪除</a></td>
			</tr>
	<?php endforeach; ?>
	</table>
	<?php else: ?>
	查無資料
	<?php endif; ?>

</body>
</html>