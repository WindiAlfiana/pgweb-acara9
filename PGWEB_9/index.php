<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tabel php";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tabel_penduduk";
$result = $conn->query($sql);

echo "<a href='input/index.html'>Input</a>";

echo "<style>
    body {
        margin: 0;
        padding: 0;
    }
</style>";

if ($result->num_rows > 0) {
    echo "<table border='1px'>
    <tr>
        <th>ID</th>
        <th>Kecamatan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Luas</th>
        <th>Jumlah Penduduk</th>
        <th colspan='2'>Aksi</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["Kecamatan"] . "</td>";
        echo "<td>" . $row["Longitude"] . "</td>";
        echo "<td>" . $row["Latitude"] . "</td>";
        echo "<td>" . $row["Luas"] . "</td>";
        echo "<td>" . $row["Jumlah Penduduk"] . "</td>";
        echo "<td><a href='delete.php?id=".$row["id"]."'>Hapus</a></td>";
        echo "<td><a href='edit/index.php?id=".$row["id"]."'>Edit</a></td>";
        echo "</tr>"; 
    }
    
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>