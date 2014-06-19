<?php
header("Content-Type: text/plain");
$fichier = fopen( "content/data.csv" , "r" );

$result = array();
while( $ligne = fgets($fichier))
{
    $ligne = explode(';', trim($ligne));
    $post_data = array('id' => $ligne[0],
        'name' => $ligne[1],
        'x' => $ligne[2],
        'y' => $ligne[3],
        'type' => $ligne[4]);
	array_push($result,$post_data);
}
echo json_encode($result);
