<?php
/**
 * Created by PhpStorm.
 * User: franckmazzolo
 * Date: 28/06/2014
 * Time: 16:11
 */
session_start();
include_once('constantes.php');

header("Content-Type: text/html");

$action = (isset($_GET["action"])) ? $_GET["action"] : NULL;

if(!count($_SESSION)){
    echo 'init <br/>';
    init();
}

switch($action){
    case 'question' : echo json_encode(question()); break;
    case 'questionCounter' : echo getQuestionCounter(); break;
    case 'answerCounter' : echo getAnswerCounter(); break;
    default : break;
}


function question(){


    $stations = $_SESSION['stations'];

    updateQuestionCounter();
    if(getQuestionCounter()<=100){
        $_SESSION['currentQuestion'] = generateQuestion($_SESSION['stations']);

        //echo 'question numero : '.getQuestionCounter();
        return (getQuestion());
    }
    else{
        //echo 'FIN DU GAME';
    }
}

/**
 * Initiate Session's variables
 */
function init(){
    $_SESSION['stations'] = metroOnly(FILE_DATA_NAME);
    $_SESSION['questionCounter'] = 0;
    $_SESSION['answerCounter'] = 0;
}

/**
 * @param $filename
 * @return array
 */
function readData($filename){

    $fh = fopen( $filename , "r" );
    $stations = array();
    while( $line = fgets($fh))
    {
        array_push($stations,$line);
    }
    return $stations;

}

/**
 * @param $filename
 * @return array
 */
function metroOnly($filename){
    $lines = readData($filename);
    return array_filter($lines, 'filterMetro');
}

/**
 * @param $station
 * @return int
 */
function filterMetro($station){
    return (strpos($station,'metro'));
}

/**
 * @param array $stations
 * @return mixed
 */
function randomLine(array $stations){
    return $stations[array_rand ( $stations)];
}

/**
 * @param $userAnswer
 * @param array $currentQuestion
 */
function verifyAnswer($userAnswer, array $currentQuestion){
    if(strcmp($userAnswer, $currentQuestion['name']) == 0){
        echo 'same';
        updatePoint();
    }
    else{
        echo 'not equal';
    }

}

/**
 * @param $stations
 * @return array
 */
function generateQuestion($stations){
    $line = randomLine($stations);
    $line = explode(';', $line);
    $station = array(
        'id' => $line[0],
        'name' => $line[1],
        'x' => $line[2]/RESIZE,
        'y' => $line[3]/RESIZE
    );

    return $station;

}

function updatePoint(){
    $_SESSION['answerCounter']++;
}

function updateQuestionCounter(){
    $_SESSION['questionCounter']++;
}

function getQuestionCounter(){
    return $_SESSION['questionCounter'];
}

function getAnswerCounter(){
    return $_SESSION['answerCounter'];
}

function getQuestion(){
    return $_SESSION['currentQuestion'];
}

function checkQuestionCounter(){
    return getQuestionCounter() < 10;
}