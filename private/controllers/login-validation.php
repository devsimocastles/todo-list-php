<?php

require "../db/connect.php";

$user = $_POST["user"]; $pass = $_POST["pass"];

print_r($query->countRows);
