<?php
session_start();
unset($_SESSSION['username']); // clear session
unset($_SESSION['fullname']);
unset($_SESSION['role']);
session_destroy();
header("location: signin");

?>