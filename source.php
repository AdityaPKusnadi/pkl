<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$Dbname = 'pkl';
//connect with the database
$db = new mysqli($host,$username,$pass,$Dbname);
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM mahasiswa WHERE nama LIKE '%".$searchTerm."%' ORDER BY id_mhs ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['nama'];
	  $data[] = $row['id_mhs'];
}
//return json data
echo json_encode($data);
?>