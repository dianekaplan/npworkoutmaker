<?php

    require(__DIR__ . "/../includes/config.php");
    
// 1. Grab the workout_id from url (we'll have one unless user removed it)
    if (!empty($_GET["workout_id"]))
        $workout_id =  $_GET["workout_id"];
    else
    {
        $workout_id = NULL;
        apologize("Please put back the workout_id and try again, or click header link to make a new one.");
    }
        
    
// 2. Lookup that workout record, save the type, and decode & save the workout       
    $workout_blob = CS50::query("SELECT * FROM workouts WHERE id = " . $workout_id . ";");
    $workout_type = $workout_blob[0]["type"];
    $resources_encoded = $workout_blob[0]["resources"];   
    $resources = json_decode($resources_encoded, true);   
    $workout_encoded = $workout_blob[0]["workout_array"];   
    $workout = json_decode($workout_encoded, true);    
    

// 3. Store variable for partner vs solo workout (used for format when we get there), and render workout.php         
    if ($workout_type == 'partner')
        $partner = true;
    else
        $partner = false;
        
// 4. Construct our 'try again' link to go to make_workout with the same 
// resources that were used for the current workout we're displaying
// full version should look like this: 
// $try_again_url = 'make_workout.php?have%5B%5D=1&have%5B%5D=2&have%5B%5D=4&have%5B%5D=3&have%5B%5D=5&have%5B%5D=6&sets=3&exercises_per_set=4';

    $try_again_url = 'make_workout.php?';
    
    if(isset($resources))
    {
        foreach($resources as $item)
        {
            $try_again_url  = $try_again_url . 'have%5B%5D=' . $item . '&';
        }
    }
    $try_again_url = $try_again_url . 'sets=3&exercises_per_set=4';
    
// 5. Okay we're ready: show the workout display view with all the info we got:
    render("workout.php", ["partner" => $partner, "workout" => $workout, "id" => $workout_id, "try_again_url"=>$try_again_url]);  
    
?>