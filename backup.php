setlocale(LC_ALL,'zh_TW.UTF-8');
if(!empty($_FILES)){
  $file=fopen($_FILES['file']['tmp_name'],"r");
  fgetcsv($file);
  $area="";
  while(!feof($file)){
    $line=fgetcsv($file);
    foreach($line as $key => $val){
      if($key==0){
        $area=$val;
        continue;  
      }else{
        $month=$key;
        $count=$val;
      }
      $sql="insert into csv2 (`area`,`month`,`count`) values('$area','$month','$val')";
      $pdo->query($sql);
    }
    
  }
  echo "寫入資料庫完成!";
}