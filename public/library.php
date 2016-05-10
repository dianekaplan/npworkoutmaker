<?php

    // configuration
    require("../includes/config.php"); 

    // Grab all of our exercises
    $exercises = CS50::query("SELECT * FROM exercises order by name"); 
    

    // render the library_display view, passing along the exercises
    render("library_display.php", ["exercises" => $exercises]);

?>
