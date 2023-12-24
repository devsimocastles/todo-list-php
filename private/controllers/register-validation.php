<?php 

//========== IMPORTS =======================
include "../utils/base-location.php";
include "../db/connect.php";
//==========================================



//=========== REGEX =============
$invalid_user = "/[^A-Za-z0-9]/";
$valid_password = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
//===============================


//========== USER INPUT ====================
$user = htmlspecialchars($_POST["user"]);
$confirm_user = htmlspecialchars($_POST["confirm_user"]);

$password = htmlspecialchars($_POST["pass"]);
$confirm_password = htmlspecialchars($_POST["confirm_pass"]);
//==========================================



//========= USER INPUT VALIDATION ==========
        // validando usuario //
if ($user == "" || $confirm_user == "") redirect("register", "empty_field"); 
if ($user != $confirm_user) redirect("register","users_dont_match");
if (strlen($user) < 8 || strlen($confirm_user) < 8)  redirect("register", "user_invalid_length");
if (preg_match($invalid_user, $user) || preg_match($invalid_user, $confirm_user)) redirect("register","invalid_user");
        // validando contraseña //
if ($password == "" || $confirm_password == "") redirect("register", "empty_field");
if ($password != $confirm_password) redirect("register","password_dont_match");
if (strlen($password) < 8|| strlen($confirm_password) < 8) redirect("register", "password_invalid_length");
if (preg_match($valid_password, $password) || preg_match($valid_password, $confirm_password)) redirect("register", "invalid_password");

//==========================================

