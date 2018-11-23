<?php include_once "base.php";
setlocale(LC_ALL,'zh_TW.UTF-8');
if(!empty($_FILES)){
  $file=fopen($_FILES['file']['tmp_name'],"r");
  fgetcsv($file);
  while(!feof($file)){
    $line=fgetcsv($file);
    $sql="insert into csv values('".$line[0]."',
    '".$line[1]."',
    '".$line[2]."',
    '".$line[3]."',
    '".$line[4]."',
    '".$line[5]."',
    '".$line[6]."',
    '".$line[7]."',
    '".$line[8]."',
    '".$line[9]."',
    '".$line[10]."',
    '".$line[11]."',
    '".$line[12]."')";
    $pdo->query($sql);
    
  }
  echo "寫入資料庫完成!";
}

?>