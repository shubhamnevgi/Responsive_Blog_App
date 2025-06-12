<?php 
session_start();
require 'config/constants.PHP';

// destroy all session and redirect user to home page

session_destroy();
header('Location:'. ROOT_URL );
die();

?>