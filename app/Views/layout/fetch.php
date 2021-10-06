<?php
// Create database connection using config file
include("connection/DB.php");

// Fetch all users data from database
$query = mysqli_query($mysqli, "SELECT COUNT(tbl_sts.id_sts) AS jumlah, nama_kategori FROM 
tbl_sts GROUP BY tbl_sts.nama_kategori");

$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetctAll();
foreach ($result as $row) {
    $output[] = array(
        'nama_kategori'    => $row['nama_kategori'],
        'jumlah'    => floatval($row['jumlah'])
    );
}
