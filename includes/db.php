<?php

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/* check connection */
if ($db->connect_error) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
/* close connection */
//$db->close();
?>
