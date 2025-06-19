<?php 
if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="./JS/script.js"></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Quanticode</title>
</head>