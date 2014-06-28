/**
 * Created by franckmazzolo on 28/06/2014.
 */

window.onload = function(){
    init();
}

/**
 *
 */
function init(){
    canvas = document.getElementById('carte_ratp');
    context = canvas.getContext('2d');
    getQuestion(drawCircle);
}

function getQuestion(callback){
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(JSON.parse(xhr.responseText));
        }
    };

    xhr.open("GET", "handlingData.php?action=question", true);
    xhr.send(null);
}

function getXMLHttpRequest() {
    var xhr = null;

    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
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

function clearCanvas(){
    context.clearRect(0, 0, canvas.width, canvas.height);
}

/**
 * Draw a circle at a specific location within the canvas
 * @param x
 * @param y
 */
function drawCircle(station){

    var x = station.x;
    var y = station.y;
    var RADIUS = 4;

    context.beginPath();
    context.arc(x, y, RADIUS, 0, 2 * Math.PI, false);
    context.fillStyle = 'red';
    context.fill();
    context.stroke();
}
