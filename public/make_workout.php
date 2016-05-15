<?php
    require(__DIR__ . "/../includes/config.php");
    
// 1. Get all the parameters and set variables for using them later

    // First, get the resources the user has passed from the form
    if (!empty($_GET["have"]))
        $resources =  $_GET["have"];
    else
        $resources = NULL;
        
    // Set variable based on whether this is a partner workout (resource 1) vs solo 
    $have_partner = false;
    $have_partner = in_array( 1, $resources);
    
    if($have_partner)
            $workout_type = 'partner';
    else
            $workout_type = 'solo';
    
    // We'll have special matching logic if it's partner AND there's open space, 
    // so save a variable for that for easy use (open space is resource 2))
    $outdoor_partner_workout = false; 
    
    if ($have_partner && in_array( 2, $resources))
        $outdoor_partner_workout = true; 

    // Get the valid exercises based on the available resources 
    $exercises = get_valid_exercises($resources);
    
    // Get the requested number of sets and exercises per set
    $sets =  $_GET["sets"];
    $exercises_per_set =  $_GET["exercises_per_set"];
    
    // When there's no partner we're doing single exercises instead of pairs, 
    // so divide by two
    if (!$have_partner)
         $exercises_per_set /= 2;
         
         
// 2. Use these variables to make a workout 
// (calling functions in helpers_workout.php)   
    $workout_array = array();
          
     for ($x = 0; $x < $sets; $x++)
     {
        $set = get_pairings($exercises, $exercises_per_set, $outdoor_partner_workout);
        array_push($workout_array, $set); 
     }
     

// 3. Save the workout into the database   
    // Make storable versions of our resources and workout
    $resources_json = json_encode($resources);
    $workout_array_json = json_encode($workout_array);
    
    // Save it in the database
    $save_workout = "INSERT INTO workouts (resources, type, workout_array, timestamp) VALUES ('$resources_json', '$workout_type',  '$workout_array_json', now()); ";
    CS50::query($save_workout);
    
    // Grab the id for the one we saved.  NOTE: last_insert_id(id) is the usual 
    // way according to stackoverflow, but cs50::query returns number of rows 
    // affected (always 1), so I'll ask for the id in a separate step
    $new_workout_id = CS50::query("SELECT MAX(id) FROM workouts;");
    $new_workout_id = $new_workout_id[0]["MAX(id)"];
            
// 4. Send the user to retrieve_workout.php with their workout id
// (This way we have one view to render both cases: creating workout, 
// or following link with id in the url)

    $destination_url = "retrieve_workout.php?workout_id=" . $new_workout_id;
    
    header("Location: $destination_url"); /* Redirect browser */
    exit();

// print("\n Workout: \n");
// print(json_encode($workout_array_json, JSON_PRETTY_PRINT));

        
?>