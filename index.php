<canvas id="carte_ratp" width="810" height="808">
L'objet Canvas ne marche pas chez vous, veuillez utiliser un navigateur récent.
</canvas>


<script type="text/javascript">
window.onload = function()
{
var fichier = fopen( "bddRatp" , "r+" );
var canvas = document.getElementById("carte_ratp");
var context = canvas.getContext("2d");
var image = new Image();
image.src = "1.jpg";
context.drawImage(image,0,0);
fclose(fichier);
}
</script>