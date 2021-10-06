<?php
include('DB.php');
$ids = array();
// $ids = implode(",",$_POST["id"]);
$ids = $_POST["id_kontrak"];


// $deactive = "UPDATE inf SET active=0 where n_id IN(".$ids.")";
$deactive = "UPDATE tb_kontrak SET active=0 where n_id= " . $ids . " ";

$result = mysqli_query($connection, $deactive);
echo mysqli_error($connection);
