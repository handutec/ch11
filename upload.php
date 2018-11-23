<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>圖片上傳</title>
  <style>
    form{
      margin:20px auto;
      display:block;
      width:400px;
    }
    input[type=file],input[type=text]{
      margin:10px;
      padding:5px;
      width:200px;
    }
    textarea{
      vertical-align:top;
      width:200px;
      height:50px;
      padding:5px;
      margin:10px;
    }
  </style>
</head>
<body>
  <form action="api.php" method="post" enctype="multipart/form-data">
    檔案:<input type="file" name="img"><br>
    名稱:<input type="text" name="name"><br>
    說明:<textarea name="intro"></textarea><br>
    <input type="submit" value="送出"> 
    <input type="reset" value="重置">
  </form>
</body>
</html>