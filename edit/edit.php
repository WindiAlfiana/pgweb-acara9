<?php
$id                 = $_POST['id'];
$kecamatan          = $_POST['kecamatan'];
$nama_objek         = $_POST['nama_objek'];
$jenjang_pendidikan = $_POST['jenjang_pendidikan'];
$jalur_pendidikan   = $_POST['jalur_pendidikan'];
$longitude          = $_POST['longitude'];
$latitude           = $_POST['latitude'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studikasus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query Update untuk tabel_pendidikan dengan nama kolom berhuruf kapital
$sql = "UPDATE tabel_pendidikan 
        SET `Kecamatan` = '$kecamatan', 
            `Nama Objek` = '$nama_objek', 
            `Jenjang Pendidikan` = '$jenjang_pendidikan', 
            `Jalur Pendidikan` = '$jalur_pendidikan', 
            `Longitude` = $longitude, 
            `Latitude` = $latitude 
        WHERE `ID` = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record edited successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: ../index.php");
exit();
?>