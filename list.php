<?php include_once "base.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>檔案列表</title>
  <style>
  table{
    width:500px;
    border:1px solid black;
    margin:20px auto;
    border-spacing:0;
  }
  tr:nth-child(odd){
    background:#ccc;
  }
  tr:nth-child(1){
    text-align:center;
    background:black;
    color:white;
  }
  tr:hover{
    background:lightgreen;
  }
  td:nth-child(1){
    width:50px;
    text-align:center;
    padding:5px;
  }
  td a{
    text-decoration:none;
    display:block;
    width:100%;
  }
  div{
    margin:auto;
    display:block;
    width:500px;
    text-align:center;
  }
  </style>
</head>
<body>
<div><a href="file01.php">檔案上傳</a></div>
<table>
  <tr>
    <td>編號</td>
    <td>檔案</td>
  </tr>
<?php 
  $rows=$pdo->query("select * from doc")->fetchAll();
  foreach($rows as $row){
?>
  <tr>
    <td><?=$row['id'];?></td>
    <td><a href="./file/<?=$row['file'];?>" download><?=$row['intro'];?></a></td>
  </tr>
<?php
}
?>
</table>
</body>
</html>