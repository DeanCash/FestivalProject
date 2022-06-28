<?php

require_once("dbfunctions.php");
use queries\selectq;

define("NONE", "none");
define("USER", "user");
define("ADMIN", "admin");

function check_permission(bool $start_if_no_session = false): string {
    $session_on_check = session_status();
    
    // if set to true, will start a session if one hasn't started yet
    if ($start_if_no_session == true && $session_on_check == 1) {
        session_start();
    }
    // if a session started, it will return 2, so I can check for that
    // returned 1 if no current session active
    if ($session_on_check == 1 && $start_if_no_session == false) {
        debug_to_console("No Session Active!", "error");
        throw new Exception("Session Required - No Session Active", 1);
    }
    // if permission session variable exists check what value it has
    if (array_key_exists("permission", $_SESSION)) {
        // none is default, meaning not logged in
        if ( $_SESSION['permission'] == NONE ) return NONE;
        if ( $_SESSION['permission'] == USER ) return USER;
        if ( $_SESSION['permission'] == ADMIN ) return ADMIN;
        else throw new Exception("Unknown Session Variable Permission", 1);
    } else {
        // if no permissions session variable create and set to none
        $_SESSION['permission'] = "none";
        return "none";
    }
    // useless return value, php needs a declared return value because the other
    // ones are inside conditions so it's not sure if anything is being returned
    return "ERROR";
}

function get_all_from_table(string $table, object $conn): array {
    $query = selectq::select_all($table);
    $stm = $conn->prepare($query);
    // check if table exists, so not throw exception
    try {
        $stm->execute();
    } catch (PDOException $ex) {
        throw new Exception("Table -> $table <-Doesn't Exist!", 1);
    }
    // return results
    return $stm->fetchAll(PDO::FETCH_OBJ);
}

function get_client_id(bool $start_if_no_session = false): string {
    $session_on_check = session_status();
    
    // if set to true, will start a session if one hasn't started yet
    if ($start_if_no_session == true && $session_on_check == 1) {
        session_start();
    }
    // if a session started, it will return 2, so I can check for that
    // returned 1 if no current session active
    if ($session_on_check == 1 && $start_if_no_session == false) {
        debug_to_console("No Session Active!", "error");
        throw new Exception("Session Required - No Session Active", 1);
    }

    if (array_key_exists('accountid', $_SESSION)) {
        return $_SESSION['accountid'];
    } else {
        return "none";
    }
    
    return "ERROR";
}

?>