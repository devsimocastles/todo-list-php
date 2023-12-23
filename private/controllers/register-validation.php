<?php 

//========== IMPORTS =======================
include "../utils/base-location.php";
include "../utils/redirect.php";
include "../db/connect.php";
//==========================================



//========== USER INPUT ====================
$user = $_POST["user"];
$confirm_user = $_POST["confirm_user"];

$password = $_POST["pass"];
$confirm_password = $_POST["confirm_pass"];
//==========================================



//========= USER INPUT VALIDATION ==========
redirect("login", "error");
//==========================================