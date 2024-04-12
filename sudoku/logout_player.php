<?php
session_start();
session_destroy();
header("Location: player_register.html");
exit;
?>