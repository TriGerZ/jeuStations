<?php
header("Content-Type: text/plain");
$fichier = fopen( "content/data.csv" , "r" );
$result = array();
while( $ligne = fgets($fichier))
{
    $ligne = explode(';', trim($ligne));
    $post_data = json_encode(array('year' => $ligne[0],
        'name' => htmlentities($ligne[1]),
        'x' => $ligne[2],
        'y' => $ligne[3],
        'type' => $ligne[4]), JSON_FORCE_OBJECT);
	array_push($result,$post_data);
}
echo json_encode($result);
