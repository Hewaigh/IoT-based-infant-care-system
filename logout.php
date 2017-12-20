<?php
SESSION_START();

unset($_SESSION['username']);
session_destroy();
header('Location: login.php'); ?>