<?php
    $host     = "localhost";
    $dbname   = "festivalproject";
    $user     = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        debug_to_console("VERBINDING DATABASE GELUKT", "log");
    } catch (PDOException $ex) {
        debug_to_console("VERBINDING DATABASE FAILED.", "error");
    }


    //* DATA = "text"   ||   MODE = [log - warn - error]

    function debug_to_console($data, $mode)
    {
        if ($mode == "log") {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
        
            echo "<script>console.log('" . $output . "' );</script>";
        }
        if ($mode == "warn") {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
        
            echo "<script>console.warn('" . $output . "' );</script>";
        }
        if ($mode == "error") {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);
        
            echo "<script>console.error('" . $output . "' );</script>";
        }
    }
?>