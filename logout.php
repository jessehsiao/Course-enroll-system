<?php

session_start();
session_unset();

echo "<div id='header' style='height:50px;background-color:#ACD6FF;'><h3>logout success</h3></div>";
echo "<meta http-equiv='refresh' content='2; url=index.php'>";

?>