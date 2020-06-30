<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link href="register1.css" rel="stylesheet" type="text/css">
<title>註冊介面</title>
</head>
<body>
<div class="blank"></div>
<?php
if ($_POST) {
  $link = mysqli_connect("localhost","root","","database")
        or die("無法開啟MySQL資料庫連接!<br/>");
   mysqli_query($link, 'SET NAMES utf8'); 

  $username = $_POST['username'];
  $password = $_POST['password'];
  $repeat = 0;
  
  $select = "SELECT * FROM account;";
  $result = mysqli_query($link,$select);
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

  foreach ($datas as $row) {
    if($username == $row['username']){
       $repeat = 1;
    }
  }

  if($repeat == 0){
    $sql = "INSERT INTO account (username,password) VALUES ('$username','$password')";
    if(!mysqli_query($link,$sql)){
      echo "not insert";
    }
    else{
      header("Location:login.php");
    }
      mysqli_close($link);
    }
  else{
      echo "<center><font color='red'>";
      echo "使用者名稱重複!!!<br/>";
      echo "</font>";
  }
}
?>
<form action="register.php" method="post">
<table align="center" bgcolor="#FFCC99">
  <tr><td><font size="34" font color='green' >註冊帳號</font></td>
 <tr><td><font size="34">使用者名稱:</font></td>
   <td><input type="text" name="username" 
             style="font-size:36px" maxlength="10"/>
   </td></tr>
 <tr><td><font size="34">使用者密碼:</font></td>
   <td><input type="password" name="password"
              style="font-size:36px" maxlength="10"/>
   </td></tr>
 <tr><td colspan="2" align="center">
   <input type="image" src="image/register.png" onClick="document.post.submit();" style="height:80px">
   </td></tr> 
</table>
</form>
</body>
</html>