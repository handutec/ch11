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

  $time=time();
  switch($type){
    case "image/png":
      $dstname=$time.".png"; 
      $iconname=$time."_icon.png"; 
    break;
    case "image/gif":
      $dstname=$time.".gif";
      $iconname=$time."_icon.gif";
    break;
    case "image/jpeg":
    $dstname=$time.".jpg";
    $iconname=$time."_icon.jpg";
    break;
    default:
      echo "檔案格式不符";
      exit();
    break;
  
  }

  move_uploaded_file($tmp,'./img/'.$dstname);
  //copy($tmp,'./img/'.$file);
  //unlink($tmp);
  
}


$sql="insert into image (`file`,`icon`,`name`,`intro`,`display`) values('$dstname','$iconname','$name','$intro','1')";
echo $sql;
$pdo->query($sql);

//圖檔處理

switch($type){
  case "image/png":
    $image=imagecreatefrompng('./img/'.$dstname); //建立圖檔資源
  break;
  case "image/gif":
    $image=imagecreatefromgif('./img/'.$dstname);
  break;
  case "image/jpeg":
    $image=imagecreatefromjpeg('./img/'.$dstname);
  break;
  default:
    echo "檔案格式不符";
    exit();
  break;

}

$width=imagesx($image);  //取寬度
$height=imagesy($image); //取高度
$newIcon=imagecreatetruecolor(100,100); //建立新圖片資源
$bg = imagecolorallocate($newIcon, 255, 255, 255);
imagefill($newIcon,0,0,$bg);

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
imagecopyresampled($newIcon,$image,10,10,0,0,80,80,$width,$height);
//imagecopyresized($newIcon,$image,0,0,0,0,100,100,$width,$height);

switch($type){
  case "image/png":
    imagepng($newIcon,'./img/'.$iconname);  //存成png
  break;
  case "image/gif":
    imagejpeg($newIcon,'./img/'.$iconname);  //存成gif
  break;
  case "image/jpeg":
    imagejpeg($newIcon,'./img/'.$iconname);  //存成jpg
  break;
  default:
    echo "檔案格式不符";
    exit();
  break;

}


//刪除記憶體中的圖片資源
imagedestroy($newIcon);
imagedestroy($image);

header("location:album.php");
?>