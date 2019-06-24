<?php
session_start();

session_unset();
session_destroy();
header("Location: https://urstoree.000webhostapp.com/index.php");
?>