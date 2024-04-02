<?php
    include "php/function/event-function.php";

    session_start();
    $base64banner=base64_encode(recherche_events("banner", "id", $_GET['eventID']));
    $base64space=base64_encode(recherche_space("image", "id", $_GET['spaceID']));
    $title=recherche_events("title", "id", $_GET['eventID']);
    $location=recherche_events("location", "id", $_GET['eventID']);
    $start=recherche_events("date_start", "id", $_GET['eventID']);
    $end=recherche_events("date_end", "id", $_GET['eventID']);
    $description=recherche_events("description", "id", $_GET['eventID']);
    $nb_place=recherche_events("nb_place", "id", $_GET['eventID']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="case-event">

        <div class="banner-event">
            <img src="data:image/png;base64,<?php echo $base64banner; ?>" alt="Banner Image">
        </div>

        <div class="event-title">
            <h1><?php echo $title; ?></h1>
        </div>

        <div class="event-info">
            <h3>Location: <?php echo $location; ?></h3>
            <h3>Début: <?php echo $start; ?></h3>
            <h3>Fin: <?php echo $start; ?></h3>
            <h3>Nombre des places: <?php echo $nb_place; ?></h3>
        </div>

        <div class="event-description">
            <h3>Description:</h3>
            <p><?php echo $description; ?></p>
        </div>

        <div class="event-map" id="event-map-containter">
        <img src="data:image/png;base64,<?php echo $base64space; ?>" alt="Banner Image">
        </div>

    </div>

    <script>
        function placeSpeakersOnMap(speakersData) {
            var mapImage = document.getElementById('mapImage');

            // Loop through each speaker data
            for (var i = 0; i < speakersData.length; i++) {
                var speaker = speakersData[i];

                // Create a div element for the speaker
                var imageElement = document.createElement("div");
                imageElement.className = "image-overlay " + "speaker-image";

                // Set the position of the speaker on the map
                var xPosition = parseFloat(speaker.latitude);
                var yPosition = parseFloat(speaker.longitude);

                console.log("x"+xPosition);
                console.log("y"+yPosition);


                // Set the adjusted position
                imageElement.style.left = xPosition -10 + 'px';
                imageElement.style.top = yPosition -10 + 'px';

                // Append the speaker element to the map
                document.getElementById("event-map-containter").appendChild(imageElement);
            }
        }


        // imageElement.className = "image-overlay " + selectedType + "-image";
        // imageElement.style.top = y - 10 + "px";
        // imageElement.style.left = x - 10 + "px";
        // document.getElementById("imageContainer").appendChild(imageElement);

        // Retrieve the cookie value and decode it
        var eventDataFromPHP = JSON.parse(decodeURIComponent(getCookie("event-coordinate-speaker")));
        console.log(eventDataFromPHP);
        // Call the function to place speakers on the map
        placeSpeakersOnMap(eventDataFromPHP);

        // Function to retrieve a cookie value by name
        function getCookie(name) {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                if (cookie.startsWith(name + '=')) {
                    return cookie.substring(name.length + 1);
                }
            }
            return null;
        }
    </script>
</body>
</html>
