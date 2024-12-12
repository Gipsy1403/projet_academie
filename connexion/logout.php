<?php
include("/projet_academie/general/function.php");
session_unset();
session_destroy();
header("location:/projet_academie/index.php");
?>