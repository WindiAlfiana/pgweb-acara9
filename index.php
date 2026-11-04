<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studikasus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tabel_pendidikan";
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
        <th>Nama Objek</th>
        <th>Jenjang Pendidikan</th>
        <th>Jalur Pendidikan</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th colspan='2'>Aksi</th>
    </tr>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Kecamatan"] . "</td>";
        echo "<td>" . $row["Nama Objek"] . "</td>";
        echo "<td>" . $row["Jenjang Pendidikan"] . "</td>";
        echo "<td>" . $row["Jalur Pendidikan"] . "</td>";
        echo "<td>" . $row["Longitude"] . "</td>";
        echo "<td>" . $row["Latitude"] . "</td>";
        echo "<td><a href='delete.php?id=".$row["ID"]."'>Hapus</a></td>";
        echo "<td><a href='edit/index.php?id=".$row["ID"]."'>Edit</a></td>";
        echo "</tr>"; 
    }
    
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>