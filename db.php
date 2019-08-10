<?php
//global database connection
$conn = new PDo('mysql:host=sql9.freesqldatabase.com;dbname=sql9301354', 'sql9301354', 'jWZIN4f536');

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>