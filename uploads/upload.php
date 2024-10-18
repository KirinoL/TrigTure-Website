<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Selamat, Tugas Kamu Berhasil Terkirim - " . $check["mime"] . "." . "<br>";
    $uploadOk = 1;
  } else {
    echo "Maaf, Tugas Kamu Gagal Terkirim Karena Format File Tidak Sesuai";
    $uploadOk = 0;
  }
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000000000) {
    echo "Maaf, Ukuran File Kamu Terlalu Besar";
    $uploadOk = 0;
  }
  
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    echo "Maaf, Tugas Kamu Gagal Terkirim Karena Format File Tidak Sesuai";
    $uploadOk = 0;
  }
  
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Maaf, Tugas Kamu Gagal Terkirim";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "File ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " Berhasil Terupload.";
    } else {
      echo "Maaf, Telah Terjadi Error Pada Saat Mengupload Tugas";
    }
  }
  ?>