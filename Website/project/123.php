<?php
$fileres = file_get_contents('d:/a.jpg');
header('Content-type: image/jpeg');
echo $fileres;
?>