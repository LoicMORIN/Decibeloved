<?php
    $scrud_events_relative = '../scrud/scrud_events.php';
    $scrud_events_non_relative = 'php/scrud/scrud_events.php';

    if (file_exists($scrud_events_relative)) {
        include $scrud_events_relative;
    } elseif (file_exists($scrud_events_non_relative)) {
        include $scrud_events_non_relative;
    }

    // include scrud space
    $scrud_space_relative = '../scrud/scrud_space.php';
    $scrud_space_non_relative = 'php/scrud/scrud_space.php';

    if (file_exists($scrud_space_relative)) {
        include $scrud_space_relative;
    } elseif (file_exists($scrud_space_non_relative)) {
        include $scrud_space_non_relative;
    }

     // include scrud position
     $scrud_position_relative = '../scrud/scrud_position.php';
     $scrud_position_non_relative = 'php/scrud/scrud_position.php';
 
     if (file_exists($scrud_position_relative)) {
         include $scrud_position_relative;
     } elseif (file_exists($scrud_position_non_relative)) {
         include $scrud_position_non_relative;
     }
 

    $event_id = $_GET['eventID'];
    $space_id= $_GET['spaceID'];
    $coordinates_microphone=getPositions(2, $space_id);
    $coordinates_speaker=getPositions(3, $space_id);


    
    // Set a cookie with the JSON-encoded data
    setcookie("event-coordinate-speaker", json_encode($coordinates_speaker), time() + 500, "/");
?>