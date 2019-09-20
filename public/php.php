<?php

$timestamp = strtotime("next " . date("l"));
echo date("F j, Y", $timestamp);
?>