<!DOCTYPE html>
<html>
<body>
<h2>Form Edit Fasilitas Pendidikan</h2>
<?php
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

$id = $_GET['id'];
$sql = "SELECT * FROM tabel_pendidikan WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
    while($row = $result->fetch_assoc()) {
        echo "<input type='hidden' name='id' value='".$row['ID']."'>";
        
        echo "<label for='kecamatan'>Kecamatan:</label><br>";
        echo "<input type='text' id='kec' name='kecamatan' value='".$row['Kecamatan']."'>";
        
        echo "<br><label for='nama_objek'>Nama Objek:</label><br>";
        echo "<input type='text' id='nama_objek' name='nama_objek' value='".$row['Nama Objek']."'>";
        
        echo "<br><label for='jenjang_pendidikan'>Jenjang Pendidikan:</label><br>";
        echo "<input type='text' id='jenjang' name='jenjang_pendidikan' value='".$row['Jenjang Pendidikan']."'>";
        
        echo "<br><label for='jalur_pendidikan'>Jalur Pendidikan:</label><br>";
        echo "<input type='text' id='jalur' name='jalur_pendidikan' value='".$row['Jalur Pendidikan']."'>";
        
        echo "<br><label for='longitude'>Longitude:</label><br>";
        echo "<input type='text' id='long' name='longitude' value='".$row['Longitude']."'>";
        
        echo "<br><label for='latitude'>Latitude:</label><br>";
        echo "<input type='text' id='lat' name='latitude' value='".$row['Latitude']."'>";
        
        echo "<br><br>";
    }
    echo "<input type='submit' value='Submit'>";
    echo "</form>";
} else {
    echo "Data tidak ditemukan.";
}
$conn->close();
?>

<p id="informasi" style="color: red;"></p>

<script>
    function validateForm() {
        let longitude = document.getElementById("long").value;
        let latitude = document.getElementById("lat").value;
        let text = "";
        
        // Validasi koordinat harus berupa angka
        if (isNaN(longitude) || isNaN(latitude)) {
            text = "Longitude dan Latitude harus berupa angka!";
            event.preventDefault();
            document.getElementById("informasi").innerHTML = text;
            return false;
        }
        
        document.getElementById("informasi").innerHTML = "";
        return true;
    }
</script>
</body>
</html>