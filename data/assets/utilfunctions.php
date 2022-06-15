<?php

function check_permission(bool $start_if_no_session = false): string {
    if ($start_if_no_session == true) {
        session_start();
    }
    // if a session started, it will return 2, so I can check for that
    // returned 1 if no current session active
    $session_on_check = session_status();
    if ($session_on_check == 1) {
        throw new Exception("Session Required - No Session Active", 1);
    }
    
    // if permission session variable exists check what value it has
    if (array_key_exists("permission", $_SESSION)) {
         if ( $_SESSION['permission'] == "user" ) return "user";
         if ( $_SESSION['permission'] == "admin" ) return "admin";
         else throw new Exception("Unknown Session Variable Permission", 1);
    } else {
        // if no permissions session variable create and set to user
        $_SESSION['permission'] = "user";
    }
    // useless return value, php needs a declared return value because the other
    // ones are inside conditions so it's not sure if anything is being returned
    return "ERROR";
}

?>