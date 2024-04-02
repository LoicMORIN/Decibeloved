<?php
session_start();

// include scrud events
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

//space
$space_name = isset($_SESSION["page2"]["space_name"]) ? $_SESSION["page2"]["space_name"] : '';;
$map_image = isset($_SESSION["page2"]["map_image_data"]) ? $_SESSION["page2"]["map_image_data"] : '';;
$lenght = isset($_SESSION["page2"]["lenght"]) ? $_SESSION["page2"]["lenght"] : '';;
$width = isset($_SESSION["page2"]["width"]) ? $_SESSION["page2"]["width"] : '';;
create_space($space_name, $map_image, NULL, $lenght, $width);
$space_id=recherche_space('id', 'title', $space_name);


//events
$title = isset($_SESSION["page1"]['title']) ? $_SESSION["page1"]['title'] : '';
$location = isset($_SESSION["page1"]['location']) ? $_SESSION["page1"]['location'] : '';
$is_active = isset($_SESSION["page1"]['is_active']) ? $_SESSION["page1"]['is_active'] : '';
$is_open = isset($_SESSION["page1"]['is_open']) ? $_SESSION["page1"]['is_open'] : '';
$banner = isset($_SESSION["page1"]['banner_data']) ? $_SESSION["page1"]['banner_data'] : '';
$description = isset($_SESSION["page1"]['description']) ? $_SESSION["page1"]['description'] : '';
$date_start = isset($_SESSION["page1"]['date_start']) ? $_SESSION["page1"]['date_start'] : '';
$date_end = isset($_SESSION["page1"]['date_end']) ? $_SESSION["page1"]['date_end'] : '';
$nb_place = isset($_SESSION["page2"]['nb_place']) ? $_SESSION["page2"]['nb_place'] : '';
$width = isset($_SESSION["page2"]['width']) ? $_SESSION["page2"]['width'] : '';
$length = isset($_SESSION["page2"]['lenght']) ? $_SESSION["page2"]['lenght'] : '';
$creator_id = isset($_SESSION["page2"]['creator_id']) ? $_SESSION["page2"]['creator_id'] : '';
// $category_id = isset($_SESSION["page2"]['category_id']) ? $_SESSION["page2"]['category_id'] : '';
$artist_image = isset($_SESSION["page2"]["artist_image_data"]) ? $_SESSION["page2"]["artist_image_data"] : '';
$user_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '';

create_events($title, $description, $is_open, $is_active, $user_id, 1, $space_id, $date_start, $date_end, $location, $nb_place, $banner, $artist_image);



//position
$microphoneCoordinates = json_decode($_COOKIE['microphoneCoordinates'], true);
$speakerCoordinates = json_decode($_COOKIE['speakerCoordinates'], true);

// Inserer les coordonnées X et Y pour chaque speaker
foreach ($speakerCoordinates as $speakerCoordinate) {
    $speakerXCoordinate = $speakerCoordinate['x'];
    $speakerYCoordinate = $speakerCoordinate['y'];
    create_position($speakerYCoordinate, $speakerXCoordinate, 1, 3,$space_id);
}

// Inserer les coordonnées X et Y pour chaque microphone
foreach ($microphoneCoordinates as $microphoneCoordinate) {
    $microphoneXCoordinate = $microphoneCoordinate['x'];
    $microphoneYCoordinate = $microphoneCoordinate['y'];
    create_position($microphoneYCoordinate, $microphoneXCoordinate, 1, 2,$space_id);
}

// session_unset();
$event_id=recherche_events("id", "title", $title);
header("Location: ../../event.php?eventID=$event_id&spaceID=$space_id");
exit();
?>