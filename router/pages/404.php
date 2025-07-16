<?php 
header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');

require("./_header.php");
?>
<a href="router/404.php">Page 404</a>
<br>
<a href="/home">Home</a>
<p>Ceci est ma page 404!</p>
<?php 
require("./_footer.php");
?>