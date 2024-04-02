<?php
session_start();
$base64map=base64_encode($_SESSION["page2"]['map_image_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Créer un évènement</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="case-event">
        <form id="formPage3" method="POST" enctype="multipart/form-data" onsubmit="sendCoordinatesToServer()" action="php\function\processFormPage3.php">
            <h1>Créer un évènement</h1>
            <div class="event-map" id="event-map-containter">
                <img id="mapImage" src="data:image/png;base64,<?php echo $base64map; ?>" alt="Salle Image">
            </div>
            <div class="coordinates" id="click-coordinates">Coordinates: (0, 0)</div>
            <div class="coordinates" id="microphone-coordinates">Microphone Coordinates: (0, 0)</div>
            <div class="coordinates" id="speaker-coordinates">Speaker Coordinates: (0, 0)</div>
            <div class="coordinates" id="hover-coordinates">Hover Coordinates: (0, 0)</div>
            <div class="type-selectors">
                <div class="type-selector" onclick="changeType('microphone')">
                    <img src="media/image/microphone.png" alt="Microphone" class="icon"> Microphone
                </div>
                <div class="type-selector" onclick="changeType('speaker')">
                    <img src="media/image/speaker.png" alt="Speaker" class="icon"> Speaker
                </div>
        
                <input type="button" class="btn" id="delete_elements" value="Effacer les éléments" onclick="clearCoordinates()">

                </div>
            <input type="submit" class="btn" value="Créer" id="SubmitBtn"> 
        </form>
            <button type="submit" onclick="window.location.href='creation_event_2.php'" class="btn" id="previous">Précédent</button>
    </div>

    <script>
        var microphoneCoordinates = [];
        var speakerCoordinates = [];
        var selectedType = "microphone";

        //Stockage des coorconnées
        function storeCoordinates(event) {
            var x = event.clientX;
            var y = event.clientY;

            var image = document.getElementById("mapImage");
            var imageRect = image.getBoundingClientRect();
            var imageX = imageRect.left;
            var imageY = imageRect.top;

            x -= imageX;
            y -= imageY;
            x = Math.round(x); 
            y = Math.round(y); 

            if (selectedType === "microphone") {
                microphoneCoordinates.push({ x: x, y: y });
                displayCoordinates("microphone-coordinates", microphoneCoordinates);
            } else if (selectedType === "speaker") {
                speakerCoordinates.push({ x: x, y: y });
                displayCoordinates("speaker-coordinates", speakerCoordinates);
            }

            document.getElementById("click-coordinates").innerHTML = "Coordinates: (" + x + ", " + y + ")";
            
            var imageElement = document.createElement("div");
            imageElement.className = "image-overlay " + selectedType + "-image";
            imageElement.style.top = y - 10 + "px";
            imageElement.style.left = x - 10 + "px";
            document.getElementById("event-map-containter").appendChild(imageElement);
        }

        //Afiichage des coordonnées
        function displayCoordinates(elementId, coordinatesArray) {
            var coordinatesElement = document.getElementById(elementId);
            var coordinatesText = elementId.charAt(0).toUpperCase() + elementId.slice(1) + ": ";
            coordinatesArray.forEach(function(coord) {
                coordinatesText += "(" + coord.x + ", " + coord.y + "), ";
            });
            coordinatesElement.innerHTML = coordinatesText.slice(0, -2);
        }

        function changeType(type) {
            selectedType = type;
        }
        //Effacer les coordonnées
        function clearCoordinates() {
            microphoneCoordinates = [];
            speakerCoordinates = [];
            displayCoordinates("microphone-coordinates", microphoneCoordinates);
            displayCoordinates("speaker-coordinates", speakerCoordinates);

            var images = document.querySelectorAll(".image-overlay");
            images.forEach(function(image) {
                image.remove();
            });
        }

        function sendCoordinatesToServer() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "php/function/processFormPage3.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            
            var data = {
                microphoneCoordinates: microphoneCoordinates,
                speakerCoordinates: speakerCoordinates
            };

            // Convert arrays to strings and set cookies
            document.cookie = "microphoneCoordinates=" + JSON.stringify(microphoneCoordinates);
            document.cookie = "speakerCoordinates=" + JSON.stringify(speakerCoordinates);

            xhr.send(JSON.stringify(data));
            alert("Evènement créé!");
        }



        document.getElementById("mapImage").addEventListener("click", storeCoordinates);

        document.getElementById("mapImage").addEventListener("mousemove", function(event) {
            var x = event.clientX;
            var y = event.clientY;
            

            var image = document.getElementById("mapImage");
            var imageRect = image.getBoundingClientRect();
            var imageX = imageRect.left;
            var imageY = imageRect.top;

            x -= imageX;
            y -= imageY;
            x = Math.round(x); 
            y = Math.round(y); 
            document.getElementById("hover-coordinates").innerHTML = "Coorsonnées: (" + x + ", " + y + ")";
        });

    </script>
</body>
</html>

