<?php
session_start();
session_destroy();//to stop the session
header("Location: login.php");
exit();
?>
