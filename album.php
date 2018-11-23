<?php include_once "base.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>相簿</title>
</head>
<body style="background:black">
<?php

$sql="select * from image";
$rows=$pdo->query($sql)->fetchAll();
foreach($rows as $row){
?>
  <a href="./img/<?=$row['file'];?>"><img src="./img/<?=$row['icon'];?>"></a>
<?php  
}

?>
</body>
</html>