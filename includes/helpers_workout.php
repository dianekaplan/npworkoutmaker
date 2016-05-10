<?php


/**
* Take the user's available resources, and return valid exercises
* (Used in make_workout.php)
*/
function get_valid_exercises($resources)        
{
    // initialize variable to NULL; all exercises will start as fair game
    $excluded_exercises = NULL;
            
    // if the user passed along resources, use that to determine the valid exercises
    if ($resources != NULL)
        {
            // put these into a comma-separated string format to use in our query
            $resource_string = make_string_from_array($resources);

            // get the resources that we did NOT pass
            $missing_resource_query = "SELECT id from resources where id not in (" . $resource_string . ") ;";
            $missing_resources = CS50::query($missing_resource_query);
            
            // if there were some, use that to update set of excluded exercises
            if ($missing_resources != NULL)
            {
                // get string for ids of missing resources
                $missing_resources_string = make_string_from_associative_array($missing_resources);
            
                $exclude_query = "SELECT e.id from exercises e join exercise_resource er on e.id = er.exercise_id where resource_id in ( " . $missing_resources_string . " ) ;";
                $excluded_exercises = CS50::query($exclude_query);
            }
        }  
    
    // if user didn't pass any resources, update to exclude any exercise that needs a resource
    else
        {
            $exclude_query = "SELECT e.id from exercises e join exercise_resource er on e.id = er.exercise_id;";
            $excluded_exercises = CS50::query($exclude_query);
        }
        
    // Now that we know which exercises we'll be excluding
    // If there were some to exclude, get string for ids of those exercises
    if ($excluded_exercises != NULL)
        {
            $excluded_exercises_string = make_string_from_associative_array($excluded_exercises);
            $exercises_query = "SELECT * from exercises where id not in  (" . $excluded_exercises_string . ");";
        }
        
    // If not (user checked all boxes), we can use all the exercises
    else
        {
            $exercises_query = "SELECT * from exercises;";
        }    
    
        $exercises = CS50::query($exercises_query);
    
    return $exercises;
}


/**
* Take the valid exercises, desired # of exercises per set, and 
* whether it's outdoor/partner workout (matters for how we make pairs).  
* Return the pairs of exercises that'll make up a set in a workout. 
* (used in make_workout.php)
*/
function get_pairings($exercises, $count, $outdoor_partner_workout)      
{
// 1. Prep our variables, then we'll put exercises into the appropriate buckets
    $mixed_exercises = array();
     
    $together_pairs = array();
    $mixed_pairs = array();
    $all_pairs = array();
    $selected_pairs = array();
    
    // Sort the valid exercises: self_pairing exercises go as they are ('together_pairs'), 
    // with extra array for to make formatting consistent with non-partner workouts 
    // (so we can have one view for displaying either kind). Mixed exercises go 
    // into $mixed_exercises array for more specialized pairing in make_mixed_pairs
    
    foreach($exercises as $exercise)
    {
        if ($exercise['self_pairing'])
        {
            $pair = array($exercise);
            array_push($together_pairs, [$pair]); 
        }
        else 
            {
                $this_exercise = array($exercise);
                array_push($mixed_exercises, $this_exercise); 
            }
    }
    
    // Now make the mixed_pairs (definition below)
    $mixed_pairs = make_mixed_pairs($mixed_exercises, $outdoor_partner_workout);  

// 2. combine together into one set, and select random pairs for the workout

    // Add both sets to the array of all pairs (to pick from afterward)
    $all_pairs = array_merge($together_pairs, $mixed_pairs);
    
    // Now choose our pairs at random, our desired # of times
    $pairing_keys = array_rand($all_pairs, $count);
            
    // Save them in $selected_pairs
    foreach($pairing_keys as $key)
    {
        array_push($selected_pairs, $all_pairs[$key]);
    }    
    
    // Finally, shuffle it so we don't always see the together-pairs first
    shuffle($selected_pairs);    
    
    return $selected_pairs;
}
    
    
/**
* Classic NP use of open space (when you have a partner) is where one person
* travels to a point and back while the other does an exercise on the spot. 
* If we have a partner workout with open space, we'll try to make pairs like that.  
* Otherwise, pair the exercises at random. 
* (used by get_pairings)
*/    
function make_mixed_pairs($mixed_exercises, $outdoor_partner_workout)      
{
    $mixed_pairs = array();
    
    // If it's an outdoor partner workout, make pairs using one travelling 
    // exercise and one stationary exercise.  Put them into arrays and make 
    // pairs using one from each
    if ($outdoor_partner_workout)
    {
        $mixed_travelling = array();
        $mixed_stationary = array();        
    
        foreach($mixed_exercises as $exercise)
        {
            if ($exercise[0]['travelling'])
            {
                array_push($mixed_travelling, $exercise);
            }
            else
            {
                array_push($mixed_stationary, $exercise);
            }
        }
  
        // Shuffle them so the selections will be different 
        shuffle($mixed_travelling);
        shuffle($mixed_stationary);
    
        // Determine which set is smaller
        $mixed_pair_count = min(count($mixed_travelling), count($mixed_stationary));
          
        // Pair exercises that many times    
        for ($i=0; $i < $mixed_pair_count; $i++)
        {
            $this_pair = array($mixed_travelling[$i], $mixed_stationary[$i]);
            array_push($mixed_pairs, $this_pair);  
        }
    }    
        
    // Otherwise (not a partner/outdoor workout), grab pairs from mixed_exercises
    else 
        {
            // shuffle the array so it's in random order, chunk it into pairs
            // Note: when we have an odd number, that last 'pair' will only have
            // one, so pop off that last pair just in case (rather than weirdly
            // handling singleton case)
            shuffle($mixed_exercises);
            $mixed_pairs = array_chunk($mixed_exercises, 2);
            array_pop($mixed_pairs);
        }
        
     // Return our result
    return $mixed_pairs;
}


?>