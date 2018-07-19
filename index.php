<?php
require_once("config.php");

$dao = new Dao();
//$cafes = $dao->select("SELECT * FROM cafe");
//echo json_encode($cafes);

$cafe = new Cafe();
$cafe->consulta(2);
echo $cafe;

?>
