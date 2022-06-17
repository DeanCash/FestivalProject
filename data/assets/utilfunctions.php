<?php

require_once("dbfunctions.php");
use queries\selectq;

function check_permission(bool $start_if_no_session = false): string {
    // if set to true, will start a session if one hasn't started yet
    if ($start_if_no_session == true) {
        session_start();
    }
    // if a session started, it will return 2, so I can check for that
    // returned 1 if no current session active
    $session_on_check = session_status();
    if ($session_on_check == 1) {
        debug_to_console("No Session Active!", "error");
        throw new Exception("Session Required - No Session Active", 1);
    }
    try {
        //code...
    } catch (PDOException $pdoex) {
        if ($pdoex[1] == 1062) {
            // double entry
        }
    }
    // if permission session variable exists check what value it has
    if (array_key_exists("permission", $_SESSION)) {
        // none is default, meaning not logged in
        if ( $_SESSION['permission'] == "none" ) return "none";
        if ( $_SESSION['permission'] == "user" ) return "user";
        if ( $_SESSION['permission'] == "admin" ) return "admin";
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

?>