<?php include_once "base.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>檔案輸出下載</title>
  <style>
    table{
      width:800px;
      border-spacing:0px;
      border:1px solid black;
      margin:20px auto;
    }
    
    tr:nth-child(odd){
      background:lightgreen;
    }
    td:nth-child(1){
      background:blue;
      color:lightblue;
    }
    tr:nth-child(1){
      background:black;
      color:white;
    }
    td{
      border:1px solid #999;
      padding:10px;
      text-align:center;
    }
  </style>
</head>
<body>
<table>
  <tr>
    <td>區域別</td>
    <td>一月</td>
    <td>二月</td>
    <td>三月</td>
    <td>四月</td>
    <td>五月</td>
    <td>六月</td>
    <td>七月</td>
    <td>八月</td>
    <td>九月</td>
    <td>十月</td>
    <td>十一月</td>
    <td>十二月</td>
  </tr>
  <?php 
$rows=$pdo->query("select * from csv")->fetchAll();
foreach($rows as $row){
  ?>
  <tr>
    <td><?=$row[0];?></td>
    <td><?=$row[1];?></td>
    <td><?=$row[2];?></td>
    <td><?=$row[3];?></td>
    <td><?=$row[4];?></td>
    <td><?=$row[5];?></td>
    <td><?=$row[6];?></td>
    <td><?=$row[7];?></td>
    <td><?=$row[8];?></td>
    <td><?=$row[9];?></td>
    <td><?=$row[10];?></td>
    <td><?=$row[11];?></td>
    <td><?=$row[12];?></td>
  </tr>
  <?php 
}
  ?>
</table>
<div style="text-align:center"><a href="output.php">我要下載</a></div>
</body>
</html>