<html>
<head>
<title>新鮮飲料店</title>
<link href="total1.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1>Welcome Fresh Tea Shop</h1>

<div class="information">
  <form action="order.php" method="post">
  <div class="c1">基本資料填寫</br></div>
  <div class="c2">姓名: <input type="text" name="name"></br></div>
  <div class="c3">性別: <input type="radio" name="gender" value="男" checked="True"/>男
  <input type="radio" name="gender" value="女"/>女<br></div>
  <div class="c4">電話: <input type="Integer" name="phone"><br></div>
</div>

<div>
  <table border="1px">
    <tr>
      <td>飲料</td>
      <td>價錢</td>
      <td>甜度</td> 
      <td>冰塊</td>
      <td>數量</td>
      <td>圖片</td>
    </tr>
    <tr>
      <td><input type="hidden" name="blacktea" value="紅茶" />紅茶</td>
      <td><input type="hidden" name="cost1" value="25" />25元</td>
      <td><select name="sweetness1">
  　		<option value="全糖">全糖</option>
  　		<option value="少糖">少糖</option>
  　		<option value="半糖">半糖</option>
  　		<option value="微糖">微糖</option>
  		<option value="無糖">無糖</option></td>
      <td><select name="icecube1">
  　		<option value="正常冰">正常冰</option>
  　		<option value="少冰">少冰</option>
  　		<option value="微冰">微冰</option>
  		<option value="去冰">去冰</option></td>
  	<td><select name="number1">
  		<option value="0">0</option>
  　		<option value="1">1</option>
  　		<option value="2">2</option>
  　		<option value="3">3</option>
  		<option value="4">4</option>
  		<option value="5">5</option></td>
    <td><img src="img/blacktea.jpg" width="25%" height="40%"></img></td>
    </tr>
    <tr>
      <td><input type="hidden" name="greentea" value="綠茶" />綠茶</td>
      <td><input type="hidden" name="cost2" value="25" />25元</td>
      <td><select name="sweetness2">
  　		<option value="全糖">全糖</option>
  　		<option value="少糖">少糖</option>
  　		<option value="半糖">半糖</option>
  　		<option value="微糖">微糖</option>
  		<option value="無糖">無糖</option></td>
      <td><select name="icecube2">
  　		<option value="正常冰">正常冰</option>
  　		<option value="少冰">少冰</option>
  　		<option value="微冰">微冰</option>
  		<option value="去冰">去冰</option></td>
  	<td><select name="number2">
  		<option value="0">0</option>
  　		<option value="1">1</option>
  　		<option value="2">2</option>
  　		<option value="3">3</option>
  		<option value="4">4</option>
  		<option value="5">5</option></td>
      <td><img src="img/greentea.jpg" width="30%" height="40%"></img></td>
    </tr>
    <tr>
      <td><input type="hidden" name="milktea" value="奶茶" />奶茶</td>
      <td><input type="hidden" name="cost3" value="30" />30元</td>
      <td><select name="sweetness3">
  　		<option value="全糖">全糖</option>
  　		<option value="少糖">少糖</option>
  　		<option value="半糖">半糖</option>
  　		<option value="微糖">微糖</option>
  		<option value="無糖">無糖</option></td>
      <td><select name="icecube3">
  　		<option value="正常冰">正常冰</option>
  　		<option value="少冰">少冰</option>
  　		<option value="微冰">微冰</option>
  		<option value="去冰">去冰</option></td>
  	<td><select name="number3">
  		<option value="0">0</option>
  　		<option value="1">1</option>
  　		<option value="2">2</option>
  　		<option value="3">3</option>
  		<option value="4">4</option>
  		<option value="5">5</option></td>
      <td><img src="img/milktea.jpg" width="25%" height="40%"></img></td>
    </tr>
  </table><br/>
</div>

<input type="submit" style="width:50px;height:50px;">
<input type="reset" value="清除表單" style="width:100px;height:50px;"><br/><br/>

</form>


</body>
</html>
