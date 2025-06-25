<?php 
$pageBodyClass = 'white'; 
require "./_header.php";

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION["logged"]) || $_SESSION["logged"] != true) {
    # code...
}
?>












<?php  
require "./_footer.php";

?>