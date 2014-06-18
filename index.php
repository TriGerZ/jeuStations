<canvas id="carte_ratp" width="810" height="808">
L'objet Canvas ne marche pas chez vous, veuillez utiliser un navigateur récent.
</canvas>


<script>


window.onload = function()
{
	// création de l'objet Canvas
	var canvas = document.getElementById("carte_ratp");
	var context = canvas.getContext("2d");
	var image = new Image();
	image.src = "1.jpg";
	context.drawImage(image,0,0);

	var xhr = getXMLHttpRequest();
	xhr.open("GET", "ChargementStations.php" , true);
	xhr.send(null);
	  xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
        	var FichierTexte = xhr.responseText;
        	alert(JSON.parse(FichierTexte)); 
        }
       };

}

/*
Charge l'objet HttpRequest
*/

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

</script>