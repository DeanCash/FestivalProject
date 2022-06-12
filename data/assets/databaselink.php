<?php
    $host     = "localhost";
    $dbname   = "festivalproject";
    $user     = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        debug_to_console("CONNECTION DATABASE SUCCESS", "log");
    } catch (PDOException $ex) {
        debug_to_console("CONNECTION DATABASE FAILED. || Try checking XAMPP", "error");
    }


    //* DATA = "text"   ||   MODE = [log - warn - error]

    function debug_to_console(string $data, string $mode)
    {
        if ($mode == "log") {
            echo "<script>console.log('" . $data . "' );</script>";
        }
        
        if ($mode == "warn") {
            echo "<script>console.warn('" . $data . "' );</script>";
        }

        if ($mode == "error") {
            echo "<script>console.error('" . $data . "' );</script>";
        }
    }
?>