<?php
include_once "base.php";

$BOM = chr(0xEF).chr(0xBB).chr(0xBF); //BOM頭,部份編輯器需有BOM頭才能正確辦識編碼

$rows=$pdo->query("select * from csv")->fetchAll();//讀出資料

$filename=date('Ymd').".csv"; //建立檔名
$file=fopen($filename,'w'); //建立檔案,以寫入模式開啟
fwrite($file,$BOM);  //先寫入BOM頭
foreach($rows as $row){
  $str=implode(',',$row)."\n";
  fwrite($file,$str);
}
fclose($file);  //關閉檔案

echo "<a href='$filename' download>$filename</a>";
?>