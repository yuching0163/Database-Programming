<?php
require_once 'mysql.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>刪除資料</title>
</head>
<body>
<?php $id = $_GET['id'];?>
<?php	
$total = array();
$select = "SELECT * FROM expense;";
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

$sql ="DELETE FROM expense WHERE id=".$_GET[id];
mysqli_query($mysqli,$sql)or die ('無法刪除'.mysql_error());

header("Location:expenserecord.php");
?>

</body>
</html>