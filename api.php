<?php
include_once "base.php";

//表單欄位檢查
if(!empty($_POST)){
$name=$_POST['name'];
$intro=$_POST['intro'];
}else{
  echo "無表單資料";
  exit();
}

//上傳檔案檢查
if(!empty($_FILES)){
  $tmp=$_FILES['img']['tmp_name'];  //暫存路徑
  $filename=$_FILES['img']['name']; //原始檔名
  $type=$_FILES['img']['type'];     //檔案類型
  $size=$_FILES['img']['size'];     //檔案大小
  $file=time().".jpg";  
  move_uploaded_file($tmp,'./img/'.$file);
  
}

$icon=time()."_icon.jpg";
$sql="insert into image (`file`,`icon`,`name`,`intro`,`display`) values('$file','$icon','$name','$intro','1')";
echo $sql;
$pdo->query($sql);

//圖檔處理

switch($type){
  case "image/png":
    $image=imagecreatefrompng('./img/'.$file); //建立圖檔資源
  break;
  case "image/gif":
    $image=imagecreatefromgif('./img/'.$file);
  break;
  case "image/jpeg":
    $image=imagecreatefromjpeg('./img/'.$file);
  break;
  default:
    echo "檔案格式不符";
    exit();
  break;

}

$width=imagesx($image);  //取寬度
$height=imagesy($image); //取高度
$newIcon=imagecreatetruecolor(100,100); //建立新圖片資源

if($width>$height){
  $x=round(($width-$height)/2);
  $y=0;
  $edge=$height;
}elseif($width<$height){
  $x=0;
  $y=round(($height-$width)/2);
  $edge=$width;
}else{
  $x=0;
  $y=0;
  $edge=$width;
}


//imagecopyresized($newIcon,$image,0,0,$x,$y,100,100,$edge,$edge);  //執行縮放取樣
//imagecopyresampled($newIcon,$image,0,0,$x,$y,100,100,$edge,$edge);
imagecopyresampled($newIcon,$image,0,0,0,0,100,100,$width,$height);

imagejpeg($newIcon,'./img/'.$icon);  //存成jpg
//imagepng($newIcon,'./img/'.$icon."_icon.png");   //存成png

//刪除記憶體中的圖片資源
imagedestroy($newIcon);
imagedestroy($image);

header("location:album.php");
?>