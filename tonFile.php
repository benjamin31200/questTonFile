<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $uploadDir = 'public/uploads/';
  $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
  $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
  $better_token = (uniqid(rand(), true)) . "." . $extension;
  $authorizedExtensions = ['jpg', 'gif', 'png', 'webp'];
  $maxFileSize = 1000000;


  if ((!in_array($extension, $authorizedExtensions))) {
    $errors[] = 'Veuillez sélectionner une image de type Jpg ou gif ou Png ou webp!';
  }

  if (file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize) {
    $errors[] = "Votre fichier doit faire moins de 1M !";
  }

  if (!empty($errors)) {
    echo "Sorry, your file was not uploaded." . $errors;
  } else {
    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadFile)) {
      echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    return header("/form.php");
  }
}
