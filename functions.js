/**
 * Created by franckmazzolo on 28/06/2014.
 */

window.onload = function () {
    init();

    submit.onclick = function () {
        next();
    };
}

/**
 *
 */
function init() {
    canvas = document.getElementById('carte_ratp');
    context = canvas.getContext('2d');
    e_subject = document.getElementById('subject');
    e_score = document.getElementById('score');
    e_submit = document.getElementById('submit');
    e_questionNumber = document.getElementById('questionNumber');
    e_numberOfQuestions = document.getElementById('numberOfQuestions');
    e_userScore = document.getElementById('userScore');


    reset();
    getNumberOfQuestions(setNumberOfQuestions);
    update();

}

function reset() {
    var xhr = getXMLHttpRequest();
    xhr.open("POST", "handlingData.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("action=reset");
}

function update() {
    clearCanvas();
    getQuestion(drawCircle);
    getQuestionNumber(setQuestionNumber);
    getUserScore(setUserScore);
}

function next() {
    update();
}

function getNumberOfQuestions(callback) {
    handleServer(callback, 'numberOfQuestions');
}

function setNumberOfQuestions(numberOfQuestions) {
    e_numberOfQuestions.innerHTML = numberOfQuestions;
}

function getUserScore(callback) {
    handleServer(callback, 'userScore');
}

function setUserScore(value) {
    e_userScore.innerHTML = value;
}

function getQuestionNumber(callback) {
    handleServer(callback, 'questionNumber');
}

function setQuestionNumber(questionNumber) {
    e_questionNumber.innerHTML = questionNumber;
}

/**
 *
 * @param callback
 */
function getQuestion(callback) {

    handleServer(callback, 'question');
}


/**
 *
 */
function clearCanvas() {
    context.clearRect(0, 0, canvas.width, canvas.height);
}

/**
 * Draw a circle at a specific location within the canvas
 * @param x
 * @param y
 */
function drawCircle(station) {

    try {
        station = JSON.parse(station);
        var x = station.x;
        var y = station.y;
        var RADIUS = 4;

        context.beginPath();
        context.arc(x, y, RADIUS, 0, 2 * Math.PI, false);
        context.fillStyle = 'red';
        context.fill();
        context.stroke();
    }
    catch (e) {
        alert(e+ ' - ' +station);
    }

}

function handleServer(callback, action) {
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {

            callback(xhr.responseText);

        }
    };

    xhr.open("POST", "handlingData.php", false);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("action="+ action);
}

function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            xhr = new XMLHttpRequest();
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }

    return xhr;
}