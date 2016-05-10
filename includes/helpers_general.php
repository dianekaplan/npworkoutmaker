<?php
    
/**
* Take a results set (array of ids), and make it into a comma separated list to use in queries
* (Used in make_workout.php)
*/
function make_string_from_array($results)
    {
        $string = NULL;
    
        foreach($results as $result)
        {
            $string = $string . $result . ",";
        }
        
        // take off the trailing comma
        $string = rtrim($string, ',');
        return $string;
    }  
    
/**
* Like the above function, but for associative arrays with id
* * (Used in make_workout.php)
*/
function make_string_from_associative_array($results)
{
    $string = NULL;
    
    foreach($results as $result)
        {
            $string = $string . $result["id"] . ",";
        }
        
        // take off the trailing comma
    $string = rtrim($string, ',');
    return $string;
}  

    
/**
 * Render a view, passing in values, but without header and footer
 * Based on CS50 render(), but I removed 'exit' so I can call it multiple 
 * times on the same page
 */
function render_partial($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view 
            require("../views/{$view}");
            // exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }



    
    
// The rest is from CS50 helpers.php =====================================
// I commented out the ones I'm not using yet but may use for future steps


/**
 * Taken from helpers.php in PSET7
* Renders view, passing in values.
*/
     
function render($view, $values = [])
{
    // if view exists, render it
    if (file_exists("../views/{$view}"))
    {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
    }

    // else err
    else
    {
        trigger_error("Invalid view: {$view}", E_USER_ERROR);
    }
}


/**
* Redirects user to location, which can be a URL or
* a relative path on the local host.
*
* http://stackoverflow.com/a/25643550/5156190
*
* Because this function outputs an HTTP header, it
* must be called before caller outputs any HTML.
*/
function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }
     
/**
* Apologizes to user with message.
*/
function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }

// /**
// * Facilitates debugging by dumping contents of argument(s)
// * to browser.
//  */
// function dump()
//     {
//         $arguments = func_get_args();
//         require("../views/dump.php");
//         exit;
//     }

/**
* Logs out current user, if any.  Based on Example #1 at
* http://us.php.net/manual/en/function.session-destroy.php.
*/
// function logout()
//     {
//         // unset any session variables
//         $_SESSION = [];

//         // expire cookie
//         if (!empty($_COOKIE[session_name()]))
//         {
//             setcookie(session_name(), "", time() - 42000);
//         }

//         // destroy session
//         session_destroy();
//     }
    

?>