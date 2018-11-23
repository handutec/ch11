<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>檔案上傳管理</title>
</head>
<body>
  <form action="api_file1.php" enctype="multipart/form-data" method="post">
  <table style="width:300px;margin:20px auto;">
    <tr>
      <td>檔案:</td>
      <td><input type="file" name="file"></td>
    </tr>
    <tr>
      <td>說明:</td>
      <td><input type="text" name="intro"></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" value="上傳">
        <input type="reset" value="重置">
      </td>
    </tr>
  </form>
</body>
</html>