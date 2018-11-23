<?php include_once "base.php";
if(!empty($_FILES)){
  $file=$_FILES['file']['name'];
  move_uploaded_file($_FILES['file']['tmp_name'],'./file/'.$file);
  $intro=$_POST['intro'];
  $sql="insert into doc (`file`,`intro`) values('$file','$intro')";
  $pdo->query($sql);
}

header("location:list.php");
?>