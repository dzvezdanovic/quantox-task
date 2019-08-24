<?php
    $DB_SERVER = "localhost";
    $DB_USER = "dev";
    $DB_PASS = "dev";
    $DB_NAME = "task";

    // 1. Create a database connection
    $conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);
    if ($conn->connect_errno) {
        exit("Database connection failed: " . $conn->connect_errno);
    }
