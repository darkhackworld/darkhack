<?php

$id = md5($_POST["id"]);
$folderName = $_POST["folderName"];
$target_dir = "../$id/files/$folderName/";

@mkdir($target_dir, 0777, true);
$target_file = $target_dir . basename($_FILES["file"]["name"]);

$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$size = $_FILES["file"]["size"];

// Check if image file is a actual image or fake image
if (isset($_POST["id"])) {
    $uploadOk = 1;
} else {
    echo "No id";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}