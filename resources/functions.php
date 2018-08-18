<?php

function redirect($location) {
    header("Location: $location");
}


function query($sql) {
    // when using a global var that we will pass into a function,
    // we need to use the global keyword and declare it beforehand.
    // if you didn't use global and then you called the $connection var,
    // you would be calling an entirely new var.
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result) {
    global $connection;
    if (!$result) {
        die("QUERY FAILED " . mysqli_error($connection));
    }
}

function escape_string($string) {
    global $connection;

    // PREVENTING SQL INJECTION!
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result) {
    return mysqli_fetch_array($result);
}

?>
