<?php

require_once "../include/header.php";
$_SESSION = array();
session_destroy();
header('Location: ../index.php');
