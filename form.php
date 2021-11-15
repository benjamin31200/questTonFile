<?php

require_once ("tonFile.php");

if($_SERVER["REQUEST_METHOD"] === "POST" ){ 
    $uploadDir = 'public/uploads/';
    
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/form.css">
    <title>form</title>
</head>
<body>
    
</body>
</html>
<form method="post" enctype="multipart/form-data">
    <label for="imageUpload">Upload an profile image</label>    
    <input type="file" name="avatar" id="imageUpload" />
    <button name="send">Send</button>
</form>

<div class="img">
    <img src="public/uploads/<?=$_FILES['avatar']['name']?>">
    <p>Homer Simpson</p>
    <p>40ans</p>
</div>
