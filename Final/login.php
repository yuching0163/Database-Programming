<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>登入介面</title>
<link href="login2.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="blank"></div>
<?php
session_start();
$username = "";  
$password = "";
$correct = "";
if ( isset($_POST["Username"]) )
   $username = $_POST["Username"];
if ( isset($_POST["Password"]) )
   $password = $_POST["Password"];
if ( isset($_POST["correct"]) )
    $correct = $_POST["correct"];
if ( isset($_POST["numans"]) )
    $num=$_POST["numans"];
if ($username != "" && $password != "") {
  $link = mysqli_connect("localhost","root","","database")
        or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_query($link, 'SET NAMES utf8'); 
   $sql = "SELECT * FROM account WHERE password='";
   $sql.= $password."' AND username='".$username."'";
   $result = mysqli_query($link, $sql);
   $total_records = mysqli_num_rows($result);

   if ( $total_records > 0 ) {
      $uid = "SELECT * FROM account WHERE username='$username';";
      $result = mysqli_query($link,$uid);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
      $datas[] = $row;}
      }
    else{
     echo "{$select} 錯誤" ;  
    }
       foreach ($datas as $row){
        $id=$row['id'];}
      $_SESSION["login_session"] = true;
      $_SESSION['username'] = $_POST["Username"];
    if((int)$num == (int)$correct){
      header("Location:index.php");
    }
    else{
      echo "<center><font color='red'>";
      echo "驗證碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;    }
    }

    else { 
      echo "<center><font color='red'>";
      echo "使用者名稱或密碼錯誤!<br/>";
      echo "</font>";
      $_SESSION["login_session"] = false;
   }
   mysqli_close($link); 
}
?>

<?php
$my_array = array("img/chair.jpg","img/chicken.jpg","img/cup.jpg","img/love.jpg","img/one.jpg","img/pen.jpg","img/scissors.jpg","img/square.jpg","img/triangle.jpg","img/umbrella.jpg");
shuffle($my_array);

$num = array("0","1","2","3","4");
shuffle($num);
$num = (int)$num[0];
?>

<div class="login">
<form action="login.php" method="post">
<table align="center">
 <tr><td><font size="36">使用者名稱:</font></td>
   <td><input type="text" name="Username" 
             style="font-size:36px" maxlength="10"/>
   </td></tr>
 <tr><td><font size="36">使用者密碼:</font></td>
   <td><input type="password" name="Password"
              style="font-size:36px" maxlength="10"/>
   </td></tr>
  <tr><td><font size="36">驗證:</font></td>
   <td>
<?php
  if ($my_array[$num] == "img/chair.jpg") {
  echo "請選出綠色椅子!";
} elseif ($my_array[$num] == "img/chicken.jpg") {
  echo "請選出黑色的雞!";
} elseif ($my_array[$num] == "img/cup.jpg") {
  echo "請選出紅色杯子!";
} elseif ($my_array[$num] == "img/love.jpg") {
  echo "請選出紅色愛心!";
} elseif ($my_array[$num] == "img/one.jpg") {
  echo "請選出綠色的壹!";
} elseif ($my_array[$num] == "img/pen.jpg") {
  echo "請選出藍色的筆!";
} elseif ($my_array[$num] == "img/scissors.jpg") {
  echo "請選出藍色剪刀!";
} elseif ($my_array[$num] == "img/square.jpg") {
  echo "請選出黑色正方形!";
} elseif ($my_array[$num] == "img/triangle.jpg") {
  echo "請選出紫色三角形!";
} else {
  echo "選出藍色雨傘!";
}
?>
</table>
  <table border="1" align="center">
   </td></tr>
    <?php
    echo "<tr>";
    for ( $j = 0; $j <=4; $j++ )
        echo "<td weigh>" . "<img src=$my_array[$j]>" . "</td>";
?>
    <tr>
      <td><input type="radio" name="correct" value="0" /></td>
      <td><input type="radio" name="correct" value="1" /></td>
      <td><input type="radio" name="correct" value="2" /></td>
      <td><input type="radio" name="correct" value="3" /></td>
      <td><input type="radio" name="correct" value="4" /></td>
    </tr>
  <input type="hidden" name="numans" value="<?php echo $num;?>">
</td>
</table>
<table  align="center">
 <tr><td colspan="2" align="center">
   <input type="image" src="image/login.png" onClick="document.post.submit();" style="height:66px">
   <a href="register.php"><img src="image/register.png" width="32%" height="45%"></a>
   </td></tr> 
</table>
</form>
</div>
</body>
</html>