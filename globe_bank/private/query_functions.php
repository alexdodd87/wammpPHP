<?php

    function find_all_subjects() {
        global $db;

        $sql = "SELECT * FROM subjects ";
        $sql .= "ORDER BY position ASC";

        // Show sql string
        //echo $sql;

        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

?>