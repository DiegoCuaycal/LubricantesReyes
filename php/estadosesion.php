<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo "1";
} else {
    echo "0";
}

session_unset();

session_destroy();
?>