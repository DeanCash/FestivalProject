<?php

namespace queries;

class selectq {

    public static function select_all(string $table): string {
        return "SELECT * FROM $table";
    }

    public static function select_all_column(string $table, string $col): string {
        return "SELECT $col FROM $table";
    }

}

?>