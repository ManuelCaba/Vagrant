<?php
  
$edad = $_POST['edad'];

$anho = date("Y") - $edad;

echo $anho;

?>