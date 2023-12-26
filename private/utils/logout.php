<?php
include("../utils/base-location.php");
session_start();
session_destroy();
redirect_login("/login","");