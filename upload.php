<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
$allowedFormats = array("jpg", "jpeg", "png", "pdf", "doc", "docx");
if (!in_array($fileType, $allowedFormats)) {
    echo "Hanya file JPG, JPEG, PNG, PDF, DOC, dan DOCX yang diizinkan.";
    $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 5000000000000) {
    echo "Ukuran File Terlalu Besar";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Tugas Gagal Terkirim";
} else {

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " Berhasil Terupload.";
    } else {
        echo "Terjadi Kesalahan Saat Mengupload Tugas";
    }
}
?>
  ?>