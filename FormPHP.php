<!DOCTYPE html>
<html>
<head>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");
        body {
            font-family: "Poppins", sans-serif;
            background-image: url('UM Rektorat.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .hasil {
            width: 600px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            color: #fff;
            padding: 30px 40px;
            border-radius: 15px;
        }

        .hasil h2 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .elemen-hasil {
            margin-bottom: 10px;
        }

        .elemen-hasil strong {
            color: #ffbf00;
        }
        .tombol-kembali {
            display: block;
            margin-top: 20px;
            padding: 10px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <?php
    function validateNIM($nim) {
        return (strlen($nim) == 12);
    }

    function validateInput($input) {
        return !empty($input);
    }

    $nimErr = $namaErr = $universitasErr = $departErr = $klsErr = $nimErr = "";
    $nim = $nama = $universitas = $depart = $kls = $nim = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $universitas = $_POST['universitas'];
        $depart = $_POST['depart'];
        $kls = $_POST['kls'];
        $nim = $_POST['nim'];

        if (!validateNIM($nim)) {
        $nimErr = "NIM harus berisi 12 karakter";
        } elseif (!preg_match("/^[0-9]*$/",$nim)){
        $nimErr = "NIM hanya boleh menggunakan angka.";
        }

        if (!validateInput($nama)) {
        $namaErr = "Nama Mahasiswa harus diisi.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
        $namaErr = "Nama Mahasiswa hanya boleh menggunakan huruf.";
        }

        if (!validateInput($universitas)) {
        $universitasErr = "Nama universitas harus diisi.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $universitas)) {
        $universitasErr = "Nama universitas hanya boleh menggunakan huruf.";
        }

        if (!validateInput($depart)) {
        $departErr = "Departemen/program studi harus diisi.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $depart)) {
        $departErr = "Departemen/program studi hanya boleh menggunakan huruf.";
        }

        if (!validateInput($kls)) {
        $klsErr = "Nama offering/kelas harus diisi.";
        } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $kls)) {
        $klsErr = "Nama offering/kelas hanya boleh menggunakan huruf.";
        }
    }
    ?>

    <div class="hasil">
    <?php if (empty($nimErr) && empty($namaErr) && empty($universitasErr) && empty($departErr) && empty($klsErr)) {
            echo '<h2>DATA PENGUNJUNG</h2>';
            echo '<div class="elemen-hasil">Nama Mahasiswa: <strong>' . $nama . '</strong></div>';
            echo '<div class="elemen-hasil">Nomor Induk Mahasiswa: <strong>' . $nim . '</strong></div>';
            echo '<div class="elemen-hasil">Asal Universitas : <strong>' . $universitas . '</strong></div>';
            echo '<div class="elemen-hasil">Departemen/Program Studi: <strong>' . $depart . '</strong></div>';
            echo '<div class="elemen-hasil">Offering/Kelas: <strong>' . $kls . '</strong></div>';
            echo '<div class="elemen-hasil">Selamat! kamu telah mengisi buku tamu. Silahkan klik tombol di bawah ini ya untuk lanjut belajar ☆:. o(≧▽≦)o .:☆</div>';
            echo '<a href="login.html" class="tombol-kembali">Mulai Belajar</a>';
        } else {
            echo '<span class="error">' . $namaErr . '</span><br>';
            echo '<span class="error">' . $nimErr . '</span><br>';
            echo '<span class="error">' . $universitasErr . '</span><br>';
            echo '<span class="error">' . $departErr . '</span><br>';
            echo '<span class="error">' . $klsErr . '</span><br><br>';
            echo '<div class="elemen-hasil">Yah maaf, data yang kamu inputkan tidak sesuai format. Silahkan klik tombol di bawah ya untuk mengisi ulang data kamu (╥﹏╥)</div>';
            echo '<a href="login.html" class="tombol-kembali">Kembali</a>';
        }
        ?>
    </div>

</body>
</html>