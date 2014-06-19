<?php
session_start();
include_once('constantes.php');
header("Content-Type: text/plain");


if(!isset($_SESSION['stations'])){
    $_SESSION['stations'] = getData(FILE_DATA);
}

$stations = $_SESSION['stations'];

echo json_encode($stations);

/**
 * Return data contains in the file in a array as JSON objects
 * @param $file
 * @return array $result
 */
function getData($file){
    try{
        $fichier = fopen( $file , "r" );

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
        return $result;
    }
    catch (Exception $err){
        echo 'exception error: '.$err->getMessage();
    }
}