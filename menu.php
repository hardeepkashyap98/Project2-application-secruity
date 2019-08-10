<?php
ob_start();

//set the page title
$page_title = 'Main Menu';

//embed the header
require_once ('header.php');
?>

    <main class="container">

    <h1>Project 2</h1>

    <a href="books.php" title="Books">Books</a>

    </main>
<?php
//embed footer
require_once('footer.php');

ob_flush();
?>