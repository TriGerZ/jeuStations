<?php
header("Content-Type: text/plain");
$fichier = fopen( "bddRatp.txt" , "r" );
$result = "";
while( $ligne = fgets($fichier))
{
	$result = $result.$ligne;
}
echo json_encode($result,JSON_FORCE_OBJECT);
?>